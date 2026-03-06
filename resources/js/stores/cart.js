import { defineStore } from 'pinia';
import { ref, computed } from 'vue';

export const useCartStore = defineStore('cart', () => {
    // State
    const items = ref([
        {
            id: 1,
            productId: 1,
            name: 'OAX Silk Gown',
            sku: '48291-BK',
            price: 1250,
            size: '38',
            color: 'Midnight Black',
            quantity: 1,
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuDXWnBHRRSZAjSzGkjonF-oJkxZ7GD6ehwyD5RYNpNsZ6Y24fYGlCSjKmOO4V38MMiV4xWUp8VhxOKmkKti4i-q4KTtjHjU7FC67RXmZeVEntppITjxRH4R0UD31VWKNSrd3wKCPb2YHKoQEYCBg17UkMbHY3r0JhHNo64kWnACRzOu_ECi5yh-mjii6jjUzk_OzZa0qR-RZY5Lf9tyN43tLbzZMRaojTD4Ex38Np9gwmXDCN5D8qr0jnEZoZSZuC_Yvf2Euwq5M7mc'
        },
        {
            id: 2,
            productId: 2,
            name: 'Velvet Blazer',
            sku: '99210-BG',
            price: 890,
            size: '40',
            color: 'Deep Burgundy',
            quantity: 1,
            image: 'https://lh3.googleusercontent.com/aida-public/AB6AXuBiXAQm0V_axyQRAgWPIexC8taYsFsvpTbYL3o3T-_pM121iYILu7CMf9NSznzbmOoYD7Y9de0V0pBcR2bxZjRexB_P0ETvFYAHgdr88ldZAyFfOHI-UnPTwVxnvwUqg4RyKbWrvarhF3OMXowxyg1C40icmHucaKKXZUfllJL97H-rJ7sDbcU-C0rXlwwHrvaPWpQUAYHHd2GTZHOlHWlY0gh5L5tkE22pbkwoSjOEM-d4EheA2PUhA1kMZjD2N-udAm6V3AbHivEH'
        }
    ]);
    const isDrawerOpen = ref(false);

    // Getters
    const itemCount = computed(() => {
        return items.value.reduce((total, item) => total + item.quantity, 0);
    });

    const subtotal = computed(() => {
        return items.value.reduce((total, item) => total + (item.price * item.quantity), 0);
    });

    const tax = computed(() => {
        return subtotal.value * 0.075; // 7.5% tax
    });

    const total = computed(() => {
        return subtotal.value + tax.value;
    });

    // Actions
    const toggleDrawer = () => {
        isDrawerOpen.value = !isDrawerOpen.value;
    };

    const openDrawer = () => {
        isDrawerOpen.value = true;
    };

    const closeDrawer = () => {
        isDrawerOpen.value = false;
    };

    const addItem = (product, quantity = 1, size = null, color = null) => {
        const existingItem = items.value.find(
            item => item.productId === product.id && item.size === size && item.color === color
        );

        if (existingItem) {
            existingItem.quantity += quantity;
        } else {
            items.value.push({
                id: Date.now(),
                productId: product.id,
                name: product.name,
                sku: product.sku,
                price: product.price,
                size: size,
                color: color,
                quantity: quantity,
                image: product.image
            });
        }
        openDrawer();
    };

    const removeItem = (itemId) => {
        const index = items.value.findIndex(item => item.id === itemId);
        if (index > -1) {
            items.value.splice(index, 1);
        }
    };

    const updateQuantity = (itemId, quantity) => {
        const item = items.value.find(item => item.id === itemId);
        if (item) {
            if (quantity <= 0) {
                removeItem(itemId);
            } else {
                item.quantity = quantity;
            }
        }
    };

    const clearCart = () => {
        items.value = [];
    };

    return {
        items,
        isDrawerOpen,
        itemCount,
        subtotal,
        tax,
        total,
        toggleDrawer,
        openDrawer,
        closeDrawer,
        addItem,
        removeItem,
        updateQuantity,
        clearCart
    };
});
