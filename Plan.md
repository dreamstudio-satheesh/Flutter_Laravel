# Build a Full‑Stack Boilerplate (Laravel + Flutter)

## Goal
Create a custom Laravel application with a hand‑built admin panel, Sanctum‑based API auth, and a Flutter client. Prioritize clean, performant, and fully customizable code.

---

## Backend (Laravel)
- **Framework:** Laravel 12
- **Admin:** Custom Blade + TailwindCSS + Vanilla JS (no Livewire/Alpine/UI kits)
- **Auth:** Laravel Sanctum (SPA cookies + personal access tokens)
- **DB:** MySQL with proper FKs, indices, soft deletes
- **Quality:** PSR‑12, typed where possible, FormRequests, Policies, Resources; repositories only when clarifying boundaries

### 1) Project Setup
- Fresh Laravel 12 app
- Sanctum configured for SPA + token auth
- Tailwind via Vite (PostCSS). Build scripts ready
- `.env.example` with DB, APP_URL, SANCTUM_STATEFUL_DOMAINS, SESSION_DOMAIN
- Seeders: admin user (email + mobile), demo roles/permissions

### 2) Database Schema
- `users` — id, name, **email (unique, nullable)**, **mobile (unique, nullable)**, password, avatar_path, is_active, email_verified_at, mobile_verified_at, last_login_at, timestamps, softDeletes
- RBAC tables (`roles`, `permissions`, pivots)
- `activities` — id, user_id nullable, action, subject_type, subject_id, changes json, ip, ua, created_at
- Indices on: email, mobile, is_active, (subject_type, subject_id)

### 3) Auth & User Management
- Registration: name, email **or** mobile, password
- Dual login: (email **or** mobile) + password
- Password reset (email) + SMS stub interface
- Profile: view/update, avatar upload (validated, stored)
- Activation/deactivation (admin only)
- Token endpoints: issue/revoke PAT via Sanctum
- Email verification; mobile verification stub + events
- Rate limit auth endpoints

### 4) API
- Base path: `/api/v1`
- Endpoints
  - **Auth:** `POST /auth/register`, `POST /auth/login`, `POST /auth/logout`, `POST /auth/token`, `DELETE /auth/token/{id}`
  - **Me:** `GET /me`, `PUT /me`, `PUT /me/avatar` (multipart), `PUT /me/password`
  - **Admin:** `GET /admin/users` (paginate/sort/filter), `POST /admin/users`, `GET/PUT/DELETE /admin/users/{id}`, `POST /admin/users/{id}/activate`, `POST /admin/users/{id}/deactivate`, `GET /admin/activities`, `GET /admin/metrics`
- Resource responses, consistent error shape
- FormRequest validation; Policies/guards for admin
- OpenAPI 3.1 (annotations → YAML) published at `/api/docs`

### 5) Custom Admin Panel (Blade + Tailwind + Vanilla JS)
- Authenticated layout; role‑based sidebar
- Dashboard cards: Total Users, Active Users, 7‑day signups; small SVG chart (no heavy libs)
- Users table: server‑side pagination/sort/search; filters by role/status; bulk activate/deactivate
- Create/Edit user forms with CSRF + client hints
- Activity log table with filters
- Profile page for current admin
- Minimal accessible components: buttons, inputs, modals, dropdowns, toasts

### 6) Activity Monitoring
- Log login/logout, user CRUD, activation changes, role/permission updates
- Middleware to capture IP/UA
- Event → Listener architecture

### 7) Testing & Tooling
- Pest feature tests for auth and admin CRUD
- Factories + helpers
- GitHub Actions: `composer validate`, `phpcs`, `phpstan`, `phpunit`
- Makefile: `setup`, `test`, `lint`
- README: setup/run instructions

---

## Frontend (Flutter)
- **Consumes:** `/api/v1` using Sanctum token mode
- **State:** Riverpod (avoid globals/singletons)
- **Models:** `freezed` + `json_serializable` (immutable)
- **Navigation:** GoRouter with typed params
- **Structure:** feature‑first; small, pure widgets; side‑effects in notifiers/repos
- **Async:** `AsyncValue` (`when/maybeWhen`) for loading/error/UI
- **Performance:** const constructors/widgets; avoid large `setState`; memoize selectors; `AutomaticKeepAliveClientMixin` for tabs
- **Assets:** `flutter_gen` (optionally `flutter_gen_runner`)
- **Logs:** use `dart:developer log()`; remove in release
- **Env/Flavors:** `main_dev.dart`, `main_prod.dart` with Flavor providers
- **CI:** `flutter analyze && flutter test` on PRs

### Flutter Setup
- Packages: `flutter_riverpod`, `go_router`, `freezed_annotation`, `json_annotation`, `dio`, `retrofit`, `flutter_secure_storage`, `build_runner`, `freezed`, `json_serializable`, `flutter_gen_runner`
- Base URL per flavor; Dio with interceptors for auth + error normalization

### Flutter Features
- Auth: register, login (email/mobile), logout, password reset
- Profile: view/update, avatar upload (multipart), change password
- Token management: create/revoke PAT (optional)
- Admin (guarded): read‑only users list sample

### Project Layout (Flutter)
```
lib/
  core/ (env, router, http, interceptors, exceptions)
  features/
    auth/ (models, repos, notifiers, views)
    profile/
    admin_users/
  widgets/ (reusable UI)
```

### Testing (Flutter)
- Unit tests for notifiers/repos
- Widget tests for login/profile
- Simple Makefile: `gen`, `analyze`, `test`

---

## Deliverables
- Full Laravel project with tests, migrations, seeders, factories
- Full Flutter project with tests
- OpenAPI spec + Postman collection
- Admin Blade views/components
- CI workflows (PHP + Flutter)
- Example `.env.example` for backend & Flutter
- Setup instructions + usage walkthrough (register → login → admin → manage users → profile update)

## Constraints
- Only Tailwind on admin; no frontend UI libraries
- No stateful singletons in Flutter
- Small interfaces; pure functions preferred
- Consistent API response/error shapes
- Production‑ready security headers/middleware

