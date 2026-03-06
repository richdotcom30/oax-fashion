<template>
    <div class="flex flex-col min-h-screen">
        <!-- Top Navigation Bar -->
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

        <!-- Breadcrumb -->
        <div class="px-6 py-4 lg:px-10 border-b border-oax-border">
            <div class="flex items-center gap-2 text-sm">
                <router-link to="/" class="text-text-muted hover:text-white transition-colors">Home</router-link>
                <span class="text-text-muted">/</span>
                <router-link to="/shop" class="text-text-muted hover:text-white transition-colors">Shop</router-link>
                <span class="text-text-muted">/</span>
                <span class="text-white">Velvet Midnight Blazer</span>
            </div>
        </div>

        <!-- Main Product Section -->
        <div class="flex-1 w-full max-w-[1600px] mx-auto px-4 md:px-8 py-8 lg:py-12">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16">
                <!-- Image Gallery -->
                <div class="flex flex-col gap-4">
                    <!-- Main Image -->
                    <div class="relative aspect-[3/4] w-full overflow-hidden rounded-lg bg-oax-panel group">
                        <img 
                            :src="activeImage" 
                            alt="Velvet Midnight Blazer" 
                            class="w-full h-full object-cover cursor-zoom-in"
                            @mouseenter="zoomEnabled = true"
                            @mouseleave="zoomEnabled = false"
                            @mousemove="handleZoom"
                        />
                        <div class="absolute top-4 left-4 bg-white text-black text-xs font-bold px-3 py-1 uppercase tracking-wide">
                            New Arrival
                        </div>
                    </div>
                    <!-- Thumbnails -->
                    <div class="flex gap-3 overflow-x-auto pb-2">
                        <button 
                            v-for="(img, idx) in images" 
                            :key="idx"
                            @click="activeImage = img"
                            class="relative w-20 h-24 rounded overflow-hidden border-2 transition-all"
                            :class="activeImage === img ? 'border-primary' : 'border-transparent opacity-60 hover:opacity-100'"
                        >
                            <img :src="img" class="w-full h-full object-cover" />
                        </button>
                    </div>
                </div>

                <!-- Product Info -->
                <div class="flex flex-col gap-6">
                    <div>
                        <h1 class="text-3xl md:text-4xl lg:text-5xl font-black tracking-tighter mb-2">Velvet Midnight Blazer</h1>
                        <p class="text-text-muted">OAX Gold Collection</p>
                    </div>

                    <!-- Price -->
                    <div class="flex items-baseline gap-3">
                        <span class="text-2xl font-bold text-white">$1,250</span>
                        <span class="text-sm text-text-muted line-through opacity-50">$1,450</span>
                        <span class="bg-primary text-white text-xs font-bold px-2 py-0.5 rounded">-14%</span>
                    </div>

                    <!-- Rating -->
                    <div class="flex items-center gap-2">
                        <div class="flex gap-0.5">
                            <span v-for="i in 5" :key="i" class="material-symbols-outlined text-gold text-lg">star</span>
                        </div>
                        <span class="text-sm text-text-muted">4.8 (24 reviews)</span>
                    </div>

                    <p class="text-gray-300 leading-relaxed max-w-md">
                        Impeccably tailored from the finest Italian velvet, this midnight blazer embodies understated luxury. Features a structured silhouette with peak lapels and a single-button closure.
                    </p>

                    <!-- Color Selection -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-bold text-white">Color: {{ selectedColor }}</span>
                            <button class="text-xs text-primary hover:underline flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">visibility</span>
                                View in Room
                            </button>
                        </div>
                        <div class="flex gap-3">
                            <button 
                                class="size-10 rounded-full bg-black border-2 border-white ring-2 ring-offset-2 ring-offset-oax-dark ring-white cursor-pointer"
                                :class="selectedColor === 'Midnight Black' ? 'ring-white' : 'ring-transparent'"
                                @click="selectedColor = 'Midnight Black'"
                                title="Midnight Black"
                            ></button>
                            <button 
                                class="size-10 rounded-full bg-[#1a1a2e] border border-oax-border hover:border-white transition-colors cursor-pointer"
                                :class="selectedColor === 'Royal Navy' ? 'ring-2 ring-offset-2 ring-offset-oax-dark ring-white border-white' : ''"
                                @click="selectedColor = 'Royal Navy'"
                                title="Royal Navy"
                            ></button>
                            <button 
                                class="size-10 rounded-full bg-[#8B0000] border border-oax-border hover:border-white transition-colors cursor-pointer"
                                :class="selectedColor === 'Oaxacan Red' ? 'ring-2 ring-offset-2 ring-offset-oax-dark ring-white border-white' : ''"
                                @click="selectedColor = 'Oaxacan Red'"
                                title="Oaxacan Red"
                            ></button>
                        </div>
                    </div>

                    <!-- Size Selection -->
                    <div>
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-sm font-bold text-white">Size</span>
                            <button @click="showSizeGuide = true" class="text-xs text-primary hover:underline flex items-center gap-1">
                                <span class="material-symbols-outlined text-[14px]">straighten</span>
                                AI Size Guide
                            </button>
                        </div>
                        <div class="grid grid-cols-5 gap-2">
                            <button 
                                v-for="size in ['XS', 'S', 'M', 'L', 'XL']" 
                                :key="size"
                                class="h-12 border border-oax-border rounded text-sm font-medium transition-all hover:border-white"
                                :class="selectedSize === size ? 'bg-white text-black border-white' : 'text-white'"
                                @click="selectedSize = size"
                            >
                                {{ size }}
                            </button>
                        </div>
                    </div>

                    <!-- Quantity & Add to Cart -->
                    <div class="flex gap-4 pt-4">
                        <div class="flex items-center border border-oax-border rounded-lg overflow-hidden">
                            <button @click="quantity > 1 && quantity--" class="px-4 py-3 text-white hover:bg-oax-panel transition-colors">
                                <span class="material-symbols-outlined">remove</span>
                            </button>
                            <span class="px-4 py-3 text-white font-medium min-w-[50px] text-center">{{ quantity }}</span>
                            <button @click="quantity++" class="px-4 py-3 text-white hover:bg-oax-panel transition-colors">
                                <span class="material-symbols-outlined">add</span>
                            </button>
                        </div>
                        <button 
                            @click="addToCart" 
                            class="flex-1 bg-primary text-white font-bold uppercase tracking-wider rounded-lg hover:bg-primary-light transition-colors flex items-center justify-center gap-2"
                        >
                            <span class="material-symbols-outlined">shopping_bag</span>
                            Add to Bag
                        </button>
                        <button class="p-4 border border-oax-border rounded-lg text-white hover:border-primary hover:text-primary transition-colors">
                            <span class="material-symbols-outlined">favorite_border</span>
                        </button>
                    </div>

                    <!-- Stock Status -->
                    <div class="flex items-center gap-2 text-sm">
                        <span class="w-2 h-2 bg-green-500 rounded-full"></span>
                        <span class="text-green-500 font-medium">In Stock</span>
                        <span class="text-text-muted">- Ready to ship within 24 hours</span>
                    </div>

                    <!-- Features -->
                    <div class="grid grid-cols-2 gap-4 pt-4 border-t border-oax-border">
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">local_shipping</span>
                            <span class="text-sm text-gray-300">Complimentary Shipping</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">autorenew</span>
                            <span class="text-sm text-gray-300">30-Day Returns</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">verified</span>
                            <span class="text-sm text-gray-300">Authenticity Guaranteed</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="material-symbols-outlined text-primary">diamond</span>
                            <span class="text-sm text-gray-300">Luxury Gift Wrapping</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Complete The Look -->
        <section class="py-16 px-4 md:px-8 bg-[#0f0f0f]">
            <div class="max-w-[1600px] mx-auto">
                <div class="flex items-center justify-between mb-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-white">Complete The Look</h2>
                    <router-link to="/shop" class="text-sm text-primary hover:underline flex items-center gap-1">
                        View All <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
                    </router-link>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Look Product 1 -->
                    <router-link to="/product/silk-trousers" class="group">
                        <div class="relative aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ" class="w-full h-full object-cover" alt="Silk Trousers" />
                        </div>
                        <h3 class="text-white font-medium group-hover:text-primary transition-colors">Silk Trousers</h3>
                        <span class="text-primary font-bold">$650</span>
                    </router-link>
                    <!-- Look Product 2 -->
                    <router-link to="/product/crystal-clutch" class="group">
                        <div class="relative aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBfyda4WlPoeRbWjOFS6fly-bc1ZY094TPHgGJCN2ZTjQT5AqV-1bfO0g6mL3dw1sMCueWq4ChvpOY6tdRi0Sl4bsvr9axdpnIHnGfGJkuKmcnqDhbz9jxZaJGmNLAKblf3lPtnuDd6zyeNZWPpMKmawKFnhKM8Md11eIbGJXg1_e4eGvF-DYbyStSI_ZiXbORfDkmcjOFUzjDxGah6otNqmAi06roD-SmeDHQcSzUAeJ0LQbovhoVyEDu7Gtv9OaReDcY111fB-vXn" class="w-full h-full object-cover" alt="Crystal Clutch" />
                        </div>
                        <h3 class="text-white font-medium group-hover:text-primary transition-colors">Crystal Clutch</h3>
                        <span class="text-primary font-bold">$890</span>
                    </router-link>
                    <!-- Look Product 3 -->
                    <router-link to="/product/silk-scarf" class="group">
                        <div class="relative aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAn_esisoRjpWyqh7HEBgAKV9q9TqBRyVkM4gVINIHK3SmV7ueRBER0ORQJwRoztudkn9nSV4Yuo9WAg2YTieS33m2ygynQvgwVUtgPd5EyRHbCgG-OdNMbppYrN85gYUROJq5YhvYhmQzN5GwqYo3mrEjulJb2k1dq4TtdsgciI15ZbhnxWRfXICmkyMGLD_IO6fz_4oCtj1qwMFIuXFBVqYwvdGyuIYSGPKTxdkZwFu40dVIvTB96ndaQe8R5WSn1xLn2qkfwUfkA" class="w-full h-full object-cover" alt="Silk Scarf" />
                        </div>
                        <h3 class="text-white font-medium group-hover:text-primary transition-colors">Silk Scarf</h3>
                        <span class="text-primary font-bold">$320</span>
                    </router-link>
                    <!-- Look Product 4 -->
                    <router-link to="/product/stiletto-heels" class="group">
                        <div class="relative aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                            <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7loRCQyyqLq1jfOthOrKdnKVli9XaRV7_q_EhldyVjXmr2k5kASyzkDzm0ZCQyYJ-Upk74iakAjr1BdDa9Lm5X3J_v_lZRGyi0KXk3S4bMaGsOUvFRjh5ErSeg7595iUktDGxS8lzyhvFrP2c1nHCd-hk4MejE6dfp58vkw4SXlIz4DJoJgmn5qfe2wc1VryBWh3Ybf-eJz5w68qgoJNqZlDfJd1SWPjfZ5HsHVC3ggbqF6KeC4ox8KeTxtHpxwBdhSzWpXTxDr5c" class="w-full h-full object-cover" alt="Stiletto Heels" />
                        </div>
                        <h3 class="text-white font-medium group-hover:text-primary transition-colors">Stiletto Heels</h3>
                        <span class="text-primary font-bold">$780</span>
                    </router-link>
                </div>
            </div>
        </section>

        <!-- Size Guide Modal -->
        <div v-if="showSizeGuide" class="fixed inset-0 z-50 flex items-center justify-center p-4">
            <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" @click="showSizeGuide = false"></div>
            <div class="relative bg-oax-dark border border-oax-border rounded-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto">
                <div class="sticky top-0 bg-oax-dark p-6 border-b border-oax-border flex items-center justify-between">
                    <h3 class="text-xl font-bold text-white">AI Size Guide</h3>
                    <button @click="showSizeGuide = false" class="text-text-muted hover:text-white">
                        <span class="material-symbols-outlined">close</span>
                    </button>
                </div>
                <div class="p-6 space-y-6">
                    <p class="text-gray-300">Enter your measurements for a personalized size recommendation based on your body type and the garment's fit preference.</p>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm text-text-muted mb-2">Height (cm)</label>
                            <input type="number" placeholder="170" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white" />
                        </div>
                        <div>
                            <label class="block text-sm text-text-muted mb-2">Chest (cm)</label>
                            <input type="number" placeholder="90" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white" />
                        </div>
                        <div>
                            <label class="block text-sm text-text-muted mb-2">Waist (cm)</label>
                            <input type="number" placeholder="70" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white" />
                        </div>
                        <div>
                            <label class="block text-sm text-text-muted mb-2">Hips (cm)</label>
                            <input type="number" placeholder="95" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white" />
                        </div>
                    </div>
                    <button class="w-full bg-primary text-white font-bold py-3 rounded-lg hover:bg-primary-light transition-colors">
                        Get AI Recommendation
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue'
import { useCartStore } from '../stores/cart'

const cartStore = useCartStore()

const images = [
    'https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c',
    'https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy',
    'https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ'
]

const activeImage = ref(images[0])
const selectedColor = ref('Midnight Black')
const selectedSize = ref('M')
const quantity = ref(1)
const showSizeGuide = ref(false)
const zoomEnabled = ref(false)

const handleZoom = (e) => {
    if (!zoomEnabled.value) return
    const rect = e.target.getBoundingClientRect()
    const x = ((e.clientX - rect.left) / rect.width) * 100
    const y = ((e.clientY - rect.top) / rect.height) * 100
    e.target.style.transformOrigin = `${x}% ${y}%`
    e.target.style.transform = 'scale(1.5)'
}

const addToCart = () => {
    cartStore.addItem(
        {
            id: 1,
            name: 'Velvet Midnight Blazer',
            price: 1250,
            sku: 'OAX-VMB-001',
            image: activeImage.value
        },
        quantity.value,
        selectedSize.value,
        selectedColor.value
    )
}
</script>
