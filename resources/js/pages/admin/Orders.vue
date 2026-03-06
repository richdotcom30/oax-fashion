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
                <router-link to="/admin/orders" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary/10 text-primary font-medium"><span class="material-symbols-outlined">receipt_long</span>Orders</router-link>
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
                <div class="flex items-center gap-4"><span class="material-symbols-outlined text-text-muted">search</span><input v-model="searchQuery" type="text" placeholder="Search orders..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" /></div>
                <div class="flex items-center gap-4"><button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button><div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div></div>
            </header>
            <div class="flex-1 p-6">
                <!-- Filters & Actions Bar -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Status Filter -->
                        <select v-model="statusFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                            <option value="">All Status</option>
                            <option value="Pending">Pending</option>
                            <option value="Processing">Processing</option>
                            <option value="Shipped">Shipped</option>
                            <option value="Delivered">Delivered</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <!-- Date Range -->
                        <input v-model="dateFrom" type="date" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary" />
                        <span class="text-text-muted">to</span>
                        <input v-model="dateTo" type="date" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary" />
                    </div>
                    <div class="flex items-center gap-3">
                        <!-- Bulk Actions -->
                        <div v-if="selectedOrders.length > 0" class="flex items-center gap-2">
                            <span class="text-text-muted text-sm">{{ selectedOrders.length }} selected</span>
                            <button @click="bulkUpdateStatus('Processing')" class="px-3 py-1.5 bg-blue-500/20 text-blue-500 rounded-lg text-sm hover:bg-blue-500/30">Mark Processing</button>
                            <button @click="bulkUpdateStatus('Shipped')" class="px-3 py-1.5 bg-purple-500/20 text-purple-500 rounded-lg text-sm hover:bg-purple-500/30">Mark Shipped</button>
                            <button @click="bulkUpdateStatus('Delivered')" class="px-3 py-1.5 bg-green-500/20 text-green-500 rounded-lg text-sm hover:bg-green-500/30">Mark Delivered</button>
                        </div>
                        <button class="px-4 py-2 bg-primary text-white rounded-lg text-sm font-medium hover:bg-primary/90">Export</button>
                    </div>
                </div>

                <!-- Order Stats -->
                <div class="grid grid-cols-5 gap-4 mb-6">
                    <div v-for="stat in orderStats" :key="stat.label" class="bg-[#0a0808] rounded-lg border border-oax-border p-4">
                        <p class="text-text-muted text-xs uppercase">{{ stat.label }}</p>
                        <p class="text-2xl font-bold text-white">{{ stat.value }}</p>
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-oax-panel/30">
                            <tr>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">
                                    <input type="checkbox" v-model="selectAll" @change="toggleSelectAll" class="rounded border-oax-border bg-oax-panel" />
                                </th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Order ID</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Customer</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Date</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Items</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Status</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Total</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in filteredOrders" :key="order.id" class="border-t border-oax-border/50 hover:bg-oax-panel/20">
                                <td class="px-6 py-4">
                                    <input type="checkbox" :value="order.id" v-model="selectedOrders" class="rounded border-oax-border bg-oax-panel" />
                                </td>
                                <td class="px-6 py-4 text-white font-medium">{{ order.id }}</td>
                                <td class="px-6 py-4">
                                    <div>
                                        <p class="text-white">{{ order.customer }}</p>
                                        <p class="text-text-muted text-xs">{{ order.email }}</p>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-text-muted">{{ order.date }}</td>
                                <td class="px-6 py-4 text-text-muted">{{ order.items }}</td>
                                <td class="px-6 py-4">
                                    <select v-model="order.status" @change="updateOrderStatus(order)" :class="order.statusClass" class="px-2 py-1 rounded-full text-xs font-medium bg-transparent border-0 cursor-pointer focus:outline-none">
                                        <option value="Pending" class="bg-yellow-500/20 text-yellow-500">Pending</option>
                                        <option value="Processing" class="bg-blue-500/20 text-blue-500">Processing</option>
                                        <option value="Shipped" class="bg-purple-500/20 text-purple-500">Shipped</option>
                                        <option value="Delivered" class="bg-green-500/20 text-green-500">Delivered</option>
                                        <option value="Cancelled" class="bg-red-500/20 text-red-500">Cancelled</option>
                                    </select>
                                </td>
                                <td class="px-6 py-4 text-white font-bold">{{ order.total }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-2">
                                        <button @click="viewOrder(order)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">visibility</span></button>
                                        <button @click="editOrder(order)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">edit</span></button>
                                        <button @click="printOrder(order)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">print</span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between mt-6">
                    <p class="text-text-muted text-sm">Showing {{ filteredOrders.length }} of {{ orders.length }} orders</p>
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
const statusFilter = ref('')
const dateFrom = ref('')
const dateTo = ref('')
const selectedOrders = ref([])
const selectAll = ref(false)

const statusClasses = {
    'Pending': 'bg-yellow-500/20 text-yellow-500',
    'Processing': 'bg-blue-500/20 text-blue-500',
    'Shipped': 'bg-purple-500/20 text-purple-500',
    'Delivered': 'bg-green-500/20 text-green-500',
    'Cancelled': 'bg-red-500/20 text-red-500'
}

const orders = ref([
    { id: '#OX-84729', customer: 'Sarah Mitchell', email: 'sarah.m@email.com', date: 'Dec 18, 2024', items: 3, status: 'Processing', statusClass: 'bg-blue-500/20 text-blue-500', total: '$1,245', shippingAddress: '123 Main St, New York, NY' },
    { id: '#OX-84728', customer: 'James Wilson', email: 'james.w@email.com', date: 'Dec 18, 2024', items: 2, status: 'Shipped', statusClass: 'bg-purple-500/20 text-purple-500', total: '$890', shippingAddress: '456 Oak Ave, Los Angeles, CA' },
    { id: '#OX-84727', customer: 'Emma Thompson', email: 'emma.t@email.com', date: 'Dec 17, 2024', items: 4, status: 'Delivered', statusClass: 'bg-green-500/20 text-green-500', total: '$2,340', shippingAddress: '789 Pine Rd, Chicago, IL' },
    { id: '#OX-84726', customer: 'Michael Chen', email: 'michael.c@email.com', date: 'Dec 17, 2024', items: 1, status: 'Pending', statusClass: 'bg-yellow-500/20 text-yellow-500', total: '$567', shippingAddress: '321 Elm St, Houston, TX' },
    { id: '#OX-84725', customer: 'Lisa Anderson', email: 'lisa.a@email.com', date: 'Dec 16, 2024', items: 2, status: 'Cancelled', statusClass: 'bg-red-500/20 text-red-500', total: '$780', shippingAddress: '654 Maple Dr, Phoenix, AZ' },
    { id: '#OX-84724', customer: 'David Brown', email: 'david.b@email.com', date: 'Dec 15, 2024', items: 5, status: 'Delivered', statusClass: 'bg-green-500/20 text-green-500', total: '$3,120', shippingAddress: '987 Cedar Ln, San Diego, CA' },
    { id: '#OX-84723', customer: 'Jennifer Lee', email: 'jennifer.l@email.com', date: 'Dec 14, 2024', items: 1, status: 'Shipped', statusClass: 'bg-purple-500/20 text-purple-500', total: '$445', shippingAddress: '147 Birch St, Dallas, TX' },
    { id: '#OX-84722', customer: 'Robert Taylor', email: 'robert.t@email.com', date: 'Dec 13, 2024', items: 3, status: 'Processing', statusClass: 'bg-blue-500/20 text-blue-500', total: '$1,890', shippingAddress: '258 Walnut Ave, San Jose, CA' }
])

const orderStats = computed(() => {
    return [
        { label: 'Total Orders', value: orders.value.length },
        { label: 'Pending', value: orders.value.filter(o => o.status === 'Pending').length },
        { label: 'Processing', value: orders.value.filter(o => o.status === 'Processing').length },
        { label: 'Shipped', value: orders.value.filter(o => o.status === 'Shipped').length },
        { label: 'Delivered', value: orders.value.filter(o => o.status === 'Delivered').length }
    ]
})

const filteredOrders = computed(() => {
    return orders.value.filter(order => {
        const matchesSearch = !searchQuery.value || 
            order.id.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            order.customer.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            order.email.toLowerCase().includes(searchQuery.value.toLowerCase())
        
        const matchesStatus = !statusFilter.value || order.status === statusFilter.value
        
        return matchesSearch && matchesStatus
    })
})

const toggleSelectAll = () => {
    if (selectAll.value) {
        selectedOrders.value = filteredOrders.value.map(o => o.id)
    } else {
        selectedOrders.value = []
    }
}

const updateOrderStatus = (order) => {
    order.statusClass = statusClasses[order.status]
    console.log(`Order ${order.id} status updated to ${order.status}`)
}

const bulkUpdateStatus = (newStatus) => {
    orders.value.forEach(order => {
        if (selectedOrders.value.includes(order.id)) {
            order.status = newStatus
            order.statusClass = statusClasses[newStatus]
        }
    })
    selectedOrders.value = []
    selectAll.value = false
}

const viewOrder = (order) => {
    console.log('View order:', order.id)
}

const editOrder = (order) => {
    console.log('Edit order:', order.id)
}

const printOrder = (order) => {
    console.log('Print order:', order.id)
}
</script>
