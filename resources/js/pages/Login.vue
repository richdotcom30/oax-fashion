<template>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black via-gray-900 to-gray-800 relative overflow-hidden">
    <!-- Luxury Background Pattern -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23D4AF37\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="relative w-full max-w-md px-4">
      <!-- Logo -->
      <div class="text-center mb-8">
        <h1 class="text-4xl font-playfair text-oax-blood font-bold tracking-wider">OAX</h1>
        <p class="text-gray-400 text-sm mt-1 font-inter tracking-widest uppercase">Fashion</p>
      </div>

      <!-- Login Card -->
      <div class="bg-gray-900/80 backdrop-blur-xl rounded-lg shadow-2xl border border-gray-800 p-8">
        <h2 class="text-2xl font-playfair text-white mb-6 text-center">Welcome Back</h2>
        
        <!-- 2FA Verification Form -->
        <div v-if="show2FA">
          <form @submit.prevent="verify2FA">
            <div class="mb-6">
              <label class="block text-gray-400 text-sm mb-2 font-inter">Authentication Code</label>
              <input 
                v-model="form2FA.code"
                type="text"
                maxlength="6"
                class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white font-mono tracking-widest text-center text-xl focus:border-oax-blood focus:outline-none transition-colors"
                placeholder="000000"
                required
              />
              <p class="text-gray-500 text-xs mt-2">Enter the 6-digit code from your authenticator app</p>
            </div>

            <button 
              type="submit"
              :disabled="loading"
              class="w-full bg-oax-blood hover:bg-red-700 text-white font-inter py-3 px-4 rounded-none transition-all duration-300 disabled:opacity-50"
            >
              <span v-if="loading">Verifying...</span>
              <span v-else>Verify Code</span>
            </button>

            <button 
              type="button"
              @click="show2FA = false; tempToken = ''"
              class="w-full mt-3 text-gray-400 hover:text-white text-sm font-inter transition-colors"
            >
              ← Back to Login
            </button>
          </form>
        </div>

        <!-- Password Change Required Form -->
        <div v-else-if="requirePasswordChange">
          <form @submit.prevent="changeForcedPassword">
            <div class="mb-4">
              <label class="block text-gray-400 text-sm mb-2 font-inter">New Password</label>
              <input 
                v-model="passwordForm.password"
                type="password"
                class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none transition-colors"
                required
              />
            </div>

            <div class="mb-6">
              <label class="block text-gray-400 text-sm mb-2 font-inter">Confirm Password</label>
              <input 
                v-model="passwordForm.password_confirmation"
                type="password"
                class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none transition-colors"
                required
              />
            </div>

            <p class="text-gray-500 text-xs mb-4">
              Password must be at least 8 characters with uppercase, lowercase, and number.
            </p>

            <button 
              type="submit"
              :disabled="loading"
              class="w-full bg-oax-blood hover:bg-red-700 text-white font-inter py-3 px-4 rounded-none transition-all duration-300 disabled:opacity-50"
            >
              <span v-if="loading">Processing...</span>
              <span v-else>Change Password</span>
            </button>
          </form>
        </div>

        <!-- Regular Login Form -->
        <form v-else @submit.prevent="login">
          <!-- Email -->
          <div class="mb-4">
            <label class="block text-gray-400 text-sm mb-2 font-inter">Email</label>
            <input 
              v-model="form.email"
              type="email"
              class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none transition-colors"
              placeholder="your@email.com"
              required
            />
          </div>

          <!-- Password -->
          <div class="mb-4">
            <label class="block text-gray-400 text-sm mb-2 font-inter">Password</label>
            <div class="relative">
              <input 
                v-model="form.password"
                :type="showPassword ? 'text' : 'password'"
                class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none transition-colors pr-12"
                placeholder="••••••••"
                required
              />
              <button 
                type="button"
                @click="showPassword = !showPassword"
                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-white"
              >
                <svg v-if="!showPassword" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
                <svg v-else class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                </svg>
              </button>
            </div>
          </div>

          <!-- Remember Me & Forgot Password -->
          <div class="flex items-center justify-between mb-6">
            <label class="flex items-center cursor-pointer">
              <input 
                v-model="form.remember"
                type="checkbox" 
                class="w-4 h-4 bg-gray-800 border-gray-700 rounded-none text-oax-blood focus:ring-oax-blood focus:ring-offset-gray-900"
              />
              <span class="ml-2 text-gray-400 text-sm font-inter">Remember me</span>
            </label>
            <a href="#" @click.prevent="showForgotPassword = true" class="text-oax-blood hover:text-gold text-sm font-inter transition-colors">
              Forgot Password?
            </a>
          </div>

          <!-- CAPTCHA -->
          <div v-if="showCaptcha" class="mb-4">
            <div class="g-recaptcha" :data-sitekey="captchaSiteKey"></div>
          </div>

          <!-- Error Message -->
          <div v-if="error" class="mb-4 p-3 bg-red-900/30 border border-red-800 rounded-none">
            <p class="text-red-400 text-sm">{{ error }}</p>
          </div>

          <!-- Submit -->
          <button 
            type="submit"
            :disabled="loading"
            class="w-full bg-oax-blood hover:bg-red-700 text-white font-inter py-3 px-4 rounded-none transition-all duration-300 disabled:opacity-50"
          >
            <span v-if="loading">Signing In...</span>
            <span v-else>Sign In</span>
          </button>

          <!-- Divider -->
          <div class="my-6 flex items-center">
            <div class="flex-1 border-t border-gray-700"></div>
            <span class="px-4 text-gray-500 text-sm">or continue with</span>
            <div class="flex-1 border-t border-gray-700"></div>
          </div>

          <!-- Social Login -->
          <div class="grid grid-cols-3 gap-3">
            <button 
              type="button"
              @click="oauthLogin('google')"
              class="flex items-center justify-center py-2 px-4 bg-gray-800 border border-gray-700 hover:bg-gray-700 rounded-none transition-colors"
            >
              <svg class="w-5 h-5" viewBox="0 0 24 24">
                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
              </svg>
            </button>
            <button 
              type="button"
              @click="oauthLogin('facebook')"
              class="flex items-center justify-center py-2 px-4 bg-gray-800 border border-gray-700 hover:bg-gray-700 rounded-none transition-colors"
            >
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
              </svg>
            </button>
            <button 
              type="button"
              @click="oauthLogin('instagram')"
              class="flex items-center justify-center py-2 px-4 bg-gray-800 border border-gray-700 hover:bg-gray-700 rounded-none transition-colors"
            >
              <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
              </svg>
            </button>
          </div>
        </form>

        <!-- Register Link -->
        <p class="text-gray-500 text-center mt-6 text-sm font-inter">
          Don't have an account? 
          <router-link to="/register" class="text-oax-blood hover:text-gold transition-colors">
            Create one
          </router-link>
        </p>
      </div>

      <!-- Forgot Password Modal -->
      <div v-if="showForgotPassword" class="fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50" @click.self="showForgotPassword = false">
        <div class="bg-gray-900 border border-gray-800 p-8 max-w-md w-full mx-4">
          <h3 class="text-xl font-playfair text-white mb-4">Reset Password</h3>
          
          <form v-if="!passwordResetSent" @submit.prevent="forgotPassword">
            <p class="text-gray-400 text-sm mb-4">Enter your email and we'll send you a reset link.</p>
            
            <input 
              v-model="forgotPasswordForm.email"
              type="email"
              class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none mb-4"
              placeholder="your@email.com"
              required
            />

            <div v-if="error" class="mb-4 p-3 bg-red-900/30 border border-red-800">
              <p class="text-red-400 text-sm">{{ error }}</p>
            </div>

            <button 
              type="submit"
              :disabled="loading"
              class="w-full bg-oax-blood hover:bg-red-700 text-white font-inter py-3 rounded-none transition-colors disabled:opacity-50"
            >
              <span v-if="loading">Sending...</span>
              <span v-else>Send Reset Link</span>
            </button>
          </form>

          <div v-else class="text-center">
            <div class="text-green-400 text-5xl mb-4">✓</div>
            <p class="text-white mb-4">Check your email for the reset link.</p>
            <button 
              @click="showForgotPassword = false; passwordResetSent = false"
              class="text-oax-blood hover:text-gold"
            >
              Back to Login
            </button>
          </div>

          <button 
            @click="showForgotPassword = false"
            class="absolute top-4 right-4 text-gray-400 hover:text-white"
          >
            ✕
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive, onMounted, computed } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter()

