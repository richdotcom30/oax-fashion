<template>
    <div class="flex flex-col min-h-screen">
        <!-- Top Navigation -->
        <div class="sticky top-0 z-50 flex items-center justify-between whitespace-nowrap border-b border-solid border-oax-border bg-oax-dark/95 backdrop-blur-md px-6 py-4 lg:px-10">
            <div class="flex items-center gap-8">
                <router-link to="/" class="flex items-center gap-4 text-white cursor-pointer">
                    <div class="size-8 text-primary">
                        <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 class="text-white text-xl font-bold tracking-tight">OAX FASHION</h2>
                </router-link>
            </div>
            <div class="flex flex-1 justify-end gap-6 items-center">
                <div class="flex gap-2">
                    <router-link to="/cart" class="relative p-2 rounded-lg hover:bg-oax-panel transition-colors text-white">
                        <span class="material-symbols-outlined">shopping_bag</span>
                        <span class="absolute top-1 right-1 size-2 bg-primary rounded-full"></span>
                    </router-link>
                    <router-link to="/account" class="p-2 rounded-lg hover:bg-oax-panel transition-colors text-white">
                        <span class="material-symbols-outlined">person</span>
                    </router-link>
                </div>
            </div>
        </div>

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
