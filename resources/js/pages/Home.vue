<template>
    <div class="relative flex min-h-screen w-full flex-col overflow-hidden">
        <!-- Hero Section -->
        <section class="relative w-full h-[85vh] min-h-[600px] flex items-center justify-center overflow-hidden">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0">
                <div class="absolute inset-0 bg-gradient-to-t from-background-dark via-background-dark/50 to-transparent z-10"></div>
                <div class="absolute inset-0 bg-black/30 z-10"></div>
                <img 
                    alt="High fashion model in dark avant-garde clothing" 
                    class="w-full h-full object-cover object-top opacity-90" 
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCCQb7866R2mK05nygzljxgan_-HXW6_CqyttlB4qU0baJhrrn5TxEhjVSFXeA2MrTcL3-rKdS6OH--3A5pV6n_yK1H8itaxtH4TdClfffeZizQFLkF02ZMlEq_RFVAZETDvLrnLzNb-PPPOENFPd3_1w2d9fwWFqTWyqcxWAM3ajkMM26umzgNCkIKM2VNVHz4G6oKB4xhNqyRWiwgRY8IixnDoi0uOSrpo_xpzcD9iGqUKaqZO3QyTWg5CNyXUZ7cqMKr3Zg9gn2n"
                />
            </div>
            <!-- Hero Content -->
            <div class="relative z-20 text-center px-4 max-w-4xl mx-auto flex flex-col items-center gap-6">
                <span class="text-primary text-sm font-bold tracking-[0.2em] uppercase animate-pulse">New Collection Drop</span>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-black text-white leading-tight tracking-tighter">
                    OAX <span class="text-primary">BLOOD</span>
                </h1>
                <p class="text-gray-300 text-lg md:text-xl font-light max-w-xl mx-auto leading-relaxed">
                    Luxury isn't just worn. It is felt. Experience the new era of avant-garde fashion tailored for the bold.
                </p>
                <div class="pt-8">
                    <router-link 
                        to="/shop" 
                        class="group relative inline-flex items-center justify-center px-8 py-4 text-base font-bold text-white bg-primary rounded-full overflow-hidden transition-all duration-300 hover:bg-primary-light hover:text-white hover:scale-105 hover:shadow-[0_0_20px_rgba(139,0,0,0.4)]"
                    >
                        <span class="relative z-10 flex items-center gap-2">
                            Shop The Collection
                            <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </span>
                    </router-link>
                </div>
            </div>
        </section>

        <!-- Featured Collections -->
        <section class="py-20 px-4 md:px-10 max-w-[1440px] mx-auto w-full">
            <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-white tracking-tight mb-2">Curated Series</h2>
                    <p class="text-gray-400">Select a realm to explore.</p>
                </div>
                <router-link to="/collections" class="text-sm font-bold text-primary hover:text-white transition-colors flex items-center gap-1">
                    View All Collections <span class="material-symbols-outlined text-[16px]">arrow_outward</span>
                </router-link>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 md:gap-6">
                <!-- Card 1 -->
                <router-link to="/collections" class="group relative h-[500px] rounded-xl overflow-hidden cursor-pointer">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 z-10"></div>
                    <img 
                        alt="Dark moody fashion photography" 
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCjStWx5fVI7mNZrj_CKXSfFsv0AmFZ5HfG61s-njauDMCYiRRjX-kvWizAsFEUInifTAd7sojB_PtiryCep9TPwz42K45denYN0QOoNfVtX_vOXVWPnKvb1VJJeKz-QMyKd5qiDvsh2tp0c6WQbFVuiZfNoie_KoMr2aMvvdvyIu6_6Yve38OT3MFiY200udD0UYkf00hwSjmQRTv2VCQkqR6n0pTuEytpXWqkZ2n46gbzNUVbB0xfOEDpsN7xfgc0hCNIOSP7TlX3"
                    />
                    <div class="absolute bottom-0 left-0 p-8 z-20 w-full">
                        <span class="text-primary text-xs font-bold uppercase tracking-wider mb-2 block">Series 01</span>
                        <h3 class="text-white text-2xl font-bold mb-4 group-hover:text-primary transition-colors">The Midnight Line</h3>
                        <span class="inline-flex items-center justify-center size-10 rounded-full bg-white/10 backdrop-blur-sm text-white group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </span>
                    </div>
                </router-link>
                <!-- Card 2 -->
                <router-link to="/collections" class="group relative h-[500px] rounded-xl overflow-hidden cursor-pointer md:-mt-12">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 z-10"></div>
                    <img 
                        alt="Model wearing red high fashion dress" 
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDBDY1DVFY4oT4gicag0FTgKBzd-ism0F1DeEko5XdZlPtCaWsZtnrzG4lHp7FrJWu7mrQo5yiJkbQx4aRj1M5V4Jo_RmnTDL6GJAAEOACwW48I8lt5HPjL3GrKJwbCDHJ8aTdoxSZuiDB5JDLNj5gDoZhBQSdhuiNbgxMedrjL8eQz9DOA4-9XwXn4quQSHmDusp4jAXWqEmmp5vH6R340SmAsKuozRp-tEmm2MYwJHxX94JTptuv5Q4QrXiDcbD2KnH0ElgVEwY9P"
                    />
                    <div class="absolute bottom-0 left-0 p-8 z-20 w-full">
                        <span class="text-primary text-xs font-bold uppercase tracking-wider mb-2 block">Series 02</span>
                        <h3 class="text-white text-2xl font-bold mb-4 group-hover:text-primary transition-colors">Crimson Series</h3>
                        <span class="inline-flex items-center justify-center size-10 rounded-full bg-white/10 backdrop-blur-sm text-white group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </span>
                    </div>
                </router-link>
                <!-- Card 3 -->
                <router-link to="/collections" class="group relative h-[500px] rounded-xl overflow-hidden cursor-pointer">
                    <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent opacity-80 z-10"></div>
                    <img 
                        alt="Black and white minimalist fashion portrait" 
                        class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAaq7_aCS1w0tgT9If56MWj03xPrMS-qGdmc4CYjrg96T_RIp80ryTF3nH0R2Z-InR1g0120jgEFA0A9WZtivFLLmMDWvxwUSbR5z-jdDSKAeUbwOkNbancpMDR4law9VFJ7wGw9AiQNxaLOqWuoLgSRd9viv8EFYPZTr73CGKwkAjq8EkirwN5_wAfN2hNqX7eLlPPw8U3ZSYm1pyxuK0N-JOCBUm8DaAGazdxxhOyno7tTzw66gn5NnLRFIARgw8KQeFEKROs-sQX"
                    />
                    <div class="absolute bottom-0 left-0 p-8 z-20 w-full">
                        <span class="text-primary text-xs font-bold uppercase tracking-wider mb-2 block">Series 03</span>
                        <h3 class="text-white text-2xl font-bold mb-4 group-hover:text-primary transition-colors">Noir Essentials</h3>
                        <span class="inline-flex items-center justify-center size-10 rounded-full bg-white/10 backdrop-blur-sm text-white group-hover:bg-primary group-hover:text-white transition-colors">
                            <span class="material-symbols-outlined">arrow_forward</span>
                        </span>
                    </div>
                </router-link>
            </div>
        </section>

        <!-- Brand Philosophy -->
        <section class="py-24 bg-[#0a0a0a] relative overflow-hidden">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[400px] bg-primary/10 blur-[120px] rounded-full pointer-events-none"></div>
            <div class="max-w-4xl mx-auto px-6 text-center relative z-10">
                <span class="text-gray-500 text-sm font-medium tracking-[0.3em] uppercase mb-6 block">Our Philosophy</span>
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-8 leading-tight">
                    "Fashion is not just worn;<br/>it is <span class="relative inline-block text-primary">bled<svg class="absolute w-full h-3 -bottom-1 left-0 text-primary" preserveaspectratio="none" viewbox="0 0 100 10"><path d="M0 5 Q 50 10 100 5" fill="none" stroke="currentColor" stroke-width="3"></path></svg></span>."
                </h2>
                <p class="text-gray-400 text-lg leading-relaxed max-w-2xl mx-auto">
                    We strip away the unnecessary to reveal the raw, beating heart of style. OAX is a commitment to the bold, the dark, and the undeniably luxurious.
                </p>
            </div>
        </section>

        <!-- New Arrivals -->
        <section class="py-20 px-4 md:px-10 max-w-[1440px] mx-auto w-full">
            <div class="flex items-center justify-between mb-10">
                <h2 class="text-3xl font-bold text-white">New Arrivals</h2>
                <div class="flex gap-2">
                    <button class="size-10 rounded-full border border-oax-border text-white flex items-center justify-center hover:border-primary hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">chevron_left</span>
                    </button>
                    <button class="size-10 rounded-full border border-oax-border text-white flex items-center justify-center hover:border-primary hover:text-primary transition-colors">
                        <span class="material-symbols-outlined">chevron_right</span>
                    </button>
                </div>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="group flex flex-col gap-4">
                    <div class="relative aspect-[3/4] bg-oax-panel rounded-xl overflow-hidden">
                        <span class="absolute top-3 left-3 bg-white text-black text-[10px] font-bold px-2 py-1 rounded-full z-20">NEW</span>
                        <button class="absolute top-3 right-3 size-8 bg-black/50 hover:bg-white hover:text-black rounded-full flex items-center justify-center text-white transition-colors z-20">
                            <span class="material-symbols-outlined text-[18px]">favorite</span>
                        </button>
                        <img 
                            alt="Silk Draped Tunic" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBDXQyYRW6dtS1dZaaHQk8LwMLQ0Q2nRYo1J4UQEmdR2mCc5kjYnxeHxwQGcu0G12t0gZhJZFq1d_m2OzNNJ7aPbjjSyDNhhCpzMMDJPwezWmhpf0edJ2cyxYPdhVnRpQ8befWvx5gkSi0rCN13_eJpJhVANrkmYkkHKa8oSznDozVAoGeF8hm5IVXiLy798s-regZDfGBwj_tRGWXwFBTIvzwlGVSIVvR_GCRxH31qpWrAgd9BvXk4_dT7nx-THcjUj2XGUutomWuM"
                        />
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <router-link to="/product/silk-draped-tunic" class="w-full h-10 bg-white text-black font-bold rounded-full text-sm hover:bg-primary hover:text-white flex items-center justify-center transition-colors">Quick Add</router-link>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <router-link to="/product/silk-draped-tunic" class="text-white font-medium text-base mb-1 hover:text-primary transition-colors">Silk Draped Tunic</router-link>
                            <p class="text-gray-500 text-sm">OAX Gold Collection</p>
                        </div>
                        <span class="text-primary font-bold">$450</span>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="group flex flex-col gap-4">
                    <div class="relative aspect-[3/4] bg-oax-panel rounded-xl overflow-hidden">
                        <span class="absolute top-3 left-3 bg-white text-black text-[10px] font-bold px-2 py-1 rounded-full z-20">NEW</span>
                        <button class="absolute top-3 right-3 size-8 bg-black/50 hover:bg-white hover:text-black rounded-full flex items-center justify-center text-white transition-colors z-20">
                            <span class="material-symbols-outlined text-[18px]">favorite</span>
                        </button>
                        <img 
                            alt="Obsidian Blazer" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDmTfXx9Tl7LfJWobwtf0l4qegdVpTI5SaPvfg_k5SiXFrJAtvQEqwaNc1ojWI2ChbG5c59v4vYb_fdhZcJJA332YAdxO5pmGKg2sieW7H9T4Y2uJH1bzKwD_pWMmbnoMmyfCvpVlpflAcHgDKL7tdtHFSekVQotgwhzqSoASDMiM5tWdjJzZybB7Cn77TpIdOhOVtKQvpnwUsCatMROu5xxDd-Vwsue9fLl7hgKz9fBUtDHRpL4PhJBeHzCib1ldR8YbCQqvhwcMwu"
                        />
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <router-link to="/product/obsidian-blazer" class="w-full h-10 bg-white text-black font-bold rounded-full text-sm hover:bg-primary hover:text-white flex items-center justify-center transition-colors">Quick Add</router-link>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <router-link to="/product/obsidian-blazer" class="text-white font-medium text-base mb-1 hover:text-primary transition-colors">Obsidian Blazer</router-link>
                            <p class="text-gray-500 text-sm">Noir Essentials</p>
                        </div>
                        <span class="text-primary font-bold">$890</span>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="group flex flex-col gap-4">
                    <div class="relative aspect-[3/4] bg-oax-panel rounded-xl overflow-hidden">
                        <button class="absolute top-3 right-3 size-8 bg-black/50 hover:bg-white hover:text-black rounded-full flex items-center justify-center text-white transition-colors z-20">
                            <span class="material-symbols-outlined text-[18px]">favorite</span>
                        </button>
                        <img 
                            alt="Sheer Mesh Top" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuA5sEmLEXjbmCnM6hq_C7mDaB0esOlpVbwnjc1Sip98w_aSRyTXXV62xyh0Bz23FpA7AO3_E_-E2GkXIyYmC4ueE3t24gEO7DBFsbmsgzIIh8U9R6-QzLufnF65tlJs70bnsDxEVXEUTgaIzoOrEGzr0S4MB4erdmxvWRVh5r9x_seLxRCcOtJ0UZHLJyucRpfEMxDnr-9ZsQ-uLwSTvix6CQ50XX_q6MmXb9fNxyfwse9NHnNOaT8UEiIMeyPvVoDIzClDR__Ywwir"
                        />
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <router-link to="/product/sheer-mesh-top" class="w-full h-10 bg-white text-black font-bold rounded-full text-sm hover:bg-primary hover:text-white flex items-center justify-center transition-colors">Quick Add</router-link>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <router-link to="/product/sheer-mesh-top" class="text-white font-medium text-base mb-1 hover:text-primary transition-colors">Sheer Mesh Top</router-link>
                            <p class="text-gray-500 text-sm">Editorial Cut</p>
                        </div>
                        <span class="text-primary font-bold">$320</span>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="group flex flex-col gap-4">
                    <div class="relative aspect-[3/4] bg-oax-panel rounded-xl overflow-hidden">
                        <button class="absolute top-3 right-3 size-8 bg-black/50 hover:bg-white hover:text-black rounded-full flex items-center justify-center text-white transition-colors z-20">
                            <span class="material-symbols-outlined text-[18px]">favorite</span>
                        </button>
                        <img 
                            alt="Carbon Cargo Pant" 
                            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBoiw9QEvuDtaWJAh-64O2Ki5VIVUitM0uCW-aMCxAMCZclHQKuFf6F_sQPvuyXZ0qVSXk4ZFUV3sc1hxuCAYbYP3KuzUsHgwn_ya6lYrjn-yFaF28aBuwN_3AgqBmJ40XvGVrJiU3msggkUb0IhovWg-svifSyXifglA7TFmmsphV4QaAy8LBTxgoVe1MeWFl7BI3iOuAcbsA71475s3URnr7B6hAb9181gXvTAqRWxvOEb--itC_DpWs8l77hb_WiXfOmF7AFFYKD"
                        />
                        <div class="absolute inset-x-0 bottom-0 p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                            <router-link to="/product/carbon-cargo-pant" class="w-full h-10 bg-white text-black font-bold rounded-full text-sm hover:bg-primary hover:text-white flex items-center justify-center transition-colors">Quick Add</router-link>
                        </div>
                    </div>
                    <div class="flex justify-between items-start">
                        <div>
                            <router-link to="/product/carbon-cargo-pant" class="text-white font-medium text-base mb-1 hover:text-primary transition-colors">Carbon Cargo Pant</router-link>
                            <p class="text-gray-500 text-sm">Street Luxe</p>
                        </div>
                        <span class="text-primary font-bold">$410</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Editorial / Feature Section -->
        <section class="py-20 bg-[#0f0f0f]">
            <div class="max-w-[1440px] mx-auto px-4 md:px-10">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                    <!-- Image Side -->
                    <div class="relative rounded-xl overflow-hidden h-[600px] group">
                        <img 
                            alt="High concept fashion editorial shot" 
                            class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" 
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuB7kbXm9e9f7XweTKGktzI_f-c5lhxUTgDEFRJnUssNK0r-5X734KoU3qCQ7HY65GdhhY9JbvEu_RTphh2hA4J_I4fRwQHjCllJnuSzyoHHr_mKI7ppRamHsVRBvS-amdLZWppAB3nBTlKrcS12y0FA3R0FtDwbE6LI7iD20mNXbxwkOM-88QJszu-KBpSGwnpVzleVmaWy1SoM6-MaCC_X6rif_7jzJ5Izj-YqXrexrnGdREBgDZjIzoh2KUl9KIsuJsOShGhYk3AI"
                        />
                        <div class="absolute inset-0 bg-primary/20 mix-blend-overlay"></div>
                    </div>
                    <!-- Content Side -->
                    <div class="flex flex-col gap-8 lg:pl-10">
                        <span class="text-primary font-bold uppercase tracking-widest text-sm">Editorial 2024</span>
                        <h2 class="text-5xl md:text-6xl font-black text-white leading-[0.9]">
                            Shadow<br/>
                            <span class="text-gray-700">&</span> Form
                        </h2>
                        <div class="w-20 h-1 bg-primary rounded-full"></div>
                        <p class="text-gray-300 text-lg leading-relaxed max-w-md">
                            Exploring the duality of modern silhouettes through a lens of dark romanticism. Our latest editorial invites you to discover the hidden details in the absence of light.
                        </p>
                        <router-link to="/lookbook" class="w-fit flex items-center gap-3 text-white border-b border-white pb-1 hover:text-primary hover:border-primary transition-colors">
                            <span class="font-bold text-lg">View Lookbook</span>
                            <span class="material-symbols-outlined">arrow_right_alt</span>
                        </router-link>
                    </div>
                </div>
            </div>
        </section>

        <!-- Instagram Feed -->
        <section class="py-20 px-4 md:px-10 max-w-[1440px] mx-auto w-full">
            <div class="flex flex-col items-center justify-center mb-12 text-center">
                <h2 class="text-2xl font-bold text-white mb-2">@OAXFASHION</h2>
                <p class="text-gray-400 mb-6">Join the movement.</p>
                <button class="bg-oax-panel text-white px-6 py-2 rounded-full text-sm font-bold hover:bg-primary transition-colors">
                    Follow Us
                </button>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-2">
                <!-- Insta Item 1 -->
                <div class="relative aspect-square bg-oax-panel overflow-hidden group cursor-pointer">
                    <img 
                        alt="Fashion model closeup" 
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAn_esisoRjpWyqh7HEBgAKV9q9TqBRyVkM4gVINIHK3SmV7ueRBER0ORQJwRoztudkn9nSV4Yuo9WAg2YTieS33m2ygynQvgwVUtgPd5EyRHbCgG-OdNMbppYrN85gYUROJq5YhvYhmQzN5GwqYo3mrEjulJb2k1dq4TtdsgciI15ZbhnxWRfXICmkyMGLD_IO6fz_4oCtj1qwMFIuXFBVqYwvdGyuIYSGPKTxdkZwFu40dVIvTB96ndaQe8R5WSn1xLn2qkfwUfkA"
                    />
                    <div class="absolute inset-0 bg-primary/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-black text-3xl">open_in_new</span>
                    </div>
                </div>
                <!-- Insta Item 2 -->
                <div class="relative aspect-square bg-oax-panel overflow-hidden group cursor-pointer">
                    <img 
                        alt="Gold jewelry detail" 
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBfyda4WlPoeRbWjOFS6fly-bc1ZY094TPHgGJCN2ZTjQT5AqV-1bfO0g6mL3dw1sMCueWq4ChvpOY6tdRi0Sl4bsvr9axdpnIHnGfGJkuKmcnqDhbz9jxZaJGmNLAKblf3lPtnuDd6zyeNZWPpMKmawKFnhKM8Md11eIbGJXg1_e4eGvF-DYbyStSI_ZiXbORfDkmcjOFUzjDxGah6otNqmAi06roD-SmeDHQcSzUAeJ0LQbovhoVyEDu7Gtv9OaReDcY111fB-vXn"
                    />
                    <div class="absolute inset-0 bg-primary/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-black text-3xl">open_in_new</span>
                    </div>
                </div>
                <!-- Insta Item 3 -->
                <div class="relative aspect-square bg-oax-panel overflow-hidden group cursor-pointer">
                    <img 
                        alt="Monochrome fashion silhouette" 
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7loRCQyyqLq1jfOthOrKdnKVli9XaRV7_q_EhldyVjXmr2k5kASyzkDzm0ZCQyYJ-Upk74iakAjr1BdDa9Lm5X3J_v_lZRGyi0KXk3S4bMaGsOUvFRjh5ErSeg7595iUktDGxS8lzyhvFrP2c1nHCd-hk4MejE6dfp58vkw4SXlIz4DJoJgmn5qfe2wc1VryBWh3Ybf-eJz5w68qgoJNqZlDfJd1SWPjfZ5HsHVC3ggbqF6KeC4ox8KeTxtHpxwBdhSzWpXTxDr5c"
                    />
                    <div class="absolute inset-0 bg-primary/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-black text-3xl">open_in_new</span>
                    </div>
                </div>
                <!-- Insta Item 4 -->
                <div class="relative aspect-square bg-oax-panel overflow-hidden group cursor-pointer">
                    <img 
                        alt="Red fabric texture" 
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuB4K_BgIG1TuAi0PnDDQ44JMgG9XsJt3PFYxHtv8PFo2d7pI4hu-yDwZVFyQ6QkLhVdi3gVq-0ymDZzJEToc1V57WhG1keTWYEresLcq_OFisRy2Wx42SX2xVd3kCVGvvFeMdLXDT7LdQvP_912yfuN6fB5cYvPpHrharAbF5l8fBLfDmcsx_oUlOKS_tyJPIH7ZPqkI0PzbdmtU6XIH_Pe3wijquIuYfRyybvEHW4DQ4Ej1cUANwgf7D8hsOqKHBgvKEg5vBMqHCdA"
                    />
                    <div class="absolute inset-0 bg-primary/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-black text-3xl">open_in_new</span>
                    </div>
                </div>
                <!-- Insta Item 5 -->
                <div class="relative aspect-square bg-oax-panel overflow-hidden group cursor-pointer hidden md:block">
                    <img 
                        alt="Runway model walking" 
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBLNXo5c5UcA_laKf4M3NmgFcv4yMIv8vkodZbT8X3nKF2Dzs7__jhuRvYATkinBCasKmLEoqIU6ivZf2mW6zN1f-XDEOIUneb7M6pFsjX_vSguPP1nDQs2c75PCob1PKQljEzna9vGmb2Utxptp39kE9DUyvy0UC6FSJP2qrXyVC5OJIcHIw78cNVom_vVqwvhRUf4ohjSDBIi-nYjElnmTC9d2PLsJGLmMLyE0cAtPaR8guAztvIX-QtgCc-Jn0hUzCd2rPnVS03a"
                    />
                    <div class="absolute inset-0 bg-primary/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-black text-3xl">open_in_new</span>
                    </div>
                </div>
                <!-- Insta Item 6 -->
                <div class="relative aspect-square bg-oax-panel overflow-hidden group cursor-pointer hidden lg:block">
                    <img 
                        alt="Abstract architectural shadows" 
                        class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity" 
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuDthoThTYc7RG-O5qtIqj5itbteHyXVwAw6Ez8tSiDoPf5RinmtZZqQZHsli9v00wVWjKrKoX39lbnHHy_2AgtREqwIMwkLKNqK_6QjxwtTWhbVWs76VpZHirpPKvU1sRtdfBg0-GKhhP8BPh8ipkr-vl-smQtzM4KOYCStWaFYgbeGG9GssCdkh0ObhHY-e8Gg32zYUeeTUEHodwjpP_oy07vQxhwaso_OBRbiKUMJ2YNqO4M31m3E7bwdCjBd0YevDEgTjS93k0kR"
                    />
                    <div class="absolute inset-0 bg-primary/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <span class="material-symbols-outlined text-black text-3xl">open_in_new</span>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script setup>
// Homepage component - static content from inspiration
</script>
