<template>
    <div id="app" class="min-h-screen bg-background-dark text-white">
        <!-- Navigation -->
        <AppHeader v-if="!isAdminRoute" />
        
        <!-- Main Content -->
        <main :class="isAdminRoute ? '' : 'pt-16'">
            <router-view v-slot="{ Component }">
                <transition name="fade" mode="out-in">
                    <component :is="Component" />
                </transition>
            </router-view>
        </main>
        
        <!-- Footer -->
        <AppFooter v-if="!isAdminRoute" />
        
        <!-- Cart Drawer -->
        <CartDrawer />
    </div>
</template>

<script setup>
import { computed } from 'vue';
import { useRoute } from 'vue-router';
import AppHeader from './components/layout/AppHeader.vue';
import AppFooter from './components/layout/AppFooter.vue';
import CartDrawer from './components/cart/CartDrawer.vue';

const route = useRoute();

const isAdminRoute = computed(() => {
    return route.path.startsWith('/admin');
});
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
