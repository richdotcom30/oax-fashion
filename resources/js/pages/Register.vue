<template>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-black via-gray-900 to-gray-800 relative overflow-hidden py-12">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23D4AF37\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
    </div>

    <div class="relative w-full max-w-lg px-4">
      <!-- Logo -->
      <div class="text-center mb-8">
        <h1 class="text-4xl font-playfair text-oax-blood font-bold tracking-wider">OAX</h1>
        <p class="text-gray-400 text-sm mt-1 font-inter tracking-widest uppercase">Fashion</p>
      </div>

      <!-- Register Card -->
      <div class="bg-gray-900/80 backdrop-blur-xl rounded-lg shadow-2xl border border-gray-800 p-8">
        <h2 class="text-2xl font-playfair text-white mb-6 text-center">Create Account</h2>

        <form @submit.prevent="register">
          <!-- Name -->
          <div class="mb-4">
            <label class="block text-gray-400 text-sm mb-2 font-inter">Full Name</label>
            <input 
              v-model="form.name"
              type="text"
              class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none transition-colors"
              placeholder="John Doe"
              required
            />
          </div>

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
            <input 
              v-model="form.password"
              type="password"
              class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none transition-colors"
              placeholder="Min 8 characters"
              required
            />
            <p class="text-gray-500 text-xs mt-1">Must include uppercase, lowercase, and number</p>
          </div>

          <!-- Confirm Password -->
          <div class="mb-4">
            <label class="block text-gray-400 text-sm mb-2 font-inter">Confirm Password</label>
            <input 
              v-model="form.password_confirmation"
              type="password"
              class="w-full bg-gray-800 border border-gray-700 rounded-none px-4 py-3 text-white focus:border-oax-blood focus:outline-none transition-colors"
              placeholder="Confirm password"
              required
            />
          </div>

          <!-- Terms -->
          <div class="mb-6">
            <label class="flex items-center cursor-pointer">
              <input 
                v-model="form.terms"
                type="checkbox" 
                class="w-4 h-4 bg-gray-800 border-gray-700 rounded-none text-oax-blood focus:ring-oax-blood"
                required
              />
              <span class="ml-2 text-gray-400 text-sm font-inter">
                I agree to the <router-link to="/terms" class="text-oax-blood hover:text-gold">Terms</router-link> and <router-link to="/privacy" class="text-oax-blood hover:text-gold">Privacy Policy</router-link>
              </span>
            </label>
          </div>

          <!-- Error Message -->
          <div v-if="error" class="mb-4 p-3 bg-red-900/30 border border-red-800 rounded-none">
            <p class="text-red-400 text-sm">{{ error }}</p>
          </div>

          <!-- Success Message -->
          <div v-if="success" class="mb-4 p-3 bg-green-900/30 border border-green-800 rounded-none">
            <p class="text-green-400 text-sm">{{ success }}</p>
          </div>

          <!-- Submit -->
          <button 
            type="submit"
            :disabled="loading"
            class="w-full bg-oax-blood hover:bg-red-700 text-white font-inter py-3 px-4 rounded-none transition-all duration-300 disabled:opacity-50"
          >
            <span v-if="loading">Creating Account...</span>
            <span v-else>Create Account</span>
          </button>
        </form>

        <!-- Divider -->
        <div class="my-6 flex items-center">
          <div class="flex-1 border-t border-gray-700"></div>
          <span class="px-4 text-gray-500 text-sm">or continue with</span>
          <div class="flex-1 border-t border-gray-700"></div>
        </div>

        <!-- Social Login -->
        <div class="grid grid-cols-3 gap-3">
          <button type="button" class="flex items-center justify-center py-2 px-4 bg-gray-800 border border-gray-700 hover:bg-gray-700 rounded-none transition-colors">
            <svg class="w-5 h-5" viewBox="0 0 24 24">
              <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
              <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
              <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
              <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
            </svg>
          </button>
          <button type="button" class="flex items-center justify-center py-2 px-4 bg-gray-800 border border-gray-700 hover:bg-gray-700 rounded-none transition-colors">
            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
            </svg>
          </button>
          <button type="button" class="flex items-center justify-center py-2 px-4 bg-gray-800 border border-gray-700 hover:bg-gray-700 rounded-none transition-colors">
            <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </button>
        </div>

        <!-- Login Link -->
        <p class="text-gray-500 text-center mt-6 text-sm font-inter">
          Already have an account? 
          <router-link to="/login" class="text-oax-blood hover:text-gold transition-colors">
            Sign in
          </router-link>
        </p>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, reactive } from 'vue'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'

const router = useRouter()
const authStore = useAuthStore()

const loading = ref(false)
const error = ref('')
const success = ref('')

const form = reactive({
  name: '',
  email: '',
  password: '',
  password_confirmation: '',
  terms: false
})

const register = async () => {
  if (form.password !== form.password_confirmation) {
    error.value = 'Passwords do not match'
    return
  }

  loading.value = true
  error.value = ''
  success.value = ''

  try {
    const result = await authStore.register({
      name: form.name,
      email: form.email,
      password: form.password,
      password_confirmation: form.password_confirmation
    })

    if (result.success) {
      success.value = result.message
      router.push('/account')
    }
  } catch (err) {
    error.value = err.response?.data?.message || 'Registration failed. Please try again.'
  } finally {
    loading.value = false
  }
}
</script>

<style scoped>
.font-playfair {
  font-family: 'Playfair Display', serif;
}

.font-inter {
  font-family: 'Inter', sans-serif;
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
