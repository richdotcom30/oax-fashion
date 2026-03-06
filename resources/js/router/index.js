import { createRouter, createWebHistory } from 'vue-router';
import axios from 'axios';

// Customer Pages
import Home from '../pages/Home.vue';
import Shop from '../pages/Shop.vue';
import ProductDetail from '../pages/ProductDetail.vue';
import Cart from '../pages/Cart.vue';
import Checkout from '../pages/Checkout.vue';
import OrderConfirmation from '../pages/OrderConfirmation.vue';
import AccountDashboard from '../pages/AccountDashboard.vue';
import OrderHistory from '../pages/OrderHistory.vue';
import Wishlist from '../pages/Wishlist.vue';
import About from '../pages/About.vue';
import Collections from '../pages/Collections.vue';
import Lookbook from '../pages/Lookbook.vue';
import Contact from '../pages/Contact.vue';
import LoyaltyProgram from '../pages/LoyaltyProgram.vue';
import AccountSettings from '../pages/AccountSettings.vue';
import VirtualTryOn from '../pages/VirtualTryOn.vue';
import PersonalStylist from '../pages/PersonalStylist.vue';
import StyleProfile from '../pages/StyleProfile.vue';
import OutfitBuilder from '../pages/OutfitBuilder.vue';
import Login from '../pages/Login.vue';
import Register from '../pages/Register.vue';

// Admin Pages
import AdminDashboard from '../pages/admin/Dashboard.vue';
import AdminProducts from '../pages/admin/Products.vue';
import AdminOrders from '../pages/admin/Orders.vue';
import AdminCustomers from '../pages/admin/Customers.vue';
import AdminAnalytics from '../pages/admin/Analytics.vue';
import AdminInventory from '../pages/admin/Inventory.vue';
import AdminCollections from '../pages/admin/Collections.vue';
import AdminMarketing from '../pages/admin/Marketing.vue';
import AdminReports from '../pages/admin/Reports.vue';
import AdminSettings from '../pages/admin/Settings.vue';
import AdminFulfillment from '../pages/admin/Fulfillment.vue';
import AdminReturnsExchanges from '../pages/admin/ReturnsExchanges.vue';
import AdminAddProduct from '../pages/admin/AddProduct.vue';

const routes = [
    // Customer Routes
    {
        path: '/',
        name: 'home',
        component: Home,
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
    },
    {
        path: '/shop',
        name: 'shop',
        component: Shop,
    },
    {
        path: '/collections',
        name: 'collections',
        component: Collections,
    },
    {
        path: '/product/:slug',
        name: 'product',
        component: ProductDetail,
    },
    {
        path: '/cart',
        name: 'cart',
        component: Cart,
    },
    {
        path: '/checkout',
        name: 'checkout',
        component: Checkout,
    },
    {
        path: '/order-confirmation',
        name: 'order-confirmation',
        component: OrderConfirmation,
    },
    {
        path: '/account',
        name: 'account',
        component: AccountDashboard,
    },
    {
        path: '/account/orders',
        name: 'order-history',
        component: OrderHistory,
    },
    {
        path: '/account/wishlist',
        name: 'wishlist',
        component: Wishlist,
    },
    {
        path: '/about',
        name: 'about',
        component: About,
    },
    {
        path: '/lookbook',
        name: 'lookbook',
        component: Lookbook,
    },
    {
        path: '/contact',
        name: 'contact',
        component: Contact,
    },
    {
        path: '/loyalty',
        name: 'loyalty',
        component: LoyaltyProgram,
    },
    {
        path: '/account/settings',
        name: 'account-settings',
        component: AccountSettings,
    },
    {
        path: '/virtual-try-on',
        name: 'virtual-try-on',
        component: VirtualTryOn,
    },
    {
        path: '/personal-stylist',
        name: 'personal-stylist',
        component: PersonalStylist,
    },
    {
        path: '/style-profile',
        name: 'style-profile',
        component: StyleProfile,
    },
    {
        path: '/outfit-builder',
        name: 'outfit-builder',
        component: OutfitBuilder,
    },
    
    // Admin Routes
    {
        path: '/admin/login',
        name: 'admin-login',
        component: Login,
        meta: { requiresAuth: false, isAdmin: true }
    },
    {
        path: '/admin',
        name: 'admin-dashboard',
        component: AdminDashboard,
    },
    {
        path: '/admin/products',
        name: 'admin-products',
        component: AdminProducts,
    },
    {
        path: '/admin/orders',
        name: 'admin-orders',
        component: AdminOrders,
    },
    {
        path: '/admin/customers',
        name: 'admin-customers',
        component: AdminCustomers,
    },
    {
        path: '/admin/analytics',
        name: 'admin-analytics',
        component: AdminAnalytics,
    },
    {
        path: '/admin/inventory',
        name: 'admin-inventory',
        component: AdminInventory,
    },
    {
        path: '/admin/collections',
        name: 'admin-collections',
        component: AdminCollections,
    },
    {
        path: '/admin/marketing',
        name: 'admin-marketing',
        component: AdminMarketing,
    },
    {
        path: '/admin/reports',
        name: 'admin-reports',
        component: AdminReports,
    },
    {
        path: '/admin/settings',
        name: 'admin-settings',
        component: AdminSettings,
    },
    {
        path: '/admin/fulfillment',
        name: 'admin-fulfillment',
        component: AdminFulfillment,
    },
    {
        path: '/admin/returns',
        name: 'admin-returns',
        component: AdminReturnsExchanges,
    },
    {
        path: '/admin/products/add',
        name: 'admin-product-add',
        component: AdminAddProduct,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
    scrollBehavior(to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition;
        } else {
            return { top: 0 };
        }
    },
});

// Navigation Guards for Admin Authentication
router.beforeEach((to, from, next) => {
    // Check if the route is an admin route
    const isAdminRoute = to.path.startsWith('/admin');
    
    if (isAdminRoute) {
        // Skip auth check for admin login page
        if (to.path === '/admin/login') {
            return next();
        }
        
        // Check for admin token
        const adminToken = localStorage.getItem('admin_token');
        if (!adminToken) {
            // Redirect to admin login
            return next({ name: 'admin-login' });
        }
        
        // Set Authorization header for admin API calls
        axios.defaults.headers.common['Authorization'] = `Bearer ${adminToken}`;
    }
    
    next();
});

export default router;
