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
                <router-link to="/admin" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary/10 text-primary font-medium">
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
                <router-link to="/admin/collections" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
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
            <!-- Top Bar -->
            <header class="h-16 border-b border-oax-border bg-[#0a0808] flex items-center justify-between px-6">
                <div class="flex items-center gap-4">
                    <span class="material-symbols-outlined text-text-muted">search</span>
                    <input type="text" placeholder="Search orders, products..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" />
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button>
                    <div class="flex items-center gap-3 pl-4 border-l border-oax-border">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div>
                        <span class="text-white text-sm">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="flex-1 p-6 overflow-y-auto">
                <h1 class="text-2xl font-bold text-white mb-6">Dashboard Overview</h1>

                <!-- KPI Cards -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-text-muted text-sm">Total Revenue</span>
                            <span class="text-green-500 text-sm flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">trending_up</span> +12.5%</span>
                        </div>
                        <p class="text-3xl font-bold text-white">$284,590</p>
                        <p class="text-xs text-text-muted mt-1">vs $253,000 last month</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-text-muted text-sm">Orders</span>
                            <span class="text-green-500 text-sm flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">trending_up</span> +8.2%</span>
                        </div>
                        <p class="text-3xl font-bold text-white">1,284</p>
                        <p class="text-xs text-text-muted mt-1">vs 1,186 last month</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-text-muted text-sm">Avg. Order Value</span>
                            <span class="text-red-500 text-sm flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">trending_down</span> -2.1%</span>
                        </div>
                        <p class="text-3xl font-bold text-white">$221.65</p>
                        <p class="text-xs text-text-muted mt-1">vs $226.39 last month</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-3">
                            <span class="text-text-muted text-sm">Conversion Rate</span>
                            <span class="text-green-500 text-sm flex items-center gap-1"><span class="material-symbols-outlined text-[16px]">trending_up</span> +0.8%</span>
                        </div>
                        <p class="text-3xl font-bold text-white">3.42%</p>
                        <p class="text-xs text-text-muted mt-1">vs 3.12% last month</p>
                    </div>
                </div>

                <!-- Charts Row -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                    <div class="lg:col-span-2 bg-[#0a0808] rounded-xl border border-oax-border p-6">
                        <h2 class="text-lg font-bold text-white mb-4">Revenue Overview</h2>
                        <div class="h-64 flex items-end justify-between gap-2">
                            <div v-for="(bar, idx) in revenueData" :key="idx" class="flex-1 flex flex-col items-center gap-2">
                                <div class="w-full bg-primary/30 rounded-t relative" :style="{ height: `${bar.value}%` }">
                                    <div class="absolute bottom-0 w-full bg-primary rounded-t" :style="{ height: `${bar.value * 0.7}%` }"></div>
                                </div>
                                <span class="text-xs text-text-muted">{{ bar.month }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                        <h2 class="text-lg font-bold text-white mb-4">Sales by Category</h2>
                        <div class="space-y-4">
                            <div v-for="cat in categories" :key="cat.name">
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-text-muted">{{ cat.name }}</span>
                                    <span class="text-white">{{ cat.percentage }}%</span>
                                </div>
                                <div class="h-2 bg-oax-panel rounded-full">
                                    <div class="h-full bg-primary rounded-full" :style="{ width: `${cat.percentage}%` }"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Orders -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border overflow-hidden">
                    <div class="flex items-center justify-between p-6 border-b border-oax-border">
                        <h2 class="text-lg font-bold text-white">Recent Orders</h2>
                        <router-link to="/admin/orders" class="text-primary text-sm hover:underline">View All</router-link>
                    </div>
                    <table class="w-full">
                        <thead class="bg-oax-panel/30">
                            <tr>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Order ID</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Customer</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Date</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Status</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Total</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in recentOrders" :key="order.id" class="border-t border-oax-border/50">
                                <td class="px-6 py-4">
                                    <span class="text-white font-medium">{{ order.id }}</span>
                                </td>
                                <td class="px-6 py-4 text-text-muted">{{ order.customer }}</td>
                                <td class="px-6 py-4 text-text-muted">{{ order.date }}</td>
                                <td class="px-6 py-4">
                                    <span :class="order.statusClass" class="px-2 py-1 rounded-full text-xs font-medium">{{ order.status }}</span>
                                </td>
                                <td class="px-6 py-4 text-white font-bold">{{ order.total }}</td>
                                <td class="px-6 py-4">
                                    <button class="text-text-muted hover:text-white"><span class="material-symbols-outlined">visibility</span></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Top Products -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-8">
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                        <h2 class="text-lg font-bold text-white mb-4">Top Selling Products</h2>
                        <div class="space-y-4">
                            <div v-for="(product, idx) in topProducts" :key="product.name" class="flex items-center gap-4">
                                <span class="text-text-muted font-bold w-6">{{ idx + 1 }}</span>
                                <img :src="product.image" class="w-12 h-16 object-cover rounded" />
                                <div class="flex-1">
                                    <p class="text-white text-sm font-medium">{{ product.name }}</p>
                                    <p class="text-text-muted text-xs">{{ product.sold }} sold</p>
                                </div>
                                <span class="text-primary font-bold">{{ product.revenue }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                        <h2 class="text-lg font-bold text-white mb-4">Inventory Alerts</h2>
                        <div class="space-y-3">
                            <div v-for="alert in inventoryAlerts" :key="alert.product" class="flex items-center justify-between p-3 bg-red-500/10 rounded-lg border border-red-500/20">
                                <div class="flex items-center gap-3">
                                    <span class="material-symbols-outlined text-red-500">warning</span>
                                    <span class="text-white text-sm">{{ alert.product }}</span>
                                </div>
                                <span class="text-red-500 text-sm font-bold">{{ alert.stock }} left</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
const revenueData = [
    { month: 'Jul', value: 65 },
    { month: 'Aug', value: 78 },
    { month: 'Sep', value: 82 },
    { month: 'Oct', value: 90 },
    { month: 'Nov', value: 100 },
    { month: 'Dec', value: 95 }
]

const categories = [
    { name: 'Dresses', percentage: 35 },
    { name: 'Outerwear', percentage: 28 },
    { name: 'Tops', percentage: 22 },
    { name: 'Accessories', percentage: 15 }
]

const recentOrders = [
    { id: '#OX-84729', customer: 'Sarah Mitchell', date: 'Dec 18, 2024', status: 'Processing', statusClass: 'bg-blue-500/20 text-blue-500', total: '$1,245' },
    { id: '#OX-84728', customer: 'James Wilson', date: 'Dec 18, 2024', status: 'Shipped', statusClass: 'bg-purple-500/20 text-purple-500', total: '$890' },
    { id: '#OX-84727', customer: 'Emma Thompson', date: 'Dec 17, 2024', status: 'Delivered', statusClass: 'bg-green-500/20 text-green-500', total: '$2,340' },
    { id: '#OX-84726', customer: 'Michael Chen', date: 'Dec 17, 2024', status: 'Pending', statusClass: 'bg-yellow-500/20 text-yellow-500', total: '$567' }
]

const topProducts = [
    { name: 'Velvet Midnight Blazer', sold: 145, revenue: '$181,250', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c' },
    { name: 'OAX Silk Gown', sold: 98, revenue: '$142,100', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ' },
    { name: 'Eco-Leather Trench', sold: 67, revenue: '$140,700', image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy' }
]

const inventoryAlerts = [
    { product: 'Sheer Mesh Top - Black / M', stock: 3 },
    { product: 'Velvet Midnight Blazer - M', stock: 5 },
    { product: 'Silk Draped Tunic - S', stock: 2 }
]
</script>
