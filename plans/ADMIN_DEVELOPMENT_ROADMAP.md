# OAX FASHION Admin Section - Development Roadmap

## Overview

This document outlines the complete development plan for the OAX FASHION admin panel. The admin section is based on the design patterns in the `inspiration/admin_*` directories.

---

## Part 1: Existing Pages - Enhancements

### 1. Dashboard.vue (`/admin`)

**Current State:**

- Basic KPI cards (Revenue, Orders, Avg Order Value, Conversion Rate)
- Revenue overview chart (simple bar chart)
- Sales by category progress bars
- Recent orders table
- Top selling products list
- Inventory alerts list

**Required Enhancements (per inspiration/admin_dashboard_overview):**

- [ ] Add daily/weekly/monthly sales trends visualization
- [ ] Add interactive date range selector
- [ ] Add customer acquisition metrics
- [ ] Add average order value trends
- [ ] Add returning customer rate
- [ ] Add top categories breakdown with actual charts
- [ ] Add real-time notifications panel
- [ ] Add quick action buttons
- [ ] Add customer lifetime value metrics
- [ ] Add revenue tax breakdown

### 2. Products.vue (`/admin/products`)

**Current State:**

- Product table with image, name, category, price, stock, status
- Filter tabs (All, Active, Draft)
- Add Product button
- Basic edit/delete actions

**Required Enhancements (per inspiration/admin_product_list_view, admin_product_editor):**

- [ ] Add rich text descriptions for products
- [ ] Add multiple image upload support
- [ ] Add variant matrix for size/color combinations
- [ ] Add draft/active status toggle switches
- [ ] Add inventory tracking with low stock alerts
- [ ] Add category/tag management
- [ ] Add bulk actions (activate, deactivate, delete)
- [ ] Add search and advanced filtering
- [ ] Add product sorting (by price, stock, date)
- [ ] Add SKU management
- [ ] Add price history

### 3. Orders.vue (`/admin/orders`)

**Current State:**

- Basic order table with ID, customer, date, items, status, total
- Simple status badges

**Required Enhancements (per inspiration/admin_order_list, admin_fulfillment_workflow):**

- [ ] Add order filtering by status (Pending, Processing, Shipped, Delivered, Cancelled)
- [ ] Add date range filtering
- [ ] Add customer filtering
- [ ] Add bulk status update capabilities
- [ ] Add order detail view with timeline
- [ ] Add fulfillment workflow (packing slips, shipping labels)
- [ ] Add order notes/comments
- [ ] Add payment status tracking
- [ ] Add shipping method selection
- [ ] Add tracking number integration
- [ ] Add export to CSV functionality

### 4. Customers.vue (`/admin/customers`)

**Current State:**

- Customer table with name, email, orders, total spent, tier
- Basic KPI cards

**Required Enhancements (per inspiration/admin_customer_database):**

- [ ] Add CRM database with full customer profiles
- [ ] Add purchase history per customer
- [ ] Add communication logs
- [ ] Add customer segmentation by behavior
- [ ] Add lifetime value tracking
- [ ] Add customer tier management (Silver, Gold, Platinum)
- [ ] Add search and filtering
- [ ] Add customer notes
- [ ] Add loyalty points tracking
- [ ] Add export functionality

---

## Part 2: New Pages to Create

### Priority 1: Critical Business Functions

#### 5. OrderDetail.vue (`/admin/orders/:id`)

**Inspiration:** `inspiration/admin_order_detail_view`

Features:

- [ ] Single order detailed view
- [ ] Order timeline/status history
- [ ] Customer information panel
- [ ] Order items list with images
- [ ] Shipping address display
- [ ] Payment information
- [ ] Update order status dropdown
- [ ] Add tracking number
- [ ] Print packing slip button
- [ ] Print shipping label button
- [ ] Order notes section
- [ ] Refund processing

#### 6. Inventory.vue (`/admin/inventory`)

**Inspiration:** `inspiration/admin_inventory_management`

Features:

