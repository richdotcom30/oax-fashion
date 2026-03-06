<template>
    <div class="flex flex-col min-h-screen">
        <!-- Top Navigation -->
        <div class="sticky top-0 z-50 flex items-center justify-between whitespace-nowrap border-b border-solid border-oax-border bg-oax-dark/95 backdrop-blur-md px-6 py-4 lg:px-10">
            <div class="flex items-center gap-8">
                <router-link to="/" class="flex items-center gap-4 text-white cursor-pointer">
                    <div class="size-8 text-primary">
                        <svg fill="currentColor" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 class="text-white text-xl font-bold tracking-tight">OAX FASHION</h2>
                </router-link>
            </div>
            <div class="flex flex-1 justify-end gap-6 items-center">
                <div class="flex gap-2">
                    <router-link to="/cart" class="relative p-2 rounded-lg hover:bg-oax-panel transition-colors text-white">
                        <span class="material-symbols-outlined">shopping_bag</span>
                    </router-link>
                    <router-link to="/account" class="p-2 rounded-lg hover:bg-oax-panel transition-colors text-white">
                        <span class="material-symbols-outlined">person</span>
                    </router-link>
                </div>
            </div>
        </div>

        <!-- Progress Steps -->
        <div class="border-b border-oax-border">
            <div class="max-w-4xl mx-auto px-4 md:px-8 py-4">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-2" :class="step >= 1 ? 'text-primary' : 'text-text-muted'">
                        <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold border-2" :class="step >= 1 ? 'bg-primary border-primary text-white' : 'border-oax-border'">1</span>
                        <span class="text-sm font-medium hidden sm:block">Shipping</span>
                    </div>
                    <div class="flex-1 h-px bg-oax-border mx-4" :class="step >= 2 ? 'bg-primary' : ''"></div>
                    <div class="flex items-center gap-2" :class="step >= 2 ? 'text-primary' : 'text-text-muted'">
                        <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold border-2" :class="step >= 2 ? 'bg-primary border-primary text-white' : 'border-oax-border'">2</span>
                        <span class="text-sm font-medium hidden sm:block">Payment</span>
                    </div>
                    <div class="flex-1 h-px bg-oax-border mx-4" :class="step >= 3 ? 'bg-primary' : ''"></div>
                    <div class="flex items-center gap-2" :class="step >= 3 ? 'text-primary' : 'text-text-muted'">
                        <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold border-2" :class="step >= 3 ? 'bg-primary border-primary text-white' : 'border-oax-border'">3</span>
                        <span class="text-sm font-medium hidden sm:block">Confirm</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <main class="flex-1 w-full max-w-[1440px] mx-auto px-4 md:px-8 py-8 lg:py-12">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-16">
                <!-- Form Section -->
                <div class="lg:col-span-2">
                    <!-- Step 1: Shipping -->
                    <div v-if="step === 1">
                        <h2 class="text-2xl font-bold text-white mb-6">Shipping Information</h2>
                        <form @submit.prevent="step = 2" class="space-y-4">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-text-muted mb-2">First Name</label>
                                    <input type="text" v-model="shipping.firstName" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                                </div>
                                <div>
                                    <label class="block text-sm text-text-muted mb-2">Last Name</label>
                                    <input type="text" v-model="shipping.lastName" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-text-muted mb-2">Email</label>
                                <input type="email" v-model="shipping.email" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                            </div>
                            <div>
                                <label class="block text-sm text-text-muted mb-2">Phone</label>
                                <input type="tel" v-model="shipping.phone" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                            </div>
                            <div>
                                <label class="block text-sm text-text-muted mb-2">Address</label>
                                <input type="text" v-model="shipping.address" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-text-muted mb-2">City</label>
                                    <input type="text" v-model="shipping.city" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                                </div>
                                <div>
                                    <label class="block text-sm text-text-muted mb-2">Postal Code</label>
                                    <input type="text" v-model="shipping.postalCode" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-text-muted mb-2">Country</label>
                                <select v-model="shipping.country" required class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none">
                                    <option value="">Select Country</option>
                                    <option value="US">United States</option>
                                    <option value="UK">United Kingdom</option>
                                    <option value="FR">France</option>
                                    <option value="DE">Germany</option>
                                    <option value="IT">Italy</option>
                                    <option value="JP">Japan</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-primary text-white py-4 rounded-lg font-bold uppercase tracking-wider hover:bg-primary-light transition-colors mt-6">
                                Continue to Payment
                            </button>
                        </form>
                    </div>

                    <!-- Step 2: Payment -->
                    <div v-if="step === 2">
                        <h2 class="text-2xl font-bold text-white mb-6">Payment Method</h2>
                        <div class="space-y-4">
                            <div 
                                v-for="method in paymentMethods" 
                                :key="method.id"
                                @click="selectedPayment = method.id"
                                class="p-4 rounded-lg border cursor-pointer transition-all"
                                :class="selectedPayment === method.id ? 'border-primary bg-primary/10' : 'border-oax-border hover:border-white'"
                            >
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <input type="radio" :checked="selectedPayment === method.id" class="w-4 h-4 accent-primary" />
                                        <div>
                                            <p class="font-bold text-white">{{ method.name }}</p>
                                            <p class="text-sm text-text-muted">{{ method.description }}</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <span v-for="icon in method.icons" :key="icon" class="text-2xl">{{ icon }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Installment Options -->
                        <div v-if="selectedPayment === 'card'" class="mt-6 p-4 bg-oax-panel/50 rounded-lg">
                            <p class="text-sm text-text-muted mb-3">Split your payment:</p>
                            <div class="flex gap-3">
                                <button class="flex-1 p-3 border border-oax-border rounded-lg text-center hover:border-primary transition-colors">
                                    <p class="text-white font-bold">Pay in 4</p>
                                    <p class="text-xs text-text-muted">${{ Math.round(cartStore.total / 4) }}/mo</p>
                                </button>
                                <button class="flex-1 p-3 border border-oax-border rounded-lg text-center hover:border-primary transition-colors">
                                    <p class="text-white font-bold">Pay in 3</p>
                                    <p class="text-xs text-text-muted">${{ Math.round(cartStore.total / 3) }}/mo</p>
                                </button>
                                <button class="flex-1 p-3 border border-oax-border rounded-lg text-center hover:border-primary transition-colors">
                                    <p class="text-white font-bold">Pay in 6</p>
                                    <p class="text-xs text-text-muted">${{ Math.round(cartStore.total / 6) }}/mo</p>
                                </button>
                            </div>
                        </div>

                        <!-- Card Form -->
                        <div v-if="selectedPayment === 'card'" class="mt-6 space-y-4">
                            <div>
                                <label class="block text-sm text-text-muted mb-2">Card Number</label>
                                <input type="text" placeholder="1234 5678 9012 3456" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-text-muted mb-2">Expiry Date</label>
                                    <input type="text" placeholder="MM/YY" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                                </div>
                                <div>
                                    <label class="block text-sm text-text-muted mb-2">CVC</label>
                                    <input type="text" placeholder="123" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-text-muted mb-2">Name on Card</label>
                                <input type="text" class="w-full bg-oax-panel border border-oax-border rounded-lg px-4 py-3 text-white focus:border-primary focus:outline-none" />
                            </div>
                        </div>

                        <div class="flex gap-4 mt-6">
                            <button @click="step = 1" class="flex-1 border border-oax-border text-white py-4 rounded-lg font-bold uppercase tracking-wider hover:border-white transition-colors">
                                Back
                            </button>
                            <button @click="step = 3" class="flex-1 bg-primary text-white py-4 rounded-lg font-bold uppercase tracking-wider hover:bg-primary-light transition-colors">
                                Review Order
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Confirmation -->
                    <div v-if="step === 3">
                        <h2 class="text-2xl font-bold text-white mb-6">Confirm Order</h2>
                        
                        <div class="space-y-6">
                            <div class="p-4 bg-oax-panel/50 rounded-lg">
                                <h3 class="font-bold text-white mb-2">Shipping Address</h3>
                                <p class="text-gray-300">{{ shipping.firstName }} {{ shipping.lastName }}</p>
                                <p class="text-gray-300">{{ shipping.address }}</p>
                                <p class="text-gray-300">{{ shipping.city }}, {{ shipping.postalCode }}</p>
                                <p class="text-gray-300">{{ shipping.country }}</p>
                                <button @click="step = 1" class="text-primary text-sm hover:underline mt-2">Edit</button>
                            </div>
                            
                            <div class="p-4 bg-oax-panel/50 rounded-lg">
                                <h3 class="font-bold text-white mb-2">Payment Method</h3>
                                <p class="text-gray-300">{{ paymentMethods.find(m => m.id === selectedPayment)?.name }}</p>
                                <button @click="step = 2" class="text-primary text-sm hover:underline mt-2">Edit</button>
                            </div>
                        </div>

                        <div class="flex gap-4 mt-6">
                            <button @click="step = 2" class="flex-1 border border-oax-border text-white py-4 rounded-lg font-bold uppercase tracking-wider hover:border-white transition-colors">
                                Back
                            </button>
                            <button @click="placeOrder" class="flex-1 bg-primary text-white py-4 rounded-lg font-bold uppercase tracking-wider hover:bg-primary-light transition-colors">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Sidebar -->
                <div class="lg:col-span-1">
                    <div class="sticky top-28 bg-oax-panel/30 rounded-xl border border-oax-border/50 p-6">
                        <h2 class="text-xl font-bold text-white mb-4">Order Summary</h2>
                        
                        <div class="space-y-3 mb-4">
                            <div v-for="item in cartStore.items" :key="item.id" class="flex gap-3">
                                <img :src="item.image" :alt="item.name" class="w-16 h-20 object-cover rounded" />
                                <div class="flex-1">
                                    <p class="text-sm text-white font-medium">{{ item.name }}</p>
                                    <p class="text-xs text-text-muted">Size: {{ item.size }} | Qty: {{ item.quantity }}</p>
                                    <p class="text-sm text-primary font-bold">${{ (item.price * item.quantity).toLocaleString() }}</p>
                                </div>
                            </div>
                        </div>

                        <hr class="border-oax-border my-4" />
                        
                        <div class="space-y-2">
                            <div class="flex justify-between text-gray-300 text-sm">
                                <span>Subtotal</span>
                                <span>${{ cartStore.subtotal.toLocaleString() }}</span>
                            </div>
                            <div class="flex justify-between text-gray-300 text-sm">
                                <span>Shipping</span>
                                <span class="text-green-500">Complimentary</span>
                            </div>
                            <div class="flex justify-between text-gray-300 text-sm">
                                <span>Tax</span>
                                <span>${{ cartStore.tax.toLocaleString() }}</span>
                            </div>
                            <hr class="border-oax-border" />
                            <div class="flex justify-between text-xl font-bold text-white">
                                <span>Total</span>
                                <span>${{ cartStore.total.toLocaleString() }}</span>
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
import { useRouter } from 'vue-router'
import { useCartStore } from '../stores/cart'

const router = useRouter()
const cartStore = useCartStore()

const step = ref(1)
const selectedPayment = ref('card')

const shipping = ref({
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    address: '',
    city: '',
    postalCode: '',
    country: ''
})

const paymentMethods = [
    { id: 'card', name: 'Credit/Debit Card', description: 'Visa, Mastercard, Amex', icons: ['💳'] },
    { id: 'klarna', name: 'Klarna', description: 'Pay in 4 interest-free payments', icons: ['💳'] },
    { id: 'afterpay', name: 'Afterpay', description: 'Pay in 4 interest-free payments', icons: ['💳'] },
    { id: 'paypal', name: 'PayPal', description: 'Fast and secure checkout', icons: ['🅿️'] }
]

const placeOrder = () => {
    router.push('/order-confirmation')
}
</script>
