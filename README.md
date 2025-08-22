# Laravel + Flutter Full-Stack Boilerplate

A production-ready full-stack boilerplate featuring Laravel 11 backend with custom admin panel and Flutter mobile app with modern architecture patterns.

## 🏗️ Project Structure

```
Flutter_Laravel/
├── backend/                    # Laravel 11 API & Admin Panel
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/    # API & Web Controllers
│   │   │   ├── Requests/       # Form Request Validation
│   │   │   ├── Resources/      # API Response Resources
│   │   │   └── Middleware/     # Custom Middleware
│   │   ├── Models/             # Eloquent Models
│   │   ├── Policies/           # Authorization Policies
│   │   ├── DTOs/               # Data Transfer Objects
│   │   ├── Repositories/       # Repository Pattern
│   │   └── Services/           # Business Logic Services
│   ├── database/
│   │   ├── migrations/         # Database Schema
│   │   ├── seeders/            # Sample Data
│   │   └── factories/          # Model Factories
│   ├── resources/
│   │   ├── views/              # Blade Templates (Admin Panel)
│   │   ├── css/                # TailwindCSS Styles
│   │   └── js/                 # Vanilla JavaScript
│   ├── routes/                 # API & Web Routes
│   ├── tests/                  # Pest Test Suite
│   └── storage/                # File Storage
├── mobile/                     # Flutter Mobile App
│   ├── lib/
│   │   ├── core/               # Core Functionality
│   │   │   ├── env/            # Environment Configuration
│   │   │   ├── router/         # GoRouter Configuration
│   │   │   ├── http/           # HTTP Client & Interceptors
│   │   │   └── exceptions/     # Error Handling
│   │   ├── features/           # Feature Modules
│   │   │   ├── auth/           # Authentication
│   │   │   ├── profile/        # User Profile
│   │   │   └── admin_users/    # Admin User Management
│   │   └── widgets/            # Reusable UI Components
│   ├── test/                   # Flutter Tests
│   └── assets/                 # Static Assets
├── docs/                       # Documentation
│   ├── api/                    # OpenAPI Specification
│   └── postman/                # Postman Collections
└── deployment/                 # Deployment Configurations
    ├── docker/                 # Docker Setup
    └── ci/                     # CI/CD Workflows
```

## 🚀 Features

### Backend (Laravel 11)
- **Authentication**: Laravel Sanctum (SPA + API tokens)
- **Admin Panel**: Custom Blade + TailwindCSS + Vanilla JS
- **Database**: MySQL with production-ready schema
- **API**: RESTful API with OpenAPI 3.1 documentation
- **Quality**: PSR-12, strict types, comprehensive testing
- **Security**: Rate limiting, CSRF protection, security headers
- **Monitoring**: Activity logging and system metrics

### Frontend (Flutter)
- **State Management**: Riverpod with AsyncValue patterns
- **Architecture**: Feature-first with clean separation
- **Navigation**: GoRouter with type-safe routing
- **Models**: Freezed + json_serializable for immutability
- **Performance**: Optimized widgets and memory management
- **Security**: Secure token storage
- **Testing**: Comprehensive unit and widget tests

## 📋 Requirements

### Backend Requirements
- PHP 8.2+
- Composer 2.0+
- MySQL 8.0+
- Node.js 18+ (for asset compilation)

### Frontend Requirements
- Flutter 3.16+
- Dart 3.2+
- Android Studio / VS Code
- iOS development setup (macOS only)

## 🛠️ Installation & Setup

### Backend Setup (Laravel)

1. **Clone and navigate to backend directory**
```bash
cd backend
```

2. **Install dependencies**
```bash
composer install
npm install
```

3. **Environment configuration**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database in `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_flutter_app
DB_USERNAME=your_username
DB_PASSWORD=your_password

SANCTUM_STATEFUL_DOMAINS=localhost:3000,127.0.0.1:3000
SPA_URL=http://localhost:3000
```

5. **Database setup**
```bash
php artisan migrate
php artisan db:seed
```

6. **Generate application key and link storage**
```bash
php artisan storage:link
```

7. **Build assets**
```bash
npm run build
```

8. **Start development server**
```bash
php artisan serve
```

### Frontend Setup (Flutter)

1. **Navigate to mobile directory**
```bash
cd mobile
```

2. **Install dependencies**
```bash
flutter pub get
```

3. **Generate code**
```bash
dart run build_runner build
```

4. **Environment configuration**
```bash
# Create flavor-specific main files
# main_dev.dart - Development environment
# main_prod.dart - Production environment
```

5. **Run the app**
```bash
# Development
flutter run --flavor dev -t lib/main_dev.dart

# Production
flutter run --flavor prod -t lib/main_prod.dart
```

## 🔧 Development Commands

### Backend (Laravel)

