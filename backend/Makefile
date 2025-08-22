.PHONY: help setup test lint phpstan phpcs phpcbf clean install migrate seed fresh

# Default target
help: ## Show this help message
	@echo 'Laravel Backend Commands:'
	@echo ''
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "  \033[33m%-12s\033[0m %s\n", $$1, $$2}'

# Project setup
setup: ## Setup project from scratch
	composer install --optimize-autoloader
	cp .env.example .env
	php artisan key:generate
	php artisan migrate
	php artisan db:seed
	php artisan storage:link
	npm install
	npm run build

install: ## Install PHP dependencies
	composer install --optimize-autoloader

# Database operations
migrate: ## Run database migrations
	php artisan migrate

seed: ## Run database seeders
	php artisan db:seed

fresh: ## Fresh migration with seeding
	php artisan migrate:fresh --seed

# Testing
test: ## Run all tests
	php artisan test

coverage: ## Run tests with coverage report
	php artisan test --coverage

# Code quality
lint: phpstan phpcs ## Run all code quality checks

phpstan: ## Run PHPStan static analysis
	./vendor/bin/phpstan analyse --memory-limit=2G

phpcs: ## Run PHP CodeSniffer
	./vendor/bin/phpcs

phpcbf: ## Run PHP CodeSniffer auto-fixer
	./vendor/bin/phpcbf

# Development
serve: ## Start development server
	php artisan serve

queue: ## Start queue worker
	php artisan queue:work

tinker: ## Start Laravel Tinker
	php artisan tinker

# Assets
assets: ## Build frontend assets
	npm run build

assets-dev: ## Build frontend assets for development
	npm run dev

assets-watch: ## Watch frontend assets
	npm run watch

# Maintenance
clear: ## Clear all caches
	php artisan cache:clear
	php artisan config:clear
	php artisan route:clear
	php artisan view:clear

optimize: ## Optimize application for production
	php artisan config:cache
	php artisan route:cache
	php artisan view:cache
	composer install --optimize-autoloader --no-dev

clean: ## Clean up temporary files
	rm -rf bootstrap/cache/*.php
	rm -rf storage/framework/cache/data/*
	rm -rf storage/framework/sessions/*
	rm -rf storage/framework/views/*
	rm -rf storage/logs/*.log