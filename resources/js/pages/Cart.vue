<template>
    <div class="flex flex-col min-h-screen">
        <!-- Main Content -->
        <main class="flex-1 w-full max-w-[1440px] mx-auto px-4 md:px-8 py-8 lg:py-12">
            <h1 class="text-3xl md:text-5xl font-black tracking-tighter mb-8">Shopping Bag</h1>
            
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-16">
                <!-- Cart Items -->
                <div class="lg:col-span-2 space-y-6">
                    <div v-if="cartStore.items.length === 0" class="py-20 text-center">
                        <span class="material-symbols-outlined text-6xl text-text-muted mb-4">shopping_bag</span>
                        <p class="text-xl text-text-muted mb-6">Your bag is empty</p>
                        <router-link to="/shop" class="inline-block bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-primary-light transition-colors">
                            Continue Shopping
                        </router-link>
                    </div>
                    
                    <div v-else v-for="item in cartStore.items" :key="item.id" class="flex gap-6 p-4 bg-oax-panel/30 rounded-xl border border-oax-border/50">
                        <router-link :to="`/product/${item.id}`" class="shrink-0">
                            <img :src="item.image" :alt="item.name" class="w-28 h-36 object-cover rounded-lg" />
                        </router-link>
                        <div class="flex-1 flex flex-col justify-between">
                            <div>
                                <div class="flex justify-between items-start mb-2">
                                    <router-link :to="`/product/${item.id}`" class="text-lg font-bold text-white hover:text-primary transition-colors">
                                        {{ item.name }}
                                    </router-link>
                                    <button @click="cartStore.removeItem(item.id)" class="text-text-muted hover:text-primary transition-colors">
                                        <span class="material-symbols-outlined">close</span>
                                    </button>
                                </div>
                                <p class="text-sm text-text-muted mb-3">Size: {{ item.size }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center border border-oax-border rounded">
                                    <button @click="item.quantity > 1 && cartStore.updateQuantity(item.id, item.quantity - 1)" class="px-3 py-1 text-white hover:text-primary">
                                        <span class="material-symbols-outlined text-[18px]">remove</span>
                                    </button>
                                    <span class="px-3 py-1 text-white min-w-[30px] text-center">{{ item.quantity }}</span>
                                    <button @click="cartStore.updateQuantity(item.id, item.quantity + 1)" class="px-3 py-1 text-white hover:text-primary">
                                        <span class="material-symbols-outlined text-[18px]">add</span>
                                    </button>
                                </div>
                                <span class="text-lg font-bold text-primary">${{ (item.price * item.quantity).toLocaleString() }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="sticky top-28 bg-oax-panel/30 rounded-xl border border-oax-border/50 p-6">
                        <h2 class="text-xl font-bold text-white mb-6">Order Summary</h2>
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-gray-300">
                                <span>Subtotal</span>
                                <span>${{ cartStore.subtotal.toLocaleString() }}</span>
                            </div>
                            <div class="flex justify-between text-gray-300">
                                <span>Shipping</span>
                                <span class="text-green-500">Complimentary</span>
                            </div>
                            <div class="flex justify-between text-gray-300">
                                <span>Estimated Tax</span>
                                <span>${{ cartStore.tax.toLocaleString() }}</span>
                            </div>
                            <hr class="border-oax-border" />
                            <div class="flex justify-between text-xl font-bold text-white">
                                <span>Total</span>
                                <span>${{ cartStore.total.toLocaleString() }}</span>
                            </div>
                        </div>

                        <router-link to="/checkout" class="block w-full bg-primary text-white text-center py-4 rounded-lg font-bold uppercase tracking-wider hover:bg-primary-light transition-colors mb-4">
                            Proceed to Checkout
                        </router-link>
                        
                        <router-link to="/shop" class="block w-full text-center text-text-muted hover:text-white transition-colors text-sm">
                            Continue Shopping
                        </router-link>

                        <!-- Trust Badges -->
                        <div class="mt-8 pt-6 border-t border-oax-border">
                            <div class="flex items-center justify-center gap-4 text-text-muted">
                                <span class="material-symbols-outlined text-2xl">lock</span>
                                <span class="text-xs">Secure Checkout</span>
                                <span class="material-symbols-outlined text-2xl">verified</span>
                                <span class="text-xs">Authentic</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
import { useCartStore } from '../stores/cart'

const cartStore = useCartStore()
</script>
