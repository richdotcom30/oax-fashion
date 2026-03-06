# OAX FASHION Backend & Auth Implementation Plan

## Overview

This plan outlines the backend implementation, authentication, and security measures required for the OAX FASHION admin panel.

## Architecture

### Tech Stack

- **Backend**: Laravel 10+ (RESTful API)
- **Database**: MySQL
- **Authentication**: Laravel Sanctum (JWT tokens)
- **Frontend State**: Pinia (already implemented)

### API Structure

```
/api/v1/
├── /auth/
│   ├── POST /login
│   ├── POST /logout
│   ├── POST /register
│   └── GET /me
├── /admin/
│   ├── /users (admin user management)
│   ├── /roles (RBAC)
│   ├── /permissions
│   └── /settings
├── /products/
│   ├── GET / (list)
│   ├── POST / (create)
│   ├── GET /{id}
│   ├── PUT /{id}
│   ├── DELETE /{id}
│   └── /variants
├── /orders/
│   ├── GET /
│   ├── GET /{id}
│   ├── PUT /{id}/status
│   └── /fulfill
├── /customers/
│   ├── GET /
│   ├── GET /{id}
│   └── /orders
└── /analytics/
    ├── /revenue
    ├── /traffic
    └── /reports
```

## Phase 1: Database Schema

### Users Table (Enhanced)

```sql
users
├── id (bigint, PK)
├── name (varchar)
├── email (varchar, unique)
├── password (varchar)
├── role (enum: 'admin', 'manager', 'staff', 'customer')
├── avatar (varchar, nullable)
├── phone (varchar, nullable)
├── is_active (boolean)
├── last_login (timestamp, nullable)
├── created_at
└── updated_at
```

### Role Permissions Table

```sql
roles
├── id
├── name (unique: admin, manager, staff)
├── description
└── permissions (JSON)

permissions
├── id
├── name (unique)
├── description
└── category
```

### Activity Log

```sql
activity_logs
├── id
├── user_id (FK)
├── action (string)
├── entity_type (string)
├── entity_id (bigint)
├── old_values (JSON, nullable)
├── new_values (JSON, nullable)
├── ip_address (varchar)
├── user_agent (text)
└── created_at
```

## Phase 2: Authentication

### Login Flow

1. POST /api/v1/auth/login with email + password
2. Validate credentials
3. Generate Sanctum token
4. Return user + token + permissions

### Token Management

- Access tokens (short-lived: 1 hour)
- Refresh tokens (long-lived: 30 days)
- Token abilities/scopes for permission-based access

### Middleware

- `auth:sanctum` - Verify token
- `role:admin` - Admin-only routes
- `role:manager` - Manager+ routes
- `throttle:60,1` - Rate limiting

## Phase 3: Security Measures

### CSRF Protection

- Laravel CSRF tokens for web routes
- Same-origin policy for API

### Rate Limiting

```php
// api.php
Route::middleware(['throttle:60,1'])->group...
```

### Input Validation

- Laravel Form Requests
- Strong password requirements
- Email verification

### Audit Logging

- Track all admin actions
- Log IP addresses
- Store old/new values

## Phase 4: API Endpoints

### Authentication

| Method | Endpoint              | Description        |
| ------ | --------------------- | ------------------ |
| POST   | /api/v1/auth/login    | User login         |
| POST   | /api/v1/auth/logout   | User logout        |
| POST   | /api/v1/auth/register | Admin registration |
| GET    | /api/v1/auth/me       | Current user       |

### Products API

| Method | Endpoint                       | Description    |
| ------ | ------------------------------ | -------------- |
| GET    | /api/v1/products               | List products  |
| POST   | /api/v1/products               | Create product |
| GET    | /api/v1/products/{id}          | Get product    |
| PUT    | /api/v1/products/{id}          | Update product |
| DELETE | /api/v1/products/{id}          | Delete product |
| POST   | /api/v1/products/{id}/variants | Add variant    |

### Orders API

| Method | Endpoint                    | Description   |
| ------ | --------------------------- | ------------- |
| GET    | /api/v1/orders              | List orders   |
| GET    | /api/v1/orders/{id}         | Get order     |
| PUT    | /api/v1/orders/{id}/status  | Update status |
| POST   | /api/v1/orders/{id}/fulfill | Fulfill order |

### Customers API

| Method | Endpoint                      | Description     |
| ------ | ----------------------------- | --------------- |
| GET    | /api/v1/customers             | List customers  |
| GET    | /api/v1/customers/{id}        | Get customer    |
| GET    | /api/v1/customers/{id}/orders | Customer orders |

### Analytics API

| Method | Endpoint                       | Description     |
| ------ | ------------------------------ | --------------- |
| GET    | /api/v1/analytics/revenue      | Revenue data    |
| GET    | /api/v1/analytics/traffic      | Traffic sources |
| GET    | /api/v1/analytics/top-products | Best sellers    |

## Implementation Order

1. **Setup Laravel Sanctum**
    - Install package
    - Configure .env
    - Update User model

2. **Create Migrations**
    - Enhanced users table
    - Roles & permissions
    - Activity logs

3. **Build Authentication**
    - Login/Logout controllers
    - Token generation
    - User model updates

4. **Create API Resources**
    - ProductResource
    - OrderResource
    - CustomerResource

5. **Build Admin Controllers**
    - ProductController
    - OrderController
    - CustomerController

6. **Add Security**
    - Rate limiting
    - Role middleware
    - Audit logging

## Security Checklist

- [ ] HTTPS enforced
- [ ] CSRF protection enabled
- [ ] Rate limiting configured
- [ ] Input validation on all endpoints
- [ ] Password hashing (bcrypt)
- [ ] Token expiration
- [ ] Audit logging
- [ ] Role-based access control
- [ ] XSS protection
- [ ] SQL injection prevention (Eloquent)

## File Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Api/
│   │   │   ├── AuthController.php
│   │   │   ├── ProductController.php
│   │   │   ├── OrderController.php
│   │   │   └── CustomerController.php
│   │   └── Admin/
│   │       └── DashboardController.php
│   ├── Middleware/
│   │   ├── RoleMiddleware.php
│   │   └── AuditLogMiddleware.php
│   └── Requests/
│       ├── LoginRequest.php
│       └── ProductRequest.php
├── Models/
│   ├── User.php
│   ├── Role.php
│   ├── Permission.php
│   └── ActivityLog.php
├── Providers/
│   └── AuthServiceProvider.php
└── Http/Resources/
    ├── ProductResource.php
    ├── OrderResource.php
    └── CustomerResource.php
```
