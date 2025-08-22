# Project Overview

Production-ready Laravel 11 API backend with custom admin panel, dual authentication (email/mobile), role-based access control, activity monitoring, and comprehensive testing suite.

## Milestones

- M1: Project Foundation & Authentication
- M2: Database Schema & User Management
- M3: API Endpoints & Resources
- M4: Admin Panel UI
- M5: Security & Documentation
- M6: Testing & CI/CD

## Work Breakdown

### M1: Project Foundation & Authentication

- [ ] Initialize Laravel 11 project (Owner: Backend) (Est: 2h) (Deps: None) (AC: Fresh Laravel app boots, git repo initialized)
- [ ] Configure PHPStan level 8 + PHPCS PSR-12 (Owner: Backend) (Est: 2h) (Deps: BE-01) (AC: Static analysis passes, code style enforced)
- [ ] Install Sanctum and configure SPA + PAT modes (Owner: Backend) (Est: 3h) (Deps: BE-01) (AC: SPA cookie + token flows configured)
- [ ] Setup Vite with TailwindCSS PostCSS (Owner: Backend) (Est: 2h) (Deps: BE-01) (AC: Assets compile, Tailwind classes work)
- [ ] Configure rate limiting on auth routes (Owner: Backend) (Est: 1h) (Deps: BE-03) (AC: 5 attempts/minute limit active)

### M2: Database Schema & User Management

- [ ] Create users migration with dual auth fields (Owner: Backend) (Est: 2h) (Deps: BE-01) (AC: Email/mobile unique nullable, soft deletes, indices)
- [ ] Create roles/permissions migrations with pivots (Owner: Backend) (Est: 3h) (Deps: BE-06) (AC: Spatie compatible schema, foreign keys)
- [ ] Create activities migration with indices (Owner: Backend) (Est: 2h) (Deps: BE-06) (AC: User tracking, IP/UA, subject polymorphic)
- [ ] Build seeders for admin user and demo roles (Owner: Backend) (Est: 2h) (Deps: BE-07) (AC: Admin account created, permissions assigned)
- [ ] Implement User model with relations (Owner: Backend) (Est: 2h) (Deps: BE-06) (AC: Soft deletes, accessors, role methods)

### M3: API Endpoints & Resources

- [ ] Create authentication controllers (Owner: Backend) (Est: 4h) (Deps: BE-03,BE-10) (AC: Register, login, logout endpoints functional)
- [ ] Implement token management endpoints (Owner: Backend) (Est: 2h) (Deps: BE-11) (AC: PAT create/revoke with Sanctum)
- [ ] Build user profile endpoints (Owner: Backend) (Est: 3h) (Deps: BE-11) (AC: GET/PUT /me, avatar upload, password change)
- [ ] Create admin user CRUD endpoints (Owner: Backend) (Est: 5h) (Deps: BE-11) (AC: Full CRUD, activate/deactivate, pagination)
- [ ] Implement admin activities and metrics endpoints (Owner: Backend) (Est: 3h) (Deps: BE-14) (AC: Filtered logs, user counts, signup trends)
- [ ] Build API Resources for consistent responses (Owner: Backend) (Est: 3h) (Deps: BE-11) (AC: UserResource, ActivityResource, error format)
- [ ] Create Form Requests for validation (Owner: Backend) (Est: 3h) (Deps: BE-11) (AC: RegisterRequest, UpdateUserRequest, etc.)
- [ ] Implement Policies for admin route guards (Owner: Backend) (Est: 2h) (Deps: BE-17) (AC: Role-based access control active)

### M4: Admin Panel UI

- [ ] Create admin layout with role-based sidebar (Owner: Backend) (Est: 4h) (Deps: BE-04) (AC: Responsive layout, navigation menu)
- [ ] Build dashboard with metrics cards and chart (Owner: Backend) (Est: 5h) (Deps: BE-19,BE-15) (AC: User counts, signup chart, activity feed)
- [ ] Implement users table with server-side features (Owner: Backend) (Est: 6h) (Deps: BE-20) (AC: Sort, filter, search, pagination, bulk actions)
- [ ] Create user create/edit forms with validation (Owner: Backend) (Est: 4h) (Deps: BE-21) (AC: Client validation, CSRF protected, error display)
- [ ] Build activity log table with filters (Owner: Backend) (Est: 3h) (Deps: BE-21) (AC: Date, user, action filters functional)
- [ ] Implement admin profile management page (Owner: Backend) (Est: 2h) (Deps: BE-21) (AC: View/edit current admin user)
- [ ] Create reusable UI components (Owner: Backend) (Est: 4h) (Deps: BE-04) (AC: Buttons, modals, toasts, dropdowns accessible)

### M5: Security & Documentation

