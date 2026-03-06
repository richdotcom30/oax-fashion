<p align="center">
  <img src="onlineshoping-favicon.png" alt="OAX FASHION Logo" width="100">
</p>

<h1 align="center">OAX FASHION</h1>

<p align="center">
  A luxury fashion e-commerce platform built with Vue.js 3, Laravel, and Tailwind CSS
</p>

<p align="center">
  <a href="#"><img src="https://img.shields.io/badge/Laravel-12.x-orange?style=flat&logo=laravel" alt="Laravel"></a>
  <a href="#"><img src="https://img.shields.io/badge/Vue.js-3.x-green?style=flat&logo=vue.js" alt="Vue.js"></a>
  <a href="#"><img src="https://img.shields.io/badge/Tailwind CSS-4.x-38bdf8?style=flat&logo=tailwind-css" alt="Tailwind CSS"></a>
  <a href="#"><img src="https://img.shields.io/badge/TypeScript-5.x-blue?style=flat&logo=typescript" alt="TypeScript"></a>
</p>

---

## About OAX FASHION

OAX FASHION is a high-end luxury fashion e-commerce platform featuring a sophisticated dark theme with gold accents. The platform offers a premium shopping experience with modern design patterns, smooth animations, and comprehensive functionality for both customers and administrators.

### Brand Identity