// State
const loading = ref(false)
const error = ref('')
const showPassword = ref(false)
const showCaptcha = ref(false)
const showForgotPassword = ref(false)
const passwordResetSent = ref(false)
const show2FA = ref(false)
const requirePasswordChange = ref(false)
const tempToken = ref('')

const form = reactive({
  email: '',
  password: '',
  remember: false,
  'g-recaptcha-response': ''
})

const form2FA = reactive({
  code: ''
})

const passwordForm = reactive({
  password: '',
  password_confirmation: ''
})

const forgotPasswordForm = reactive({
  email: ''
})

// Computed
const captchaSiteKey = computed(() => import.meta.env.VITE_CAPTCHA_SITE_KEY || '')

// Methods
const login = async () => {
  loading.value = true
  error.value = ''

  try {
    const response = await axios.post('/api/v1/auth/login', form)
    
    if (response.data.requires_2fa) {
      show2FA.value = true
      tempToken.value = response.data.temp_token
    } else if (response.data.requires_password_change) {
      requirePasswordChange.value = true
      localStorage.setItem('temp_token', response.data.token)
    } else if (response.data.success) {
      localStorage.setItem('token', response.data.token)
      localStorage.setItem('user', JSON.stringify(response.data.user))
      axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
      router.push('/account')
    }
  } catch (err) {
    error.value = err.response?.data?.message || 'Login failed. Please try again.'
    
    if (err.response?.data?.retry_after) {
      error.value += ` Try again in ${err.response.data.retry_after} seconds.`
    }
  } finally {
    loading.value = false
  }
}

