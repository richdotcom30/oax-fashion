<template>
    <div class="flex flex-col min-h-screen">
        <!-- Main Content Area -->
        <main class="flex-1 flex w-full max-w-[1600px] mx-auto pt-6 px-4 md:px-8 pb-20">
            <!-- Sidebar Filter (Desktop) -->
            <aside class="hidden lg:block w-72 shrink-0 pr-8 sticky top-28 h-[calc(100vh-8rem)] overflow-y-auto hide-scrollbar">
                <div class="flex flex-col gap-8">
                    <!-- Categories -->
                    <div class="space-y-4">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-text-muted">Categories</h3>
                        <div class="flex flex-col gap-2">
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4 h-4 rounded border-oax-border bg-oax-panel text-primary focus:ring-primary" checked />
                                <span class="text-sm text-white">All Clothing</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4 h-4 rounded border-oax-border bg-oax-panel text-primary focus:ring-primary" />
                                <span class="text-sm group-hover:text-white transition-colors">Coats & Jackets</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4 h-4 rounded border-oax-border bg-oax-panel text-primary focus:ring-primary" />
                                <span class="text-sm group-hover:text-white transition-colors">Dresses</span>
                            </label>
                            <label class="flex items-center gap-3 cursor-pointer group">
                                <input type="checkbox" class="w-4 h-4 rounded border-oax-border bg-oax-panel text-primary focus:ring-primary" />
                                <span class="text-sm group-hover:text-white transition-colors">Knitwear</span>
                            </label>
                        </div>
                    </div>
                    <hr class="border-oax-border"/>
                    <!-- Price Range -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-text-muted">Price</h3>
                            <span class="text-xs text-primary font-medium">$0 - $5,000+</span>
                        </div>
                        <div class="relative w-full h-6 flex items-center">
                            <input type="range" max="5000" min="0" class="w-full appearance-none bg-transparent focus:outline-none z-10" />
                            <div class="absolute h-1 w-full bg-oax-border rounded-full top-1/2 -translate-y-1/2"></div>
                            <div class="absolute h-1 bg-primary rounded-full top-1/2 -translate-y-1/2 left-0 w-1/2"></div>
                        </div>
                    </div>
                    <hr class="border-oax-border"/>
                    <!-- Size Filter -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-text-muted">Size</h3>
                            <a href="#" class="text-xs text-text-muted underline hover:text-white">Size Guide</a>
                        </div>
                        <div class="grid grid-cols-4 gap-2">
                            <button class="h-10 border border-oax-border rounded flex items-center justify-center text-xs hover:border-white hover:bg-oax-panel transition-all">XS</button>
                            <button class="h-10 border border-oax-border rounded flex items-center justify-center text-xs bg-white text-black font-bold">S</button>
                            <button class="h-10 border border-oax-border rounded flex items-center justify-center text-xs hover:border-white hover:bg-oax-panel transition-all">M</button>
                            <button class="h-10 border border-oax-border rounded flex items-center justify-center text-xs hover:border-white hover:bg-oax-panel transition-all">L</button>
                            <button class="h-10 border border-oax-border rounded flex items-center justify-center text-xs hover:border-white hover:bg-oax-panel transition-all">XL</button>
                        </div>
                    </div>
                    <hr class="border-oax-border"/>
                    <!-- Color Filter -->
                    <div class="space-y-4">
                        <h3 class="text-sm font-bold uppercase tracking-wider text-text-muted">Color</h3>
                        <div class="flex flex-wrap gap-3">
                            <button class="size-8 rounded-full bg-black border border-oax-border hover:ring-2 hover:ring-white transition-all ring-offset-2 ring-offset-oax-dark"></button>
                            <button class="size-8 rounded-full bg-white border border-oax-border hover:ring-2 hover:ring-white transition-all ring-offset-2 ring-offset-oax-dark"></button>
                            <button class="size-8 rounded-full bg-[#8B0000] border border-oax-border hover:ring-2 hover:ring-white transition-all ring-offset-2 ring-offset-oax-dark"></button>
                            <button class="size-8 rounded-full bg-gold border border-oax-border hover:ring-2 hover:ring-white transition-all ring-offset-2 ring-offset-oax-dark"></button>
                            <button class="size-8 rounded-full bg-gray-500 border border-oax-border hover:ring-2 hover:ring-white transition-all ring-offset-2 ring-offset-oax-dark"></button>
                        </div>
                    </div>
                </div>
            </aside>

            <!-- Product Listing -->
            <div class="flex-1 flex flex-col min-w-0">
                <!-- Page Heading & Controls -->
                <div class="mb-8 space-y-6">
                    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                        <div>
                            <h1 class="text-3xl md:text-5xl font-black tracking-tighter mb-2">FW24 Collection</h1>
                            <p class="text-text-muted max-w-2xl">Discover the latest in luxury fashion, featuring our exclusive velvet and leather edits designed for the modern avant-garde.</p>
                        </div>
                        <div class="text-text-muted text-sm font-medium whitespace-nowrap">
                            Showing 24 of 145 items
                        </div>
                    </div>
                    <!-- Toolbar -->
                    <div class="flex flex-wrap gap-4 items-center justify-between bg-oax-panel/50 p-3 rounded-xl border border-oax-border/50">
                        <div class="flex items-center gap-3">
                            <button class="lg:hidden flex items-center gap-2 px-4 py-2 bg-oax-panel rounded-lg text-sm font-medium border border-oax-border text-white">
                                <span class="material-symbols-outlined text-[18px]">tune</span>
                                Filters
                            </button>
                            <div class="hidden sm:flex bg-oax-border/50 p-1 rounded-lg">
                                <button class="p-1.5 rounded bg-oax-dark shadow-sm text-white">
                                    <span class="material-symbols-outlined text-[20px]">grid_view</span>
                                </button>
                                <button class="p-1.5 rounded text-text-muted hover:text-white">
                                    <span class="material-symbols-outlined text-[20px]">view_list</span>
                                </button>
                            </div>
                        </div>
                        <div class="relative min-w-[200px]">
                            <select class="w-full appearance-none bg-oax-dark border border-oax-border text-white text-sm rounded-lg pl-4 pr-10 py-2.5 focus:border-primary focus:ring-0 cursor-pointer">
                                <option>Sort By: Featured</option>
                                <option>Newest Arrivals</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Best Selling</option>
                            </select>
                            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-text-muted">
                                <span class="material-symbols-outlined">expand_more</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-x-6 gap-y-10">
                    <!-- Product Card 1 -->
                    <router-link to="/product/velvet-midnight-blazer" class="group relative flex flex-col gap-3">
                        <div class="relative aspect-[3/4] w-full overflow-hidden rounded-lg bg-oax-panel">
                            <div class="absolute top-3 left-3 z-20">
                                <span class="bg-white text-black text-[10px] font-bold px-2 py-1 uppercase tracking-wide">New</span>
                            </div>
                            <button class="absolute top-3 right-3 z-20 p-2 bg-black/20 backdrop-blur-sm rounded-full text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-primary hover:text-white">
                                <span class="material-symbols-outlined text-[18px]">favorite</span>
                            </button>
                            <img alt="Velvet Midnight Blazer" class="absolute inset-0 h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDIvlbD1Nncnu1QUUOEMRIKn0BkLyUy7dpjw5Y3aBUwm-Y3c1HA1pIxG0jrjfhk8TinJjCuL-_K35zlhoazl7BRmPaIzl2VKmk0O2GfBFuE1oFVzK-ABflwG1wZSfONbbZ23zi8SaJ01fQ0crAeATfT2AWwYPMVKY7YCuNVBmOwTC6izLpDfXAZFCCvPzqUp0RhcmKZbStZnb-OzmHMMHm9aVT0N2qmCLYGUR-bu79lRH3L4AUBVqem95_jxybFTNJquJoiP99DYr2c" />
                            <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out z-20 bg-gradient-to-t from-black/80 to-transparent">
                                <button class="w-full bg-white text-black hover:bg-primary hover:text-white font-bold text-sm py-3 rounded uppercase tracking-wide transition-colors shadow-lg">
                                    Quick Add
                                </button>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-base font-medium text-white group-hover:text-primary transition-colors">Velvet Midnight Blazer</h3>
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-text-muted">$1,250</span>
                            </div>
                        </div>
                    </router-link>

                    <!-- Product Card 2 -->
                    <router-link to="/product/oax-silk-gown" class="group relative flex flex-col gap-3">
                        <div class="relative aspect-[3/4] w-full overflow-hidden rounded-lg bg-oax-panel">
                            <div class="absolute top-3 left-3 z-20">
                                <span class="bg-primary text-white text-[10px] font-bold px-2 py-1 uppercase tracking-wide">Sale</span>
                            </div>
                            <button class="absolute top-3 right-3 z-20 p-2 bg-black/20 backdrop-blur-sm rounded-full text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-primary hover:text-white">
                                <span class="material-symbols-outlined text-[18px]">favorite</span>
                            </button>
                            <img alt="OAX Silk Gown" class="absolute inset-0 h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuA54zQStxSKe6b7GTOmUrs7sz0RWch3jqYubI8Fb8wPMawiECWjThqL0ONX2-tOeKXagZhGRaSCodEVPoJM7miuUK7cPjgeITNqeqGH8tX8mh18cYYAsJidpjDo4_ac8XzvpLdFiXlS7OWynW6UDlbLsl3SsoPgmI1ZLjYWrQpS1-quB7NevhtiKMhnxmLm_b2933rgKLsrUN0ygXXbswTqAprU3co4Tk0z3EP9pqe8U-_QX9tP6QTzUMZHZ7NCfqiFGpgMDb87_HnZ" />
                            <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out z-20 bg-gradient-to-t from-black/80 to-transparent">
                                <button class="w-full bg-white text-black hover:bg-primary hover:text-white font-bold text-sm py-3 rounded uppercase tracking-wide transition-colors shadow-lg">
                                    Quick Add
                                </button>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-base font-medium text-white group-hover:text-primary transition-colors">OAX Silk Gown</h3>
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-primary font-bold">$890</span>
                                <span class="text-xs text-text-muted line-through">$1,450</span>
                            </div>
                        </div>
                    </router-link>

                    <!-- Product Card 3 -->
                    <router-link to="/product/eco-leather-trench" class="group relative flex flex-col gap-3">
                        <div class="relative aspect-[3/4] w-full overflow-hidden rounded-lg bg-oax-panel">
                            <div class="absolute top-3 left-3 z-20">
                                <span class="bg-green-700 text-white text-[10px] font-bold px-2 py-1 uppercase tracking-wide">Sustainable</span>
                            </div>
                            <button class="absolute top-3 right-3 z-20 p-2 bg-black/20 backdrop-blur-sm rounded-full text-white opacity-0 group-hover:opacity-100 transition-opacity hover:bg-primary hover:text-white">
                                <span class="material-symbols-outlined text-[18px]">favorite</span>
                            </button>
                            <img alt="Eco-Leather Trench" class="absolute inset-0 h-full w-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAAAiK12BHmObXBg3D0cAUFNBPKQJehV89M6p9ctrQfhD9Su9dYGcklo3hlOoPQseUIZlhvbIuumTq-dIySeCp8JqjSdsJSP0nuQD99D_HmUXU32Q1k_v3ciHcNkTKNNVxV4JbABlk9msFzEPF58XjBX_vNLWNWUraOliICioRA7wlIcTALWoBG3EWjF6eL8m7yyYK6dzsLtrcei4WLrVMKptarCKFXgFbovOooxqAcXd_MDpadX7oRwfIBpzQuoqhAPjhXggUv9eUy" />
                            <div class="absolute bottom-0 left-0 right-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300 ease-out z-20 bg-gradient-to-t from-black/80 to-transparent">
                                <button class="w-full bg-white text-black hover:bg-primary hover:text-white font-bold text-sm py-3 rounded uppercase tracking-wide transition-colors shadow-lg">
                                    Quick Add
                                </button>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <h3 class="text-base font-medium text-white group-hover:text-primary transition-colors">Eco-Leather Trench</h3>
                            <div class="flex items-center gap-2">
                                <span class="text-sm text-text-muted">$2,100</span>
                            </div>
                        </div>
                    </router-link>

                    <!-- More products can be added here -->
                </div>

                <!-- Load More -->
                <div class="mt-20 flex flex-col items-center justify-center gap-6">
                    <div class="w-full max-w-xs h-1 bg-oax-panel rounded-full overflow-hidden">
                        <div class="h-full bg-primary w-1/4 rounded-full"></div>
                    </div>
                    <p class="text-sm text-text-muted">You've viewed 6 of 145 products</p>
                    <button class="px-10 py-3 bg-transparent border border-white/20 text-white rounded hover:bg-white hover:text-black hover:border-white transition-all duration-300 font-medium tracking-wide">
                        Load More
                    </button>
                </div>
            </div>
        </main>
    </div>
</template>

<script setup>
</script>
