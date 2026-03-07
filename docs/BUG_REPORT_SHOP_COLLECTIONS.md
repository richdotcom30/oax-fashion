# OAX FASHION - Bug Report: Shop & Collections Pages

**Date:** 2026-03-07  
**Pages Analyzed:** `/shop`, `/collections`  
**URLs Tested:** `http://127.0.0.1:8000/shop`, `http://127.0.0.1:8000/collections`

---

## 1. BROKEN LINKS (Critical)

### 1.1 Hardcoded `href="#"` Links

Found **10 instances** of broken links using `href="#"` which do not lead anywhere:

| File                 | Line    | Description                                          |
| -------------------- | ------- | ---------------------------------------------------- |
| `Register.vue`       | 79      | Terms and Privacy Policy links                       |
| `Shop.vue`           | 48      | Size Guide link                                      |
| `Login.vue`          | 143     | Forgot Password link                                 |
| `Contact.vue`        | 127-134 | Social media placeholder links (Instagram, Facebook) |
| `admin/Settings.vue` | 89-110  | Settings navigation links                            |

**Impact:** Users clicking these links get no response or page jumps to top.

**Recommendation:** Replace with proper routes:

- Terms: `/terms` or `#` with proper Vue handler
- Privacy Policy: `/privacy`
- Size Guide: `/size-guide` or open modal
- Forgot Password: Already has `@click.prevent` handler - remove href
- Social links: Add actual URLs or remove

---

## 2. MISSING API ENDPOINTS (High)

### 2.1 Logout Endpoint Missing for Customers

**Issue:** The customer logout route uses `/account/auth/logout` but the frontend might be calling `/auth/logout`

**Location:** `routes/api.php` line 73

```php
Route::post('/auth/logout', [CustomerAuthController::class, 'logout']); // NOT FOUND
```

The correct path should be:

```php
// In v1/account prefix, line 73
Route::post('/auth/logout', [CustomerAuthController::class, 'logout']);
```

### 2.2 Missing Force Password Change Endpoint

**Issue:** The `force-password-change` endpoint referenced in auth store doesn't exist

**Location:** `resources/js/stores/auth.js`

---

## 3. VULNERABILITIES (Medium)

### 3.1 Hardcoded External Image URLs

**Issue:** Product images use hardcoded Googleusercontent URLs that may expire

**Location:** `Shop.vue` lines 128, 152, 177

```html
src="https://lh3.googleusercontent.com/aida-public/AB6AXu..."
```

**Risk:** Images may become unavailable, causing broken images on page

**Recommendation:**

- Store images locally in `/storage/app/public/products/`
- Use Laravel's storage URL helper
- Implement image upload functionality in admin panel

### 3.2 No CSRF Protection on Public Forms

**Issue:** Contact form and other public forms don't appear to have CSRF tokens

**Location:** `Contact.vue`

---

## 4. FRONTEND ISSUES (Medium)

### 4.1 Inconsistent Error Handling

**Issue:** API error responses may not be properly handled in Vue components

**Files:** `Shop.vue`, `Collections.vue`

### 4.2 Missing Loading States

**Issue:** No loading spinners while fetching products from API

**Files:** `Shop.vue`, `Collections.vue`

### 4.3 Filter Not Functional

**Issue:** Price range slider and category filters are visual only, not connected to API

**Location:** `Shop.vue` lines 13-70

**Recommendation:** Connect filters to product API with query parameters

### 4.4 Product Grid Static Data

**Issue:** Products are hardcoded in Vue templates, not fetched from API

**Location:** `Shop.vue` lines 120-200

**Recommendation:** Replace with API call to `/api/v1/products`

---

## 5. MISSING ROUTES (Low)

### 5.1 Admin Logout Route Issue

**Issue:** The admin logout route at `routes/api.php` line 117:

```php
Route::post('/auth/logout', [AdminAuthController::class, 'logout']);
```

Should be accessible at `/api/v1/admin/auth/logout`

**Current behavior:** Uses `/api/v1/admin/auth/logout` ✓ (correct)

---

## 6. ACCESSIBILITY ISSUES (Low)

### 6.1 Missing Alt Text

Some images may be missing proper alt attributes

### 6.2 Keyboard Navigation

Some interactive elements may not be keyboard accessible

---

## 7. ROUTING ISSUES (Low)

### 7.1 Duplicate Route Names

**Issue:** Potential conflict with route names in router

**Location:** `resources/js/router/index.js`

---

## 8. SECURITY OBSERVATIONS (Info)

### 8.1 Rate Limiting

No visible rate limiting on public endpoints (should be configured at server level)

### 8.2 Input Validation

Ensure all API endpoints have proper validation (Laravel Form Requests recommended)

---

## Priority Fix List

| Priority | Issue                    | Fix Effort |
| -------- | ------------------------ | ---------- |
| HIGH     | Broken `href="#"` links  | Easy       |
| HIGH     | Connect filters to API   | Medium     |
| HIGH     | Fetch products from API  | Medium     |
| MEDIUM   | Replace hardcoded images | Medium     |
| MEDIUM   | Add loading states       | Easy       |
| LOW      | Add error handling       | Medium     |
| LOW      | Accessibility fixes      | Easy       |

---

## Test Commands

```bash
# Check for broken links
grep -r "href=\"#\"" resources/js/pages/

# Check API routes
php artisan route:list --path=api

# Check for missing translations
grep -r "t(" resources/js/pages/ | head -20
```

---

_Report generated for OAX FASHION development team_
