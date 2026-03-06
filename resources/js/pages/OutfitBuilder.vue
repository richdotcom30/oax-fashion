<template>
    <div class="min-h-screen bg-oax-dark text-white">
        <section class="py-20 px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <span class="material-symbols-outlined text-6xl text-oax-gold mb-4">checkroom</span>
                <h1 class="font-serif text-4xl md:text-5xl mb-4">Outfit Builder</h1>
                <p class="text-gray-400 text-lg">Mix and match pieces to create your perfect look.</p>
            </div>
        </section>

        <section class="py-12 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    <!-- Categories -->
                    <div class="space-y-2">
                        <h3 class="font-medium mb-4 text-oax-gold">Categories</h3>
                        <button v-for="cat in categories" :key="cat" @click="selectedCategory = cat"
                            class="w-full text-left px-4 py-3 rounded-lg transition-colors"
                            :class="selectedCategory === cat ? 'bg-primary text-white' : 'bg-oax-panel hover:bg-oax-border'">
                            {{ cat }}
                        </button>
                    </div>
                    
                    <!-- Products Grid -->
                    <div class="lg:col-span-2">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <div v-for="product in filteredProducts" :key="product.id" @click="toggleProduct(product)"
                                class="bg-oax-panel rounded-lg overflow-hidden cursor-pointer transition-all hover:ring-2 hover:ring-oax-gold"
                                :class="{ 'ring-2 ring-oax-gold': isInOutfit(product.id) }">
                                <div class="aspect-square bg-cover bg-center" :style="`background-image: url('${product.image}')`"></div>
                                <div class="p-3">
                                    <p class="text-sm font-medium">{{ product.name }}</p>
                                    <p class="text-oax-gold text-sm">${{ product.price }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Outfit Summary -->
                    <div class="bg-oax-panel rounded-xl p-6 h-fit sticky top-24">
                        <h3 class="font-serif text-xl mb-4">Your Outfit</h3>
                        <div v-if="outfit.length > 0" class="space-y-4 mb-6">
                            <div v-for="item in outfit" :key="item.id" class="flex gap-3">
                                <div class="w-16 h-16 bg-cover bg-center rounded" :style="`background-image: url('${item.image}')`"></div>
                                <div class="flex-1">
                                    <p class="text-sm font-medium">{{ item.name }}</p>
                                    <p class="text-oax-gold text-sm">${{ item.price }}</p>
                                    <button @click="removeFromOutfit(item.id)" class="text-xs text-red-400 mt-1">Remove</button>
                                </div>
                            </div>
                        </div>
                        <div v-else class="text-gray-400 text-sm mb-6">
                            Select items to build your outfit
                        </div>
                        <div class="border-t border-oax-border pt-4">
                            <div class="flex justify-between mb-4">
                                <span>Total</span>
                                <span class="text-oax-gold font-bold">${{ outfitTotal }}</span>
                            </div>
                            <button @click="addAllToCart" :disabled="outfit.length === 0"
                                class="w-full bg-primary hover:bg-oax-blood disabled:opacity-50 disabled:cursor-not-allowed text-white font-bold py-3 rounded-lg uppercase tracking-wider transition-colors">
                                Add All to Bag
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';
import { useCartStore } from '../stores/cart';

const cartStore = useCartStore();
const selectedCategory = ref('All');

const categories = ['All', 'Tops', 'Bottoms', 'Dresses', 'Outerwear', 'Accessories'];

const products = [
    { id: 1, name: 'Velvet Blazer', price: 450, category: 'Outerwear', image: 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=400&q=80' },
    { id: 2, name: 'Silk Blouse', price: 280, category: 'Tops', image: 'https://images.unsplash.com/photo-1564257631407-4deb1f99d992?w=400&q=80' },
    { id: 3, name: 'Tailored Trousers', price: 320, category: 'Bottoms', image: 'https://images.unsplash.com/photo-1594938298603-c8148c4dae35?w=400&q=80' },
    { id: 4, name: 'Leather Jacket', price: 890, category: 'Outerwear', image: 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w=400&q=80' },
    { id: 5, name: 'Silk Dress', price: 620, category: 'Dresses', image: 'https://images.unsplash.com/photo-1566174053879-31528523f8ae?w=400&q=80' },
    { id: 6, name: 'Cashmere Sweater', price: 380, category: 'Tops', image: 'https://images.unsplash.com/photo-1434389677669-e08b4cac3105?w=400&q=80' }
];

const outfit = ref([]);

const filteredProducts = computed(() => {
    if (selectedCategory.value === 'All') return products;
    return products.filter(p => p.category === selectedCategory.value);
});

const outfitTotal = computed(() => outfit.value.reduce((sum, item) => sum + item.price, 0));

const isInOutfit = (id) => outfit.value.some(item => item.id === id);

const toggleProduct = (product) => {
    if (isInOutfit(product.id)) {
        removeFromOutfit(product.id);
    } else {
        outfit.value.push(product);
    }
};

const removeFromOutfit = (id) => {
    outfit.value = outfit.value.filter(item => item.id !== id);
};

const addAllToCart = () => {
    outfit.value.forEach(item => {
        cartStore.addItem({ id: item.id, name: item.name, price: item.price, image: item.image, quantity: 1 });
    });
    outfit.value = [];
    alert('All items added to bag!');
};
</script>
