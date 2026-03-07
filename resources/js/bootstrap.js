import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Set base URL for API
window.axios.defaults.baseURL = import.meta.env.VITE_API_URL || '/api/v1';

// Initialize axios with token from localStorage if available
const initAxios = () => {
    const token = localStorage.getItem('token');
    if (token) {
        window.axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    }
};

// Run initialization
initAxios();

// Export for use in other places
export default window.axios;
