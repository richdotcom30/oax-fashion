<template>
    <div class="min-h-screen bg-oax-light dark:bg-oax-dark">
        <!-- Hero Section -->
        <section class="relative h-[85vh] w-full overflow-hidden flex items-center justify-center">
            <!-- Background Image -->
            <div class="absolute inset-0 z-0">
                <div class="w-full h-full bg-cover bg-center" 
                    style="background-image: url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1920&q=80');">
                </div>
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-oax-dark via-transparent to-black/30 opacity-90"></div>
            </div>
            <!-- Content -->
            <div class="relative z-10 text-center px-4 max-w-4xl mx-auto flex flex-col items-center gap-6">
                <p class="text-oax-gold tracking-[0.2em] text-sm md:text-base font-medium uppercase animate-fade-in-up">
                    Seasonal Campaign 2024
                </p>
                <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl text-white font-bold leading-none tracking-tight">
                    The Winter<br/>
                    <span class="italic font-light text-gray-300">Avant-Garde</span>
                </h1>
                <p class="text-gray-300 max-w-lg mx-auto text-base md:text-lg font-light leading-relaxed mt-4">
                    Defining modern luxury through structural silhouettes and deep, resonant tones. 
                    Explore the narrative woven into every thread.
                </p>
                <div class="mt-8 flex flex-col sm:flex-row gap-4">
                    <button class="px-8 py-3 bg-white text-black font-bold tracking-wider text-sm hover:bg-gray-200 transition-colors uppercase">
                        View Lookbook
                    </button>
                    <button class="px-8 py-3 border border-white/30 text-white font-bold tracking-wider text-sm hover:bg-white/10 backdrop-blur-sm transition-colors uppercase flex items-center gap-2">
                        Shop Collection <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>
            <!-- Scroll Indicator -->
            <div class="absolute bottom-10 animate-bounce">
                <span class="material-symbols-outlined text-white/50 text-3xl">keyboard_arrow_down</span>
            </div>
        </section>

        <!-- Featured Collection Split -->
        <section class="w-full bg-white dark:bg-oax-black py-20 px-6 md:px-12 lg:px-20">
            <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
                <!-- Left Image -->
                <div class="lg:w-1/2 relative group cursor-pointer overflow-hidden">
                    <div class="aspect-[3/4] w-full overflow-hidden rounded-lg">
                        <div class="w-full h-full bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                            style="background-image: url('https://images.unsplash.com/photo-1509631179647-0177331693ae?w=800&q=80');">
                        </div>
                    </div>
                    <div class="absolute bottom-6 left-6">
                        <span class="bg-white text-black text-xs font-bold px-3 py-1 uppercase tracking-wider mb-2 inline-block">Trending</span>
                    </div>
                </div>
                <!-- Right Content -->
                <div class="lg:w-1/2 flex flex-col gap-6">
                    <h2 class="text-primary text-sm font-bold tracking-widest uppercase">Street Luxury</h2>
                    <h3 class="font-serif text-4xl md:text-5xl text-gray-900 dark:text-white leading-tight">
                        Urban Nomad
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 text-lg leading-relaxed">
                        Function meets high fashion. Our Urban Nomad collection redefines streetwear 
                        with premium materials, oversized cuts, and a rebellious spirit. Designed for 
                        those who move with the city's rhythm.
                    </p>
                    <ul class="flex flex-col gap-3 mt-4 text-gray-500 dark:text-gray-400">
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-oax-gold text-lg">check_circle</span>
                            Sustainable Technical Fabrics
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-oax-gold text-lg">check_circle</span>
                            Limited Edition Colorways
                        </li>
                        <li class="flex items-center gap-2">
                            <span class="material-symbols-outlined text-oax-gold text-lg">check_circle</span>
                            Hand-finished Details
                        </li>
                    </ul>
                    <router-link to="/shop?collection=urban-nomad" class="mt-6 inline-flex items-center gap-2 text-primary font-bold uppercase tracking-wide hover:underline underline-offset-4 decoration-oax-gold">
                        Explore Urban Nomad <span class="material-symbols-outlined text-lg">arrow_right_alt</span>
                    </router-link>
                </div>
            </div>
        </section>

        <!-- Masonry Grid Collections -->
        <section class="bg-gray-50 dark:bg-oax-gray py-20 px-4 md:px-10">
            <div class="max-w-7xl mx-auto mb-16 text-center">
                <h2 class="font-serif text-3xl md:text-4xl text-gray-900 dark:text-white mb-4">Curated Selections</h2>
                <div class="h-1 w-20 bg-primary mx-auto"></div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 auto-rows-[400px]">
                <!-- Card 1: Large Vertical -->
                <div class="relative group overflow-hidden rounded-xl row-span-2 cursor-pointer">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                        style="background-image: url('https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=800&q=80');">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-90 transition-opacity duration-300"></div>
                    <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                        <p class="text-white/80 text-sm uppercase tracking-widest mb-1">Evening Wear</p>
                        <h3 class="font-serif text-3xl text-white mb-4">Silk & Shadow</h3>
                        <button class="text-white border-b border-oax-gold pb-1 text-sm font-medium hover:text-oax-gold transition-colors">
                            VIEW COLLECTION
                        </button>
                    </div>
                </div>
                
                <!-- Card 2: Square -->
                <div class="relative group overflow-hidden rounded-xl cursor-pointer">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                        style="background-image: url('https://images.unsplash.com/photo-1515562141207-7a88fb7ce338?w=800&q=80');">
                    </div>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                    <div class="absolute bottom-6 left-6">
                        <h3 class="font-serif text-2xl text-white">Gold Accents</h3>
                        <p class="text-white/70 text-sm mt-1">Fine Jewelry Edit</p>
                    </div>
                </div>
                
                <!-- Card 3: Square -->
                <div class="relative group overflow-hidden rounded-xl cursor-pointer">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                        style="background-image: url('https://images.unsplash.com/photo-1551028719-00167b16eac5?w=800&q=80');">
                    </div>
                    <div class="absolute inset-0 bg-black/20 group-hover:bg-black/40 transition-colors"></div>
                    <div class="absolute bottom-6 left-6">
                        <h3 class="font-serif text-2xl text-white">The Leather Cut</h3>
                        <p class="text-white/70 text-sm mt-1">Jackets & Accessories</p>
                    </div>
                </div>
                
                <!-- Card 4: Horizontal Span -->
                <div class="relative group overflow-hidden rounded-xl md:col-span-2 cursor-pointer">
                    <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                        style="background-image: url('https://images.unsplash.com/photo-1509631179647-0177331693ae?w=1200&q=80');">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-r from-black/60 to-transparent"></div>
                    <div class="absolute top-0 left-0 h-full flex flex-col justify-center p-10 max-w-md">
                        <h3 class="font-serif text-4xl text-white mb-2">Monochrome Series</h3>
                        <p class="text-white/80 mb-6">A study in black and white. Minimalist designs for maximum impact.</p>
                        <button class="w-fit px-6 py-2 bg-white/10 backdrop-blur-md border border-white/20 text-white rounded hover:bg-white hover:text-black transition-all">
                            Discover More
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Horizontal Scroll Featured Products -->
        <section class="py-20 bg-white dark:bg-[#151515] overflow-hidden border-t border-gray-200 dark:border-white/5">
            <div class="px-6 md:px-10 lg:px-16 mb-8 flex justify-between items-end">
                <div>
                    <span class="text-primary font-bold text-xs tracking-widest uppercase mb-2 block">Available Now</span>
                    <h2 class="font-serif text-3xl text-gray-900 dark:text-white">Signature Pieces</h2>
                </div>
                <div class="flex gap-2">
                    <button @click="scrollLeft" class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        <span class="material-symbols-outlined">arrow_back</span>
                    </button>
                    <button @click="scrollRight" class="w-10 h-10 flex items-center justify-center rounded-full border border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                        <span class="material-symbols-outlined">arrow_forward</span>
                    </button>
                </div>
            </div>
            
            <!-- Scroll Container -->
            <div ref="scrollContainer" class="flex overflow-x-auto gap-6 px-6 md:px-10 lg:px-16 pb-8 scrollbar-hide snap-x">
                <div v-for="product in featuredProducts" :key="product.id" 
                    class="min-w-[280px] md:min-w-[320px] snap-start group cursor-pointer">
                    <div class="relative aspect-[3/4] overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-800 mb-4">
                        <img :alt="product.name" :src="product.image" 
                            class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"/>
                        <div v-if="product.badge" 
                            class="absolute top-3 right-3 bg-primary text-white text-[10px] font-bold px-2 py-1 rounded">
                            {{ product.badge }}
                        </div>
                        <button @click.prevent="addToCart(product)" 
                            class="absolute bottom-4 right-4 bg-white text-black p-2 rounded-full shadow-lg opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-300 hover:bg-oax-gold hover:text-white">
                            <span class="material-symbols-outlined text-lg">add_shopping_cart</span>
                        </button>
                    </div>
                    <h3 class="text-gray-900 dark:text-white font-serif text-lg leading-tight">{{ product.name }}</h3>
                    <p class="text-gray-500 text-sm mt-1">${{ product.price.toFixed(2) }}</p>
                </div>
            </div>
        </section>

        <!-- Newsletter CTA -->
        <section class="py-24 px-6 relative bg-oax-black text-center overflow-hidden">
            <!-- Abstract Background -->
            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-primary via-black to-black"></div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <span class="material-symbols-outlined text-4xl text-oax-gold mb-6">mail</span>
                <h2 class="font-serif text-3xl md:text-5xl text-white mb-4">Join the Inner Circle</h2>
                <p class="text-gray-400 mb-8">Be the first to access new collections, exclusive events, and private sales.</p>
                <form @submit.prevent="subscribeNewsletter" class="flex flex-col sm:flex-row gap-3">
                    <input v-model="email" 
                        class="flex-1 bg-white/10 border border-white/20 text-white placeholder-gray-500 px-4 py-3 rounded focus:outline-none focus:border-oax-gold transition-colors" 
                        placeholder="Enter your email address" type="email" required/>
                    <button class="bg-primary hover:bg-red-700 text-white px-8 py-3 rounded font-bold uppercase tracking-wider transition-colors" type="submit">
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useCartStore } from '../stores/cart';

