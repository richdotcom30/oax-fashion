<template>
    <div class="flex flex-col min-h-screen">
        <!-- Hero Section -->
        <section class="relative py-20 px-4 text-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-t from-black via-gray-900 to-black z-10"></div>
                <div class="w-full h-full bg-cover bg-center opacity-40" style="background-image: url('https://images.unsplash.com/photo-1558171813-4c088753af8f?w=1920&q=80');"></div>
            </div>
            <div class="relative z-20 max-w-4xl mx-auto">
                <h1 class="text-4xl md:text-6xl font-black tracking-tighter text-white mb-4">Size Guide</h1>
                <p class="text-gray-400 text-lg">Find your perfect fit with our comprehensive sizing guide</p>
            </div>
        </section>

        <!-- Content Section -->
        <section class="py-16 px-4 md:px-8 max-w-6xl mx-auto">
            
            <!-- Size Calculator CTA -->
            <div class="mb-16 bg-gradient-to-r from-oax-blood/20 via-oax-blood/10 to-oax-blood/20 rounded-2xl p-8 border border-oax-blood/30">
                <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                    <div>
                        <h2 class="text-2xl font-bold text-white mb-2">Not sure about your size?</h2>
                        <p class="text-gray-400">Our AI-powered size guide analyzes your measurements to recommend the perfect fit.</p>
                    </div>
                    <router-link to="/ai-size-guide" class="whitespace-nowrap px-8 py-3 bg-oax-blood hover:bg-red-700 text-white font-bold rounded-lg transition-colors flex items-center gap-2">
                        <span class="material-symbols-outlined">auto_awesome</span>
                        AI Size Advisor
                    </router-link>
                </div>
            </div>

            <!-- Women's Size Chart -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-oax-gold">woman</span>
                    Women's Clothing
                </h2>
                <div class="overflow-x-auto bg-gray-900/50 rounded-xl border border-gray-800">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-800">
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Size</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Bust (inches)</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Waist (inches)</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Hips (inches)</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">EU Size</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">UK Size</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 text-white font-medium">XS</td>
                                <td class="px-6 py-4 text-gray-300">30 - 32</td>
                                <td class="px-6 py-4 text-gray-300">24 - 26</td>
                                <td class="px-6 py-4 text-gray-300">32 - 34</td>
                                <td class="px-6 py-4 text-gray-300">34</td>
                                <td class="px-6 py-4 text-gray-300">6</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors bg-oax-blood/10">
                                <td class="px-6 py-4 text-white font-medium">S</td>
                                <td class="px-6 py-4 text-gray-300">32 - 34</td>
                                <td class="px-6 py-4 text-gray-300">26 - 28</td>
                                <td class="px-6 py-4 text-gray-300">34 - 36</td>
                                <td class="px-6 py-4 text-gray-300">36</td>
                                <td class="px-6 py-4 text-gray-300">8</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 text-white font-medium">M</td>
                                <td class="px-6 py-4 text-gray-300">34 - 36</td>
                                <td class="px-6 py-4 text-gray-300">28 - 30</td>
                                <td class="px-6 py-4 text-gray-300">36 - 38</td>
                                <td class="px-6 py-4 text-gray-300">38</td>
                                <td class="px-6 py-4 text-gray-300">10</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors bg-oax-blood/10">
                                <td class="px-6 py-4 text-white font-medium">L</td>
                                <td class="px-6 py-4 text-gray-300">36 - 38</td>
                                <td class="px-6 py-4 text-gray-300">30 - 32</td>
                                <td class="px-6 py-4 text-gray-300">38 - 40</td>
                                <td class="px-6 py-4 text-gray-300">40</td>
                                <td class="px-6 py-4 text-gray-300">12</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 text-white font-medium">XL</td>
                                <td class="px-6 py-4 text-gray-300">38 - 40</td>
                                <td class="px-6 py-4 text-gray-300">32 - 34</td>
                                <td class="px-6 py-4 text-gray-300">40 - 42</td>
                                <td class="px-6 py-4 text-gray-300">42</td>
                                <td class="px-6 py-4 text-gray-300">14</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors bg-oax-blood/10">
                                <td class="px-6 py-4 text-white font-medium">XXL</td>
                                <td class="px-6 py-4 text-gray-300">40 - 42</td>
                                <td class="px-6 py-4 text-gray-300">34 - 36</td>
                                <td class="px-6 py-4 text-gray-300">42 - 44</td>
                                <td class="px-6 py-4 text-gray-300">44</td>
                                <td class="px-6 py-4 text-gray-300">16</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Men's Size Chart -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-oax-gold">man</span>
                    Men's Clothing
                </h2>
                <div class="overflow-x-auto bg-gray-900/50 rounded-xl border border-gray-800">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="border-b border-gray-800">
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Size</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Chest (inches)</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Waist (inches)</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">Inseam (inches)</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">EU Size</th>
                                <th class="px-6 py-4 text-left text-gray-400 font-semibold">UK Size</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-800">
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 text-white font-medium">XS</td>
                                <td class="px-6 py-4 text-gray-300">32 - 34</td>
                                <td class="px-6 py-4 text-gray-300">26 - 28</td>
                                <td class="px-6 py-4 text-gray-300">30 - 32</td>
                                <td class="px-6 py-4 text-gray-300">44</td>
                                <td class="px-6 py-4 text-gray-300">34</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors bg-oax-blood/10">
                                <td class="px-6 py-4 text-white font-medium">S</td>
                                <td class="px-6 py-4 text-gray-300">34 - 36</td>
                                <td class="px-6 py-4 text-gray-300">28 - 30</td>
                                <td class="px-6 py-4 text-gray-300">32</td>
                                <td class="px-6 py-4 text-gray-300">46</td>
                                <td class="px-6 py-4 text-gray-300">36</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 text-white font-medium">M</td>
                                <td class="px-6 py-4 text-gray-300">36 - 38</td>
                                <td class="px-6 py-4 text-gray-300">30 - 32</td>
                                <td class="px-6 py-4 text-gray-300">32 - 34</td>
                                <td class="px-6 py-4 text-gray-300">48</td>
                                <td class="px-6 py-4 text-gray-300">38</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors bg-oax-blood/10">
                                <td class="px-6 py-4 text-white font-medium">L</td>
                                <td class="px-6 py-4 text-gray-300">38 - 40</td>
                                <td class="px-6 py-4 text-gray-300">32 - 34</td>
                                <td class="px-6 py-4 text-gray-300">34</td>
                                <td class="px-6 py-4 text-gray-300">50</td>
                                <td class="px-6 py-4 text-gray-300">40</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors">
                                <td class="px-6 py-4 text-white font-medium">XL</td>
                                <td class="px-6 py-4 text-gray-300">40 - 42</td>
                                <td class="px-6 py-4 text-gray-300">34 - 36</td>
                                <td class="px-6 py-4 text-gray-300">34 - 36</td>
                                <td class="px-6 py-4 text-gray-300">52</td>
                                <td class="px-6 py-4 text-gray-300">42</td>
                            </tr>
                            <tr class="hover:bg-gray-800/50 transition-colors bg-oax-blood/10">
                                <td class="px-6 py-4 text-white font-medium">XXL</td>
                                <td class="px-6 py-4 text-gray-300">42 - 44</td>
                                <td class="px-6 py-4 text-gray-300">36 - 38</td>
                                <td class="px-6 py-4 text-gray-300">36</td>
                                <td class="px-6 py-4 text-gray-300">54</td>
                                <td class="px-6 py-4 text-gray-300">44</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- How to Measure -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-oax-gold">straighten</span>
                    How to Measure
                </h2>
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <div class="w-12 h-12 bg-oax-blood/20 rounded-full flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-oax-blood">monitor_weight</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Bust / Chest</h3>
                        <p class="text-gray-400 text-sm">Measure around the fullest part of your bust/chest, keeping the tape horizontal.</p>
                    </div>
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <div class="w-12 h-12 bg-oax-blood/20 rounded-full flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-oax-blood">一圈</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Waist</h3>
                        <p class="text-gray-400 text-sm">Find the natural crease of your waist by bending to one side.</p>
                    </div>
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <div class="w-12 h-12 bg-oax-blood/20 rounded-full flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-oax-blood">accessibility_new</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Hips</h3>
                        <p class="text-gray-400 text-sm">Measure around the fullest part of your hips, about 8 inches below your waist.</p>
                    </div>
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <div class="w-12 h-12 bg-oax-blood/20 rounded-full flex items-center justify-center mb-4">
                            <span class="material-symbols-outlined text-oax-blood">straighten</span>
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">Inseam</h3>
                        <p class="text-gray-400 text-sm">Measure from the top of your inner leg down to the ankle bone.</p>
                    </div>
                </div>
            </div>

            <!-- Fit Guide -->
            <div class="mb-12">
                <h2 class="text-3xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-oax-gold">info</span>
                    Fit Types
                </h2>
                <div class="space-y-4">
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <h3 class="text-lg font-bold text-white mb-2">Slim Fit</h3>
                        <p class="text-gray-400">A close-fitting cut that follows the body's contours. Ideal for a modern, tailored look.</p>
                    </div>
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <h3 class="text-lg font-bold text-white mb-2">Regular Fit</h3>
                        <p class="text-gray-400">A classic cut that offers comfort and ease of movement. The most versatile fit.</p>
                    </div>
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <h3 class="text-lg font-bold text-white mb-2">Oversized Fit</h3>
                        <p class="text-gray-400">A relaxed, loose-fitting cut for a contemporary, effortless aesthetic.</p>
                    </div>
                </div>
            </div>

            <!-- International Conversions -->
            <div>
                <h2 class="text-3xl font-bold text-white mb-6 flex items-center gap-3">
                    <span class="material-symbols-outlined text-oax-gold">public</span>
                    International Size Conversions
                </h2>
                <div class="grid md:grid-cols-2 gap-8">
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <h3 class="text-xl font-bold text-white mb-4">Women's</h3>
                        <div class="space-y-3 text-gray-300">
                            <div class="flex justify-between border-b border-gray-800 pb-2">
                                <span>US</span>
                                <span class="text-white">0 - 2 - 4 - 6 - 8 - 10 - 12 - 14 - 16</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-800 pb-2">
                                <span>UK</span>
                                <span class="text-white">4 - 6 - 8 - 10 - 12 - 14 - 16 - 18 - 20</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-800 pb-2">
                                <span>EU</span>
                                <span class="text-white">32 - 34 - 36 - 38 - 40 - 42 - 44 - 46 - 48</span>
                            </div>
                            <div class="flex justify-between">
                                <span>FR</span>
                                <span class="text-white">34 - 36 - 38 - 40 - 42 - 44 - 46 - 48 - 50</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-900/50 p-6 rounded-xl border border-gray-800">
                        <h3 class="text-xl font-bold text-white mb-4">Men's</h3>
                        <div class="space-y-3 text-gray-300">
                            <div class="flex justify-between border-b border-gray-800 pb-2">
                                <span>US</span>
                                <span class="text-white">34 - 36 - 38 - 40 - 42 - 44</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-800 pb-2">
                                <span>UK</span>
                                <span class="text-white">34 - 36 - 38 - 40 - 42 - 44</span>
                            </div>
                            <div class="flex justify-between border-b border-gray-800 pb-2">
                                <span>EU</span>
                                <span class="text-white">44 - 46 - 48 - 50 - 52 - 54</span>
                            </div>
                            <div class="flex justify-between">
                                <span>IT</span>
                                <span class="text-white">44 - 46 - 48 - 50 - 52 - 54</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <!-- Back Link -->
        <div class="py-8 text-center">
            <router-link to="/shop" class="inline-flex items-center gap-2 text-oax-blood hover:text-gold transition-colors">
                <span class="material-symbols-outlined">arrow_back</span>
                Back to Shop
            </router-link>
        </div>
    </div>
</template>

<script setup>
</script>
