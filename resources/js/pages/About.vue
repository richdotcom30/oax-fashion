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
                        <span class="absolute top-1 right-1 size-2 bg-primary rounded-full"></span>
                    </router-link>
                    <router-link to="/account" class="p-2 rounded-lg hover:bg-oax-panel transition-colors text-white">
                        <span class="material-symbols-outlined">person</span>
                    </router-link>
                </div>
            </div>
        </div>

        <!-- Hero Section -->
        <section class="relative py-32 px-4 text-center overflow-hidden">
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-t from-background-dark via-background-dark/80 to-transparent z-10"></div>
                <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7kbXm9e9f7XweTKGktzI_f-c5lhxUTgDEFRJnUssNK0r-5X734KoU3qCQ7HY65GdhhY9JbvEu_RTphh2hA4J_I4fRwQHjCllJnuSzyoHHr_mKI7ppRamHsVRBvS-amdLZWppAB3nBTlKrcS12y0FA3R0FtDwbE6LI7iD20mNXbxwkOM-88QJszu-KBpSGwnpVzleVmaWy1SoM6-MaCC_X6rif_7jzJ5Izj-YqXrexrnGdREBgDZjIzoh2KUl9KIsuJsOShGhYk3AI" class="w-full h-full object-cover opacity-40" alt="Fashion editorial" />
            </div>
            <div class="relative z-20 max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-7xl font-black tracking-tighter text-white mb-6">Our Story</h1>
                <p class="text-xl text-gray-300 max-w-2xl mx-auto">Born from the shadows, crafted for the bold.</p>
            </div>
        </section>

        <!-- Content Section -->
        <section class="py-20 px-4 md:px-8 max-w-4xl mx-auto">
            <div class="space-y-16">
                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <span class="text-primary text-sm font-bold uppercase tracking-widest mb-2 block">The Beginning</span>
                        <h2 class="text-3xl font-bold text-white mb-4">A Vision of Darkness & Beauty</h2>
                        <p class="text-gray-300 leading-relaxed">OAX FASHION was born from a singular vision: to create luxury fashion that speaks to the soul of the modern avant-garde. We believe that true elegance lies not in ostentation, but in the subtle mastery of form, texture, and shadow.</p>
                    </div>
                    <div class="aspect-square rounded-xl overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c" class="w-full h-full object-cover" alt="Brand vision" />
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div class="order-2 md:order-1 aspect-square rounded-xl overflow-hidden">
                        <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBDY1DVFY4oT4gicag0FTgKBzd-ism0F1DeEko5XdZlPtCaWsZtnrzG4lHp7FrJWu7mrQo5yiJkbQx4aRj1M5V4Jo_RmnTDL6GJAAEOACwW48I8lt5HPjL3GrKJwbCDHJ8aTdoxSZuiDB5JDLNj5gDoZhBQSdhuiNbgxMedrjL8eQz9DOA4-9XwXn4quQSHmDusp4jAXWqEmmp5vH6R340SmAsKuozRp-tEmm2MYwJHxX94JTptuv5Q4QrXiDcbD2KnH0ElgVEwY9P" class="w-full h-full object-cover" alt="Craftsmanship" />
                    </div>
                    <div class="order-1 md:order-2">
                        <span class="text-primary text-sm font-bold uppercase tracking-widest mb-2 block">Our Craft</span>
                        <h2 class="text-3xl font-bold text-white mb-4">Uncompromising Quality</h2>
                        <p class="text-gray-300 leading-relaxed">Every piece in our collection is crafted with the finest materials from around the world. Our artisans bring decades of experience to create garments that are not just worn, but experienced.</p>
                    </div>
                </div>

                <div class="text-center py-12">
                    <h2 class="text-3xl font-bold text-white mb-6">Join the Movement</h2>
                    <p class="text-gray-300 max-w-2xl mx-auto mb-8">OAX is more than a brand. It's a community of individuals who understand that fashion is a form of self-expression, a statement of identity, a way of life.</p>
                    <router-link to="/shop" class="inline-block bg-primary text-white px-8 py-3 rounded-full font-bold hover:bg-primary-light transition-colors">
                        Explore Collection
                    </router-link>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
</script>
