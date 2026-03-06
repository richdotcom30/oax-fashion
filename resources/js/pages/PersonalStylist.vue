<template>
    <div class="min-h-screen bg-oax-dark text-white">
        <section class="relative py-20 px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <span class="material-symbols-outlined text-6xl text-oax-gold mb-4">stylus</span>
                <h1 class="font-serif text-4xl md:text-5xl mb-4">Personal Stylist</h1>
                <p class="text-gray-400 text-lg">Work one-on-one with our expert stylists to discover your perfect look.</p>
            </div>
        </section>

        <section class="py-12 px-6">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-oax-panel rounded-xl p-8 text-center">
                        <span class="material-symbols-outlined text-4xl text-oax-gold mb-4">video_call</span>
                        <h3 class="font-serif text-xl mb-2">Video Consultation</h3>
                        <p class="text-gray-400 text-sm mb-4">60-minute live session with a stylist</p>
                        <p class="text-oax-gold text-2xl font-bold">$150</p>
                    </div>
                    <div class="bg-oax-panel rounded-xl p-8 text-center border-2 border-oax-gold">
                        <div class="bg-oax-gold text-black text-xs font-bold px-3 py-1 rounded-full inline-block mb-4">MOST POPULAR</div>
                        <span class="material-symbols-outlined text-4xl text-oax-gold mb-4">inventory_2</span>
                        <h3 class="font-serif text-xl mb-2">Curated Edit</h3>
                        <p class="text-gray-400 text-sm mb-4">Personalized selection delivered to you</p>
                        <p class="text-oax-gold text-2xl font-bold">$200</p>
                    </div>
                    <div class="bg-oax-panel rounded-xl p-8 text-center">
                        <span class="material-symbols-outlined text-4xl text-oax-gold mb-4">storefront</span>
                        <h3 class="font-serif text-xl mb-2">In-Store styling</h3>
                        <p class="text-gray-400 text-sm mb-4">VIP shopping experience at our boutique</p>
                        <p class="text-oax-gold text-2xl font-bold">$100</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 px-6 bg-oax-panel">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-serif text-2xl text-center mb-8">Book Your Session</h2>
                <form @submit.prevent="bookSession" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Name</label>
                            <input v-model="form.name" type="text" required class="w-full px-4 py-3 rounded-lg bg-oax-dark border border-oax-border"/>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Email</label>
                            <input v-model="form.email" type="email" required class="w-full px-4 py-3 rounded-lg bg-oax-dark border border-oax-border"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Service Type</label>
                            <select v-model="form.service" class="w-full px-4 py-3 rounded-lg bg-oax-dark border border-oax-border">
                                <option value="video">Video Consultation</option>
                                <option value="curated">Curated Edit</option>
                                <option value="instore">In-Store Styling</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Preferred Date</label>
                            <input v-model="form.date" type="date" required class="w-full px-4 py-3 rounded-lg bg-oax-dark border border-oax-border"/>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Tell us about your style preferences</label>
                        <textarea v-model="form.message" rows="4" class="w-full px-4 py-3 rounded-lg bg-oax-dark border border-oax-border"></textarea>
                    </div>
                    <button type="submit" class="w-full bg-primary hover:bg-oax-blood text-white font-bold py-4 rounded-lg uppercase tracking-wider transition-colors">Book Now</button>
                </form>
            </div>
        </section>
    </div>
</template>

<script setup>
import { reactive } from 'vue';

const form = reactive({ name: '', email: '', service: 'video', date: '', message: '' });

const bookSession = () => {
    alert(`Thank you! Your ${form.service} session has been booked. Confirmation sent to ${form.email}`);
    Object.keys(form).forEach(key => form[key] = key === 'service' ? 'video' : '');
};
</script>
