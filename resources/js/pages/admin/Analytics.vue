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
                <router-link to="/admin/collections" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">collections</span>
                    Collections
                </router-link>
                <router-link to="/admin/marketing" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">campaign</span>
                    Marketing
                </router-link>
                <router-link to="/admin/analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary/10 text-primary font-medium">
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
                    <input type="text" placeholder="Search analytics..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" />
                </div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button>
                    <div class="flex items-center gap-3 pl-4 border-l border-oax-border">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div>
                        <span class="text-white text-sm">Admin</span>
                    </div>
                </div>
            </header>

            <!-- Analytics Content -->
            <div class="flex-1 p-6 overflow-y-auto">
                <!-- Page Header -->
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Analytics Overview</h1>
                        <p class="text-text-muted mt-1">Track your platform performance and business metrics.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Date Range Picker -->
                        <div class="relative">
                            <span class="absolute left-3 top-1/2 -translate-y-1/2 text-text-muted pointer-events-none">
                                <span class="material-symbols-outlined text-[20px]">calendar_today</span>
                            </span>
                            <select class="appearance-none h-10 pl-10 pr-10 bg-oax-panel border border-oax-border text-white text-sm font-medium rounded-lg focus:outline-none focus:border-primary cursor-pointer">
                                <option>Oct 1 - Oct 31, 2024</option>
                                <option>Sep 1 - Sep 30, 2024</option>
                                <option>Last 30 Days</option>
                                <option>This Year</option>
                            </select>
                            <span class="absolute right-3 top-1/2 -translate-y-1/2 text-text-muted pointer-events-none">
                                <span class="material-symbols-outlined text-[20px]">arrow_drop_down</span>
                            </span>
                        </div>
                        <!-- Export Button -->
                        <button class="flex items-center justify-center gap-2 h-10 px-4 bg-primary hover:bg-primary-light text-white text-sm font-bold rounded-lg transition-colors">
                            <span class="material-symbols-outlined text-[18px]">download</span>
                            <span>Export Report</span>
                        </button>
                    </div>
                </div>

                <!-- KPI Cards Row -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                    <!-- Card 1 -->
                    <div class="flex flex-col justify-between gap-4 p-5 rounded-xl bg-[#0a0808] border border-oax-border hover:border-primary/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <p class="text-text-muted text-sm font-medium">Total Revenue</p>
                            <span class="material-symbols-outlined text-text-muted text-[20px]">payments</span>
                        </div>
                        <div>
                            <p class="text-white text-2xl font-bold tracking-tight">$1,240,500</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="material-symbols-outlined text-green-500 text-[16px]">trending_up</span>
                                <p class="text-green-500 text-xs font-bold">+12%</p>
                                <p class="text-text-muted text-xs ml-1">vs last month</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="flex flex-col justify-between gap-4 p-5 rounded-xl bg-[#0a0808] border border-oax-border hover:border-primary/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <p class="text-text-muted text-sm font-medium">Total Orders</p>
                            <span class="material-symbols-outlined text-text-muted text-[20px]">shopping_cart</span>
                        </div>
                        <div>
                            <p class="text-white text-2xl font-bold tracking-tight">3,450</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="material-symbols-outlined text-green-500 text-[16px]">trending_up</span>
                                <p class="text-green-500 text-xs font-bold">+5%</p>
                                <p class="text-text-muted text-xs ml-1">vs last month</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="flex flex-col justify-between gap-4 p-5 rounded-xl bg-[#0a0808] border border-oax-border hover:border-primary/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <p class="text-text-muted text-sm font-medium">Avg Order Value</p>
                            <span class="material-symbols-outlined text-text-muted text-[20px]">sell</span>
                        </div>
                        <div>
                            <p class="text-white text-2xl font-bold tracking-tight">$360</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="material-symbols-outlined text-red-500 text-[16px]">trending_down</span>
                                <p class="text-red-500 text-xs font-bold">-2%</p>
                                <p class="text-text-muted text-xs ml-1">vs last month</p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="flex flex-col justify-between gap-4 p-5 rounded-xl bg-[#0a0808] border border-oax-border hover:border-primary/50 transition-colors">
                        <div class="flex items-center justify-between">
                            <p class="text-text-muted text-sm font-medium">Conversion Rate</p>
                            <span class="material-symbols-outlined text-text-muted text-[20px]">ads_click</span>
                        </div>
                        <div>
                            <p class="text-white text-2xl font-bold tracking-tight">2.4%</p>
                            <div class="flex items-center gap-1 mt-1">
                                <span class="material-symbols-outlined text-green-500 text-[16px]">trending_up</span>
                                <p class="text-green-500 text-xs font-bold">+0.5%</p>
                                <p class="text-text-muted text-xs ml-1">vs last month</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Chart Section -->
                <div class="w-full rounded-xl bg-[#0a0808] border border-oax-border p-6 mb-8">
                    <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-4 mb-6">
                        <div>
                            <h3 class="text-white text-lg font-bold">Revenue & Traffic Overview</h3>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="flex items-center gap-2">
                                    <span class="size-2.5 rounded-full bg-primary"></span>
                                    <span class="text-text-muted text-xs font-medium">Revenue</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="size-2.5 rounded-full bg-text-muted"></span>
                                    <span class="text-text-muted text-xs font-medium">Traffic</span>
                                </div>
                            </div>
                        </div>
                        <div class="flex p-1 bg-oax-panel rounded-lg w-fit">
                            <button class="px-3 py-1 text-xs font-medium text-white bg-oax-border rounded shadow-sm">Daily</button>
                            <button class="px-3 py-1 text-xs font-medium text-text-muted hover:text-white">Weekly</button>
                            <button class="px-3 py-1 text-xs font-medium text-text-muted hover:text-white">Monthly</button>
                        </div>
                    </div>
                    <!-- Chart Graphic -->
                    <div class="relative h-[280px] w-full">
                        <svg class="w-full h-full overflow-visible" preserveaspectratio="none" viewbox="0 0 1000 300">
                            <defs>
                                <linearGradient id="gradient-revenue" x1="0" x2="0" y1="0" y2="1">
                                    <stop offset="0%" stop-color="#8B0000" stop-opacity="0.3"></stop>
                                    <stop offset="100%" stop-color="#8B0000" stop-opacity="0"></stop>
                                </linearGradient>
                            </defs>
                            <!-- Grid Lines -->
                            <line stroke="#293038" stroke-width="1" x1="0" y1="299" x2="1000" y2="299"></line>
                            <line stroke="#293038" stroke-dasharray="4 4" stroke-width="1" x1="0" y1="225" x2="1000" y2="225"></line>
                            <line stroke="#293038" stroke-dasharray="4 4" stroke-width="1" x1="0" y1="150" x2="1000" y2="150"></line>
                            <line stroke="#293038" stroke-dasharray="4 4" stroke-width="1" x1="0" y1="75" x2="1000" y2="75"></line>
                            <!-- Traffic Line -->
                            <path d="M0,250 C100,240 150,260 250,220 C350,180 400,200 500,160 C600,120 650,140 750,100 C850,60 900,80 1000,50" fill="none" stroke="#3c4753" stroke-width="2" vector-effect="non-scaling-stroke"></path>
                            <!-- Revenue Area -->
                            <path d="M0,200 C150,180 200,220 350,150 C500,80 600,120 750,60 C900,0 950,40 1000,20 V300 H0 Z" fill="url(#gradient-revenue)"></path>
                            <path d="M0,200 C150,180 200,220 350,150 C500,80 600,120 750,60 C900,0 950,40 1000,20" fill="none" stroke="#8B0000" stroke-width="3" vector-effect="non-scaling-stroke"></path>
                        </svg>
                        <!-- X Axis Labels -->
                        <div class="flex justify-between mt-4 text-text-muted text-xs font-medium">
                            <span>Oct 01</span>
                            <span>Oct 05</span>
                            <span>Oct 10</span>
                            <span>Oct 15</span>
                            <span>Oct 20</span>
                            <span>Oct 25</span>
                            <span>Oct 30</span>
                        </div>
                    </div>
                </div>

                <!-- Secondary Widgets Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Top Selling Products -->
                    <div class="lg:col-span-2 rounded-xl bg-[#0a0808] border border-oax-border flex flex-col">
                        <div class="p-5 border-b border-oax-border flex justify-between items-center">
                            <h3 class="text-white text-base font-bold">Top Selling Products</h3>
                            <button class="text-primary text-xs font-bold hover:text-primary-light">View All</button>
                        </div>
                        <div class="p-0 overflow-x-auto">
                            <table class="w-full text-left">
                                <thead class="bg-[#0a0808] text-text-muted text-xs uppercase font-medium">
                                    <tr>
                                        <th class="px-5 py-3 rounded-tl-lg">Product</th>
                                        <th class="px-5 py-3">Category</th>
                                        <th class="px-5 py-3 text-right">Price</th>
                                        <th class="px-5 py-3 text-right">Sold</th>
                                        <th class="px-5 py-3 text-right rounded-tr-lg">Revenue</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-oax-border">
                                    <tr v-for="product in topProducts" :key="product.name" class="group hover:bg-oax-panel/50 transition-colors">
                                        <td class="px-5 py-4">
                                            <div class="flex items-center gap-3">
                                                <img :src="product.image" class="size-10 rounded bg-oax-panel object-cover" />
                                                <p class="text-white text-sm font-medium">{{ product.name }}</p>
                                            </div>
                                        </td>
                                        <td class="px-5 py-4 text-text-muted text-sm">{{ product.category }}</td>
                                        <td class="px-5 py-4 text-white text-sm text-right">${{ product.price.toLocaleString() }}</td>
                                        <td class="px-5 py-4 text-white text-sm text-right">{{ product.sold }}</td>
                                        <td class="px-5 py-4 text-white text-sm text-right font-medium">${{ product.revenue.toLocaleString() }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Traffic Sources -->
                    <div class="flex flex-col gap-6">
                        <div class="flex-1 rounded-xl bg-[#0a0808] border border-oax-border p-5">
                            <h3 class="text-white text-base font-bold mb-4">Traffic Sources</h3>
                            <div class="flex items-center justify-between gap-4">
                                <!-- Donut Chart -->
                                <div class="relative size-32 flex-shrink-0">
                                    <svg class="size-full -rotate-90" viewbox="0 0 36 36">
                                        <path class="text-oax-border" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-width="4"></path>
                                        <path class="text-primary" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="40, 100" stroke-width="4"></path>
                                        <path class="text-green-500" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="25, 100" stroke-dashoffset="-40" stroke-width="4"></path>
                                        <path class="text-text-muted" d="M18 2.0845 a 15.9155 15.9155 0 0 1 0 31.831 a 15.9155 15.9155 0 0 1 0 -31.831" fill="none" stroke="currentColor" stroke-dasharray="35, 100" stroke-dashoffset="-65" stroke-width="4"></path>
                                    </svg>
                                    <div class="absolute inset-0 flex items-center justify-center flex-col">
                                        <span class="text-white font-bold text-sm">382k</span>
                                        <span class="text-text-muted text-[10px]">Visits</span>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-2 w-full">
                                    <div class="flex justify-between items-center text-sm">
                                        <div class="flex items-center gap-2">
                                            <span class="size-2 rounded-full bg-primary"></span>
                                            <span class="text-text-muted">Direct</span>
                                        </div>
                                        <span class="text-white font-medium">40%</span>
                                    </div>
                                    <div class="flex justify-between items-center text-sm">
                                        <div class="flex items-center gap-2">
                                            <span class="size-2 rounded-full bg-green-500"></span>
                                            <span class="text-text-muted">Social</span>
                                        </div>
                                        <span class="text-white font-medium">25%</span>
                                    </div>
                                    <div class="flex justify-between items-center text-sm">
                                        <div class="flex items-center gap-2">
                                            <span class="size-2 rounded-full bg-text-muted"></span>
                                            <span class="text-text-muted">Search</span>
                                        </div>
                                        <span class="text-white font-medium">35%</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Customer Acquisition -->
                        <div class="flex-1 rounded-xl bg-[#0a0808] border border-oax-border p-5">
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-white text-base font-bold">New vs Returning</h3>
                            </div>
                            <div class="flex flex-col gap-4">
                                <div class="flex flex-col gap-1">
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-text-muted">New Customers</span>
                                        <span class="text-white font-bold">64%</span>
                                    </div>
                                    <div class="w-full h-2 bg-oax-panel rounded-full overflow-hidden">
                                        <div class="h-full bg-primary w-[64%] rounded-full"></div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-1">
                                    <div class="flex justify-between text-xs mb-1">
                                        <span class="text-text-muted">Returning Customers</span>
                                        <span class="text-white font-bold">36%</span>
                                    </div>
                                    <div class="w-full h-2 bg-oax-panel rounded-full overflow-hidden">
                                        <div class="h-full bg-text-muted w-[36%] rounded-full"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
const topProducts = [
    { name: 'Luxury Silk Scarf', category: 'Accessories', price: 245, sold: 432, revenue: 105840, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHRdCzXVxRNQzcHZlWvU2cFs1SDFDFNDmQUjTFS6CjLHVMqdFJneWt4HF1OO_JF7dm-ao3gG2C9o1Jh4fsCvgT6FtrBKwAaTwWX98CCbIrlcGbfbaDUv_BO71WUucdDKwHbSRzCQGF6tu79vkFdXfc8E4cfOBu6gsSzZ4ckQkhH7HuFK4ts0c8a705I5Syh8sArS7LiLYv3kPzTIIBnsbOmKITzr4NUSVQJs9SqjFcIJKJtyCDOyNDVzv-0O2mPEn0pr1sPTNmJ2Ee' },
    { name: 'Cashmere Coat', category: 'Outerwear', price: 1290, sold: 185, revenue: 238650, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBJ9FY0N8pJbfrgzaIo7U77Rs82J5ESzCtFCJlx3WwoDitDzzggWzQj7lkkWAleDX-uvkYfg55Sa7pBetX9NDpBaNsHAop4zxpXQaWkE7qM91PaVB-GvS6PHsfwcyQgxX76Xaduew6ilCLvSo9TEPHVA2GcGVSTnPR8qM73GsyOzRrnFfWNacPQ89uvBMVsG7Y0CfpQtSizidbPYSPCpl2zfpkYPk6bHV1qJhwzAILgmeFhBqmWSv3zclmN6uCCA8cW7YlS3xQN1233' },
    { name: 'Signature Handbag', category: 'Bags', price: 3450, sold: 54, revenue: 186300, image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuCHOnjahjeZOCK45YIRAKLj3skhlKp6F8bzLsVxKIMmV-tTSehPyDeciL6lHAYHNOYou-oKY1XOrOec5H-L7mzMufwX0Q4sarhzR3FKYc2-sV6gu7JyEtw0nLdAKT1e6OoZwYENFH1GJtug6HbFlEvg6viundD_WrZHdQdw_FNlxhBT8b0U0CMORH-Sd-T6wgIzlK1vKh211-w5n77bRPJ4OAoAOl5Bn2EjH8bJ0z5Xy9Z7moQxYYaAYP2wxZDQSkM-n5WJDWx7L0nI' }
]
</script>
