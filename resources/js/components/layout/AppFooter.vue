<template>
    <footer class="bg-black border-t border-oax-border pt-16 pb-8">
        <div class="max-w-[1440px] mx-auto px-4 md:px-10">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">
                <!-- Brand Column -->
                <div class="flex flex-col gap-6">
                    <div class="flex items-center gap-2 text-white">
                        <div class="size-6 flex items-center justify-center rounded bg-primary text-white">
                            <span class="material-symbols-outlined text-[14px]">diamond</span>
                        </div>
                        <span class="font-bold text-lg">OAX FASHION</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Redefining luxury through the lens of modern darkness.
                    </p>
                </div>
                <!-- Links Column 1 -->
                <div class="flex flex-col gap-4">
                    <h4 class="text-white font-bold mb-2">Shop</h4>
                    <router-link to="/shop" class="text-gray-400 hover:text-primary transition-colors text-sm">New Arrivals</router-link>
                    <router-link to="/shop" class="text-gray-400 hover:text-primary transition-colors text-sm">Best Sellers</router-link>
                    <router-link to="/shop" class="text-gray-400 hover:text-primary transition-colors text-sm">Accessories</router-link>
                    <router-link to="/shop" class="text-gray-400 hover:text-primary transition-colors text-sm">Sale</router-link>
                </div>
                <!-- Links Column 2 -->
                <div class="flex flex-col gap-4">
                    <h4 class="text-white font-bold mb-2">Support</h4>
                    <router-link to="/contact" class="text-gray-400 hover:text-primary transition-colors text-sm">FAQ</router-link>
                    <router-link to="/contact" class="text-gray-400 hover:text-primary transition-colors text-sm">Shipping & Returns</router-link>
                    <router-link to="/contact" class="text-gray-400 hover:text-primary transition-colors text-sm">Care Guide</router-link>
                    <router-link to="/contact" class="text-gray-400 hover:text-primary transition-colors text-sm">Contact Us</router-link>
                </div>
                <!-- Newsletter -->
                <div class="flex flex-col gap-4">
                    <h4 class="text-white font-bold mb-2">Stay in the shadows</h4>
                    <p class="text-gray-500 text-xs mb-2">Subscribe for exclusive drops.</p>
                    <div class="flex w-full">
                        <input 
                            v-model="email"
                            class="bg-oax-panel text-white border-none rounded-l-lg px-4 py-2 text-sm w-full focus:ring-1 focus:ring-primary" 
                            placeholder="Email Address" 
                            type="email"
                        />
                        <button 
                            @click="subscribe"
                            class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-r-lg font-bold text-sm transition-colors"
                        >
                            Join
                        </button>
                    </div>
                </div>
            </div>
            <div class="border-t border-oax-border pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-xs">© 2024 OAX FASHION. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="text-gray-600 hover:text-white transition-colors text-xs">Privacy Policy</a>
                    <a href="#" class="text-gray-600 hover:text-white transition-colors text-xs">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { ref } from 'vue';

const email = ref('');

const subscribe = () => {
    if (email.value) {
        alert('Thank you for subscribing!');
        email.value = '';
    }
};
</script>
