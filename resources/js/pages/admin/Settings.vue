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
                <router-link to="/admin/analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">analytics</span>
                    Analytics
                </router-link>
                <router-link to="/admin/reports" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white">
                    <span class="material-symbols-outlined">assessment</span>
                    Reports
                </router-link>
                <router-link to="/admin/settings" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary/10 text-primary font-medium">
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
                    <input type="text" placeholder="Search settings..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" />
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
                <h1 class="text-2xl font-bold text-white mb-8">Settings</h1>

                <div class="flex gap-6">
                    <!-- Settings Navigation -->
                    <div class="w-64 shrink-0">
                        <nav class="space-y-1">
                            <button @click="activeTab = 'general'" :class="['flex items-center gap-3 px-4 py-3 rounded-lg transition-colors w-full text-left', activeTab === 'general' ? 'bg-oax-panel text-white' : 'text-text-muted hover:bg-oax-panel hover:text-white']">
                                <span class="material-symbols-outlined">settings</span>
                                <span class="text-sm font-medium">General</span>
                            </button>
                            <button @click="activeTab = 'payments'" :class="['flex items-center gap-3 px-4 py-3 rounded-lg transition-colors w-full text-left', activeTab === 'payments' ? 'bg-oax-panel text-white' : 'text-text-muted hover:bg-oax-panel hover:text-white']">
                                <span class="material-symbols-outlined">credit_card</span>
                                <span class="text-sm font-medium">Payments</span>
                            </button>
                            <button @click="activeTab = 'shipping'" :class="['flex items-center gap-3 px-4 py-3 rounded-lg transition-colors w-full text-left', activeTab === 'shipping' ? 'bg-oax-panel text-white' : 'text-text-muted hover:bg-oax-panel hover:text-white']">
                                <span class="material-symbols-outlined">local_shipping</span>
                                <span class="text-sm font-medium">Shipping</span>
                            </button>
                            <button @click="activeTab = 'taxes'" :class="['flex items-center gap-3 px-4 py-3 rounded-lg transition-colors w-full text-left', activeTab === 'taxes' ? 'bg-oax-panel text-white' : 'text-text-muted hover:bg-oax-panel hover:text-white']">
                                <span class="material-symbols-outlined">receipt_long</span>
                                <span class="text-sm font-medium">Taxes</span>
                            </button>
                            <button @click="activeTab = 'notifications'" :class="['flex items-center gap-3 px-4 py-3 rounded-lg transition-colors w-full text-left', activeTab === 'notifications' ? 'bg-oax-panel text-white' : 'text-text-muted hover:bg-oax-panel hover:text-white']">
                                <span class="material-symbols-outlined">notifications</span>
                                <span class="text-sm font-medium">Notifications</span>
                            </button>
                            <button @click="activeTab = 'team'" :class="['flex items-center gap-3 px-4 py-3 rounded-lg transition-colors w-full text-left', activeTab === 'team' ? 'bg-oax-panel text-white' : 'text-text-muted hover:bg-oax-panel hover:text-white']">
                                <span class="material-symbols-outlined">group</span>
                                <span class="text-sm font-medium">Team</span>
                            </button>
                        </nav>
                    </div>

                    <!-- Settings Content -->
                    <div class="flex-1">
                        <div class="bg-[#0a0808] border border-oax-border rounded-xl p-6">
                            <h2 class="text-lg font-bold text-white mb-6">General Settings</h2>
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-medium text-white mb-2">Store Name</label>
                                    <input type="text" value="OAX FASHION" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" />
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-white mb-2">Store Email</label>
                                    <input type="email" value="admin@oaxfashion.com" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" />
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-white mb-2">Timezone</label>
                                    <select class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary appearance-none">
                                        <option>UTC</option>
                                        <option>America/New_York</option>
                                        <option>Europe/London</option>
                                        <option>Asia/Tokyo</option>
                                    </select>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-white mb-2">Currency</label>
                                    <select class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary appearance-none">
                                        <option>USD ($)</option>
                                        <option>EUR (€)</option>
                                        <option>GBP (£)</option>
                                        <option>JPY (¥)</option>
                                    </select>
                                </div>
                                
                                <div class="flex items-center justify-between py-4 border-t border-oax-border">
                                    <div>
                                        <h3 class="text-white font-medium">Maintenance Mode</h3>
                                        <p class="text-text-muted text-sm">Temporarily disable the store</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer" />
                                        <div class="w-11 h-6 bg-oax-panel peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary"></div>
                                    </label>
                                </div>
                                
                                <div class="flex justify-end pt-4">
                                    <button class="bg-primary hover:bg-primary-light text-white font-bold py-3 px-6 rounded-lg transition-colors">
                                        Save Changes
                                    </button>
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
import { ref } from 'vue'

const activeTab = ref('general')
</script>
