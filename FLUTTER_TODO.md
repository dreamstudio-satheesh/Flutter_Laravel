# Project Overview

Production-grade Flutter mobile app consuming Laravel `/api/v1` with Sanctum token mode, featuring modern Material 3 design system, dark mode, Riverpod state management, feature-first architecture, and accessibility-focused UI patterns.

## Milestones

- M1: Project Foundation & Architecture
- M2: Design System & Theme Management
- M3: Core Services & Models
- M4: Authentication Features
- M5: Profile & User Management
- M6: Admin Features & Navigation
- M7: Testing & Production Readiness

## Work Breakdown

### M1: Project Foundation & Architecture

- [ ] Initialize Flutter project with flavors (Owner: Frontend) (Est: 3h) (Deps: None) (AC: Dev/prod flavors, base URLs configured)
- [ ] Install core packages and dependencies (Owner: Frontend) (Est: 2h) (Deps: FE-01) (AC: flutter_riverpod, go_router, freezed_annotation, json_annotation, dio, retrofit, flutter_secure_storage, dynamic_color, shared_preferences installed)
- [ ] Setup build_runner and code generation (Owner: Frontend) (Est: 1h) (Deps: FE-02) (AC: build_runner, freezed, json_serializable dev dependencies installed and working)
- [ ] Configure flutter_gen for asset management (Owner: Frontend) (Est: 1h) (Deps: FE-02) (AC: flutter_gen_runner configured, type-safe asset references generated)
- [ ] Create feature-first directory structure (Owner: Frontend) (Est: 1h) (Deps: FE-01) (AC: lib/core/, lib/features/, lib/widgets/, lib/theme/ structure with design system folder)

### M2: Design System & Theme Management

- [ ] Create Material 3 theme configuration (Owner: Frontend) (Est: 4h) (Deps: FE-02) (AC: ColorScheme.fromSeed, light/dark themes, Android 12+ dynamic colors)
- [ ] Build ThemeExtension for design tokens (Owner: Frontend) (Est: 3h) (Deps: FE-06) (AC: Spacing, radius, elevation tokens, consistent across components)
- [ ] Implement ThemeController with Riverpod (Owner: Frontend) (Est: 3h) (Deps: FE-07) (AC: Light/dark/system toggle, seed color customization, font selection)
- [ ] Create theme persistence service (Owner: Frontend) (Est: 2h) (Deps: FE-08) (AC: shared_preferences for theme mode, seed color, font preference)
- [ ] Build accessibility-focused design tokens (Owner: Frontend) (Est: 2h) (Deps: FE-07) (AC: Minimum contrast ratios, large tap targets 48dp+, text scaling support)
- [ ] Create reusable themed components (Owner: Frontend) (Est: 4h) (Deps: FE-07,FE-09) (AC: Buttons, cards, inputs using design tokens, easy restyling)

### M3: Core Services & Models

- [ ] Setup environment configuration providers (Owner: Frontend) (Est: 2h) (Deps: FE-01) (AC: Flavor providers for main_dev.dart/main_prod.dart with base URLs)
- [ ] Implement HTTP client with Dio interceptors (Owner: Frontend) (Est: 3h) (Deps: FE-12) (AC: Dio with auth bearer token, error normalization interceptors)
- [ ] Create secure storage service (Owner: Frontend) (Est: 2h) (Deps: FE-02) (AC: Token storage/retrieval with flutter_secure_storage)
- [ ] Build error handling models (Owner: Frontend) (Est: 2h) (Deps: FE-03) (AC: API error responses mapped to typed exceptions)
- [ ] Setup logging with dart:developer (Owner: Frontend) (Est: 1h) (Deps: FE-05) (AC: log() function usage, no print statements, removed in release)

### M4: Authentication Features

- [ ] Create authentication models with Freezed (Owner: Frontend) (Est: 2h) (Deps: FE-16) (AC: freezed + json_serializable immutable models for auth DTOs)
- [ ] Implement authentication API client (Owner: Frontend) (Est: 3h) (Deps: FE-13,FE-17) (AC: Retrofit client for auth endpoints)
- [ ] Build authentication repository (Owner: Frontend) (Est: 3h) (Deps: FE-18) (AC: Login, register, logout with token management)
- [ ] Create authentication state notifier (Owner: Frontend) (Est: 3h) (Deps: FE-19) (AC: Riverpod notifier avoiding globals/singletons, AsyncValue patterns)
- [ ] Implement login screen with validation (Owner: Frontend) (Est: 4h) (Deps: FE-20,FE-11) (AC: Material 3 themed UI, AsyncValue when/maybeWhen patterns, accessibility)
- [ ] Build registration screen (Owner: Frontend) (Est: 3h) (Deps: FE-21,FE-11) (AC: Themed form components, proper contrast ratios, large tap targets)
- [ ] Create password reset flow (Owner: Frontend) (Est: 2h) (Deps: FE-22,FE-11) (AC: Accessible UI following design tokens)

