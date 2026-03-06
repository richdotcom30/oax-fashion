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
                <router-link to="/admin/customers" class="flex items-center gap-3 px-4 py-3 rounded-lg text-text-muted hover:bg-oax-panel hover:text-white"><span class="material-symbols-outlined">people</span>Customers</router-link>
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
                <div class="flex items-center gap-4"><span class="material-symbols-outlined text-text-muted">search</span><input v-model="searchQuery" type="text" placeholder="Search returns..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" /></div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button>
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div>
                </div>
            </header>
            <div class="flex-1 p-6">
                <!-- Page Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Returns & Exchanges</h1>
                        <p class="text-text-muted text-sm mt-1">Manage product returns and exchange requests</p>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Pending Review</p>
                            <span class="material-symbols-outlined text-yellow-500">hourglass_empty</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ pendingCount }}</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Approved</p>
                            <span class="material-symbols-outlined text-green-500">check_circle</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ approvedCount }}</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">In Transit</p>
                            <span class="material-symbols-outlined text-blue-500">local_shipping</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ inTransitCount }}</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Completed</p>
                            <span class="material-symbols-outlined text-primary">done_all</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ completedCount }}</p>
                    </div>
                </div>

                <!-- Return Reason Analysis -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                        <h3 class="text-white font-bold mb-4">Return Reasons</h3>
                        <div class="space-y-4">
                            <div v-for="reason in returnReasons" :key="reason.name">
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-text-muted">{{ reason.name }}</span>
                                    <span class="text-white">{{ reason.count }} ({{ reason.percentage }}%)</span>
                                </div>
                                <div class="h-2 bg-oax-panel rounded-full">
                                    <div class="h-full bg-primary rounded-full" :style="{ width: `${reason.percentage}%` }"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                        <h3 class="text-white font-bold mb-4">Refund Method</h3>
                        <div class="space-y-4">
                            <div v-for="method in refundMethods" :key="method.name">
                                <div class="flex justify-between text-sm mb-1">
                                    <span class="text-text-muted">{{ method.name }}</span>
                                    <span class="text-white">{{ method.count }}</span>
                                </div>
                                <div class="h-2 bg-oax-panel rounded-full">
                                    <div class="h-full bg-gold rounded-full" :style="{ width: `${method.percentage}%` }"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <select v-model="typeFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                        <option value="">All Types</option>
                        <option value="return">Returns</option>
                        <option value="exchange">Exchanges</option>
                    </select>
                    <select v-model="statusFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                        <option value="">All Status</option>
                        <option value="pending">Pending Review</option>
                        <option value="approved">Approved</option>
                        <option value="in_transit">In Transit</option>
                        <option value="completed">Completed</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>

                <!-- Returns Table -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-oax-panel/30">
                            <tr>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Request</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Order</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Customer</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Product</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Type</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Reason</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Status</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="request in filteredRequests" :key="request.id" class="border-t border-oax-border/50 hover:bg-oax-panel/20">
                                <td class="px-6 py-4">
                                    <p class="text-white font-medium">{{ request.id }}</p>
                                    <p class="text-text-muted text-xs">{{ request.date }}</p>
                                </td>
                                <td class="px-6 py-4 text-white">{{ request.orderId }}</td>
                                <td class="px-6 py-4">
                                    <p class="text-white">{{ request.customer }}</p>
                                    <p class="text-text-muted text-xs">{{ request.email }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img :src="request.image" class="w-10 h-12 object-cover rounded" />
                                        <div>
                                            <p class="text-white text-sm">{{ request.product }}</p>
                                            <p class="text-text-muted text-xs">{{ request.variant }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span :class="request.type === 'Return' ? 'bg-red-500/20 text-red-500' : 'bg-blue-500/20 text-blue-500'" class="px-2 py-1 rounded-full text-xs font-medium">{{ request.type }}</span>
                                </td>
                                <td class="px-6 py-4 text-text-muted text-sm">{{ request.reason }}</td>
                                <td class="px-6 py-4">
                                    <span :class="request.statusClass" class="px-2 py-1 rounded-full text-xs font-medium">{{ request.status }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <button @click="viewRequest(request)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">visibility</span></button>
                                        <button v-if="request.status === 'Pending Review'" @click="approveRequest(request)" class="text-text-muted hover:text-green-500 p-1"><span class="material-symbols-outlined">check_circle</span></button>
                                        <button v-if="request.status === 'Pending Review'" @click="rejectRequest(request)" class="text-text-muted hover:text-red-500 p-1"><span class="material-symbols-outlined">cancel</span></button>
                                        <button v-if="request.status === 'Approved'" @click="issueRefund(request)" class="text-text-muted hover:text-gold p-1"><span class="material-symbols-outlined">payments</span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</template>
<script setup>
import { ref, computed } from 'vue'

const searchQuery = ref('')
const typeFilter = ref('')
const statusFilter = ref('')

const pendingCount = 8
const approvedCount = 12
const inTransitCount = 5
const completedCount = 45

const returnReasons = [
    { name: 'Wrong Size', count: 24, percentage: 35 },
    { name: 'Not as Described', count: 18, percentage: 26 },
    { name: 'Defective/ Damaged', count: 14, percentage: 20 },
    { name: 'Changed Mind', count: 8, percentage: 12 },
    { name: 'Other', count: 5, percentage: 7 }
]

const refundMethods = [
    { name: 'Original Payment Method', count: 42, percentage: 60 },
    { name: 'Store Credit', count: 21, percentage: 30 },
    { name: 'Exchange', count: 7, percentage: 10 }
]

const requests = ref([
    { 
        id: 'RET-00142', 
        date: 'Dec 18, 2024', 
        orderId: '#OX-84729',
        customer: 'Sarah Mitchell', 
        email: 'sarah.m@email.com',
        product: 'Velvet Midnight Blazer', 
        variant: 'Black / M',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c',
        type: 'Return', 
        reason: 'Wrong Size', 
        status: 'Pending Review', 
        statusClass: 'bg-yellow-500/20 text-yellow-500' 
    },
    { 
        id: 'RET-00141', 
        date: 'Dec 17, 2024', 
        orderId: '#OX-84728',
        customer: 'James Wilson', 
        email: 'jwilson@email.com',
        product: 'OAX Silk Gown', 
        variant: 'Gold / S',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ',
        type: 'Exchange', 
        reason: 'Changed Mind', 
        status: 'Approved', 
        statusClass: 'bg-green-500/20 text-green-500' 
    },
    { 
        id: 'RET-00140', 
        date: 'Dec 16, 2024', 
        orderId: '#OX-84727',
        customer: 'Emma Thompson', 
        email: 'emma.t@email.com',
        product: 'Eco-Leather Trench', 
        variant: 'Brown / L',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy',
        type: 'Return', 
        reason: 'Not as Described', 
        status: 'In Transit', 
        statusClass: 'bg-blue-500/20 text-blue-500' 
    },
    { 
        id: 'RET-00139', 
        date: 'Dec 15, 2024', 
        orderId: '#OX-84726',
        customer: 'Michael Chen', 
        email: 'mchen@email.com',
        product: 'Sheer Mesh Top', 
        variant: 'Black / M',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA5sEmLEXjbmCnM6hq_C7mDaB0esOlpVbwnjc1Sip98w_aSRyTXXV62xyh0Bz23FpA7AO3_E_-E2GkXIyYmC4ueE3t24gEO7DBFsbmsgzIIh8U9R6-QzLufnF65tlJs70bnsDxEVXEUTgaIzoOrEGzr0S4MB4erdmxvWRVh5r9x_seLxRCcOtJ0UZHLJyucRpfEMxDnr-9ZsQ-uLwSTvix6CQ50XX_q6MmXb9fNxyfwse9NHnNOaT8UEiIMeyPvVoDIzClDR__Ywwir',
        type: 'Return', 
        reason: 'Defective', 
        status: 'Completed', 
        statusClass: 'bg-primary/20 text-primary' 
    }
])

const filteredRequests = computed(() => {
    return requests.value.filter(request => {
        const matchesSearch = !searchQuery.value || 
            request.id.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            request.customer.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            request.orderId.toLowerCase().includes(searchQuery.value.toLowerCase())
        
        const matchesType = !typeFilter.value || request.type.toLowerCase() === typeFilter.value
        const matchesStatus = !statusFilter.value || request.status.toLowerCase().replace(' ', '_') === statusFilter.value
        
        return matchesSearch && matchesType && matchesStatus
    })
})

const viewRequest = (request) => console.log('View:', request.id)
const approveRequest = (request) => {
    request.status = 'Approved'
    request.statusClass = 'bg-green-500/20 text-green-500'
}
const rejectRequest = (request) => {
    request.status = 'Rejected'
    request.statusClass = 'bg-red-500/20 text-red-500'
}
const issueRefund = (request) => {
    request.status = 'Completed'
    request.statusClass = 'bg-primary/20 text-primary'
}
</script>
