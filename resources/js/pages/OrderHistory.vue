<template>
    <div class="flex flex-col min-h-screen">
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