- [ ] Configure avatar upload with validation (Owner: Backend) (Est: 3h) (Deps: BE-13) (AC: Image validation, storage/public URLs, size limits)
- [ ] Implement activity logging middleware (Owner: Backend) (Est: 3h) (Deps: BE-08) (AC: IP/UA capture, login/logout/CRUD events)
- [ ] Setup security headers and CORS (Owner: Backend) (Est: 2h) (Deps: BE-01) (AC: CSP, HSTS, frame options configured)
- [ ] Generate OpenAPI 3.1 spec with annotations (Owner: Backend) (Est: 4h) (Deps: BE-16) (AC: Swagger UI at /api/docs, complete spec)
- [ ] Create Makefile with common tasks (Owner: Backend) (Est: 1h) (Deps: BE-02) (AC: setup, test, lint, migrate targets)

### M6: Testing & CI/CD

- [ ] Write Pest feature tests for auth flows (Owner: Backend) (Est: 5h) (Deps: BE-11) (AC: Register, login, logout, password reset covered)
- [ ] Create Pest tests for admin CRUD operations (Owner: Backend) (Est: 4h) (Deps: BE-14) (AC: User management, role enforcement tested)
- [ ] Build factories for all models (Owner: Backend) (Est: 2h) (Deps: BE-10) (AC: User, Role, Activity factories functional)
- [ ] Setup GitHub Actions CI workflow (Owner: Backend) (Est: 3h) (Deps: BE-02) (AC: Composer validate, PHPCS, PHPStan, Pest on PRs)
- [ ] Create comprehensive .env.example (Owner: Backend) (Est: 1h) (Deps: BE-01) (AC: All required vars documented with examples)

## Task IDs

BE-01 through BE-33 as referenced above.

## Dependencies & Sequencing

BE-01 -> BE-02,BE-04 -> BE-03,BE-19,BE-29
BE-01 -> BE-06 -> BE-07,BE-08,BE-10 -> BE-11 -> BE-13,BE-16,BE-17,BE-30
BE-11 -> BE-14,BE-15 -> BE-20,BE-21 -> BE-22,BE-23,BE-24
BE-08 -> BE-27 -> BE-31
BE-16 -> BE-28 -> BE-32

## Environment & Secrets

- `APP_KEY`: Laravel encryption key, rotate quarterly
- `DB_*`: MySQL credentials, stored in secure vault
- `SANCTUM_STATEFUL_DOMAINS`: Frontend domains for SPA mode
- `SPA_URL`: Frontend URL for CORS/redirects
- `MAIL_*`: Email service credentials for notifications
- `FILESYSTEM_DISK`: Storage configuration (local/s3)

## Database / Data Contracts

- `users`: id, name, email(unique,nullable), mobile(unique,nullable), password, avatar_path, is_active, verification timestamps, soft deletes
- `roles/permissions`: Spatie compatible schema with guard_name, pivot tables
- `activities`: user_id(nullable), action, subject polymorphic, changes(json), ip, user_agent, timestamp
- Key indices: users(email), users(mobile), users(is_active), activities(subject_type,subject_id)

## API Surface

| Method | Path | Auth | Request | Response |
|--------|------|------|---------|----------|
| POST | /api/v1/auth/register | none | {name,email_or_mobile,password} | {user,token?} |
| POST | /api/v1/auth/login | none | {email_or_mobile,password} | {user,token?} |
| POST | /api/v1/auth/logout | sanctum | {} | {message} |
| POST | /api/v1/auth/token | sanctum | {name} | {token} |
| DELETE | /api/v1/auth/token/{id} | sanctum | {} | {message} |
| GET | /api/v1/me | sanctum | {} | {user} |
| PUT | /api/v1/me | sanctum | {name,email,mobile} | {user} |
| PUT | /api/v1/me/avatar | sanctum | multipart | {user} |
| PUT | /api/v1/me/password | sanctum | {current,new,confirm} | {message} |
| GET | /api/v1/admin/users | admin | ?page,sort,filter | {data,meta} |
| POST | /api/v1/admin/users | admin | {name,email,mobile,role} | {user} |
| PUT | /api/v1/admin/users/{id} | admin | {name,email,mobile,role} | {user} |
| DELETE | /api/v1/admin/users/{id} | admin | {} | {message} |
| POST | /api/v1/admin/users/{id}/activate | admin | {} | {message} |
| GET | /api/v1/admin/activities | admin | ?user,action,date | {data,meta} |
| GET | /api/v1/admin/metrics | admin | {} | {users,active,signups} |

## Testing Plan

- **Pest Feature Tests**: Auth flows, user management, admin operations (80% coverage)
- **Pest Unit Tests**: Models, policies, services, DTOs (90% coverage)
- **Smoke E2E**: Register -> login -> admin panel -> user CRUD -> logout

## CI/CD

- **Triggers**: PR, push to main/develop
- **Jobs**: composer-validate, phpcs, phpstan-level-8, pest-coverage
- **Required Checks**: All jobs pass, coverage >80%

## Definition of Done

- [ ] All API endpoints functional and tested
- [ ] Admin panel fully operational with role-based access
- [ ] Security headers and rate limiting active
- [ ] OpenAPI documentation generated and accessible
- [ ] CI pipeline passing with coverage targets met
- [ ] Production deployment ready with environment configuration