- [ ] Inventory overview dashboard
- [ ] Stock level indicators
- [ ] Low stock alerts list
- [ ] Out of stock items
- [ ] Stock history tracking
- [ ] Restock management
- [ ] Warehouse location mapping
- [ ] Variant-level inventory
- [ ] Bulk stock updates
- [ ] Stock transfer between locations
- [ ] Inventory valuation reports

#### 7. Analytics.vue (`/admin/analytics`)

**Inspiration:** `inspiration/admin_analytics_dashboard`

Features:

- [ ] Sales trends charts (daily, weekly, monthly)
- [ ] Revenue breakdown by category
- [ ] Top products performance
- [ ] Customer acquisition cost
- [ ] Conversion rate analytics
- [ ] Average order value trends
- [ ] Returning vs new customers
- [ ] Geographic distribution
- [ ] Traffic sources
- [ ] Device breakdown

### Priority 2: Operations

#### 8. Collections.vue (`/admin/collections`)

**Inspiration:** `inspiration/admin_collection_management`

Features:

- [ ] Collection list view
- [ ] Create new collection
- [ ] Edit collection details
- [ ] Add/remove products from collection
- [ ] Collection visibility toggle
- [ ] Collection preview
- [ ] Seasonal collections management
- [ ] Featured collections
- [ ] Launch date scheduling

#### 9. Fulfillment.vue (`/admin/fulfillment`)

**Inspiration:** `inspiration/admin_fulfillment_workflow`

Features:

- [ ] Pending orders queue
- [ ] Batch processing
- [ ] Print multiple packing slips
- [ ] Bulk shipping label generation
- [ ] Carrier integration selection
- [ ] Tracking number assignment
- [ ] Fulfillment status dashboard
- [ ] Exception handling
- [ ] Return processing integration

#### 10. ReturnsExchanges.vue (`/admin/returns`)

**Inspiration:** `inspiration/admin_returns_exchanges`

Features:

- [ ] Returns request queue
- [ ] Return status tracking
- [ ] Return reason categorization
- [ ] Refund processing
- [ ] Exchange processing
- [ ] Return approval workflow
- [ ] Restocking management
- [ ] Return analytics

### Priority 3: Marketing

#### 11. Marketing.vue (`/admin/marketing`)

**Inspiration:** `inspiration/admin_marketing_tools`

Features:

- [ ] Email template builder
- [ ] Campaign management
- [ ] Abandoned cart recovery
- [ ] Newsletter management
- [ ] Promo code creation
- [ ] Discount rules
- [ ] Customer segmentation for campaigns
- [ ] Campaign analytics

#### 12. Reports.vue (`/admin/reports`)

**Inspiration:** `inspiration/admin_reports`

Features:

- [ ] Revenue reports
- [ ] Sales reports
- [ ] Tax calculations
- [ ] Inventory performance
- [ ] Customer acquisition costs
- [ ] Exportable reports (CSV, PDF)
- [ ] Scheduled reports
- [ ] Custom date ranges
- [ ] Comparison reports

### Priority 4: Settings & Configuration

#### 13. Settings.vue (`/admin/settings`)

**Inspiration:** `inspiration/admin_settings`

Features:

- [ ] General settings (store name, timezone, currency)
- [ ] Payment settings (Stripe, PayPal, etc.)
- [ ] Shipping & delivery settings
- [ ] Tax configuration
- [ ] Notification preferences
- [ ] Team & permissions
- [ ] API keys management
- [ ] Email templates customization
- [ ] Return policy settings

### Priority 5: Product Management Variants

#### 14. AddProduct1.vue (`/admin/products/add`)

**Inspiration:** `inspiration/admin_add_new_product_1`

Features:

- [ ] Multi-step product creation wizard
- [ ] Basic product info (name, description, category)
- [ ] Pricing setup
- [ ] Inventory initial stock
- [ ] Image upload

#### 15. AddProduct2.vue (`/admin/products/add-v2`)

**Inspiration:** `inspiration/admin_add_new_product_2`

Features:

- [ ] Variant creation
- [ ] Size matrix
- [ ] Color options
- [ ] SKU generation

