<template>
    <div class="min-h-screen bg-oax-dark text-white">
        <!-- Hero Section -->
        <section class="relative py-20 px-6 text-center overflow-hidden bg-gradient-to-b from-oax-dark to-[#1a0a0a]">
            <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(#D4AF37 1px, transparent 1px); background-size: 30px 30px;"></div>
            <div class="relative z-10 max-w-3xl mx-auto">
                <span class="material-symbols-outlined text-6xl text-oax-gold mb-4">diamond</span>
                <h1 class="font-serif text-4xl md:text-6xl mb-4">The OAX Inner Circle</h1>
                <p class="text-gray-400 text-lg mb-8">Unlock exclusive privileges with our loyalty program. Earn points, unlock tiers, and experience luxury like never before.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <div class="bg-oax-panel px-8 py-4 rounded-lg">
                        <p class="text-oax-gold text-3xl font-bold">{{ points }}</p>
                        <p class="text-gray-400 text-sm">Available Points</p>
                    </div>
                    <div class="bg-oax-panel px-8 py-4 rounded-lg">
                        <p class="text-oax-gold text-3xl font-bold">{{ totalSpent | currency }}</p>
                        <p class="text-gray-400 text-sm">Lifetime Spend</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tier Cards -->
        <section class="py-16 px-6">
            <div class="max-w-6xl mx-auto">
                <h2 class="font-serif text-3xl text-center mb-12">Membership Tiers</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Silver -->
                    <div class="bg-oax-panel rounded-xl p-8 border-2 border-gray-600 relative">
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-gray-500 text-white px-4 py-1 rounded-full text-sm font-bold">CURRENT</div>
                        <span class="material-symbols-outlined text-4xl text-gray-400 mb-4">workspace_premium</span>
                        <h3 class="text-2xl font-serif mb-2">Silver</h3>
                        <p class="text-gray-400 mb-6">For new members</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> 1 point per $1 spent</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Birthday reward</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Early access to sales</li>
                        </ul>
                        <div class="text-center">
                            <p class="text-gray-400 text-sm">Spend $0 - $999 to qualify</p>
                        </div>
                    </div>
                    
                    <!-- Gold -->
                    <div class="bg-oax-panel rounded-xl p-8 border-2 border-oax-gold relative transform scale-105">
                        <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-oax-gold text-black px-4 py-1 rounded-full text-sm font-bold">RECOMMENDED</div>
                        <span class="material-symbols-outlined text-4xl text-oax-gold mb-4">workspace_premium</span>
                        <h3 class="text-2xl font-serif mb-2">Gold</h3>
                        <p class="text-gray-400 mb-6">For dedicated clients</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> 1.5 points per $1 spent</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Free standard shipping</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Priority customer service</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Exclusive event invitations</li>
                        </ul>
                        <div class="text-center">
                            <p class="text-gray-400 text-sm">Spend $1,000 - $4,999 to qualify</p>
                        </div>
                    </div>
                    
                    <!-- Platinum -->
                    <div class="bg-oax-panel rounded-xl p-8 border-2 border-primary relative">
                        <span class="material-symbols-outlined text-4xl text-primary mb-4">workspace_premium</span>
                        <h3 class="text-2xl font-serif mb-2">Platinum</h3>
                        <p class="text-gray-400 mb-6">Our most valued members</p>
                        <ul class="space-y-3 mb-8">
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> 2 points per $1 spent</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Free express shipping</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Personal stylist consultations</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Complimentary alterations</li>
                            <li class="flex items-center gap-2 text-sm"><span class="material-symbols-outlined text-oax-gold text-lg">check</span> Private shopping events</li>
                        </ul>
                        <div class="text-center">
                            <p class="text-gray-400 text-sm">Spend $5,000+ to qualify</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="py-16 px-6 bg-oax-panel">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-serif text-3xl text-center mb-12">How It Works</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-oax-dark rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-3xl text-oax-gold">shopping_bag</span>
                        </div>
                        <h3 class="text-xl font-medium mb-2">Shop</h3>
                        <p class="text-gray-400">Earn points on every purchase. The more you spend, the more you earn.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-oax-dark rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-3xl text-oax-gold">stars</span>
                        </div>
                        <h3 class="text-xl font-medium mb-2">Earn Rewards</h3>
                        <p class="text-gray-400">Unlock exclusive rewards, early access, and special experiences.</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-oax-dark rounded-full flex items-center justify-center mx-auto mb-4">
                            <span class="material-symbols-outlined text-3xl text-oax-gold">card_giftcard</span>
                        </div>
                        <h3 class="text-xl font-medium mb-2">Redeem</h3>
                        <p class="text-gray-400">Use points for discounts, free products, and VIP experiences.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Points Earning -->
        <section class="py-16 px-6">
            <div class="max-w-4xl mx-auto">
                <h2 class="font-serif text-3xl text-center mb-12">Ways to Earn</h2>
                <div class="space-y-4">
                    <div class="bg-oax-panel p-6 rounded-lg flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-2xl text-oax-gold">shopping_bag</span>
                            <div>
                                <h4 class="font-medium">Purchase</h4>
                                <p class="text-gray-400 text-sm">Earn points on all purchases</p>
                            </div>
                        </div>
                        <span class="text-oax-gold font-bold">1-2 pts/$1</span>
                    </div>
                    <div class="bg-oax-panel p-6 rounded-lg flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-2xl text-oax-gold">celebration</span>
                            <div>
                                <h4 class="font-medium">Birthday Bonus</h4>
                                <p class="text-gray-400 text-sm">Double points during your birthday month</p>
                            </div>
                        </div>
                        <span class="text-oax-gold font-bold">2X Points</span>
                    </div>
                    <div class="bg-oax-panel p-6 rounded-lg flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-2xl text-oax-gold">reviews</span>
                            <div>
                                <h4 class="font-medium">Write a Review</h4>
                                <p class="text-gray-400 text-sm">Share your thoughts on products</p>
                            </div>
                        </div>
                        <span class="text-oax-gold font-bold">50 Points</span>
                    </div>
                    <div class="bg-oax-panel p-6 rounded-lg flex justify-between items-center">
                        <div class="flex items-center gap-4">
                            <span class="material-symbols-outlined text-2xl text-oax-gold">person_add</span>
                            <div>
                                <h4 class="font-medium">Refer a Friend</h4>
                                <p class="text-gray-400 text-sm">Invite friends to join OAX</p>
                            </div>
                        </div>
                        <span class="text-oax-gold font-bold">200 Points</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ -->
        <section class="py-16 px-6 bg-oax-panel">
            <div class="max-w-3xl mx-auto">
                <h2 class="font-serif text-3xl text-center mb-12">Frequently Asked Questions</h2>
                <div class="space-y-4">
                    <div v-for="(faq, index) in faqs" :key="index" class="bg-oax-dark p-6 rounded-lg">
                        <button @click="toggleFaq(index)" class="flex justify-between items-center w-full text-left">
                            <h4 class="font-medium">{{ faq.question }}</h4>
                            <span class="material-symbols-outlined transition-transform" :class="{ 'rotate-180': faq.open }">expand_more</span>
                        </button>
                        <p v-if="faq.open" class="text-gray-400 mt-4">{{ faq.answer }}</p>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';

const points = ref(2450);
const totalSpent = ref(3250);

const faqs = reactive([
    { question: 'How do I join the Inner Circle?', answer: 'Enrollment is free! Simply create an account and you will automatically be enrolled in our loyalty program.', open: false },
    { question: 'When do points expire?', answer: 'Points expire after 12 months of inactivity. Keep shopping to maintain your balance!', open: false },
    { question: 'Can I combine points with other offers?', answer: 'Yes! Points can be used in conjunction with promotional discounts and sale items.', open: false },
    { question: 'How do I reach Gold or Platinum status?', answer: 'Your tier is determined by your cumulative annual spend. Keep shopping to unlock higher tiers!', open: false }
]);

const toggleFaq = (index) => {
    faqs[index].open = !faqs[index].open;
};
</script>

<script>
export default {
    filters: {
        currency(value) {
            return '$' + value.toLocaleString();
        }
    }
}
</script>
