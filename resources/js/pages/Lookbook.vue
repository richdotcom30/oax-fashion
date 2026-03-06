<template>
    <div class="min-h-screen bg-oax-dark text-white">
        <!-- Hero Section -->
        <section class="relative h-[85vh] w-full overflow-hidden">
            <div class="absolute inset-0 bg-black/30 z-10"></div>
            <div class="absolute inset-0 bg-cover bg-center" 
                style="background-image: linear-gradient(to bottom, rgba(0,0,0,0.2), rgba(26,26,26,1)), url('https://images.unsplash.com/photo-1539109136881-3be0616acf4b?w=1920&q=80');">
            </div>
            <div class="relative z-20 flex h-full flex-col items-center justify-center px-6 text-center">
                <span class="mb-4 text-oax-gold text-sm font-medium tracking-[0.2em] uppercase">The Fall Collection 2024</span>
                <h1 class="font-serif text-5xl md:text-7xl lg:text-8xl font-medium text-white leading-tight tracking-tight mb-6">
                    NOCTURNAL<br/><span class="italic font-light">BLOOM</span>
                </h1>
                <p class="max-w-xl text-lg text-gray-300 font-light leading-relaxed mb-10">
                    An exploration of shadow and light. Where sharp silhouettes meet fluid drapes in a dance of midnight contrasts.
                </p>
                <div class="flex gap-4">
                    <button class="bg-primary hover:bg-oax-blood text-white px-8 py-3 rounded text-sm font-bold tracking-wide transition-all uppercase">
                        Explore Campaign
                    </button>
                    <button class="border border-white/30 hover:border-white hover:bg-white/5 text-white px-8 py-3 rounded text-sm font-bold tracking-wide transition-all uppercase flex items-center gap-2">
                        <span class="material-symbols-outlined text-[20px]">play_circle</span> Watch Film
                    </button>
                </div>
            </div>
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20 animate-bounce">
                <span class="material-symbols-outlined text-white/50 text-3xl">keyboard_arrow_down</span>
            </div>
        </section>

        <!-- Narrative Section -->
        <section class="bg-oax-dark py-20 px-6 md:px-20 lg:px-40 border-t border-oax-border">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="font-serif text-3xl md:text-4xl text-white mb-8">THE NARRATIVE</h2>
                <div class="flex flex-col md:flex-row gap-8 items-center md:items-start text-left">
                    <p class="flex-1 text-gray-400 leading-relaxed text-lg">
                        In the heart of the city, when the sun sets, a new elegance emerges. We strip away the unnecessary, focusing on the raw beauty of form and texture. This collection is a tribute to the modern muse who thrives in the after-hours.
                    </p>
                    <p class="flex-1 text-gray-400 leading-relaxed text-lg">
                        Rich textures of velvet and silk collide with the rigid structure of leather. The color palette draws from the deepening gradient of the twilight sky—midnight blues, pitch blacks, and the striking punctuation of blood red.
                    </p>
                </div>
            </div>
        </section>

        <!-- Look 1: The Midnight Trench -->
        <section class="relative w-full bg-oax-dark py-12">
            <div class="container mx-auto px-4 md:px-12">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                    <div class="lg:col-span-4 order-2 lg:order-1 flex flex-col justify-center space-y-6">
                        <span class="text-oax-gold text-xs tracking-widest uppercase">Look 01</span>
                        <h3 class="font-serif text-3xl text-white">The Midnight Trench</h3>
                        <p class="text-gray-400">Structured shoulders meet flowing fabrics. Designed for the transitional moments between day and night.</p>
                        <div class="mt-6 p-4 bg-oax-panel rounded-lg border border-oax-border flex gap-4 items-center group cursor-pointer hover:border-primary/50 transition-colors">
                            <div class="h-20 w-16 bg-cover bg-center rounded" 
                                style="background-image: url('https://images.unsplash.com/photo-1591047139829-d91aecb6caea?w=200&q=80');">
                            </div>
                            <div>
                                <h4 class="text-white text-sm font-medium">OAX Structured Coat</h4>
                                <p class="text-oax-gold text-sm mt-1">$1,250.00</p>
                                <button class="text-xs text-white/60 group-hover:text-primary mt-2 flex items-center gap-1">Shop Now <span class="material-symbols-outlined text-[14px]">arrow_forward</span></button>
                            </div>
                        </div>
                    </div>
                    <div class="lg:col-span-8 order-1 lg:order-2 relative group">
                        <div class="relative w-full aspect-[4/5] md:aspect-[16/9] lg:aspect-[4/3] bg-cover bg-center rounded-lg overflow-hidden shadow-2xl" 
                            style="background-image: url('https://images.unsplash.com/photo-1509631179647-0177331693ae?w=1200&q=80');">
                            <div class="absolute top-[40%] left-[55%] z-10 group/hotspot">
                                <button class="relative flex h-8 w-8 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm transition-transform hover:scale-110">
                                    <div class="h-3 w-3 rounded-full bg-primary shadow-lg"></div>
                                </button>
                                <div class="absolute left-10 top-0 w-64 opacity-0 scale-95 invisible group-hover/hotspot:visible group-hover/hotspot:opacity-100 group-hover/hotspot:scale-100 transition-all duration-300 z-20 origin-top-left">
                                    <div class="bg-oax-gray border border-oax-border p-3 rounded-lg shadow-2xl">
                                        <div class="flex justify-between items-start mb-2">
                                            <h4 class="text-white text-sm font-bold">Midnight Trench</h4>
                                            <span class="text-oax-gold text-xs font-medium">$890</span>
                                        </div>
                                        <p class="text-xs text-gray-400 mb-3">Italian wool blend with silk lining.</p>
                                        <button class="w-full bg-white text-black hover:bg-gray-200 text-xs font-bold py-2 rounded transition-colors">Quick Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Look 2 & 3 Grid -->
        <section class="bg-[#141414] py-20">
            <div class="container mx-auto px-4 md:px-12">
                <div class="flex flex-col md:flex-row gap-8 lg:gap-16">
                    <div class="md:w-5/12 pt-0 md:pt-20">
                        <div class="relative aspect-[3/4] w-full overflow-hidden rounded-lg mb-6 group">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                                style="background-image: url('https://images.unsplash.com/photo-1548036328-c9fa89d128fa?w=800&q=80');">
                            </div>
                            <div class="absolute bottom-[30%] left-[40%] group/hotspot">
                                <button class="relative flex h-6 w-6 items-center justify-center rounded-full bg-white/20 backdrop-blur-sm">
                                    <div class="h-2 w-2 rounded-full bg-primary shadow-lg"></div>
                                </button>
                            </div>
                        </div>
                        <div class="px-2">
                            <h3 class="font-serif text-2xl text-white mb-2">Details Defined</h3>
                            <p class="text-gray-400 text-sm leading-relaxed">Hardware inspired by brutalist architecture. Gold accents that catch the city lights.</p>
                        </div>
                    </div>
                    <div class="md:w-7/12">
                        <div class="mb-12 max-w-sm">
                            <span class="text-primary text-xs font-bold uppercase tracking-widest mb-2 block">The Collection</span>
                            <h3 class="font-serif text-3xl md:text-4xl text-white leading-tight">Motion in<br/>Stillness</h3>
                        </div>
                        <div class="relative aspect-[4/3] w-full overflow-hidden rounded-lg mb-6 group">
                            <div class="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-105" 
                                style="background-image: url('https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=800&q=80');">
                            </div>
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20 group-hover:bg-transparent transition-colors">
                                <span class="material-symbols-outlined text-white text-5xl opacity-80 drop-shadow-lg">play_circle</span>
                            </div>
                        </div>
                        <div class="flex items-center justify-between border-t border-oax-border pt-4 mt-4">
                            <div>
                                <h4 class="text-white font-medium">Silk Evening Gown</h4>
                                <span class="text-oax-gold text-sm">Crimson Red</span>
                            </div>
                            <button class="text-white hover:text-primary text-sm font-bold uppercase tracking-wider flex items-center gap-2">
                                Shop Look <span class="material-symbols-outlined text-[16px]">arrow_forward</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Shop the Editorial Carousel -->
        <section class="py-20 bg-oax-dark border-t border-oax-border">
            <div class="container mx-auto px-6 mb-8 flex justify-between items-end">
                <div>
                    <h2 class="font-serif text-3xl text-white mb-2">Shop The Editorial</h2>
                    <p class="text-gray-500 text-sm">Curated pieces from the Nocturnal Bloom campaign.</p>
                </div>
                <router-link to="/shop" class="text-white text-sm border-b border-primary pb-1 hover:text-primary transition-colors">View All Products</router-link>
            </div>
            <div class="flex overflow-x-auto gap-6 px-6 pb-8 scrollbar-hide snap-x snap-mandatory">
                <div v-for="product in shopProducts" :key="product.id" class="min-w-[280px] md:min-w-[320px] snap-center">
                    <div class="group relative bg-[#141414] rounded-lg overflow-hidden mb-4">
                        <div class="aspect-[3/4] bg-cover bg-center transition-transform duration-500 group-hover:scale-105" 
                            :style="`background-image: url('${product.image}')`">
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 bg-gradient-to-t from-black/90 to-transparent">
                            <button @click="addToCart(product)" class="w-full bg-primary hover:bg-oax-blood text-white font-bold py-3 rounded text-sm uppercase tracking-wide">Add to Bag</button>
                        </div>
                        <div v-if="product.badge" class="absolute top-3 left-3 bg-oax-gold text-black text-[10px] font-bold px-2 py-1 uppercase tracking-wider">{{ product.badge }}</div>
                    </div>
                    <h3 class="text-white text-lg font-medium">{{ product.name }}</h3>
                    <p class="text-gray-500 text-sm mb-2">{{ product.material }}</p>
                    <p class="text-oax-gold font-medium">${{ product.price.toFixed(2) }}</p>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="relative py-24 px-6 text-center overflow-hidden bg-[#211111]">
            <div class="absolute top-0 left-0 w-full h-full opacity-10" style="background-image: radial-gradient(#8B0000 1px, transparent 1px); background-size: 30px 30px;"></div>
            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="font-serif text-3xl md:text-5xl text-white mb-6">Join the Inner Circle</h2>
                <p class="text-gray-400 mb-10">Be the first to access new editorials, exclusive drops, and private sales.</p>
                <form @submit.prevent="subscribeNewsletter" class="flex flex-col sm:flex-row gap-4 max-w-md mx-auto">
                    <input v-model="email" class="flex-1 bg-transparent border-b border-gray-600 text-white placeholder-gray-500 py-3 focus:outline-none focus:border-primary transition-colors" placeholder="Your email address" type="email" required/>
                    <button class="mt-4 sm:mt-0 text-white font-bold uppercase tracking-widest text-sm hover:text-primary transition-colors" type="submit">Subscribe</button>
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

const shopProducts = ref([
    { id: 1, name: 'Noir Ankle Boots', material: 'Calfskin Leather', price: 850, image: 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?w=600&q=80', badge: 'New In' },
    { id: 2, name: 'Crimson Silk Scarf', material: '100% Mulberry Silk', price: 220, image: 'https://images.unsplash.com/photo-1601924994987-69e26d50dc26?w=600&q=80' },
    { id: 3, name: 'Eclipse Earrings', material: '18k Gold Plated', price: 450, image: 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=600&q=80' },
    { id: 4, name: 'The OAX Tote', material: 'Saffiano Leather', price: 1890, image: 'https://images.unsplash.com/photo-1584917865442-de89df76afd3?w=600&q=80' },
]);

const addToCart = (product) => {
    cartStore.addItem({ id: product.id, name: product.name, price: product.price, image: product.image, quantity: 1 });
};

const subscribeNewsletter = () => {
    alert(`Thank you for subscribing with: ${email.value}`);
    email.value = '';
};
</script>

<style scoped>
.scrollbar-hide::-webkit-scrollbar { display: none; }
.scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
</style>
