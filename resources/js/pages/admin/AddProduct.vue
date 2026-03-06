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
                <div class="flex items-center gap-4">
                    <router-link to="/admin/products" class="text-text-muted hover:text-white"><span class="material-symbols-outlined">arrow_back</span></router-link>
                    <h2 class="text-white font-bold">Add New Product</h2>
                </div>
                <div class="flex items-center gap-4">
                    <button @click="saveDraft" class="text-text-muted hover:text-white px-4 py-2">Save Draft</button>
                    <button @click="publishProduct" class="bg-primary text-white px-4 py-2 rounded-lg font-medium hover:bg-primary-light">Publish Product</button>
                </div>
            </header>
            <div class="flex-1 p-6 overflow-y-auto">
                <!-- Step Indicator -->
                <div class="flex items-center gap-4 mb-8">
                    <div v-for="(step, idx) in steps" :key="step.number" class="flex items-center">
                        <div :class="step.number <= currentStep ? 'bg-primary text-white' : 'bg-oax-panel text-text-muted'" class="w-8 h-8 rounded-full flex items-center justify-center font-bold text-sm">{{ step.number }}</div>
                        <span :class="step.number <= currentStep ? 'text-white' : 'text-text-muted'" class="ml-2 text-sm">{{ step.label }}</span>
                        <span v-if="idx < steps.length - 1" class="ml-4 text-text-muted">→</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <!-- Main Content -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Basic Info -->
                        <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                            <h3 class="text-white font-bold mb-4">Basic Information</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Product Name *</label>
                                    <input v-model="product.name" type="text" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="Enter product name" />
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Slug *</label>
                                    <input v-model="product.slug" type="text" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="product-slug" />
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Description</label>
                                    <textarea v-model="product.description" rows="6" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="Product description..."></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                            <h3 class="text-white font-bold mb-4">Pricing</h3>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Regular Price *</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted">$</span>
                                        <input v-model="product.price" type="number" class="w-full bg-oax-panel border border-oax-border rounded-lg pl-8 pr-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="0.00" />
                                    </div>
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Sale Price</label>
                                    <div class="relative">
                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 text-text-muted">$</span>
                                        <input v-model="product.salePrice" type="number" class="w-full bg-oax-panel border border-oax-border rounded-lg pl-8 pr-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="0.00" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="flex items-center gap-2 text-text-muted text-sm cursor-pointer">
                                    <input type="checkbox" v-model="product.taxable" class="rounded border-oax-border bg-oax-panel" />
                                    Charge tax on this product
                                </label>
                            </div>
                        </div>

                        <!-- Media -->
                        <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                            <h3 class="text-white font-bold mb-4">Product Media</h3>
                            <div class="border-2 border-dashed border-oax-border rounded-xl p-8 text-center">
                                <span class="material-symbols-outlined text-4xl text-text-muted">cloud_upload</span>
                                <p class="text-white mt-2">Drag and drop images here</p>
                                <p class="text-text-muted text-sm mt-1">or click to browse</p>
                                <p class="text-text-muted text-xs mt-2">PNG, JPG up to 10MB</p>
                            </div>
                            <div class="grid grid-cols-4 gap-3 mt-4">
                                <div v-for="(img, idx) in product.images" :key="idx" class="relative aspect-square bg-oax-panel rounded-lg overflow-hidden">
                                    <img :src="img" class="w-full h-full object-cover" />
                                    <button @click="removeImage(idx)" class="absolute top-1 right-1 bg-red-500 text-white rounded-full p-1"><span class="material-symbols-outlined text-sm">close</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="space-y-6">
                        <!-- Organization -->
                        <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                            <h3 class="text-white font-bold mb-4">Organization</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Status</label>
                                    <select v-model="product.status" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary">
                                        <option value="draft">Draft</option>
                                        <option value="active">Active</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Category *</label>
                                    <select v-model="product.category" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary">
                                        <option value="">Select category</option>
                                        <option value="dresses">Dresses</option>
                                        <option value="outerwear">Outerwear</option>
                                        <option value="tops">Tops</option>
                                        <option value="accessories">Accessories</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Tags</label>
                                    <input v-model="product.tags" type="text" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="Add tags, comma separated" />
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Brand</label>
                                    <input v-model="product.brand" type="text" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="Brand name" />
                                </div>
                            </div>
                        </div>

                        <!-- Inventory -->
                        <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                            <h3 class="text-white font-bold mb-4">Inventory</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">SKU *</label>
                                    <input v-model="product.sku" type="text" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="SKU-001" />
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Barcode (ISBN, UPC, etc.)</label>
                                    <input v-model="product.barcode" type="text" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="Barcode number" />
                                </div>
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Quantity</label>
                                    <input v-model="product.quantity" type="number" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="0" />
                                </div>
                                <label class="flex items-center gap-2 text-text-muted text-sm cursor-pointer">
                                    <input type="checkbox" v-model="product.trackQuantity" class="rounded border-oax-border bg-oax-panel" />
                                    Track quantity
                                </label>
                                <label class="flex items-center gap-2 text-text-muted text-sm cursor-pointer">
                                    <input type="checkbox" v-model="product.allowBackorder" class="rounded border-oax-border bg-oax-panel" />
                                    Allow backorders
                                </label>
                            </div>
                        </div>

                        <!-- Shipping -->
                        <div class="bg-[#0a0808] rounded-xl border border-oax-border p-6">
                            <h3 class="text-white font-bold mb-4">Shipping</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="text-text-muted text-sm block mb-2">Weight (kg)</label>
                                    <input v-model="product.weight" type="number" step="0.1" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary" placeholder="0.0" />
                                </div>
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label class="text-text-muted text-sm block mb-2">Length</label>
                                        <input v-model="product.length" type="number" class="w-full bg-oax-panel border border-oax-border rounded-lg px-3 py-2 text-white focus:outline-none focus:border-primary" placeholder="0" />
                                    </div>
                                    <div>
                                        <label class="text-text-muted text-sm block mb-2">Width</label>
                                        <input v-model="product.width" type="number" class="w-full bg-oax-panel border border-oax-border rounded-lg px-3 py-2 text-white focus:outline-none focus:border-primary" placeholder="0" />
                                    </div>
                                    <div>
                                        <label class="text-text-muted text-sm block mb-2">Height</label>
                                        <input v-model="product.height" type="number" class="w-full bg-oax-panel border border-oax-border rounded-lg px-3 py-2 text-white focus:outline-none focus:border-primary" placeholder="0" />
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
import { ref } from 'vue'

const currentStep = ref(1)

const steps = [
    { number: 1, label: 'Basic Info' },
    { number: 2, label: 'Variants' },
    { number: 3, label: 'Review' }
]

const product = ref({
    name: '',
    slug: '',
    description: '',
    price: '',
    salePrice: '',
    taxable: true,
    images: [],
    status: 'draft',
    category: '',
    tags: '',
    brand: '',
    sku: '',
    barcode: '',
    quantity: '',
    trackQuantity: true,
    allowBackorder: false,
    weight: '',
    length: '',
    width: '',
    height: ''
})

const removeImage = (idx) => {
    product.value.images.splice(idx, 1)
}

const saveDraft = () => {
    console.log('Save draft:', product.value)
}

const publishProduct = () => {
    console.log('Publish:', product.value)
}
</script>