const cartStore = useCartStore();
const email = ref('');
const scrollContainer = ref(null);

const featuredProducts = ref([
    {
        id: 1,
        name: 'Velvet Midnight Blazer',
        price: 450,
        image: 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=600&q=80',
        badge: 'NEW'
    },
    {
        id: 2,
        name: 'Saffron Silk Gown',
        price: 890,
        image: 'https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=600&q=80'
    },
    {
        id: 3,
        name: 'Floral Avant Drape',
        price: 620,
        image: 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?w=600&q=80'
    },
    {
        id: 4,
        name: 'OAX Trench II',
        price: 1200,
        image: 'https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=600&q=80',
        badge: 'LIMITED'
    },
    {
        id: 5,
        name: 'Cashmere Overlay',
        price: 780,
        image: 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=600&q=80'
    },
    {
        id: 6,
        name: 'Structured Blazer',
        price: 520,
        image: 'https://images.unsplash.com/photo-1507680434567-5739c80be1ac?w=600&q=80'
    }
]);

const scrollLeft = () => {
    if (scrollContainer.value) {
        scrollContainer.value.scrollBy({ left: -350, behavior: 'smooth' });
    }
};

const scrollRight = () => {
    if (scrollContainer.value) {
        scrollContainer.value.scrollBy({ left: 350, behavior: 'smooth' });
    }
};

const addToCart = (product) => {
    cartStore.addItem({
        id: product.id,
        name: product.name,
        price: product.price,
        image: product.image,
        quantity: 1
    });
};

const subscribeNewsletter = () => {
    alert(`Thank you for subscribing with: ${email.value}`);
    email.value = '';
};
</script>

<style scoped>
.group-hover-scale {
    transition: transform 0.7s cubic-bezier(0.25, 0.46, 0.45, 0.94);
}

.group:hover .group-hover-scale {
    transform: scale(1.05);
}

.scrollbar-hide::-webkit-scrollbar {
    display: none;
}

.scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
}

@keyframes fade-in-up {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fade-in-up 0.8s ease-out;
}
</style>
