<template>
    <div class="flex flex-col min-h-screen">
        <div class="sticky top-0 z-50 flex items-center justify-between whitespace-nowrap border-b border-solid border-oax-border bg-oax-dark/95 backdrop-blur-md px-6 py-4 lg:px-10">
            <router-link to="/" class="flex items-center gap-4 text-white cursor-pointer">
                <div class="size-8 text-primary"><svg fill="currentColor" viewBox="0 0 48 48"><path d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor"></path></svg></div>
                <h2 class="text-white text-xl font-bold tracking-tight">OAX FASHION</h2>
            </router-link>
            <div class="flex gap-2">
                <router-link to="/cart" class="relative p-2 rounded-lg hover:bg-oax-panel text-white"><span class="material-symbols-outlined">shopping_bag</span></router-link>
                <router-link to="/account" class="p-2 rounded-lg bg-oax-panel text-white"><span class="material-symbols-outlined">person</span></router-link>
            </div>
        </div>
        <main class="flex-1 w-full max-w-[1440px] mx-auto px-4 md:px-8 py-12">
            <h1 class="text-4xl font-black tracking-tighter text-white mb-8">Order History</h1>
            <div class="space-y-4">
                <div v-for="order in orders" :key="order.id" class="bg-oax-panel/30 rounded-xl border border-oax-border/50 p-6">
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                        <div>
                            <p class="text-white font-bold text-lg">#{{ order.id }}</p>
                            <p class="text-text-muted text-sm">{{ order.date }}</p>
                        </div>
                        <span :class="order.statusClass" class="px-3 py-1 rounded-full text-xs font-bold">{{ order.status }}</span>
                    </div>
                    <div class="space-y-3 mb-4">
                        <div v-for="item in order.items" :key="item.name" class="flex items-center gap-4">
                            <img :src="item.image" class="w-16 h-20 object-cover rounded" />
                            <div class="flex-1">
                                <p class="text-white font-medium">{{ item.name }}</p>
                                <p class="text-text-muted text-sm">Size: {{ item.size }} | Qty: {{ item.qty }}</p>
                            </div>
                            <p class="text-primary font-bold">{{ item.price }}</p>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-4 border-t border-oax-border">
                        <p class="text-white font-bold">Total: {{ order.total }}</p>
                        <button class="text-primary text-sm hover:underline">View Details</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script setup>
const orders = [
    { id: 'OX-A8K2M9', date: 'December 15, 2024', status: 'Delivered', statusClass: 'bg-green-500/20 text-green-500', total: '$1,890', items: [{ name: 'Velvet Midnight Blazer', size: 'M', qty: 1, price: '$1,250', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c' }, { name: 'Silk Scarf', size: 'OS', qty: 1, price: '$320', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAn_esisoRjpWyqh7HEBgAKV9q9TqBRyVkM4gVINIHK3SmV7ueRBER0ORQJwRoztudkn9nSV4Yuo9WAg2YTieS33m2ygynQvgwVUtgPd5EyRHbCgG-OdNMbppYrN85gYUROJq5YhvYhmQzN5GwqYo3mrEjulJb2k1dq4TtdsgciI15ZbhnxWRfXICmkyMGLD_IO6fz_4oCtj1qwMFIuXFBVqYwvdGyuIYSGPKTxdkZwFu40dVIvTB96ndaQe8R5WSn1xLn2qkfwUfkA' }] },
    { id: 'OX-B7J4P2', date: 'November 28, 2024', status: 'Shipped', statusClass: 'bg-blue-500/20 text-blue-500', total: '$945', items: [{ name: 'Leather Trench', size: 'L', qty: 1, price: '$890', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy' }] }
]
</script>