- **Primary Color**: OAX Blood Red (#8B0000)
- **Accent Color**: Luxury Gold (#D4AF37)
- **Dark Tones**: Black (#000000), Dark Gray (#1A1A1A)
- **Typography**: Playfair Display (headings), Manrope (body)

---

## Features

### Customer Features

- 🛍️ **Product Catalog** - Advanced filtering by category, size, color, and price
- 📱 **Responsive Design** - Works flawlessly on desktop, tablet, and mobile
- 🛒 **Shopping Cart** - Slide-out drawer with real-time updates
- 💳 **Checkout Flow** - Multi-step checkout with payment integration placeholders
- 👤 **User Accounts** - Dashboard, order history, wishlist management
- ⭐ **Loyalty Program** - Silver, Gold, and Platinum tiers
- 📏 **AI Size Guide** - Smart size recommendations
- 👓 **Virtual Try-On** - AR placeholder for accessories
- 🎨 **Style Profile** - Personalized style quiz
- 👔 **Outfit Builder** - Mix and match products
- 📖 **Lookbook** - Editorial content with shoppable images
- 💬 **Contact Form** - Customer support integration

### Admin Features

- 📊 **Dashboard** - KPIs, charts, and analytics
- 📦 **Product Management** - CRUD operations with variant support
- 📋 **Order Management** - Fulfillment workflow and tracking
- 👥 **Customer CRM** - Customer profiles and purchase history

---

## Tech Stack

| Layer            | Technology                 |
| ---------------- | -------------------------- |
| Frontend         | Vue.js 3 (Composition API) |
| State Management | Pinia                      |
| Styling          | Tailwind CSS v4            |
| Backend          | Laravel 12                 |
| Database         | MySQL / SQLite             |
| Icons            | Material Symbols           |
| Fonts            | Playfair Display, Manrope  |

---

## Project Structure

```
oax-fashion/
├── app/
│   ├── Http/Controllers/Api/    # Laravel API Controllers
│   └── Models/                   # Eloquent Models
├── database/
│   └── migrations/              # Database Migrations
├── public/
│   ├── build/                   # Compiled Vue assets
│   └── index.html               # SPA entry point
├── resources/
│   ├── css/                     # Tailwind CSS
│   └── js/
│       ├── components/          # Vue Components
│       │   ├── cart/
│       │   └── layout/
│       ├── pages/               # Page Components
│       │   ├── admin/
│       │   └── *.vue
│       ├── router/              # Vue Router
│       └── stores/              # Pinia Stores
├── inspiration/                 # Design reference files
└── plans/                      # Project documentation
```

---

## Getting Started

### Prerequisites

- PHP 8.2+
- Node.js 18+
- Composer
- MySQL or SQLite

### Installation

1. **Clone the repository**

    ```bash
    git clone https://github.com/your-repo/oax-fashion.git
    cd oax-fashion
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Environment Setup**

    ```bash
    cp .env.example .env
    # Configure your database connection in .env
    ```

5. **Generate application key**

    ```bash
    php artisan key:generate
    ```

6. **Run migrations**

    ```bash
    php artisan migrate
    ```

7. **Build frontend assets**
    ```bash
    npm run build
    ```

### Development Servers

**Start Vue.js development server:**

```bash
npm run dev
```

**Start Laravel server:**

```bash
php artisan serve
```

The application will be available at:

- Frontend: http://localhost:5173
- Backend API: http://localhost:8000

---

## Available Routes

### Customer Routes

| Path                  | Page               |
| --------------------- | ------------------ |
| `/`                   | Home               |
| `/shop`               | Shop / Catalog     |
| `/collections`        | Collections        |
| `/product/:slug`      | Product Detail     |
| `/cart`               | Shopping Cart      |
| `/checkout`           | Checkout           |
| `/order-confirmation` | Order Confirmation |
| `/account`            | Account Dashboard  |
| `/account/orders`     | Order History      |
| `/account/wishlist`   | Wishlist           |
| `/account/settings`   | Account Settings   |
| `/about`              | About Us           |
| `/lookbook`           | Editorial Lookbook |
| `/contact`            | Contact Us         |
| `/loyalty`            | Loyalty Program    |
| `/virtual-try-on`     | Virtual Try-On     |
| `/personal-stylist`   | Personal Stylist   |
| `/style-profile`      | Style Profile Quiz |
| `/outfit-builder`     | Outfit Builder     |

### Admin Routes

| Path               | Page               |
| ------------------ | ------------------ |
| `/admin`           | Dashboard Overview |
| `/admin/products`  | Product Management |
| `/admin/orders`    | Order Management   |
| `/admin/customers` | Customer Database  |

---

## API Endpoints

### Products

- `GET /api/products` - List all products
- `GET /api/products/{id}` - Get product details
- `POST /api/products` - Create product (admin)
- `PUT /api/products/{id}` - Update product (admin)
- `DELETE /api/products/{id}` - Delete product (admin)

### Categories

- `GET /api/categories` - List categories
- `GET /api/categories/{id}/products` - Get products by category

### Cart

- `GET /api/cart` - Get cart items
- `POST /api/cart` - Add to cart
- `PUT /api/cart/{id}` - Update quantity
- `DELETE /api/cart/{id}` - Remove from cart

### Orders

- `GET /api/orders` - List orders
- `POST /api/orders` - Create order
- `GET /api/orders/{id}` - Get order details

### Customers

- `GET /api/customers` - List customers (admin)
- `GET /api/customers/{id}` - Get customer profile

---

## Design System

### Color Palette

| Token        | Hex     | Usage                      |
| ------------ | ------- | -------------------------- |
| `primary`    | #8B0000 | Primary buttons, accents   |
| `oax-gold`   | #D4AF37 | Luxury accents, highlights |
| `oax-dark`   | #1A1A1A | Dark backgrounds           |
| `oax-black`  | #000000 | Primary dark               |
| `oax-panel`  | #2A1F1F | Card backgrounds           |
| `oax-border` | #382929 | Borders                    |
| `oax-light`  | #F5F5F5 | Light backgrounds          |

### Typography

| Font             | Usage                  |
| ---------------- | ---------------------- |
| Playfair Display | Headings, serif text   |
| Manrope          | Body text, UI elements |
| Material Symbols | Icons                  |

---

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

---

## License

This project is licensed under the MIT License.

---

<p align="center">Made with ❤️ by OAX FASHION</p>
