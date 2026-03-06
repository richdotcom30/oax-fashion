<template>
    <div class="flex flex-col min-h-screen">
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
