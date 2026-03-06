<template>
    <div class="min-h-screen bg-oax-dark text-white">
        <!-- Hero -->
        <section class="relative py-20 px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <span class="material-symbols-outlined text-6xl text-oax-gold mb-4">view_in_ar</span>
                <h1 class="font-serif text-4xl md:text-5xl mb-4">Virtual Try-On</h1>
                <p class="text-gray-400 text-lg">Experience our accessories in augmented reality. See how they look on you before purchasing.</p>
            </div>
        </section>

        <!-- Product Selection -->
        <section class="py-12 px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="font-serif text-2xl mb-8 text-center">Select an Accessory</h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    <div v-for="item in accessories" :key="item.id" @click="selectItem(item)"
                        class="bg-oax-panel rounded-xl p-4 cursor-pointer transition-all hover:border-primary border-2 border-transparent"
                        :class="{ 'border-primary': selectedItem?.id === item.id }">
                        <div class="aspect-square bg-cover bg-center rounded-lg mb-3" :style="`background-image: url('${item.image}')`"></div>
                        <h3 class="font-medium text-sm">{{ item.name }}</h3>
                        <p class="text-oax-gold text-sm">${{ item.price }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- AR Viewer -->
        <section class="py-12 px-6">
            <div class="max-w-4xl mx-auto">
                <div class="bg-oax-panel rounded-2xl p-8 text-center">
                    <div v-if="selectedItem" class="space-y-6">
                        <div class="aspect-video bg-gray-900 rounded-xl flex items-center justify-center relative overflow-hidden">
                            <img :src="selectedItem.image" :alt="selectedItem.name" class="max-h-64 object-contain"/>
                            <div class="absolute bottom-4 left-4 bg-black/50 px-4 py-2 rounded-lg">
                                <p class="text-sm">AR Preview Mode</p>
                            </div>
                        </div>
                        <h3 class="text-2xl font-serif">{{ selectedItem.name }}</h3>
                        <p class="text-gray-400">{{ selectedItem.description }}</p>
                        <div class="flex justify-center gap-4">
                            <button @click="addToCart" class="bg-primary hover:bg-oax-blood px-8 py-3 rounded font-bold uppercase tracking-wider transition-colors">
                                Add to Bag
                            </button>
                            <button class="border border-oax-gold text-oax-gold px-8 py-3 rounded font-bold uppercase tracking-wider hover:bg-oax-gold hover:text-black transition-colors">
                                Share Look
                            </button>
                        </div>
                    </div>
                    <div v-else class="py-20">
                        <span class="material-symbols-outlined text-6xl text-gray-600 mb-4">view_in_ar</span>
                        <p class="text-gray-400">Select an accessory above to try it on</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="py-16 px-6 bg-oax-panel">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-serif text-2xl text-center mb-8">How Virtual Try-On Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-oax-dark rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-3xl text-oax-gold">1</span>
                        </div>
                        <h3 class="font-medium mb-2">Select</h3>
                        <p class="text-gray-400 text-sm">Choose an accessory from our collection</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-oax-dark rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-3xl text-oax-gold">2</span>
                        </div>
                        <h3 class="font-medium mb-2">Try On</h3>
                        <p class="text-gray-400 text-sm">Use your camera to see how it looks</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-oax-dark rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-3xl text-oax-gold">3</span>
                        </div>
                        <h3 class="font-medium mb-2">Purchase</h3>
                        <p class="text-gray-400 text-sm">Buy with confidence knowing it suits you</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useCartStore } from '../stores/cart';

const cartStore = useCartStore();
const selectedItem = ref(null);

const accessories = [
    { id: 1, name: 'Eclipse Earrings', price: 450, image: 'https://images.unsplash.com/photo-1535632066927-ab7c9ab60908?w=400&q=80', description: '18k gold plated geometric earrings' },
    { id: 2, name: 'Noir Sunglasses', price: 320, image: 'https://images.unsplash.com/photo-1572635196237-14b3f281503f?w=400&q=80', description: 'Classic black sunglasses with gold accents' },
    { id: 3, name: 'Signature Watch', price: 1250, image: 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?w=400&q=80', description: 'Swiss movement with leather strap' },
    { id: 4, name: 'Gold Cuff', price: 380, image: 'https://images.unsplash.com/photo-1611591437281-460bfbe1220a?w=400&q=80', description: 'Statement gold-plated cuff bracelet' }
];

const selectItem = (item) => {
    selectedItem.value = item;
};

const addToCart = () => {
    if (selectedItem.value) {
        cartStore.addItem({ id: selectedItem.value.id, name: selectedItem.value.name, price: selectedItem.value.price, image: selectedItem.value.image, quantity: 1 });
    }
};
</script>