#### 16. AddProduct3.vue (`/admin/products/add-v3`)

**Inspiration:** `inspiration/admin_add_new_product_3`

Features:

- [ ] Advanced pricing (sale prices, bulk discounts)
- [ ] SEO metadata
- [ ] Related products
- [ ] Collection assignment

### Priority 6: Additional Marketing Pages

#### 17. MarketingVariant2.vue (`/admin/marketing/promotions`)

**Inspiration:** `inspiration/admin_marketing_tools_variant_2`

Features:

- [ ] Promotion management
- [ ] Flash sales
- [ ] Bundle deals
- [ ] Loyalty program management

#### 18. MarketingVariant3.vue (`/admin/marketing/campaigns`)

**Inspiration:** `inspiration/admin_marketing_tools_variant_3`

Features:

- [ ] Advanced campaign builder
- [ ] A/B testing setup
- [ ] Customer journey mapping
- [ ] Automation workflows

---

## Part 3: Router Configuration

Add these routes to `resources/js/router/index.js`:

```javascript
// Additional Admin Routes
{ path: '/admin/inventory', name: 'admin-inventory', component: Inventory },
{ path: '/admin/collections', name: 'admin-collections', component: Collections },
{ path: '/admin/fulfillment', name: 'admin-fulfillment', component: Fulfillment },
{ path: '/admin/returns', name: 'admin-returns', component: ReturnsExchanges },
{ path: '/admin/marketing', name: 'admin-marketing', component: Marketing },
{ path: '/admin/analytics', name: 'admin-analytics', component: Analytics },
{ path: '/admin/reports', name: 'admin-reports', component: Reports },
{ path: '/admin/settings', name: 'admin-settings', component: Settings },
{ path: '/admin/orders/:id', name: 'admin-order-detail', component: OrderDetail },
{ path: '/admin/products/add', name: 'admin-add-product', component: AddProduct1 },
{ path: '/admin/products/add-v2', name: 'admin-add-product-v2', component: AddProduct2 },
{ path: '/admin/products/add-v3', name: 'admin-add-product-v3', component: AddProduct3 },
```

---

## Implementation Sequence

### Phase 1: Critical (Week 1)

1. Enhance Dashboard.vue
2. Enhance Orders.vue with OrderDetail.vue
3. Enhance Products.vue
4. Create Inventory.vue

### Phase 2: Operations (Week 2)

5. Create Collections.vue
6. Create Fulfillment.vue
7. Create ReturnsExchanges.vue

### Phase 3: Marketing & Analytics (Week 3)

8. Create Analytics.vue
9. Create Reports.vue
10. Create Marketing.vue

### Phase 4: Settings & Advanced (Week 4)

11. Create Settings.vue
12. Create AddProduct pages (1, 2, 3)
13. Create Marketing variant pages

### Phase 5: Polish & Integration

14. Update router with all routes
15. Enhance Customers.vue
16. Final testing and bug fixes

---

## Design Tokens Reference

For all admin pages, use:

- **Primary Color:** #8B0000 (OAX Blood Red)
- **Background:** #0a0808, #111921
- **Surface:** #1e252b, #1c2126
- **Border:** #293038, #2e363f
- **Text Primary:** #FFFFFF
- **Text Secondary:** #9dabb8, #9d9d9d
- **Accent/Gold:** #D4AF37
- **Success:** #10b981
- **Warning:** #f59e0b
- **Error:** #ef4444

**Font:** Inter (admin theme)

---

## Component Library

Common components needed:

- AdminSidebar
- DataTable with sorting/filtering
- StatusBadge
- KPI Card
- Chart components (Line, Bar, Pie)
- Modal
- DateRangePicker
- ImageUploader
- RichTextEditor
- ToggleSwitch
- SearchInput
- Pagination
- ActionMenu
- StatusTimeline

---

## Notes

- All pages should use the consistent sidebar navigation
- Implement responsive design for tablet viewing
- Add loading states for all async operations
- Use Pinia stores for admin state management
- Follow the dark theme pattern from existing admin pages
