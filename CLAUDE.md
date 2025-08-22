# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a full-stack Laravel + Flutter boilerplate project featuring:
- **Backend**: Laravel 11 API with custom admin panel (Blade + TailwindCSS + Vanilla JS)
- **Frontend**: Flutter mobile app with Material 3 design system
- **Architecture**: Production-ready with comprehensive testing, security, and accessibility features

## Project Structure

The project follows a monorepo structure with two main applications:

```
Flutter_Laravel/
├── backend/          # Laravel 11 API & Admin Panel
│   ├── app/Http/     # Controllers, Requests, Resources, Middleware
│   ├── app/Models/   # Eloquent Models with soft deletes
│   ├── app/Policies/ # Authorization policies
│   ├── database/     # Migrations, seeders, factories
│   └── tests/        # Pest test suite
└── mobile/           # Flutter Mobile App
    ├── lib/core/     # Environment, router, HTTP client, exceptions
    ├── lib/features/ # Feature modules (auth, profile, admin_users)
    ├── lib/theme/    # Material 3 design system & theme management
    └── lib/widgets/  # Reusable UI components
```

## Backend Architecture (Laravel 11)

### Key Patterns
- **Authentication**: Laravel Sanctum with dual SPA + API token modes
- **Database**: MySQL with dual auth (email/mobile), soft deletes, optimized indices
- **Admin Panel**: Custom Blade templates with TailwindCSS (no Livewire/Alpine)
- **API Design**: `/api/v1` prefix with consistent Resource responses
- **Quality**: PSR-12, PHPStan level 8, strict types, comprehensive Pest tests

### Core Models
- `User`: Dual auth (email/mobile), roles, soft deletes
- `Role`/`Permission`: Spatie-compatible RBAC
- `Activity`: Comprehensive logging with polymorphic subjects

### Essential Commands
```bash
# Backend setup and development
cd backend
make setup                    # Initial project setup
php artisan serve            # Development server
php artisan test             # Run Pest test suite
php artisan test --coverage  # Test coverage report
make lint                    # PHPStan + PHPCS checks
php artisan migrate:fresh --seed  # Reset database with seeders
php artisan l5-swagger:generate   # Generate OpenAPI docs

# Production deployment
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Frontend Architecture (Flutter)

### Key Patterns
- **State Management**: Riverpod (avoiding globals/singletons)
- **Models**: Freezed + json_serializable for immutability
- **Navigation**: GoRouter with typed parameters and route guards
- **Design System**: Material 3 with ThemeExtension for design tokens
- **Performance**: const widgets, memoized selectors, AutomaticKeepAliveClientMixin
- **Accessibility**: 48dp+ tap targets, contrast compliance, screen reader support

### Architecture Principles
- **Feature-first**: Organized by business features, not technical layers
- **Clean separation**: Side-effects in notifiers/repos, pure widgets
- **AsyncValue patterns**: Use `when/maybeWhen` for loading/error/data states
- **Theme-aware**: All components use design tokens for easy restyling

### Essential Commands
```bash
# Frontend setup and development
cd mobile
flutter pub get                    # Install dependencies
dart run build_runner build        # Generate code (Freezed, Retrofit)
make gen                          # Code generation shortcut
flutter run --flavor dev -t lib/main_dev.dart    # Dev environment
flutter run --flavor prod -t lib/main_prod.dart  # Production environment
flutter test                      # Run all tests
flutter analyze                   # Static analysis
make analyze                      # Analysis shortcut

# Build for release
flutter build apk --flavor prod -t lib/main_prod.dart
flutter build ios --flavor prod -t lib/main_prod.dart
```

## API Integration

### Authentication Flow
- Sanctum token mode for mobile app
- Dual authentication: email OR mobile + password
- Token refresh and 401 handling in Dio interceptors
- Secure storage with flutter_secure_storage

### Endpoint Structure
```
/api/v1/auth/*        # Authentication (register, login, logout, tokens)
/api/v1/me           # Current user profile management
/api/v1/admin/*      # Admin-only endpoints (users, activities, metrics)
```

## Theme System (Flutter)

### Material 3 Implementation
- **ColorScheme.fromSeed**: Dynamic color generation
- **Android 12+ support**: System dynamic colors
- **Theme modes**: Light, dark, system with persistence
- **Customization**: Seed color picker, font selection
- **Design tokens**: Spacing, radius, elevation via ThemeExtension

### Theme Controller Pattern
```dart
// Riverpod-based theme management
final themeControllerProvider = StateNotifierProvider<ThemeController, AsyncValue<ThemeState>>(
  (ref) => ThemeController(ref.read(themeServiceProvider)),
);
```

## Testing Strategy

### Backend (Pest)
- **Feature tests**: Full API endpoint testing
- **Unit tests**: Models, services, policies
- **Coverage target**: 80%+
- **Test suites**: `php artisan test --testsuite=Feature|Unit`

### Frontend (Flutter)
- **Unit tests**: Repositories, notifiers, services
- **Widget tests**: Screens, forms, themed components
- **Accessibility tests**: Contrast ratios, tap targets, screen reader
- **Coverage target**: 75%+ for widgets, 80%+ for logic

## Development Workflow

### Getting Started
1. Review `BACKEND_TODO.md` and `FLUTTER_TODO.md` for implementation roadmap
2. Backend: Start with M1 (Foundation & Authentication)
3. Frontend: Start with M1 (Foundation) → M2 (Design System)
4. Follow the dependency chains outlined in each TODO file

### Code Quality Standards
- **Backend**: PSR-12, PHPStan level 8, comprehensive Form Requests
- **Frontend**: flutter analyze clean, proper AsyncValue usage, accessibility compliance
- **Both**: Comprehensive test coverage before PR merge

### Security Considerations
- Rate limiting on auth endpoints (5 attempts/minute)
- CSRF protection on admin forms
- Input validation via Form Requests (Laravel) and form validation (Flutter)
- Secure token storage and rotation
- Activity logging for audit trails

## CI/CD Pipeline

### GitHub Actions
- **Backend**: Composer validate, PHPStan, PHPCS, Pest tests
- **Frontend**: flutter analyze && flutter test, build validation
- **Quality gates**: All checks must pass, coverage thresholds met

## Key Dependencies

### Backend
- `laravel/sanctum`: API authentication
- `spatie/laravel-permission`: Role-based access control
- `pestphp/pest`: Testing framework

### Frontend
- `flutter_riverpod`: State management
- `go_router`: Navigation
- `freezed` + `json_serializable`: Immutable models
- `dio` + `retrofit`: HTTP client
- `flutter_secure_storage`: Secure token storage
- `dynamic_color`: Material 3 dynamic colors
- `shared_preferences`: Theme persistence

## Documentation

- **API docs**: Auto-generated OpenAPI 3.1 at `/api/docs`
- **Architecture**: Follow TODO files for detailed implementation guidance
- **Database schema**: Users, roles, permissions, activities with proper indices
- **Theme system**: Design tokens and accessibility guidelines in Flutter TODO