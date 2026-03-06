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
                <router-link to="/admin/products" class="flex items-center gap-3 px-4 py-3 rounded-lg bg-primary/10 text-primary font-medium"><span class="material-symbols-outlined">inventory_2</span>Products</router-link>
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
                <div class="flex items-center gap-4"><span class="material-symbols-outlined text-text-muted">search</span><input v-model="searchQuery" type="text" placeholder="Search products..." class="bg-transparent text-white placeholder-text-muted focus:outline-none w-64" /></div>
                <div class="flex items-center gap-4">
                    <button class="p-2 text-text-muted hover:text-white"><span class="material-symbols-outlined">notifications</span></button>
                    <div class="flex items-center gap-3 pl-4 border-l border-oax-border">
                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center text-white text-sm font-bold">A</div>
                    </div>
                </div>
            </header>
            <div class="flex-1 p-6">
                <!-- Top Bar -->
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-white">Products</h1>
                        <p class="text-text-muted text-sm mt-1">Manage your product catalog with variants and inventory</p>
                    </div>
                    <button @click="showAddProduct = true" class="bg-primary text-white px-4 py-2 rounded-lg font-medium flex items-center gap-2 hover:bg-primary-light"><span class="material-symbols-outlined">add</span>Add Product</button>
                </div>

                <!-- Filters & Bulk Actions -->
                <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
                    <div class="flex flex-wrap items-center gap-3">
                        <select v-model="categoryFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                            <option value="">All Categories</option>
                            <option value="Dresses">Dresses</option>
                            <option value="Outerwear">Outerwear</option>
                            <option value="Tops">Tops</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                        <select v-model="statusFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                            <option value="">All Status</option>
                            <option value="Active">Active</option>
                            <option value="Draft">Draft</option>
                        </select>
                        <select v-model="stockFilter" class="bg-oax-panel border border-oax-border rounded-lg px-4 py-2 text-white text-sm focus:outline-none focus:border-primary">
                            <option value="">All Stock</option>
                            <option value="in_stock">In Stock</option>
                            <option value="low_stock">Low Stock</option>
                            <option value="out_of_stock">Out of Stock</option>
                        </select>
                    </div>
                    <div v-if="selectedProducts.length > 0" class="flex items-center gap-2">
                        <span class="text-text-muted text-sm">{{ selectedProducts.length }} selected</span>
                        <button @click="bulkActivate" class="px-3 py-1.5 bg-green-500/20 text-green-500 rounded-lg text-sm">Activate</button>
                        <button @click="bulkDeactivate" class="px-3 py-1.5 bg-yellow-500/20 text-yellow-500 rounded-lg text-sm">Deactivate</button>
                        <button @click="bulkDelete" class="px-3 py-1.5 bg-red-500/20 text-red-500 rounded-lg text-sm">Delete</button>
                    </div>
                </div>

                <!-- Status Tabs -->
                <div class="bg-[#0a0808] rounded-xl border border-oax-border overflow-hidden mb-6">
                    <div class="p-4 border-b border-oax-border flex gap-4">
                        <button @click="tab = 'all'" :class="tab === 'all' ? 'bg-primary/10 text-primary' : 'text-text-muted hover:text-white'" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors">All ({{ products.length }})</button>
                        <button @click="tab = 'active'" :class="tab === 'active' ? 'bg-primary/10 text-primary' : 'text-text-muted hover:text-white'" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors">Active ({{ products.filter(p => p.status === 'Active').length }})</button>
                        <button @click="tab = 'draft'" :class="tab === 'draft' ? 'bg-primary/10 text-primary' : 'text-text-muted hover:text-white'" class="px-3 py-1.5 rounded-lg text-sm font-medium transition-colors">Draft ({{ products.filter(p => p.status === 'Draft').length }})</button>
                    </div>

                    <!-- Products Table -->
                    <table class="w-full">
                        <thead class="bg-oax-panel/30">
                            <tr>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">
                                    <input type="checkbox" v-model="selectAll" @change="toggleSelectAll" class="rounded border-oax-border bg-oax-panel" />
                                </th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Product</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Category</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Variants</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Price</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Stock</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Status</th>
                                <th class="text-left text-xs font-bold text-text-muted uppercase px-6 py-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="product in filteredProducts" :key="product.id" class="border-t border-oax-border/50 hover:bg-oax-panel/20">
                                <td class="px-6 py-4">
                                    <input type="checkbox" :value="product.id" v-model="selectedProducts" class="rounded border-oax-border bg-oax-panel" />
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <img :src="product.image" class="w-12 h-16 object-cover rounded" />
                                        <div>
                                            <p class="text-white font-medium">{{ product.name }}</p>
                                            <p class="text-text-muted text-xs">{{ product.sku }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-text-muted">{{ product.category }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex gap-1">
                                        <span v-for="variant in product.variants.slice(0, 3)" :key="variant.size" class="px-2 py-0.5 bg-oax-panel rounded text-xs text-text-muted">{{ variant.size }}</span>
                                        <span v-if="product.variants.length > 3" class="px-2 py-0.5 text-xs text-text-muted">+{{ product.variants.length - 3 }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-white font-bold">${{ product.price.toLocaleString() }}</p>
                                    <p v-if="product.salePrice" class="text-text-muted text-xs line-through">${{ product.salePrice.toLocaleString() }}</p>
                                </td>
                                <td class="px-6 py-4">
                                    <span :class="product.stock > 10 ? 'text-green-500' : product.stock > 0 ? 'text-yellow-500' : 'text-red-500'" class="font-medium">{{ product.stock }} units</span>
                                </td>
                                <td class="px-6 py-4">
                                    <button @click="toggleStatus(product)" :class="product.status === 'Active' ? 'bg-green-500/20 text-green-500' : 'bg-yellow-500/20 text-yellow-500'" class="px-2 py-1 rounded-full text-xs font-medium">{{ product.status }}</button>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-1">
                                        <button @click="editProduct(product)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">edit</span></button>
                                        <button @click="duplicateProduct(product)" class="text-text-muted hover:text-primary p-1"><span class="material-symbols-outlined">content_copy</span></button>
                                        <button @click="viewProduct(product)" class="text-text-muted hover:text-white p-1"><span class="material-symbols-outlined">visibility</span></button>
                                        <button @click="deleteProduct(product)" class="text-text-muted hover:text-red-500 p-1"><span class="material-symbols-outlined">delete</span></button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="flex items-center justify-between">
                    <p class="text-text-muted text-sm">Showing {{ filteredProducts.length }} of {{ products.length }} products</p>
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
const categoryFilter = ref('')
const statusFilter = ref('')
const stockFilter = ref('')
const tab = ref('all')
const selectedProducts = ref([])
const selectAll = ref(false)
const showAddProduct = ref(false)

const products = ref([
    { 
        id: 1, 
        name: 'Velvet Midnight Blazer', 
        category: 'Outerwear', 
        price: 1250, 
        salePrice: null,
        stock: 45, 
        status: 'Active', 
        sku: 'VMB-001-BLK',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c',
        variants: [
            { size: 'S', color: 'Black', stock: 12 },
            { size: 'M', color: 'Black', stock: 15 },
            { size: 'L', color: 'Black', stock: 10 },
            { size: 'XL', color: 'Black', stock: 8 }
        ],
        description: 'Luxurious velvet blazer with a modern silhouette'
    },
    { 
        id: 2, 
        name: 'OAX Silk Gown', 
        category: 'Dresses', 
        price: 1450, 
        salePrice: 1200,
        stock: 28, 
        status: 'Active', 
        sku: 'OSG-002-GLD',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ',
        variants: [
            { size: 'XS', color: 'Gold', stock: 5 },
            { size: 'S', color: 'Gold', stock: 8 },
            { size: 'M', color: 'Gold', stock: 10 },
            { size: 'L', color: 'Gold', stock: 5 }
        ],
        description: 'Elegant silk gown perfect for evening events'
    },
    { 
        id: 3, 
        name: 'Eco-Leather Trench', 
        category: 'Outerwear', 
        price: 2100, 
        salePrice: null,
        stock: 12, 
        status: 'Active', 
        sku: 'ELT-003-BRN',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy',
        variants: [
            { size: 'S', color: 'Brown', stock: 3 },
            { size: 'M', color: 'Brown', stock: 4 },
            { size: 'L', color: 'Brown', stock: 3 },
            { size: 'XL', color: 'Brown', stock: 2 }
        ],
        description: 'Sustainable leather trench coat'
    },
    { 
        id: 4, 
        name: 'Sheer Mesh Top', 
        category: 'Tops', 
        price: 320, 
        salePrice: null,
        stock: 3, 
        status: 'Active', 
        sku: 'SMT-004-BLK',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuA5sEmLEXjbmCnM6hq_C7mDaB0esOlpVbwnjc1Sip98w_aSRyTXXV62xyh0Bz23FpA7AO3_E_-E2GkXIyYmC4ueE3t24gEO7DBFsbmsgzIIh8U9R6-QzLufnF65tlJs70bnsDxEVXEUTgaIzoOrEGzr0S4MB4erdmxvWRVh5r9x_seLxRCcOtJ0UZHLJyucRpfEMxDnr-9ZsQ-uLwSTvix6CQ50XX_q6MmXb9fNxyfwse9NHnNOaT8UEiIMeyPvVoDIzClDR__Ywwir',
        variants: [
            { size: 'S', color: 'Black', stock: 1 },
            { size: 'M', color: 'Black', stock: 1 },
            { size: 'L', color: 'Black', stock: 1 }
        ],
        description: 'Translucent mesh top for layering'
    },
    { 
        id: 5, 
        name: 'Velvet Blazer (Draft)', 
        category: 'Outerwear', 
        price: 1100, 
        salePrice: null,
        stock: 0, 
        status: 'Draft', 
        sku: 'VBD-005-NVY',
        image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c',
        variants: [
            { size: 'M', color: 'Navy', stock: 0 },
            { size: 'L', color: 'Navy', stock: 0 }
        ],
        description: 'Draft version of velvet blazer in navy'
    }
])

const filteredProducts = computed(() => {
    return products.value.filter(product => {
        const matchesSearch = !searchQuery.value || 
            product.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            product.sku.toLowerCase().includes(searchQuery.value.toLowerCase())
        
        const matchesCategory = !categoryFilter.value || product.category === categoryFilter.value
        const matchesStatus = !statusFilter.value || product.status === statusFilter.value
        
        let matchesStock = true
        if (stockFilter.value === 'in_stock') matchesStock = product.stock > 10
        else if (stockFilter.value === 'low_stock') matchesStock = product.stock > 0 && product.stock <= 10
        else if (stockFilter.value === 'out_of_stock') matchesStock = product.stock === 0
        
        let matchesTab = true
        if (tab.value === 'active') matchesTab = product.status === 'Active'
        else if (tab.value === 'draft') matchesTab = product.status === 'Draft'
        
        return matchesSearch && matchesCategory && matchesStatus && matchesStock && matchesTab
    })
})

const toggleSelectAll = () => {
    if (selectAll.value) {
        selectedProducts.value = filteredProducts.value.map(p => p.id)
    } else {
        selectedProducts.value = []
    }
}

const toggleStatus = (product) => {
    product.status = product.status === 'Active' ? 'Draft' : 'Active'
}

const bulkActivate = () => {
    products.value.forEach(p => {
        if (selectedProducts.value.includes(p.id)) p.status = 'Active'
    })
    selectedProducts.value = []
    selectAll.value = false
}

const bulkDeactivate = () => {
    products.value.forEach(p => {
        if (selectedProducts.value.includes(p.id)) p.status = 'Draft'
    })
    selectedProducts.value = []
    selectAll.value = false
}

const bulkDelete = () => {
    products.value = products.value.filter(p => !selectedProducts.value.includes(p.id))
    selectedProducts.value = []
    selectAll.value = false
}

const editProduct = (product) => console.log('Edit:', product.id)
const duplicateProduct = (product) => console.log('Duplicate:', product.id)
const viewProduct = (product) => console.log('View:', product.id)
const deleteProduct = (product) => {
    products.value = products.value.filter(p => p.id !== product.id)
}
</script>
