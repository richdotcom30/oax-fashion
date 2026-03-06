<template>
    <teleport to="body">
        <!-- Overlay -->
        <transition name="fade">
            <div 
                v-if="cartStore.isDrawerOpen" 
                @click="cartStore.closeDrawer"
                class="fixed inset-0 bg-black/60 z-50"
            ></div>
        </transition>
        
        <!-- Drawer -->
        <transition name="slide">
            <div 
                v-if="cartStore.isDrawerOpen"
                class="fixed top-0 right-0 h-full w-full max-w-md bg-oax-dark border-l border-oax-border z-50 flex flex-col"
            >
                <!-- Header -->
                <div class="flex items-center justify-between p-6 border-b border-oax-border">
                    <h2 class="text-white text-xl font-bold">Shopping Bag</h2>
                    <button 
                        @click="cartStore.closeDrawer"
                        class="text-gray-400 hover:text-white transition-colors"
                    >
                        <span class="material-symbols-outlined text-[24px]">close</span>
                    </button>
                </div>
                
                <!-- Cart Items -->
                <div class="flex-1 overflow-y-auto p-6">
                    <div v-if="cartStore.items.length === 0" class="text-center py-12">
                        <span class="material-symbols-outlined text-6xl text-gray-600 mb-4">shopping_bag</span>
                        <p class="text-gray-400">Your bag is empty</p>
                    </div>
                    
                    <div v-else class="flex flex-col gap-6">
                        <div 
                            v-for="item in cartStore.items" 
                            :key="item.id"
                            class="flex gap-4 border-b border-oax-border pb-6"
                        >
                            <div class="w-24 h-32 rounded-lg overflow-hidden bg-oax-panel shrink-0">
                                <img :src="item.image" :alt="item.name" class="w-full h-full object-cover" />
                            </div>
                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="text-white font-medium">{{ item.name }}</h3>
                                    <p class="text-gray-500 text-sm">{{ item.color }} | Size: {{ item.size }}</p>
                                    <p class="text-white font-bold mt-2">${{ item.price.toLocaleString() }}</p>
                                </div>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center border border-oax-border rounded">
                                        <button 
                                            @click="cartStore.updateQuantity(item.id, item.quantity - 1)"
                                            class="px-3 py-1 text-gray-400 hover:text-white"
                                        >
                                            <span class="material-symbols-outlined text-sm">remove</span>
                                        </button>
                                        <span class="px-2 text-white">{{ item.quantity }}</span>
                                        <button 
                                            @click="cartStore.updateQuantity(item.id, item.quantity + 1)"
                                            class="px-3 py-1 text-gray-400 hover:text-white"
                                        >
                                            <span class="material-symbols-outlined text-sm">add</span>
                                        </button>
                                    </div>
                                    <button 
                                        @click="cartStore.removeItem(item.id)"
                                        class="text-gray-500 hover:text-primary transition-colors"
                                    >
                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Footer -->
                <div v-if="cartStore.items.length > 0" class="p-6 border-t border-oax-border bg-oax-panel">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-400">Subtotal</span>
                        <span class="text-white font-medium">${{ cartStore.subtotal.toLocaleString() }}</span>
                    </div>
                    <div class="flex justify-between mb-4">
                        <span class="text-gray-400">Tax</span>
                        <span class="text-white font-medium">${{ cartStore.tax.toLocaleString() }}</span>
                    </div>
                    <div class="flex justify-between mb-6">
                        <span class="text-white font-bold">Total</span>
                        <span class="text-gold font-bold text-xl">${{ cartStore.total.toLocaleString() }}</span>
                    </div>
                    <router-link 
                        to="/checkout"
                        @click="cartStore.closeDrawer"
                        class="w-full bg-primary hover:bg-primary-dark text-white font-bold py-4 rounded-lg flex items-center justify-center gap-2 transition-colors"
                    >
                        <span>Checkout</span>
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </router-link>
                    <router-link 
                        to="/cart"
                        @click="cartStore.closeDrawer"
                        class="w-full mt-3 border border-oax-border text-white font-medium py-3 rounded-lg text-center block hover:bg-oax-border transition-colors"
                    >
                        View Bag
                    </router-link>
                </div>
            </div>
        </transition>
    </teleport>
</template>

<script setup>
import { useCartStore } from '../../stores/cart';

const cartStore = useCartStore();
</script>

<style scoped>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}

.slide-enter-active,
.slide-leave-active {
    transition: transform 0.3s ease;
}

.slide-enter-from,
.slide-leave-to {
    transform: translateX(100%);
}
</style>
