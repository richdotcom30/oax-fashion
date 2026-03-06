<template>
    <div class="flex min-h-screen bg-oax-dark">
        <!-- Sidebar -->
        <aside class="w-64 bg-[#0a0808] border-r border-oax-border shrink-0 flex flex-col">
            <div class="p-6 border-b border-oax-border">
                <div class="flex items-center gap-3">
                    <div class="size-10 text-primary">
                        <svg fill="currentColor" viewBox="0 0 48 48"><path d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor"></path></svg>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-lg">OAX</h1>
                        <p class="text-[10px] text-text-muted uppercase tracking-wider">Admin Panel</p>
                    </div>
                </div>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <router-link to="/admin" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">dashboard</span>
                    Dashboard
                </router-link>
                <router-link to="/admin/products" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">inventory_2</span>
                    Products
                </router-link>
                <router-link to="/admin/orders" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">receipt_long</span>
                    Orders
                </router-link>
                <router-link to="/admin/customers" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">people</span>
                    Customers
                </router-link>
                <router-link to="/admin/inventory" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">warehouse</span>
                    Inventory
                </router-link>
                <router-link to="/admin/collections" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary/10 text-primary font-medium">
                    <span class="material-symbols-outlined">collections</span>
                    Collections
                </router-link>
                <router-link to="/admin/marketing" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">campaign</span>
                    Marketing
                </router-link>
                <router-link to="/admin/analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">analytics</span>
                    Analytics
                </router-link>
                <router-link to="/admin/reports" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">assessment</span>
                    Reports
                </router-link>
                <router-link to="/admin/settings" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">settings</span>
                    Settings
                </router-link>
            </nav>
            <div class="p-4 border-t border-oax-border">
                <router-link to="/" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">open_in_new</span>
                    View Store
                </router-link>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col">
            <header class="h-16 border-b border-oax-border bg-[#0a0808] flex items-center justify-between px-6">
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-text-muted">search</span>
                    <input type="text" placeholder="Search collections..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" />
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button>
                    <div class="flex items-center gap-3 pl-4 border-l border-oax-border">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div>
                        <span class="text-white text-sm">Admin</span>
                    </div>
                </div>
            </header>

            <div class="flex-1 p-6 overflow-y-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Collections</h1>
                        <p class="text-text-muted mt-1">Manage your product collections and lookbooks.</p>
                    </div>
                    <button class="flex items-center gap-2 h-10 px-4 bg-primary hover:bg-primary-light text-white text-sm font-bold rounded-lg">
                        <span class="material-symbols-outlined text-[18px]">add</span>
                        New Collection
                    </button>
                </div>

                <!-- Collections Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div v-for="collection in collections" :key="collection.name" class="bg-[#0a0808] border border-oax-border rounded-xl overflow-hidden hover:border-primary/50 transition-colors cursor-pointer group">
                        <div class="relative aspect-[4/3]">
                            <img :src="collection.image" class="w-full h-full object-cover" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <h3 class="text-white font-bold text-lg">{{ collection.name }}</h3>
                                <p class="text-white/80 text-sm">{{ collection.products }} products</p>
                            </div>
                            <span v-if="collection.featured" class="absolute top-4 right-4 bg-gold text-black text-xs font-bold px-2 py-1 rounded">Featured</span>
                        </div>
                        <div class="p-4 flex items-center justify-between">
                            <div class="flex items-center gap-2">
                                <span :class="collection.visible ? 'bg-green-500/20 text-green-500' : 'bg-gray-500/20 text-gray-400'" class="px-2 py-1 rounded-full text-xs font-medium">
                                    {{ collection.visible ? 'Visible' : 'Hidden' }}
                                </span>
                            </div>
                            <div class="flex items-center gap-2">
                                <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined text-[20px]">edit</span></button>
                                <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined text-[20px]">visibility</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
const collections = [
    { name: 'Fall/Winter 2024', products: 45, visible: true, featured: true, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c' },
    { name: 'OAX Gold Collection', products: 28, visible: true, featured: true, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ' },
    { name: 'New Arrivals', products: 62, visible: true, featured: false, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy' },
    { name: 'Essentials', products: 35, visible: true, featured: false, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA5sEmLEXjbmCnM6hq_C7mDaB0esOlpVbwnjc1Sip98w_aSRyTXXV62xyh0Bz23FpA7AO3_E_-E2GkXIyYmC4ueE3t24gEO7DBFsbmsgzIIh8U9R6-QzLufnF65tlJs70bnsDxEVXEUTgaIzoOrEGzr0S4MB4erdmxvWRVh5r9x_seLxRCcOtJ0UZHLJyucRpfEMxDnr-9ZsQ-uLwSTvix6CQ50XX_q6MmXb9fNxyfwse9NHnNOaT8UEiIMeyPvVoDIzClDR__Ywwir' },
    { name: 'Summer Sale', products: 80, visible: false, featured: false, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBfyda4WlPoeRbWjOFS6fly-bc1ZY094TPHgGJCN2ZTjQT5AqV-1bfO0g6mL3dw1sMCueWq4ChvpOY6tdRi0Sl4bsvr9axdpnIHnGfGJkuKmcnqDhbz9jxZaJGmNLAKblf3lPtnuDd6zyeNZWPpMKmawKFnhKM8Md11eIbGJXg1_e4eGvF-DYbyStSI_ZiXbORfDkmcjOFUzjDxGah6otNqmAi06roD-SmeDHQcSzUAeJ0LQbovhoVyEDu7Gtv9OaReDcY111fB-vXn' },
    { name: 'Accessories', products: 52, visible: true, featured: false, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHRdCzXVxRNQzcHZlWvU2cFs1SDFDFNDmQUjTFS6CjLHVMqdFJneWt4HF1OO_JF7dm-ao3gG2C9o1Jh4fsCvgT6FtrBKwAaTwWX98CCbIrlcGbfbaDUv_BO71WUucdDKwHbSRzCQGF6tu79vkFdXfc8E4cfOBu6gsSzZ4ckQkhH7HuFK4ts0c8a705I5Syh8sArS7LiLYv3kPzTIIBnsbOmKITzr4NUSVQJs9SqjFcIJKJtyCDOyNDVzv-0O2mPEn0pr1sPTNmJ2Ee' }
]
</script>
