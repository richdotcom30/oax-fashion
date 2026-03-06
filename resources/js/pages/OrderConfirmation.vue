<template>
    <div class="flex flex-col min-h-screen">
        <!-- Success Content -->
        <main class="flex-1 flex flex-col items-center justify-center px-4 py-20 text-center">
            <div class="w-20 h-20 bg-green-500/20 rounded-full flex items-center justify-center mb-8">
                <span class="material-symbols-outlined text-green-500 text-5xl">check_circle</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-black tracking-tighter text-white mb-4">Order Confirmed</h1>
            <p class="text-xl text-gray-300 mb-2">Thank you for your purchase</p>
            <p class="text-text-muted mb-8">Order #OX-{{ orderNumber }}</p>
            
            <div class="max-w-md w-full bg-oax-panel/50 rounded-xl border border-oax-border p-6 mb-8">
                <p class="text-gray-300 mb-4">A confirmation email has been sent to <span class="text-white font-medium">{{ email }}</span></p>
                <p class="text-sm text-text-muted">You can track your order status in your account dashboard.</p>
            </div>

            <div class="flex gap-4">
                <router-link to="/account/orders" class="bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-primary-light transition-colors">
                    Track Order
                </router-link>
                <router-link to="/shop" class="border border-oax-border text-white px-8 py-3 rounded-full font-bold hover:border-white transition-colors">
                    Continue Shopping
                </router-link>
            </div>
        </main>
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const orderNumber = ref('')
const email = ref('customer@example.com')

onMounted(() => {
    orderNumber.value = Math.random().toString(36).substring(2, 10).toUpperCase()
})
</script>
