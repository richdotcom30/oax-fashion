<template>
    <div class="flex flex-col min-h-screen">
        <div class="sticky top-0 z-50 flex items-center justify-between whitespace-nowrap border-b border-solid border-oax-border bg-oax-dark/95 backdrop-blur-md px-6 py-4 lg:px-10">
            <router-link to="/" class="flex items-center gap-4 text-white cursor-pointer">
                <div class="size-8 text-primary">
                    <svg fill="currentColor" viewBox="0 0 48 48"><path d="M39.475 21.6262C40.358 21.4363 40.6863 21.5589 40.7581 21.5934C40.7876 21.655 40.8547 21.857 40.8082 22.3336C40.7408 23.0255 40.4502 24.0046 39.8572 25.2301C38.6799 27.6631 36.5085 30.6631 33.5858 33.5858C30.6631 36.5085 27.6632 38.6799 25.2301 39.8572C24.0046 40.4502 23.0255 40.7407 22.3336 40.8082C21.8571 40.8547 21.6551 40.7875 21.5934 40.7581C21.5589 40.6863 21.4363 40.358 21.6262 39.475C21.8562 38.4054 22.4689 36.9657 23.5038 35.2817C24.7575 33.2417 26.5497 30.9744 28.7621 28.762C30.9744 26.5497 33.2417 24.7574 35.2817 23.5037C36.9657 22.4689 38.4054 21.8562 39.475 21.6262ZM4.41189 29.2403L18.7597 43.5881C19.8813 44.7097 21.4027 44.9179 22.7217 44.7893C24.0585 44.659 25.5148 44.1631 26.9723 43.4579C29.9052 42.0387 33.2618 39.5667 36.4142 36.4142C39.5667 33.2618 42.0387 29.9052 43.4579 26.9723C44.1631 25.5148 44.659 24.0585 44.7893 22.7217C44.9179 21.4027 44.7097 19.8813 43.5881 18.7597L29.2403 4.41187C27.8527 3.02428 25.8765 3.02573 24.2861 3.36776C22.6081 3.72863 20.7334 4.58419 18.8396 5.74801C16.4978 7.18716 13.9881 9.18353 11.5858 11.5858C9.18354 13.988 7.18717 16.4978 5.74802 18.8396C4.58421 20.7334 3.72865 22.6081 3.36778 24.2861C3.02574 25.8765 3.02429 27.8527 4.41189 29.2403Z" fill="currentColor"></path></svg>
                </div>
                <h2 class="text-white text-xl font-bold tracking-tight">OAX FASHION</h2>
            </router-link>
            <div class="flex gap-2">
                <router-link to="/cart" class="relative p-2 rounded-lg hover:bg-oax-panel text-white"><span class="material-symbols-outlined">shopping_bag</span></router-link>
                <router-link to="/account" class="p-2 rounded-lg hover:bg-oax-panel text-white"><span class="material-symbols-outlined">person</span></router-link>
            </div>
        </div>
        <main class="flex-1 w-full max-w-[1440px] mx-auto px-4 md:px-8 py-12">
            <h1 class="text-4xl font-black tracking-tighter text-white mb-8">My Wishlist</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <div v-for="i in 4" :key="i" class="group bg-oax-panel/30 rounded-xl border border-oax-border/50 overflow-hidden">
                    <div class="relative aspect-[3/4]">
                        <img :src="['https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c','https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy','https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ','https://lh3.googleusercontent.com/aida-public/AB6AXuB7kbXm9e9f7XweTKGktzI_f-c5lhxUTgDEFRJnUssNK0r-5X734KoU3qCQ7HY65GdhhY9JbvEu_RTphh2hA4J_I4fRwQHjCllJnuSzyoHHr_mKI7ppRamHsVRBvS-amdLZWppAB3nBTlKrcS12y0FA3R0FtDwbE6LI7iD20mNXbxwkOM-88QJszu-KBpSGwnpVzleVmaWy1SoM6-MaCC_X6rif_7jzJ5Izj-YqXrexrnGdREBgDZjIzoh2KUl9KIsuJsOShGhYk3AI'][i-1]" class="w-full h-full object-cover" />
                        <button class="absolute top-3 right-3 p-2 bg-black/50 rounded-full text-white hover:bg-primary transition-colors"><span class="material-symbols-outlined text-[18px]">close</span></button>
                    </div>
                    <div class="p-4">
                        <h3 class="text-white font-medium mb-1">Velvet Midnight Blazer</h3>
                        <p class="text-primary font-bold mb-3">$1,250</p>
                        <button class="w-full bg-primary text-white py-2 rounded font-bold text-sm hover:bg-primary-light transition-colors">Add to Bag</button>
                    </div>
                </div>
            </div>
        </main>
    </div>
</template>
<script setup></script>