const verify2FA = async () => {
  loading.value = true
  error.value = ''

  try {
    const response = await axios.post('/api/v1/auth/verify-2fa', {
      temp_token: tempToken.value,
      code: form2FA.code
    })

    if (response.data.success) {
      localStorage.setItem('token', response.data.token)
      localStorage.setItem('user', JSON.stringify(response.data.user))
      axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`
      router.push('/account')
    }
  } catch (err) {
    error.value = err.response?.data?.message || 'Invalid code. Please try again.'
  } finally {
    loading.value = false
  }
}

const changeForcedPassword = async () => {
  loading.value = true
  error.value = ''

  try {
    const token = localStorage.getItem('temp_token')
    axios.defaults.headers.common['Authorization'] = `Bearer ${token}`
    
    const response = await axios.post('/api/v1/auth/change-password', passwordForm)
    
    if (response.data.success) {
      localStorage.setItem('token', response.data.token)
      localStorage.setItem('user', JSON.stringify(response.data.user))
      router.push('/account')
    }
  } catch (err) {
    error.value = err.response?.data?.message || 'Password change failed.'
  } finally {
    loading.value = false
  }
}

const oauthLogin = (provider) => {
  window.location.href = `/api/v1/auth/oauth/${provider}`
}

const forgotPassword = async () => {
  loading.value = true
  error.value = ''

  try {
    await axios.post('/api/v1/auth/forgot-password', forgotPasswordForm)
    passwordResetSent.value = true
  } catch (err) {
    // Don't reveal if email exists
    passwordResetSent.value = true
  } finally {
    loading.value = false
  }
}

// Check if CAPTCHA is needed
onMounted(() => {
  if (import.meta.env.VITE_CAPTCHA_ENABLED === 'true') {
    showCaptcha.value = true
  }
})
</script>

<style scoped>
.font-playfair {
  font-family: 'Playfair Display', serif;
}

.font-inter {
  font-family: 'Inter', sans-serif;
}

.font-mono {
  font-family: 'Space Mono', monospace;
}

.text-oax-blood {
  color: #8B0000;
}

.bg-oax-blood {
  background-color: #8B0000;
}

.hover\:bg-red-700:hover {
  background-color: #7a0000;
}

.text-gold {
  color: #D4AF37;
}

.hover\:text-gold:hover {
  color: #D4AF37;
}
</style>
