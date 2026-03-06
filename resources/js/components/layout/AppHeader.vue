<template>
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-oax-dark/95 backdrop-blur-md border-b border-oax-border">
        <div class="max-w-[1440px] mx-auto px-5 md:px-10 py-3 flex items-center justify-between">
            <!-- Logo Area -->
            <div class="flex items-center gap-8">
                <router-link to="/" class="flex items-center gap-3 text-white group">
                    <div class="size-8 flex items-center justify-center rounded bg-primary text-white">
                        <span class="material-symbols-outlined text-[20px]">diamond</span>
                    </div>
                    <h2 class="text-white text-xl font-bold tracking-wider group-hover:text-primary transition-colors">OAX FASHION</h2>
                </router-link>
                <!-- Desktop Nav Links -->
                <nav class="hidden md:flex items-center gap-8 pl-8 border-l border-oax-border">
                    <router-link to="/shop" class="text-gray-300 text-sm font-medium hover:text-primary transition-colors">Shop</router-link>
                    <router-link to="/collections" class="text-gray-300 text-sm font-medium hover:text-primary transition-colors">Collections</router-link>
                    <router-link to="/lookbook" class="text-gray-300 text-sm font-medium hover:text-primary transition-colors">Editorial</router-link>
                    <router-link to="/about" class="text-gray-300 text-sm font-medium hover:text-primary transition-colors">About</router-link>
                </nav>
            </div>
            <!-- Right Actions -->
            <div class="flex items-center gap-4 md:gap-6">
                <!-- Search (Desktop) -->
                <div class="hidden md:flex items-center bg-oax-panel rounded-full px-4 h-10 w-64 border border-transparent focus-within:border-primary transition-colors">
                    <span class="material-symbols-outlined text-gray-400 text-[20px]">search</span>
                    <input 
                        v-model="searchQuery"
                        @keyup.enter="handleSearch"
                        class="bg-transparent border-none text-white text-sm w-full focus:ring-0 placeholder:text-gray-500" 
                        placeholder="Search" 
                        type="text"
                    />
                </div>
                <!-- Icons -->
                <div class="flex gap-3">
                    <button 
                        @click="toggleCart"
                        class="relative flex items-center justify-center w-8 h-8 rounded-full bg-oax-panel text-white hover:bg-primary hover:text-white transition-all"
                    >
                        <span class="material-symbols-outlined text-[18px]">shopping_cart</span>
                        <span v-if="cartCount > 0" class="absolute top-0 right-0 size-2 bg-primary rounded-full"></span>
                    </button>
                    <router-link 
                        to="/account" 
                        class="flex items-center justify-center size-10 rounded-full bg-oax-panel text-white hover:bg-primary hover:text-white transition-all"
                    >
                        <span class="material-symbols-outlined text-[20px]">account_circle</span>
                    </router-link>
                    <button 
                        @click="toggleMobileMenu"
                        class="md:hidden flex items-center justify-center size-10 rounded-full bg-oax-panel text-white hover:bg-primary hover:text-white transition-all"
                    >
                        <span class="material-symbols-outlined text-[20px]">menu</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <!-- Mobile Menu -->
    <transition name="slide-down">
        <div v-if="showMobileMenu" class="fixed inset-0 z-40 bg-oax-dark md:hidden">
            <div class="flex flex-col h-full pt-20 px-6">
                <nav class="flex flex-col gap-4">
                    <router-link to="/shop" @click="showMobileMenu = false" class="text-white text-lg font-medium py-2 border-b border-oax-border">Shop</router-link>
                    <router-link to="/collections" @click="showMobileMenu = false" class="text-white text-lg font-medium py-2 border-b border-oax-border">Collections</router-link>
                    <router-link to="/lookbook" @click="showMobileMenu = false" class="text-white text-lg font-medium py-2 border-b border-oax-border">Editorial</router-link>
                    <router-link to="/about" @click="showMobileMenu = false" class="text-white text-lg font-medium py-2 border-b border-oax-border">About</router-link>
                    <router-link to="/contact" @click="showMobileMenu = false" class="text-white text-lg font-medium py-2 border-b border-oax-border">Contact</router-link>
                </nav>
                <div class="mt-auto pb-8">
                    <button @click="showMobileMenu = false" class="w-full py-3 text-center text-gray-400">Close</button>
                </div>
            </div>
        </div>
    </transition>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useRouter } from 'vue-router';
import { useCartStore } from '../../stores/cart';

const router = useRouter();
const cartStore = useCartStore();

const searchQuery = ref('');
const showMobileMenu = ref(false);

const cartCount = computed(() => cartStore.itemCount);

const toggleCart = () => {
    cartStore.toggleDrawer();
};

const toggleMobileMenu = () => {
    showMobileMenu.value = !showMobileMenu.value;
};

const handleSearch = () => {
    if (searchQuery.value.trim()) {
        router.push({ path: '/shop', query: { search: searchQuery.value } });
    }
};
</script>

<style scoped>
.slide-down-enter-active,
.slide-down-leave-active {
    transition: transform 0.3s ease;
}

.slide-down-enter-from,
.slide-down-leave-to {
    transform: translateY(-100%);
}
</style>