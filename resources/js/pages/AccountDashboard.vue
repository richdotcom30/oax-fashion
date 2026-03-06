<template>
    <div class="flex flex-col min-h-screen">
        <!-- Top Navigation -->
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
                    </router-link>
                    <router-link to="/account" class="p-2 rounded-lg bg-oax-panel text-white">
                        <span class="material-symbols-outlined">person</span>
                    </router-link>
                </div>
            </div>
        </div>

        <main class="flex-1 w-full max-w-[1440px] mx-auto px-4 md:px-8 py-8 lg:py-12">
            <div class="flex flex-col lg:flex-row gap-8">
                <!-- Sidebar -->
                <aside class="lg:w-64 shrink-0">
                    <div class="bg-oax-panel/50 rounded-xl border border-oax-border p-6">
                        <div class="flex items-center gap-4 mb-6">
                            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center text-white text-2xl font-bold">
                                JD
                            </div>
                            <div>
                                <p class="font-bold text-white">John Doe</p>
                                <p class="text-sm text-text-muted">john@example.com</p>
                            </div>
                        </div>
                        <nav class="space-y-1">
                            <router-link to="/account" class="flex items-center gap-3 px-3 py-2 rounded-lg bg-oax-dark text-white font-medium">
                                <span class="material-symbols-outlined">dashboard</span>
                                Dashboard
                            </router-link>
                            <router-link to="/account/orders" class="flex items-center gap-3 px-3 py-2 rounded-lg text-text-muted hover:bg-oax-dark hover:text-white transition-colors">
                                <span class="material-symbols-outlined">receipt_long</span>
                                Orders
                            </router-link>
                            <router-link to="/account/wishlist" class="flex items-center gap-3 px-3 py-2 rounded-lg text-text-muted hover:bg-oax-dark hover:text-white transition-colors">
                                <span class="material-symbols-outlined">favorite</span>
                                Wishlist
                            </router-link>
                            <router-link to="/account/loyalty" class="flex items-center gap-3 px-3 py-2 rounded-lg text-text-muted hover:bg-oax-dark hover:text-white transition-colors">
                                <span class="material-symbols-outlined">workspace_premium</span>
                                Loyalty
                            </router-link>
                            <router-link to="/account/settings" class="flex items-center gap-3 px-3 py-2 rounded-lg text-text-muted hover:bg-oax-dark hover:text-white transition-colors">
                                <span class="material-symbols-outlined">settings</span>
                                Settings
                            </router-link>
                        </nav>
                    </div>
                </aside>

                <!-- Main Content -->
                <div class="flex-1 space-y-8">
                    <!-- Welcome Banner -->
                    <div class="bg-gradient-to-r from-primary/20 to-transparent rounded-xl border border-primary/30 p-6">
                        <h1 class="text-2xl font-bold text-white mb-2">Welcome back, John</h1>
                        <p class="text-gray-300">Track orders, manage your wishlist, and discover new arrivals tailored to your style.</p>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-oax-panel/50 rounded-xl border border-oax-border p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="material-symbols-outlined text-primary">shopping_bag</span>
                                <span class="text-text-muted text-sm">Total Orders</span>
                            </div>
                            <p class="text-3xl font-bold text-white">12</p>
                        </div>
                        <div class="bg-oax-panel/50 rounded-xl border border-oax-border p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="material-symbols-outlined text-gold">workspace_premium</span>
                                <span class="text-text-muted text-sm">Loyalty Points</span>
                            </div>
                            <p class="text-3xl font-bold text-gold">2,450</p>
                        </div>
                        <div class="bg-oax-panel/50 rounded-xl border border-oax-border p-5">
                            <div class="flex items-center gap-3 mb-3">
                                <span class="material-symbols-outlined text-primary">favorite</span>
                                <span class="text-text-muted text-sm">Wishlist Items</span>
                            </div>
                            <p class="text-3xl font-bold text-white">8</p>
                        </div>
                    </div>

                    <!-- Loyalty Tier -->
                    <div class="bg-gradient-to-r from-[#C0C0C0]/10 to-[#C0C0C0]/5 rounded-xl border border-[#C0C0C0]/30 p-6">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-[#C0C0C0] to-[#808080] flex items-center justify-center">
                                    <span class="material-symbols-outlined text-black text-3xl">workspace_premium</span>
                                </div>
                                <div>
                                    <p class="text-sm text-gray-300">Current Tier</p>
                                    <p class="text-2xl font-bold text-white">Gold Member</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-sm text-gray-300">Points to Platinum</p>
                                <p class="text-xl font-bold text-gold">550 more points</p>
                            </div>
                        </div>
                        <div class="mt-4 h-2 bg-oax-panel rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-[#C0C0C0] to-gold w-3/4 rounded-full"></div>
                        </div>
                    </div>

                    <!-- Recent Orders -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-white">Recent Orders</h2>
                            <router-link to="/account/orders" class="text-sm text-primary hover:underline">View All</router-link>
                        </div>
                        <div class="bg-oax-panel/50 rounded-xl border border-oax-border overflow-hidden">
                            <table class="w-full">
                                <thead class="border-b border-oax-border">
                                    <tr>
                                        <th class="text-left text-xs font-bold text-text-muted uppercase tracking-wider px-6 py-4">Order</th>
                                        <th class="text-left text-xs font-bold text-text-muted uppercase tracking-wider px-6 py-4">Date</th>
                                        <th class="text-left text-xs font-bold text-text-muted uppercase tracking-wider px-6 py-4">Status</th>
                                        <th class="text-left text-xs font-bold text-text-muted uppercase tracking-wider px-6 py-4">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="border-b border-oax-border/50">
                                        <td class="px-6 py-4">
                                            <span class="font-medium text-white">#OX-A8K2M9</span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-300">Dec 15, 2024</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-green-500/20 text-green-500 text-xs rounded-full">Delivered</span>
                                        </td>
                                        <td class="px-6 py-4 text-primary font-bold">$1,890</td>
                                    </tr>
                                    <tr class="border-b border-oax-border/50">
                                        <td class="px-6 py-4">
                                            <span class="font-medium text-white">#OX-B7J4P2</span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-300">Nov 28, 2024</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-blue-500/20 text-blue-500 text-xs rounded-full">Shipped</span>
                                        </td>
                                        <td class="px-6 py-4 text-primary font-bold">$945</td>
                                    </tr>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <span class="font-medium text-white">#OX-C6H8Q1</span>
                                        </td>
                                        <td class="px-6 py-4 text-gray-300">Oct 12, 2024</td>
                                        <td class="px-6 py-4">
                                            <span class="px-2 py-1 bg-green-500/20 text-green-500 text-xs rounded-full">Delivered</span>
                                        </td>
                                        <td class="px-6 py-4 text-primary font-bold">$2,340</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Recommended For You -->
                    <div>
                        <div class="flex items-center justify-between mb-4">
                            <h2 class="text-xl font-bold text-white">Recommended For You</h2>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <router-link to="/product/recommended-1" class="group">
                                <div class="aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c" class="w-full h-full object-cover group-hover:scale-105 transition-transform" />
                                </div>
                                <p class="text-white font-medium group-hover:text-primary transition-colors">Velvet Blazer</p>
                                <p class="text-primary font-bold">$1,250</p>
                            </router-link>
                            <router-link to="/product/recommended-2" class="group">
                                <div class="aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy" class="w-full h-full object-cover group-hover:scale-105 transition-transform" />
                                </div>
                                <p class="text-white font-medium group-hover:text-primary transition-colors">Leather Trench</p>
                                <p class="text-primary font-bold">$2,100</p>
                            </router-link>
                            <router-link to="/product/recommended-3" class="group">
                                <div class="aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ" class="w-full h-full object-cover group-hover:scale-105 transition-transform" />
                                </div>
                                <p class="text-white font-medium group-hover:text-primary transition-colors">Silk Gown</p>
                                <p class="text-primary font-bold">$890</p>
                            </router-link>
                            <router-link to="/product/recommended-4" class="group">
                                <div class="aspect-[3/4] bg-oax-panel rounded-lg overflow-hidden mb-3">
                                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7kbXm9e9f7XweTKGktzI_f-c5lhxUTgDEFRJnUssNK0r-5X734KoU3qCQ7HY65GdhhY9JbvEu_RTphh2hA4J_I4fRwQHjCllJnuSzyoHHr_mKI7ppRamHsVRBvS-amdLZWppAB3nBTlKrcS12y0FA3R0FtDwbE6LI7iD20mNXbxwkOM-88QJszu-KBpSGwnpVzleVmaWy1SoM6-MaCC_X6rif_7jzJ5Izj-YqXrexrnGdREBgDZjIzoh2KUl9KIsuJsOShGhYk3AI" class="w-full h-full object-cover group-hover:scale-105 transition-transform" />
                                </div>
                                <p class="text-white font-medium group-hover:text-primary transition-colors">Noir Dress</p>
                                <p class="text-primary font-bold">$750</p>
                            </router-link>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
</script>
