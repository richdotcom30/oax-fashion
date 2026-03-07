<template>
    <div class="min-h-screen bg-oax-dark text-white">
        <!-- Main Content -->
        <div class="flex flex-col lg:flex-row h-screen">
            <!-- Left Side - Form -->
            <div class="lg:w-1/2 p-8 md:p-12 lg:p-16 flex flex-col justify-center">
                <div class="max-w-lg mx-auto w-full">
                    <span class="text-oax-gold text-sm tracking-[0.2em] uppercase">Get in Touch</span>
                    <h1 class="font-serif text-4xl md:text-5xl mt-4 mb-8">Contact Us</h1>
                    
                    <p class="text-gray-400 mb-8 leading-relaxed">
                        Have a question about our collections, need styling advice, or want to collaborate? 
                        We'd love to hear from you. Our team typically responds within 24 hours.
                    </p>

                    <!-- Contact Form -->
                    <form @submit.prevent="submitForm" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">First Name *</label>
                                <input v-model="form.firstName" type="text" required
                                    class="w-full bg-oax-panel border border-oax-border rounded px-4 py-3 text-white focus:outline-none focus:border-primary transition-colors"/>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">Last Name *</label>
                                <input v-model="form.lastName" type="text" required
                                    class="w-full bg-oax-panel border border-oax-border rounded px-4 py-3 text-white focus:outline-none focus:border-primary transition-colors"/>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Email Address *</label>
                            <input v-model="form.email" type="email" required
                                class="w-full bg-oax-panel border border-oax-border rounded px-4 py-3 text-white focus:outline-none focus:border-primary transition-colors"/>
                        </div>
                        
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Phone Number</label>
                            <input v-model="form.phone" type="tel"
                                class="w-full bg-oax-panel border border-oax-border rounded px-4 py-3 text-white focus:outline-none focus:border-primary transition-colors"/>
                        </div>
                        
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Subject *</label>
                            <select v-model="form.subject" required
                                class="w-full bg-oax-panel border border-oax-border rounded px-4 py-3 text-white focus:outline-none focus:border-primary transition-colors">
                                <option value="" class="bg-oax-panel">Select a subject</option>
                                <option value="general" class="bg-oax-panel">General Inquiry</option>
                                <option value="order" class="bg-oax-panel">Order Status</option>
                                <option value="returns" class="bg-oax-panel">Returns & Exchanges</option>
                                <option value="styling" class="bg-oax-panel">Styling Advice</option>
                                <option value="collaboration" class="bg-oax-panel">Collaboration</option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Message *</label>
                            <textarea v-model="form.message" rows="5" required
                                class="w-full bg-oax-panel border border-oax-border rounded px-4 py-3 text-white focus:outline-none focus:border-primary transition-colors resize-none"
                                placeholder="How can we help you?"></textarea>
                        </div>
                        
                        <button type="submit" 
                            class="w-full bg-primary hover:bg-oax-blood text-white font-bold py-4 rounded uppercase tracking-wider transition-colors">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Right Side - Info -->
            <div class="lg:w-1/2 bg-oax-panel p-8 md:p-12 lg:p-16 flex flex-col justify-center relative overflow-hidden">
                <!-- Decorative Background -->
                <div class="absolute inset-0 opacity-5" style="background-image: radial-gradient(#8B0000 1px, transparent 1px); background-size: 20px 20px;"></div>
                
                <div class="relative z-10 max-w-lg">
                    <h2 class="font-serif text-3xl mb-8">Visit Our Flagship</h2>
                    
                    <!-- Store Info -->
                    <div class="space-y-8">
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-oax-dark flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-oax-gold">location_on</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium mb-1">Flagship Boutique</h3>
                                <p class="text-gray-400">725 Fifth Avenue<br/>New York, NY 10022</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-oax-dark flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-oax-gold">schedule</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium mb-1">Store Hours</h3>
                                <p class="text-gray-400">Mon - Sat: 10AM - 8PM<br/>Sunday: 11AM - 7PM</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-oax-dark flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-oax-gold">call</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium mb-1">Contact</h3>
                                <p class="text-gray-400">+1 (212) 555-0123<br/>concierge@oaxfashion.com</p>
                            </div>
                        </div>
                        
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-full bg-oax-dark flex items-center justify-center flex-shrink-0">
                                <span class="material-symbols-outlined text-oax-gold">diamond</span>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium mb-1">Private Shopping</h3>
                                <p class="text-gray-400">Book an exclusive appointment<br/>for personalized styling</p>
                                <button class="text-primary text-sm font-bold mt-2 uppercase tracking-wider hover:underline">Request Appointment</button>
                            </div>
                        </div>
                    </div>

                    <!-- Social Links -->
                    <div class="mt-12 pt-8 border-t border-oax-border">
                        <p class="text-gray-400 text-sm mb-4">Follow us</p>
                        <div class="flex gap-4">
                            <a href="https://instagram.com/oaxfashion" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-oax-dark flex items-center justify-center hover:bg-primary transition-colors">
                                <span class="material-symbols-outlined">camera</span>
                            </a>
                            <a href="https://facebook.com/oaxfashion" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-oax-dark flex items-center justify-center hover:bg-primary transition-colors">
                                <span class="material-symbols-outlined">tag</span>
                            </a>
                            <a href="https://youtube.com/oaxfashion" target="_blank" rel="noopener noreferrer" class="w-10 h-10 rounded-full bg-oax-dark flex items-center justify-center hover:bg-primary transition-colors">
                                <span class="material-symbols-outlined">play_circle</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive } from 'vue';

const form = reactive({
    firstName: '',
    lastName: '',
    email: '',
    phone: '',
    subject: '',
    message: ''
});

const submitForm = () => {
    alert(`Thank you for your message! We'll get back to you at ${form.email} shortly.`);
    // Reset form
    Object.keys(form).forEach(key => form[key] = '');
};
</script>
