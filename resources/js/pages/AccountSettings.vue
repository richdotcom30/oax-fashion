<template>
    <div class="min-h-screen bg-gray-50 dark:bg-oax-dark">
        <div class="max-w-7xl mx-auto px-6 py-12">
            <h1 class="font-serif text-3xl text-gray-900 dark:text-white mb-8">Account Settings</h1>
            
            <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                <!-- Sidebar -->
                <div class="lg:col-span-1">
                    <nav class="space-y-2">
                        <button v-for="tab in tabs" :key="tab.id" @click="activeTab = tab.id"
                            class="w-full text-left px-4 py-3 rounded-lg transition-colors"
                            :class="activeTab === tab.id ? 'bg-primary text-white' : 'bg-white dark:bg-oax-panel text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-oax-border'">
                            <span class="flex items-center gap-3">
                                <span class="material-symbols-outlined">{{ tab.icon }}</span>
                                {{ tab.name }}
                            </span>
                        </button>
                    </nav>
                </div>

                <!-- Content -->
                <div class="lg:col-span-3">
                    <!-- Profile -->
                    <div v-if="activeTab === 'profile'" class="bg-white dark:bg-oax-panel rounded-xl p-8">
                        <h2 class="text-xl font-medium mb-6">Profile Information</h2>
                        <form @submit.prevent="saveProfile" class="space-y-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label class="block text-sm font-medium mb-2">First Name</label>
                                    <input v-model="profile.firstName" type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-oax-border bg-gray-50 dark:bg-oax-dark"/>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium mb-2">Last Name</label>
                                    <input v-model="profile.lastName" type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-oax-border bg-gray-50 dark:bg-oax-dark"/>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Email</label>
                                <input v-model="profile.email" type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-oax-border bg-gray-50 dark:bg-oax-dark"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Phone</label>
                                <input v-model="profile.phone" type="tel" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-oax-border bg-gray-50 dark:bg-oax-dark"/>
                            </div>
                            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-oax-blood transition-colors">Save Changes</button>
                        </form>
                    </div>

                    <!-- Password -->
                    <div v-if="activeTab === 'password'" class="bg-white dark:bg-oax-panel rounded-xl p-8">
                        <h2 class="text-xl font-medium mb-6">Change Password</h2>
                        <form @submit.prevent="changePassword" class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium mb-2">Current Password</label>
                                <input v-model="passwords.current" type="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-oax-border bg-gray-50 dark:bg-oax-dark"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">New Password</label>
                                <input v-model="passwords.new" type="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-oax-border bg-gray-50 dark:bg-oax-dark"/>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Confirm New Password</label>
                                <input v-model="passwords.confirm" type="password" class="w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-oax-border bg-gray-50 dark:bg-oax-dark"/>
                            </div>
                            <button type="submit" class="bg-primary text-white px-6 py-3 rounded-lg font-medium hover:bg-oax-blood transition-colors">Update Password</button>
                        </form>
                    </div>

                    <!-- Addresses -->
                    <div v-if="activeTab === 'addresses'" class="bg-white dark:bg-oax-panel rounded-xl p-8">
                        <div class="flex justify-between items-center mb-6">
                            <h2 class="text-xl font-medium">Saved Addresses</h2>
                            <button @click="addAddress" class="text-primary font-medium">+ Add New</button>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div v-for="(address, index) in addresses" :key="index" class="border border-gray-200 dark:border-oax-border rounded-lg p-4">
                                <p class="font-medium">{{ address.name }}</p>
                                <p class="text-gray-500 text-sm mt-1">{{ address.street }}</p>
                                <p class="text-gray-500 text-sm">{{ address.city }}, {{ address.state }} {{ address.zip }}</p>
                                <p class="text-gray-500 text-sm">{{ address.country }}</p>
                                <div class="mt-4 flex gap-3">
                                    <button class="text-sm text-primary">Edit</button>
                                    <button class="text-sm text-red-500">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <div v-if="activeTab === 'notifications'" class="bg-white dark:bg-oax-panel rounded-xl p-8">
                        <h2 class="text-xl font-medium mb-6">Notification Preferences</h2>
                        <div class="space-y-4">
                            <label class="flex items-center justify-between p-4 border border-gray-200 dark:border-oax-border rounded-lg cursor-pointer">
                                <div>
                                    <p class="font-medium">Email Newsletter</p>
                                    <p class="text-gray-500 text-sm">Receive updates about new collections and sales</p>
                                </div>
                                <input type="checkbox" v-model="notifications.newsletter" class="w-5 h-5 accent-primary"/>
                            </label>
                            <label class="flex items-center justify-between p-4 border border-gray-200 dark:border-oax-border rounded-lg cursor-pointer">
                                <div>
                                    <p class="font-medium">Order Updates</p>
                                    <p class="text-gray-500 text-sm">Get notified about order status changes</p>
                                </div>
                                <input type="checkbox" v-model="notifications.orders" class="w-5 h-5 accent-primary"/>
                            </label>
                            <label class="flex items-center justify-between p-4 border border-gray-200 dark:border-oax-border rounded-lg cursor-pointer">
                                <div>
                                    <p class="font-medium">SMS Alerts</p>
                                    <p class="text-gray-500 text-sm">Receive text messages for important updates</p>
                                </div>
                                <input type="checkbox" v-model="notifications.sms" class="w-5 h-5 accent-primary"/>
                            </label>
                        </div>
                    </div>

                    <!-- Delete Account -->
                    <div v-if="activeTab === 'delete'" class="bg-white dark:bg-oax-panel rounded-xl p-8">
                        <h2 class="text-xl font-medium mb-4 text-red-600">Delete Account</h2>
                        <p class="text-gray-500 mb-6">Once you delete your account, there is no going back. Please be certain.</p>
                        <button class="bg-red-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-red-700 transition-colors">Delete My Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';

const activeTab = ref('profile');
const tabs = [
    { id: 'profile', name: 'Profile', icon: 'person' },
    { id: 'password', name: 'Password', icon: 'lock' },
    { id: 'addresses', name: 'Addresses', icon: 'location_on' },
    { id: 'notifications', name: 'Notifications', icon: 'notifications' },
    { id: 'delete', name: 'Delete Account', icon: 'delete' }
];

const profile = reactive({ firstName: 'John', lastName: 'Doe', email: 'john@example.com', phone: '+1 234 567 8900' });
const passwords = reactive({ current: '', new: '', confirm: '' });
const addresses = reactive([
    { name: 'Home', street: '123 Main St', city: 'New York', state: 'NY', zip: '10001', country: 'United States' },
    { name: 'Office', street: '456 Business Ave', city: 'New York', state: 'NY', zip: '10002', country: 'United States' }
]);
const notifications = reactive({ newsletter: true, orders: true, sms: false });

const saveProfile = () => alert('Profile saved!');
const changePassword = () => alert('Password updated!');
const addAddress = () => alert('Add address modal');
</script>
