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
                <div class="flex items-center gap-4"><span class="material-symbols-outlined text-text-muted">search</span><input v-model="searchQuery" type="text" placeholder="Search orders..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" /></div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button>
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div>
                </div>
            </header>
            <div class="flex-1 p-6">
                <!-- Page Header -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Fulfillment Center</h1>
                        <p class="text-text-muted text-sm mt-1">Process and manage order fulfillment</p>
                    </div>
                    <div class="flex gap-3">
                        <button class="bg-oax-panel text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 hover:bg-oax-panel/80">
                            <span class="material-symbols-outlined">inventory</span>
                            Generate Packing Slips
                        </button>
                        <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 hover:bg-primary-light">
                            <span class="material-symbols-outlined">local_shipping</span>
                            Create Shipment
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Pending Orders</p>
                            <span class="material-symbols-outlined text-yellow-500">hourglass_empty</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ pendingCount }}</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Processing</p>
                            <span class="material-symbols-outlined text-blue-500">sync</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ processingCount }}</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Ready to Ship</p>
                            <span class="material-symbols-outlined text-purple-500">inventory_2</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ readyToShipCount }}</p>
                    </div>
                    <div class="bg-[#0a0808] rounded-xl border border-oax-border p-5">
                        <div class="flex items-center justify-between mb-2">
                            <p class="text-text-muted text-sm">Shipped Today</p>
                            <span class="material-symbols-outlined text-green-500">local_shipping</span>
                        </div>
                        <p class="text-3xl font-bold text-white">{{ shippedTodayCount }}</p>
                    </div>
                </div>

                <!-- Workflow Pipeline -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6 mb-6">
                    <h3 class="text-white font-bold mb-4">Fulfillment Pipeline</h3>
                    <div class="flex items-center gap-4 overflow-x-auto pb-2">
                        <div v-for="stage in pipeline" :key="stage.name" class="flex-shrink-0">
                            <div :class="stage.bgClass" class="rounded-lg p-4 min-w-[200px] border-2" :style="{ borderColor: stage.color }">
                                <div class="flex items-center justify-between mb-2">
                                    <span :class="stage.textClass" class="font-bold">{{ stage.name }}</span>
                                    <span class="text-2xl font-bold" :class="stage.textClass">{{ stage.count }}</span>
                                </div>
                                <p class="text-xs text-text-muted">{{ stage.description }}</p>
                            </div>
                            <div v-if="stage.name !== 'Delivered'" class="flex justify-center mt-2">
                                <span class="material-symbols-outlined text-text-muted">arrow_forward</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="flex flex-wrap items-center gap-4 mb-6">
                    <select v-model="statusFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                        <option value="">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="ready">Ready to Ship</option>
                        <option value="shipped">Shipped</option>
                    </select>
                    <select v-model="carrierFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                        <option value="">All Carriers</option>
                        <option value="fedex">FedEx</option>
                        <option value="ups">UPS</option>
                        <option value="usps">USPS</option>
                        <option value="dhl">DHL</option>
                    </select>
                    <div class="flex items-center gap-2">
                        <label class="text-text-muted text-sm">Date Range:</label>
                        <input v-model="dateFrom" type="date" class="bg-oax-panel border border-oax-border rounded-lg px-3 py-2 text-white text-sm" />
                        <span class="text-text-muted">to</span>
                        <input v-model="dateTo" type="date" class="bg-oax-panel border border-oax-border rounded-lg px-3 py-2 text-white text-sm" />
                    </div>
                </div>

                <!-- Orders Table -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border overflow-hidden">
                    <table class="w-full">
                        <thead class="bg-oax-panel/30">
                            <tr>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">
                                    <input type="checkbox" v-model="selectAll" class="rounded border-oax-border bg-oax-panel" />
                                </th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Order</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Customer</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Items</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Status</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Carrier</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Tracking</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="order in filteredOrders" :key="order.id" class="border-t border-oax-border/50 hover:bg-oax-panel/20">
                                <td class="px-6 py-4">
                                    <input type="checkbox" v-model="selectedOrders" :value="order.id" class="rounded border-oax-border bg-oax-panel" />
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-white font-medium">{{ order.id }}</p>
                                    <p class="text-text-muted text-xs">{{ order.date }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-white">{{ order.customer }}</p>
                                    <p class="text-text-muted text-xs">{{ order.shippingAddress }}</p>
                                </td>
                                <td class="px-6 py-4 text-text-muted">{{ order.items }} items</td>
                                <td class="px-6 py-4">
                                    <span :class="order.statusClass" class="px-2 py-1 rounded-full text-xs font-medium">{{ order.status }}</span>
                                </td>
                                <td class="px-6 py-4 text-text-muted">{{ order.carrier || '—' }}</td>
                                <td class="px-6 py-4">
                                    <span v-if="order.tracking" class="text-primary text-sm hover:underline cursor-pointer">{{ order.tracking }}</span>
                                    <span v-else class="text-text-muted">—</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <button @click="viewOrder(order)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">visibility</span></button>
                                        <button @click="printPackingSlip(order)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">print</span></button>
                                        <button @click="createShipment(order)" class="text-text-muted hover:text-primary p-1"><span class="material-symbols-outlined">local_shipping</span></button>
                                        <button v-if="order.status !== 'Shipped'" @click="markShipped(order)" class="text-text-muted hover:text-green-500 p-1"><span class="material-symbols-outlined">check_circle</span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Bulk Actions -->
                <div v-if="selectedOrders.length > 0" class="fixed bottom-6 right-6 bg-[#0a0808] border border-oax-border rounded-xl p-4 shadow-xl">
                    <div class="flex items-center gap-4">
                        <span class="text-white text-sm">{{ selectedOrders.length }} orders selected</span>
                        <button @click="bulkPrintPackingSlips" class="px-3 py-1.5 bg-oax-panel text-white rounded-lg text-sm">Print Packing Slips</button>
                        <button @click="bulkCreateShipment" class="px-3 py-1.5 bg-primary text-white rounded-lg text-sm">Create Shipments</button>
                        <button @click="selectedOrders = []" class="text-text-muted hover:text-white"><span class="material-symbols-outlined">close</span></button>
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
const carrierFilter = ref('')
const dateFrom = ref('')
const dateTo = ref('')
const selectedOrders = ref([])
const selectAll = ref(false)

const pendingCount = 12
const processingCount = 8
const readyToShipCount = 15
const shippedTodayCount = 34

const pipeline = [
    { name: 'Pending', count: 12, description: 'Awaiting processing', color: '#EAB308', bgClass: 'bg-yellow-500/10', textClass: 'text-yellow-500' },
    { name: 'Processing', count: 8, description: 'Being picked & packed', color: '#3B82F6', bgClass: 'bg-blue-500/10', textClass: 'text-blue-500' },
    { name: 'Ready to Ship', count: 15, description: 'Awaiting pickup', color: '#A855F7', bgClass: 'bg-purple-500/10', textClass: 'text-purple-500' },
    { name: 'Shipped', count: 34, description: 'In transit', color: '#22C55E', bgClass: 'bg-green-500/10', textClass: 'text-green-500' },
    { name: 'Delivered', count: 156, description: 'Completed', color: '#6B7280', bgClass: 'bg-gray-500/10', textClass: 'text-gray-400' }
]

const orders = ref([
    { id: '#OX-84729', customer: 'Sarah Mitchell', date: 'Dec 18, 2024', items: 3, status: 'Pending', statusClass: 'bg-yellow-500/20 text-yellow-500', shippingAddress: '123 Main St, New York, NY', carrier: '', tracking: '' },
    { id: '#OX-84728', customer: 'James Wilson', date: 'Dec 18, 2024', items: 2, status: 'Processing', statusClass: 'bg-blue-500/20 text-blue-500', shippingAddress: '456 Oak Ave, Los Angeles, CA', carrier: '', tracking: '' },
    { id: '#OX-84727', customer: 'Emma Thompson', date: 'Dec 17, 2024', items: 4, status: 'Ready to Ship', statusClass: 'bg-purple-500/20 text-purple-500', shippingAddress: '789 Pine Rd, Chicago, IL', carrier: 'FedEx', tracking: 'FX123456789' },
    { id: '#OX-84726', customer: 'Michael Chen', date: 'Dec 17, 2024', items: 1, status: 'Shipped', statusClass: 'bg-green-500/20 text-green-500', shippingAddress: '321 Elm St, Houston, TX', carrier: 'UPS', tracking: '1Z999AA10123456784' },
    { id: '#OX-84725', customer: 'Lisa Anderson', date: 'Dec 16, 2024', items: 2, status: 'Shipped', statusClass: 'bg-green-500/20 text-green-500', shippingAddress: '654 Maple Dr, Phoenix, AZ', carrier: 'USPS', tracking: '9400111899223387629001' },
    { id: '#OX-84724', customer: 'David Brown', date: 'Dec 15, 2024', items: 5, status: 'Pending', statusClass: 'bg-yellow-500/20 text-yellow-500', shippingAddress: '987 Cedar Ln, San Diego, CA', carrier: '', tracking: '' }
])

const filteredOrders = computed(() => {
    return orders.value.filter(order => {
        const matchesSearch = !searchQuery.value || 
            order.id.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            order.customer.toLowerCase().includes(searchQuery.value.toLowerCase())
        
        const matchesStatus = !statusFilter.value || order.status.toLowerCase().replace(' ', '_') === statusFilter.value
        const matchesCarrier = !carrierFilter.value || order.carrier?.toLowerCase() === carrierFilter.value
        
        return matchesSearch && matchesStatus && matchesCarrier
    })
})

const viewOrder = (order) => console.log('View:', order.id)
const printPackingSlip = (order) => console.log('Print:', order.id)
const createShipment = (order) => console.log('Ship:', order.id)
const markShipped = (order) => {
    order.status = 'Shipped'
    order.statusClass = 'bg-green-500/20 text-green-500'
}
const bulkPrintPackingSlips = () => console.log('Bulk print:', selectedOrders.value)
const bulkCreateShipment = () => console.log('Bulk ship:', selectedOrders.value)
</script>