```bash
# Setup project from scratch
make setup

# Run tests
make test
php artisan test
./vendor/bin/pest

# Code quality
make lint
./vendor/bin/phpcs
./vendor/bin/phpstan

# Generate API documentation
php artisan l5-swagger:generate

# Database operations
php artisan migrate:fresh --seed
php artisan queue:work
```

### Frontend (Flutter)

```bash
# Code generation
make gen
dart run build_runner build

# Testing
make test
flutter test

# Analysis
make analyze
flutter analyze

# Build
flutter build apk
flutter build ios
```

## 🌐 API Endpoints

### Authentication Endpoints
```
POST /api/v1/auth/register      # User registration
POST /api/v1/auth/login         # Login (email or mobile)
POST /api/v1/auth/logout        # Logout
POST /api/v1/auth/token         # Create personal access token
DELETE /api/v1/auth/token/{id}  # Revoke token
```

### User Management
```
GET /api/v1/me                  # Current user profile
PUT /api/v1/me                  # Update profile
PUT /api/v1/me/avatar           # Upload avatar
PUT /api/v1/me/password         # Change password
```

### Admin Endpoints
```
GET /api/v1/admin/users         # List users (paginated)
POST /api/v1/admin/users        # Create user
GET /api/v1/admin/users/{id}    # Get user details
PUT /api/v1/admin/users/{id}    # Update user
DELETE /api/v1/admin/users/{id} # Delete user
POST /api/v1/admin/users/{id}/activate    # Activate user
POST /api/v1/admin/users/{id}/deactivate  # Deactivate user
GET /api/v1/admin/activities    # Activity logs
GET /api/v1/admin/metrics       # System metrics
```

## 📊 Database Schema

### Core Tables
- **users**: User accounts with dual auth (email/mobile)
- **roles**: Role-based access control
- **permissions**: Granular permissions
- **activities**: Comprehensive activity logging

### Key Features
- Soft deletes on user accounts
- Optimized indices for performance
- Foreign key constraints
- JSON fields for flexible data storage

## 🧪 Testing

### Backend Testing (Pest)
```bash
# Run all tests
php artisan test

# Run specific test suite
php artisan test --testsuite=Feature
php artisan test --testsuite=Unit

# Coverage report
php artisan test --coverage
```

### Frontend Testing (Flutter)
```bash
# Run all tests
flutter test

# Unit tests only
flutter test test/unit/

# Widget tests only
flutter test test/widget/

# Integration tests
flutter test integration_test/
```

## 🔐 Security Features

### Backend Security
- CSRF protection on all forms
- Rate limiting on authentication endpoints
- Secure password hashing with bcrypt
- SQL injection prevention via Eloquent ORM
- XSS protection with escaped output
- Security headers middleware

### Frontend Security
- Secure token storage using flutter_secure_storage
- Certificate pinning for API calls
- Input validation and sanitization
- Biometric authentication support

## 📱 Mobile App Features

### Authentication Flow
1. Registration with email or mobile number
2. Login with dual authentication support
3. Password reset functionality
4. Profile management with avatar upload

### Admin Features (Role-based)
- Read-only user list for demonstration
- Basic user management interface
- Activity monitoring dashboard

### State Management
- Riverpod for reactive state management
- AsyncValue for loading/error states
- Immutable data models with Freezed

## 🚀 Deployment

### Backend Deployment
```bash
# Production environment setup
cp .env.example .env.production

# Optimize for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev

# Database migration
php artisan migrate --force

# Storage setup
php artisan storage:link
```

### Frontend Deployment
```bash
# Build for production
flutter build apk --release
flutter build appbundle --release
flutter build ios --release

# Build for different flavors
flutter build apk --flavor prod -t lib/main_prod.dart
```

## 🔄 CI/CD

### GitHub Actions Workflows
- **Backend**: Composer validation, PHPStan, PHPCS, Pest tests
- **Frontend**: Flutter analyze, Flutter test, Build validation
- **Security**: Dependency scanning, SAST analysis

### Quality Gates
- Code coverage thresholds
- Static analysis passing
- All tests passing
- Security scan clean

## 📚 Documentation

- **API Documentation**: Available at `/api/docs` (Swagger UI)
- **OpenAPI Spec**: Generated automatically from code annotations
- **Postman Collection**: Located in `docs/postman/`
- **Database ERD**: Available in `docs/database/`

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes with tests
4. Run quality checks
5. Submit a pull request

## 📄 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🆘 Support

For support and questions:
- Create an issue in the GitHub repository
- Check the documentation in the `docs/` directory
- Review the API documentation at `/api/docs`

---

**Quick Start Summary:**
1. Set up Laravel backend with `make setup`
2. Configure Flutter mobile app with `flutter pub get`
3. Run backend with `php artisan serve`
4. Run mobile app with `flutter run --flavor dev`
5. Access admin panel at `http://localhost:8000/admin`
6. View API docs at `http://localhost:8000/api/docs`