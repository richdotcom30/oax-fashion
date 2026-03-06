<template>
    <div class="flex min-h-screen bg-oax-dark">
        <aside class="w-64 bg-[#0a0808] border-r border-oax-border shrink-0 flex flex-col">
            <div class="p-6 border-b border-oax-border">
                <div class="flex items-center gap-3">
                    <div class="size-10 text-primary"><svg fill="currentColor" viewBox="0 0 48 48"><path d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor"></path></svg></div>
                    <div><h1 class="text-white font-bold text-lg">OAX</h1><p class="text-[10px] text-text-muted uppercase tracking-wider">Admin Panel</p></div>
                </div>
            </div>
            <nav class="flex-1 p-4 space-y-1">
                <router-link to="/admin" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">dashboard</span>Dashboard</router-link>
                <router-link to="/admin/products" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">inventory_2</span>Products</router-link>
                <router-link to="/admin/orders" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">receipt_long</span>Orders</router-link>
                <router-link to="/admin/customers" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary/10 text-primary font-medium"><span class="material-symbols-outlined">people</span>Customers</router-link>
                <router-link to="/admin/inventory" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">warehouse</span>Inventory</router-link>
                <router-link to="/admin/collections" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">collections</span>Collections</router-link>
                <router-link to="/admin/marketing" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">campaign</span>Marketing</router-link>
                <router-link to="/admin/analytics" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">analytics</span>Analytics</router-link>
                <router-link to="/admin/reports" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">assessment</span>Reports</router-link>
                <router-link to="/admin/settings" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">settings</span>Settings</router-link>
            </nav>
        </aside>
        <main class="flex-1 flex flex-col">
            <header class="h-16 border-b border-oax-border bg-[#0a0808] flex items-center justify-between px-6">
                <div class="flex items-center gap-4"><span class="material-symbols-outlined text-text-muted">search</span><input v-model="searchQuery" type="text" placeholder="Search customers..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" /></div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button>
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div>
                </div>
            </header>
            <div class="flex-1 p-6">
                <!-- CRM Stats -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Total Customers</p>
                            <span class="material-symbols-outlined text-primary">group</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ totalCustomers }}</p>
                        <p class="text-xs text-green-500 mt-1">+12% from last month</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">New This Month</p>
                            <span class="material-symbols-outlined text-green-500">person_add</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ newCustomers }}</p>
                        <p class="text-xs text-green-500 mt-1">+8% from last month</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Avg. Lifetime Value</p>
                            <span class="material-symbols-outlined text-gold">attach_money</span>
                        </div>
                        <p class="text-3xl font-bold text-white">${{ avgLTV.toLocaleString() }}</p>
                        <p class="text-xs text-green-500 mt-1">+5% from last month</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">VIP Members</p>
                            <span class="material-symbols-outlined text-gold">diamond</span>
                        </div>
                        <p class="text-3xl font-bold text-gold">{{ vipCustomers }}</p>
                        <p class="text-xs text-text-muted mt-1">{{ Math.round(vipCustomers/totalCustomers*100) }}% of total</p>
                    </div>
                </div>

                <!-- Customer Segments -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border p-4 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-white font-bold">Customer Segments</h3>
                        <button @click="showSegmentModal = true" class="text-primary text-sm hover:underline">Manage Segments</button>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                        <button v-for="segment in segments" :key="segment.name" @click="filterBySegment(segment)" :class="selectedSegment === segment.name ? 'bg-primary/20 border-primary' : 'bg-oax-panel border-oax-border'" class="border rounded-lg p-3 text-left hover:bg-oax-panel/50 transition-colors">
                            <p class="text-text-muted text-xs">{{ segment.name }}</p>
                            <p class="text-white font-bold text-lg">{{ segment.count }}</p>
                            <p class="text-xs text-text-muted">${{ segment.value.toLocaleString() }} value</p>
                        </button>
                    </div>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <select v-model="tierFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                        <option value="">All Tiers</option>
                        <option value="Platinum">Platinum</option>
                        <option value="Gold">Gold</option>
                        <option value="Silver">Silver</option>
                        <option value="Bronze">Bronze</option>
                    </select>
                    <select v-model="segmentFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                        <option value="">All Segments</option>
                        <option value="whales">Whales ($10k+)</option>
                        <option value="loyal">Loyal (5+ orders)</option>
                        <option value="at_risk">At Risk</option>
                        <option value="new">New (first order)</option>
                    </select>
                    <button v-if="selectedSegment || tierFilter || segmentFilter" @click="clearFilters" class="text-text-muted text-sm hover:text-white">Clear Filters</button>
                </div>

                <!-- Customers Table -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-oax-panel/30">
                            <tr>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Customer</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Contact</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Segment</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Orders</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">LTV</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Last Order</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Tier</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="customer in filteredCustomers" :key="customer.id" class="border-t border-oax-border/50 hover:bg-oax-panel/20">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div :class="customer.avatarClass" class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold text-sm">{{ customer.initials }}</div>
                                        <div>
                                            <p class="text-white font-medium">{{ customer.name }}</p>
                                            <p class="text-text-muted text-xs">{{ customer.location }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-text-muted text-sm">{{ customer.email }}</p>
                                    <p class="text-text-muted text-xs">{{ customer.phone }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span :class="customer.segmentClass" class="px-2 py-1 rounded-full text-xs font-medium">{{ customer.segment }}</span>
                                </td>
                                <td class="px-6 py-4 text-text-muted">{{ customer.orders }}</td>
                                <td class="px-6 py-4">
                                    <p class="text-white font-bold">${{ customer.ltv.toLocaleString() }}</p>
                                    <p class="text-text-muted text-xs">Avg: ${{ Math.round(customer.ltv/customer.orders).toLocaleString() }}</p>
                                </td>
                                <td class="px-6 py-4 text-text-muted">{{ customer.lastOrder }}</td>
                                <td class="px-6 py-4">
                                    <span :class="customer.tierClass" class="px-2 py-1 rounded-full text-xs font-medium">{{ customer.tier }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <button @click="viewCustomer(customer)" class="text-text-muted hover:text-white p-1" title="View Profile"><span class="material-symbols-outlined">visibility</span></button>
                                        <button @click="editCustomer(customer)" class="text-text-muted hover:text-white p-1" title="Edit"><span class="material-symbols-outlined">edit</span></button>
                                        <button @click="emailCustomer(customer)" class="text-text-muted hover:text-primary p-1" title="Send Email"><span class="material-symbols-outlined">email</span></button>
                                        <button @click="addNote(customer)" class="text-text-muted hover:text-gold p-1" title="Add Note"><span class="material-symbols-outlined">note_add</span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between mt-6">
                    <p class="text-text-muted text-sm">Showing {{ filteredCustomers.length }} of {{ customers.length }} customers</p>
                    <div class="flex items-center gap-2">
                        <button class="px-3 py-1.5 bg-oax-panel border border-oax-border rounded-lg text-white text-sm hover:bg-oax-panel/80">Previous</button>
                        <button class="px-3 py-1.5 bg-oax-panel border border-oax-border rounded-lg text-white text-sm hover:bg-oax-panel/80">Next</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script setup>
import { ref, computed } from 'vue'

const searchQuery = ref('')
const tierFilter = ref('')
const segmentFilter = ref('')
const selectedSegment = ref('')
const showSegmentModal = ref(false)

const totalCustomers = 2847
const newCustomers = 156
const avgLTV = 3250
const vipCustomers = 342

const segments = [
    { name: 'Whales', count: 89, value: 1450000 },
    { name: 'Loyal', count: 456, value: 890000 },
    { name: 'At Risk', count: 234, value: 156000 },
    { name: 'New', count: 156, value: 45000 },
    { name: 'Inactive', count: 567, value: 89000 }
]

const customers = ref([
    { 
        id: 1, 
        name: 'Sarah Mitchell', 
        initials: 'SM', 
        avatarClass: 'bg-gradient-to-br from-primary to-primary/50',
        email: 'sarah.m@email.com', 
        phone: '+1 (555) 123-4567',
        location: 'New York, NY',
        orders: 24, 
        ltv: 18540, 
        lastOrder: 'Dec 18, 2024',
        tier: 'Platinum', 
        tierClass: 'bg-gradient-to-r from-[#E5E4E2] to-[#C0C0C0] text-black',
        segment: 'Whales',
        segmentClass: 'bg-purple-500/20 text-purple-500'
    },
    { 
        id: 2, 
        name: 'James Wilson', 
        initials: 'JW',
        avatarClass: 'bg-blue-500/50', 
        email: 'jwilson@email.com', 
        phone: '+1 (555) 234-5678',
        location: 'Los Angeles, CA',
        orders: 18, 
        ltv: 12450, 
        lastOrder: 'Dec 15, 2024',
        tier: 'Gold', 
        tierClass: 'bg-gold/20 text-gold',
        segment: 'Loyal',
        segmentClass: 'bg-green-500/20 text-green-500'
    },
    { 
        id: 3, 
        name: 'Emma Thompson', 
        initials: 'ET',
        avatarClass: 'bg-purple-500/50', 
        email: 'emma.t@email.com', 
        phone: '+1 (555) 345-6789',
        location: 'Chicago, IL',
        orders: 12, 
        ltv: 8920, 
        lastOrder: 'Dec 10, 2024',
        tier: 'Gold', 
        tierClass: 'bg-gold/20 text-gold',
        segment: 'Loyal',
        segmentClass: 'bg-green-500/20 text-green-500'
    },
    { 
        id: 4, 
        name: 'Michael Chen', 
        initials: 'MC',
        avatarClass: 'bg-green-500/50', 
        email: 'mchen@email.com', 
        phone: '+1 (555) 456-7890',
        location: 'Houston, TX',
        orders: 8, 
        ltv: 5680, 
        lastOrder: 'Nov 28, 2024',
        tier: 'Silver', 
        tierClass: 'bg-gray-400/20 text-gray-400',
        segment: 'At Risk',
        segmentClass: 'bg-red-500/20 text-red-500'
    },
    { 
        id: 5, 
        name: 'Jennifer Lee', 
        initials: 'JL',
        avatarClass: 'bg-yellow-500/50', 
        email: 'jlee@email.com', 
        phone: '+1 (555) 567-8901',
        location: 'Phoenix, AZ',
        orders: 1, 
        ltv: 450, 
        lastOrder: 'Dec 20, 2024',
        tier: 'Bronze', 
        tierClass: 'bg-amber-700/20 text-amber-700',
        segment: 'New',
        segmentClass: 'bg-blue-500/20 text-blue-500'
    },
    { 
        id: 6, 
        name: 'Robert Taylor', 
        initials: 'RT',
        avatarClass: 'bg-red-500/50', 
        email: 'rtaylor@email.com', 
        phone: '+1 (555) 678-9012',
        location: 'San Diego, CA',
        orders: 0, 
        ltv: 0, 
        lastOrder: 'N/A',
        tier: 'Bronze', 
        tierClass: 'bg-amber-700/20 text-amber-700',
        segment: 'Inactive',
        segmentClass: 'bg-gray-500/20 text-gray-500'
    }
])

const filteredCustomers = computed(() => {
    return customers.value.filter(customer => {
        const matchesSearch = !searchQuery.value || 
            customer.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            customer.email.toLowerCase().includes(searchQuery.value.toLowerCase())
        
        const matchesTier = !tierFilter.value || customer.tier === tierFilter.value
        const matchesSegment = !segmentFilter.value || customer.segment.toLowerCase().replace(' ', '_') === segmentFilter.value
        
        return matchesSearch && matchesTier && matchesSegment
    })
})

const filterBySegment = (segment) => {
    selectedSegment.value = selectedSegment.value === segment.name ? '' : segment.name
    segmentFilter.value = segment.name.toLowerCase()
}

const clearFilters = () => {
    tierFilter.value = ''
    segmentFilter.value = ''
    selectedSegment.value = ''
}

const viewCustomer = (customer) => console.log('View:', customer.id)
const editCustomer = (customer) => console.log('Edit:', customer.id)
const emailCustomer = (customer) => console.log('Email:', customer.id)
const addNote = (customer) => console.log('Note:', customer.id)
</script>
