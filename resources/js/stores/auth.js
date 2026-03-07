import { defineStore } from 'pinia'
import { ref, computed } from 'vue'
import axios from 'axios'

export const useAuthStore = defineStore('auth', () => {
    // State
    const user = ref(null)
    const token = ref(null)
    const loading = ref(false)
    const error = ref(null)
    const isAuthenticated = ref(false)
    
    // 2FA State
    const requires2FA = ref(false)
    const tempToken = ref(null)
    
    // Password Change State
    const requiresPasswordChange = ref(false)
    
    // Initialize from localStorage
    const initAuth = () => {
        const storedToken = localStorage.getItem('token')
        const storedUser = localStorage.getItem('user')
        
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
    const getUserName = computed(() => user.value?.name || user.value?.email || 'Guest')
    const getUserEmail = computed(() => user.value?.email || '')
    const getUserAvatar = computed(() => user.value?.avatar || null)
    
    // Actions
    const login = async (credentials) => {
        loading.value = true
        error.value = null
        requires2FA.value = false
        requiresPasswordChange.value = false
        
        try {
            const response = await axios.post('/api/v1/auth/login', credentials)
            
            if (response.data.requires_2fa) {
                requires2FA.value = true
                tempToken.value = response.data.temp_token
                return { requires_2fa: true, temp_token: response.data.temp_token }
            }
            
            if (response.data.requires_password_change) {
                requiresPasswordChange.value = true
                tempToken.value = response.data.token
                localStorage.setItem('temp_token', response.data.token)
                return { requires_password_change: true }
            }
            
            if (response.data.success) {
                // Store token and user
                token.value = response.data.token
                user.value = response.data.user
                isAuthenticated.value = true
                
                localStorage.setItem('token', response.data.token)
                localStorage.setItem('user', JSON.stringify(response.data.user))
                
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
            const response = await axios.post('/api/v1/auth/verify-2fa', {
                temp_token: tempToken.value,
                code: code
            })
            
            if (response.data.success) {
                token.value = response.data.token
                user.value = response.data.user
                isAuthenticated.value = true
                
                localStorage.setItem('token', response.data.token)
                localStorage.setItem('user', JSON.stringify(response.data.user))
                
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
    
    const changeForcedPassword = async (password, passwordConfirmation) => {
        loading.value = true
        error.value = null
        
        try {
            const response = await axios.post('/api/v1/auth/force-password-change', {
                password: password,
                password_confirmation: passwordConfirmation
            }, {
                headers: {
                    'Authorization': `Bearer ${tempToken.value}`
                }
            })
            
            if (response.data.success) {
                token.value = response.data.token
                user.value = response.data.user
                isAuthenticated.value = true
                
                localStorage.setItem('token', response.data.token)
                localStorage.setItem('user', JSON.stringify(response.data.user))
                localStorage.removeItem('temp_token')
                
                axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
                
                requiresPasswordChange.value = false
                tempToken.value = null
                
                return { success: true, user: response.data.user }
            }
            
        } catch (err) {
            error.value = err.response?.data?.message || 'Password change failed. Please try again.'
            throw err
        } finally {
            loading.value = false
        }
    }
    
    const register = async (userData) => {
        loading.value = true
        error.value = null
        
        try {
            const response = await axios.post('/api/v1/auth/register', userData)
            
            if (response.data.success) {
                // Auto-login after registration if token is returned
                if (response.data.token) {
                    token.value = response.data.token
                    user.value = response.data.user
                    isAuthenticated.value = true
                    
                    localStorage.setItem('token', response.data.token)
                    localStorage.setItem('user', JSON.stringify(response.data.user))
                    
                    axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
                }
                
                return { success: true, message: response.data.message }
            }
            
        } catch (err) {
            error.value = err.response?.data?.message || 'Registration failed. Please try again.'
            throw err
        } finally {
            loading.value = false
        }
    }
    
    const logout = async () => {
        loading.value = true
        
        try {
            await axios.post('/api/v1/auth/logout')
        } catch (err) {
            // Continue with logout even if API call fails
            console.warn('Logout API call failed:', err)
        } finally {
            // Clear state regardless of API result
            user.value = null
            token.value = null
            isAuthenticated.value = false
            requires2FA.value = false
            requiresPasswordChange.value = false
            tempToken.value = null
            
            // Clear localStorage
            localStorage.removeItem('token')
            localStorage.removeItem('user')
            localStorage.removeItem('temp_token')
            
            // Clear axios default header
            delete axios.defaults.headers.common['Authorization']
            
            loading.value = false
        }
    }
    
    const fetchUser = async () => {
        if (!token.value) return null
        
        try {
            const response = await axios.get('/api/v1/auth/user')
            user.value = response.data
            localStorage.setItem('user', JSON.stringify(response.data))
            return response.data
        } catch (err) {
            // If token is invalid, logout
            if (err.response?.status === 401) {
                logout()
            }
            throw err
        }
    }
    
    const updateProfile = async (profileData) => {
        loading.value = true
        error.value = null
        
        try {
            const response = await axios.put('/api/v1/customer/profile', profileData)
            
            if (response.data.success) {
                user.value = { ...user.value, ...response.data.user }
                localStorage.setItem('user', JSON.stringify(user.value))
                return { success: true, user: user.value }
            }
            
        } catch (err) {
            error.value = err.response?.data?.message || 'Profile update failed.'
            throw err
        } finally {
            loading.value = false
        }
    }
    
    const refreshToken = async () => {
        try {
            const response = await axios.post('/api/v1/auth/refresh')
            
            if (response.data.token) {
                token.value = response.data.token
                localStorage.setItem('token', response.data.token)
                axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
            }
            
        } catch (err) {
            // If refresh fails, logout
            logout()
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
        requiresPasswordChange,
        tempToken,
        
        // Getters
        isLoggedIn,
        getUser,
        getUserName,
        getUserEmail,
        getUserAvatar,
        
        // Actions
        login,
        verify2FA,
        changeForcedPassword,
        register,
        logout,
        fetchUser,
        updateProfile,
        refreshToken,
        clearError,
        initAuth
    }
})
