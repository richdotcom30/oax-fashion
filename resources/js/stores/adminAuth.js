import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import axios from 'axios'

export const useAdminAuthStore = defineStore('adminAuth', () => {
    // State
    const user = ref(null)
    const token = ref(null)
    const loading = ref(false)
    const error = ref(null)
    const isAuthenticated = ref(false)
    
    // 2FA State
    const requires2FA = ref(false)
    const tempToken = ref(null)
    
    // Initialize from localStorage
    const initAuth = () => {
        const storedToken = localStorage.getItem('admin_token')
        const storedUser = localStorage.getItem('admin_user')
        
        if (storedToken && storedUser) {
            token.value = storedToken
            user.value = JSON.parse(storedUser)
            isAuthenticated.value = true
            axios.defaults.headers.common['Authorization'] = `Bearer ${storedToken}`
        }
    }
    
    // Getters
    const isLoggedIn = computed(() => isAuthenticated.value && !!token.value)
    const getUser = computed(() => user.value)
    const getUserName = computed(() => user.value?.name || user.value?.email || 'Admin')
    
    // Actions
    const login = async (credentials) => {
        loading.value = true
        error.value = null
        requires2FA.value = false
        
        try {
            const response = await axios.post('/api/v1/admin/auth/login', credentials)
            
            if (response.data.requires_2fa) {
                requires2FA.value = true
                tempToken.value = response.data.temp_token
                return { requires_2fa: true, temp_token: response.data.temp_token }
            }
            
            if (response.data.success) {
                // Store admin token
                token.value = response.data.token
                user.value = response.data.user
                isAuthenticated.value = true
                
                localStorage.setItem('admin_token', response.data.token)
                localStorage.setItem('admin_user', JSON.stringify(response.data.user))
                
                // Set axios default header
                axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
                
                return { success: true, user: response.data.user }
            }
            
        } catch (err) {
            error.value = err.response?.data?.message || 'Login failed. Please try again.'
            
            if (err.response?.data?.retry_after) {
                error.value += ` Try again in ${err.response.data.retry_after} seconds.`
            }
            
            throw err
        } finally {
            loading.value = false
        }
    }
    
    const verify2FA = async (code) => {
        loading.value = true
        error.value = null
        
        try {
            const response = await axios.post('/api/v1/admin/auth/verify-2fa', {
                temp_token: tempToken.value,
                code: code
            })
            
            if (response.data.success) {
                token.value = response.data.token
                user.value = response.data.user
                isAuthenticated.value = true
                
                localStorage.setItem('admin_token', response.data.token)
                localStorage.setItem('admin_user', JSON.stringify(response.data.user))
                
                axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
                
                requires2FA.value = false
                tempToken.value = null
                
                return { success: true, user: response.data.user }
            }
            
        } catch (err) {
            error.value = err.response?.data?.message || 'Invalid code. Please try again.'
            throw err
        } finally {
            loading.value = false
        }
    }
    
    const logout = async () => {
        loading.value = true
        
        try {
            await axios.post('/api/v1/admin/auth/logout')
        } catch (err) {
            console.warn('Logout API call failed:', err)
        } finally {
            // Clear state
            user.value = null
            token.value = null
            isAuthenticated.value = false
            requires2FA.value = false
            tempToken.value = null
            
            // Clear localStorage
            localStorage.removeItem('admin_token')
            localStorage.removeItem('admin_user')
            
            // Clear axios default header
            delete axios.defaults.headers.common['Authorization']
            
            loading.value = false
        }
    }
    
    const fetchUser = async () => {
        if (!token.value) return null
        
        try {
            const response = await axios.get('/api/v1/admin/auth/user')
            user.value = response.data
            localStorage.setItem('admin_user', JSON.stringify(response.data))
            return response.data
        } catch (err) {
            if (err.response?.status === 401) {
                logout()
            }
            throw err
        }
    }
    
    const clearError = () => {
        error.value = null
    }
    
    // Initialize on store creation
    initAuth()
    
    return {
        // State
        user,
        token,
        loading,
        error,
        isAuthenticated,
        requires2FA,
        tempToken,
        
        // Getters
        isLoggedIn,
        getUser,
        getUserName,
        
        // Actions
        login,
        verify2FA,
        logout,
        fetchUser,
        clearError,
        initAuth
    }
})
