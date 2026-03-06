<template>
    <div class="min-h-screen bg-oax-dark text-white">
        <section class="py-20 px-6 text-center">
            <div class="max-w-3xl mx-auto">
                <span class="material-symbols-outlined text-6xl text-oax-gold mb-4">personality</span>
                <h1 class="font-serif text-4xl md:text-5xl mb-4">Style Profile</h1>
                <p class="text-gray-400 text-lg">Complete our style quiz to get personalized recommendations.</p>
            </div>
        </section>

        <section class="py-12 px-6">
            <div class="max-w-2xl mx-auto">
                <div v-if="currentStep < questions.length" class="bg-oax-panel rounded-xl p-8">
                    <div class="mb-8">
                        <span class="text-oax-gold text-sm">Question {{ currentStep + 1 }} of {{ questions.length }}</span>
                        <div class="h-1 bg-oax-border mt-2 rounded-full">
                            <div class="h-full bg-primary rounded-full transition-all" :style="`width: ${((currentStep + 1) / questions.length) * 100}%`"></div>
                        </div>
                    </div>
                    <h2 class="font-serif text-2xl mb-6">{{ questions[currentStep].question }}</h2>
                    <div class="space-y-3">
                        <button v-for="(option, idx) in questions[currentStep].options" :key="idx" @click="selectOption(option)"
                            class="w-full p-4 rounded-lg border border-oax-border hover:border-primary hover:bg-oax-dark transition-all text-left"
                            :class="{ 'border-primary bg-oax-dark': answers[currentStep] === option }">
                            {{ option }}
                        </button>
                    </div>
                    <div class="mt-8 flex justify-between">
                        <button v-if="currentStep > 0" @click="prevStep" class="text-gray-400 hover:text-white">← Previous</button>
                        <div v-else></div>
                        <button v-if="answers[currentStep]" @click="nextStep" class="bg-primary hover:bg-oax-blood px-6 py-2 rounded font-medium">Continue</button>
                    </div>
                </div>
                <div v-else class="bg-oax-panel rounded-xl p-8 text-center">
                    <span class="material-symbols-outlined text-6xl text-oax-gold mb-4">celebration</span>
                    <h2 class="font-serif text-3xl mb-4">Your Style Profile</h2>
                    <p class="text-gray-400 mb-6">Based on your answers, we've curated a selection just for you.</p>
                    <div class="bg-oax-dark rounded-lg p-6 mb-6 text-left">
                        <p class="mb-2"><strong>Your Style:</strong> <span class="text-oax-gold">{{ styleResult.type }}</span></p>
                        <p class="mb-2"><strong>Preferred Colors:</strong> {{ styleResult.colors }}</p>
                        <p><strong>Occasion Focus:</strong> {{ styleResult.occasions }}</p>
                    </div>
                    <div class="flex gap-4 justify-center">
                        <router-link to="/shop" class="bg-primary hover:bg-oax-blood px-8 py-3 rounded font-bold uppercase tracking-wider">Shop Recommendations</router-link>
                        <router-link to="/account" class="border border-oax-gold text-oax-gold px-8 py-3 rounded font-bold uppercase tracking-wider hover:bg-oax-gold hover:text-black">Save Profile</router-link>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
import { ref, reactive } from 'vue';

const currentStep = ref(0);
const answers = reactive([]);

const questions = [
    { question: "What's your everyday style?", options: ["Classic & Timeless", "Modern & Minimalist", "Bold & Experimental", "Bohemian & Free-spirited"] },
    { question: "What colors do you gravitate towards?", options: ["Neutral tones (black, white, beige)", "Bold & Bright colors", "Dark & Moody tones", "Mix of everything"] },
    { question: "Where do you typically shop?", options: ["Work & Professional events", "Casual everyday wear", "Special occasions", "All of the above"] },
    { question: "What's your preferred fit?", options: ["Tailored & Fitted", "Relaxed & Comfortable", "Oversized", "Depends on the piece"] },
    { question: "What inspires your style?", options: ["Runway trends", "Vintage & Retro", "Street style", "Minimalist aesthetics"] }
];

const styleResult = reactive({ type: 'Modern Classic', colors: 'Neutrals & Deep Reds', occasions: 'Work & Evening' });

const selectOption = (option) => { answers[currentStep.value] = option; };
const nextStep = () => { if (currentStep.value < questions.length - 1) currentStep.value++; };
const prevStep = () => { if (currentStep.value > 0) currentStep.value--; };
</script>