### M5: Profile & User Management

- [ ] Create profile models and DTOs (Owner: Frontend) (Est: 2h) (Deps: FE-17) (AC: freezed + json_serializable profile models matching backend)
- [ ] Implement profile API client (Owner: Frontend) (Est: 2h) (Deps: FE-24) (AC: Retrofit endpoints for profile operations)
- [ ] Build profile repository (Owner: Frontend) (Est: 2h) (Deps: FE-25) (AC: Get, update profile, avatar upload multipart)
- [ ] Create profile state notifier (Owner: Frontend) (Est: 2h) (Deps: FE-26) (AC: Riverpod notifier with AsyncValue, side-effects isolated)
- [ ] Implement profile view screen (Owner: Frontend) (Est: 3h) (Deps: FE-27,FE-11) (AC: Material 3 components, responsive design, theme-aware)
- [ ] Build profile edit screen (Owner: Frontend) (Est: 4h) (Deps: FE-28,FE-11) (AC: Themed form inputs, image picker, proper validation styling)
- [ ] Create change password screen (Owner: Frontend) (Est: 2h) (Deps: FE-29,FE-11) (AC: Secure input fields with proper theming)
- [ ] Implement token management screens (Owner: Frontend) (Est: 3h) (Deps: FE-20,FE-11) (AC: Optional PAT management with Material 3 design)
- [ ] Add theme settings screen (Owner: Frontend) (Est: 3h) (Deps: FE-08,FE-11) (AC: Theme mode toggle, seed color picker, font selection UI)

### M6: Admin Features & Navigation

- [ ] Setup GoRouter configuration (Owner: Frontend) (Est: 3h) (Deps: FE-08) (AC: GoRouter with typed params, theme-aware route guards)
- [ ] Implement route guards for admin access (Owner: Frontend) (Est: 2h) (Deps: FE-33,FE-20) (AC: Role-based navigation with proper theming)
- [ ] Create admin users list screen (Owner: Frontend) (Est: 4h) (Deps: FE-34,FE-11) (AC: Material 3 data tables, guarded read-only users list)
- [ ] Build tab navigation with KeepAlive (Owner: Frontend) (Est: 2h) (Deps: FE-33,FE-11) (AC: Material 3 navigation bar, AutomaticKeepAliveClientMixin)
- [ ] Implement AsyncValue UI patterns (Owner: Frontend) (Est: 2h) (Deps: FE-11) (AC: Themed loading states, error displays with Material 3)
- [ ] Create reusable form widgets (Owner: Frontend) (Est: 3h) (Deps: FE-11) (AC: Material 3 form components, accessibility compliance)
- [ ] Implement debounced search fields (Owner: Frontend) (Est: 2h) (Deps: FE-37,FE-11) (AC: Themed search with 300ms debounce, proper focus handling)

### M7: Testing & Production Readiness

- [ ] Write unit tests for repositories (Owner: Frontend) (Est: 4h) (Deps: FE-19,FE-26) (AC: Auth and profile repositories covered)
- [ ] Create unit tests for notifiers (Owner: Frontend) (Est: 4h) (Deps: FE-20,FE-27) (AC: State management and theme controller logic tested)
- [ ] Test theme system functionality (Owner: Frontend) (Est: 3h) (Deps: FE-08,FE-09) (AC: Theme switching, persistence, accessibility compliance)
- [ ] Implement widget tests for auth screens (Owner: Frontend) (Est: 5h) (Deps: FE-21,FE-22) (AC: Themed login, register, password reset widgets)
- [ ] Build widget tests for profile screens (Owner: Frontend) (Est: 4h) (Deps: FE-28,FE-29) (AC: Material 3 profile components, theme settings)
- [ ] Test accessibility compliance (Owner: Frontend) (Est: 3h) (Deps: FE-10,FE-11) (AC: Contrast ratios, tap targets, screen reader support)
- [ ] Setup GitHub Actions CI workflow (Owner: Frontend) (Est: 2h) (Deps: FE-42) (AC: flutter analyze && flutter test on PRs)
- [ ] Create Makefile with common tasks (Owner: Frontend) (Est: 1h) (Deps: FE-03) (AC: Simple Makefile with gen, analyze, test targets)
- [ ] Build production release configuration (Owner: Frontend) (Est: 2h) (Deps: FE-01) (AC: Obfuscated builds, proper signing, theme optimization)
- [ ] Create comprehensive README (Owner: Frontend) (Est: 1h) (Deps: FE-47) (AC: Setup, theming, accessibility guidelines documented)

