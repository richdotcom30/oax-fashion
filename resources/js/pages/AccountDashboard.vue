<template>
    <div class="flex flex-col min-h-screen">
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
                            <button @click="logout" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg text-text-muted hover:bg-oax-dark hover:text-white transition-colors">
                                <span class="material-symbols-outlined">logout</span>
                                Logout
                            </button>
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
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth'
import axios from 'axios'

const router = useRouter()
const authStore = useAuthStore()

const logout = async () => {
    try {
        await authStore.logout()
    } catch (error) {
        console.error('Logout error:', error)
    }
    router.push('/login')
}
</script>
