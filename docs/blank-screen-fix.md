# Blank White Screen Issue - Diagnosis and Fix

## Problem Summary

The admin dashboard was displaying a blank white screen after adding a logout function. Additionally, when attempting to access the frontend, a MIME type error appeared:

```
build/assets/app-BY7RFCXv.js:1 Failed to load module script:
Expected a JavaScript-or-Wasm module script but the server responded with a MIME type of "text/html"
```

## Root Causes Identified

### 1. Import Order Issue in Dashboard.vue

**File**: `resources/js/pages/admin/Dashboard.vue`

**Problem**: The imports were placed at the bottom of the `<script setup>` block, after data definitions and function declarations. While Vue 3 with `<script setup>` does hoist imports, this unconventional placement could cause issues.

**Before**:

```vue
<script setup>
const revenueData = [...]

import { useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter()
const logout = async () => { ... }
</script>
```

**After**:

```vue
<script setup>
import { useRouter } from 'vue-router'
import axios from 'axios'

const router = useRouter()

const revenueData = [...]

const logout = async () => { ... }
</script>
```

### 2. Static index.html Conflict

**File**: `public/index.html`

**Problem**: There was a static `public/index.html` file that referenced production build assets (`/build/assets/app-*.js`), but the build folder doesn't exist. This caused the MIME type error when Vite tried to serve the app.

**Solution**: Deleted the static `public/index.html` file so Vite can properly serve the Vue app through the Laravel plugin.

### 3. Missing Vite Proxy Configuration

**File**: `vite.config.js`

**Problem**: The Vite dev server wasn't configured to proxy API requests to the Laravel backend. When the frontend tried to make API calls, it was either hitting the wrong server or receiving HTML responses instead of JavaScript.

**Before**:

```js
server: {
    watch: {
        ignored: ['**/storage/framework/views/**'],
    },
},
```

**After**:

```js
server: {
    port: 5173,
    host: '0.0.0.0',
    proxy: {
        '/api': {
            target: 'http://localhost:8000',
            changeOrigin: true,
            secure: false,
        },
        '/sanctum': {
            target: 'http://localhost:8000',
            changeOrigin: true,
            secure: false,
        },
    },
    watch: {
        ignored: ['**/storage/framework/views/**'],
    },
},
```

### 3. Laravel Server Not Running

**Problem**: The Laravel backend server wasn't running, so API requests couldn't be served even with proxy configuration.

**Solution**: Started Laravel server on port 8000:

```bash
php artisan serve --port=8000
```

## What Was Fixed

1. **Import Order**: Moved imports to the top of `<script setup>` in Dashboard.vue
2. **Static index.html**: Deleted conflicting `public/index.html` that referenced non-existent build assets
3. **Vite Proxy**: Added proxy configuration to forward `/api` and `/sanctum` requests to Laravel
4. **Web.php Routing**: Fixed to serve Blade template with @vite directive
5. **Laravel Server**: Started the Laravel development server on port 8000

## Current Server Setup

| Service         | URL                   | Purpose             |
| --------------- | --------------------- | ------------------- |
| Vite Dev Server | http://localhost:5174 | Frontend dev server |
| Laravel Server  | http://localhost:8000 | **Use this URL!**   |

## Important: Access the Correct URL

**Always access your app at http://localhost:8000** (Laravel server), NOT at http://localhost:5174 (Vite).

The Vite server (:5174) is only for development - Laravel automatically pulls assets from it when you access :8000.

## How the Proxy Works

1. User visits `http://localhost:5173/admin`
2. Vite serves the Vue.js application
3. When the app makes API calls to `/api/v1/auth/logout`
4. Vite proxy intercepts the request and forwards to `http://localhost:8000/api/v1/auth/logout`
5. Laravel processes the request and returns the response
6. Vite proxies the response back to the frontend

## Files Modified

1. `resources/js/pages/admin/Dashboard.vue` - Import order fix
2. `public/index.html` - Deleted conflicting static file
3. `vite.config.js` - Added proxy configuration
4. `routes/web.php` - Fixed SPA routing to use Blade template

## Testing the Fix

1. Ensure Laravel server is running: `php artisan serve --port=8000`
2. Ensure Vite dev server is running: `npm run dev`
3. Access the admin dashboard at: http://localhost:5173/admin
4. Test the logout functionality

## Future Recommendations

1. **Production Build**: For production, run `npm run build` to generate static assets
2. **Environment Variables**: Configure `VITE_API_URL` in `.env` for different environments
3. **HTTPS**: Configure SSL certificates for production environments

## Server Options Explained

| Option              | Description                    | Use Case                         |
| ------------------- | ------------------------------ | -------------------------------- |
| `php artisan serve` | Built-in PHP dev server        | Local development, quick testing |
| Laravel Valet       | macOS-specific dev environment | macOS local development          |
| Laravel Sail        | Docker-based development       | Containerized development        |
| Apache/Nginx        | Full web server                | Production, complex setups       |

For this project, we're using `php artisan serve` as the Laravel backend server.