## Task IDs

FE-01 through FE-49 as referenced above.

## Dependencies & Sequencing

FE-01 -> FE-02,FE-05 -> FE-03,FE-04,FE-06 -> FE-07,FE-08,FE-09,FE-10 -> FE-11
FE-06 -> FE-12,FE-13,FE-14,FE-15,FE-16 -> FE-17,FE-18,FE-19,FE-20 -> FE-21,FE-22,FE-23
FE-11,FE-20 -> FE-24,FE-25,FE-26,FE-27 -> FE-28,FE-29,FE-30,FE-31,FE-32
FE-08,FE-11 -> FE-33,FE-34,FE-35,FE-36 -> FE-37,FE-38,FE-39
FE-39 -> FE-40,FE-41,FE-42,FE-43,FE-44,FE-45 -> FE-46,FE-47,FE-48,FE-49

## Environment & Secrets

- `API_BASE_URL_DEV`: Development backend URL (main_dev.dart)
- `API_BASE_URL_PROD`: Production backend URL (main_prod.dart)
- `SENTRY_DSN`: Error tracking (optional)
- Theme preferences stored in shared_preferences (theme mode, seed color, font)
- Tokens stored in flutter_secure_storage, rotated on logout
- No stateful singletons - use Riverpod providers for theme management

## Database / Data Contracts

**Models (Freezed + json_serializable):**
- `User`: id, name, email, mobile, avatarUrl, isActive, roles
- `AuthResponse`: user, token, tokenType, expiresIn
- `LoginRequest`: emailOrMobile, password
- `RegisterRequest`: name, emailOrMobile, password, passwordConfirmation
- `ProfileUpdateRequest`: name, email, mobile
- `ApiError`: message, errors, statusCode
- `ThemePreferences`: themeMode, seedColor, fontFamily (persisted model)

**Design Tokens (ThemeExtension):**
- `AppSpacing`: xs, sm, md, lg, xl, xxl values
- `AppRadius`: sm, md, lg, xl border radius values  
- `AppElevation`: none, sm, md, lg, xl elevation values

## API Surface

All endpoints consume /api/v1 with Sanctum token mode authentication:

| Feature | Endpoints | Models |
|---------|-----------|---------|
| Auth | POST /auth/register, /auth/login, /auth/logout | LoginRequest, RegisterRequest, AuthResponse |
| Profile | GET /me, PUT /me, PUT /me/avatar, PUT /me/password | User, ProfileUpdateRequest |
| Tokens | POST /auth/token, DELETE /auth/token/{id} | TokenRequest, TokenResponse |
| Admin | GET /admin/users (guarded read-only sample) | PaginatedUserResponse |

## Testing Plan

- **Unit Tests**: Notifiers/repos, theme controller (80% coverage)
- **Widget Tests**: Login/profile screens, themed components, accessibility (75% coverage)
- **Theme Tests**: Light/dark mode switching, dynamic colors, persistence
- **Accessibility Tests**: Contrast ratios, tap target sizes, screen reader support
- **Performance Tests**: Memoized selectors, const widget usage, theme rebuilds
- **Smoke E2E**: Register -> login -> change theme -> profile update -> logout

## CI/CD

- **Triggers**: PR, push to main/develop
- **Jobs**: flutter analyze && flutter test, build-apk-dev, build-apk-prod
- **Required Checks**: Analysis clean, tests pass, builds successful

## Definition of Done

- [ ] All authentication flows functional with Material 3 theming
- [ ] Profile management with avatar upload and theme settings working
- [ ] Admin guarded read-only users list with proper Material 3 design
- [ ] Material 3 design system with light/dark/system modes implemented
- [ ] Dynamic colors on Android 12+ and customizable seed color working
- [ ] ThemeExtension design tokens used consistently across components
- [ ] Accessibility compliance: contrast ratios, tap targets 48dp+, screen reader support
- [ ] Theme persistence with shared_preferences functional
- [ ] Riverpod state management avoiding globals/singletons
- [ ] AsyncValue when/maybeWhen UI patterns with themed loading states
- [ ] Performance optimizations: const widgets, memoized selectors, KeepAlive tabs
- [ ] dart:developer log() usage, stripped in release builds
- [ ] CI pipeline: flutter analyze && flutter test passing