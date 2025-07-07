Ecommerce App (SSO Provider)

This is the main authentication provider for the Multi-System Login demo project. When a user logs into this system, they are automatically logged into the foodpanda-app via a secure token-based Single Sign-On (SSO) mechanism.

Tech Stack
Laravel 12
Laravel Breeze (Blade)
Bootstrap 5
Crypt-based token for secure SSO
Laravel Auth (session-based)

Features
Login with email & password
Secure encrypted token generation for SSO
Auto redirect to Foodpanda App with token
Logout from both apps at once

git clone https://github.com/KamrulSarwar23/ecommerce-app.git
cd ecommerce-app
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install && npm run dev

🔐 Authentication Flow

User logs in via /login
A signed encrypted token is generated
User is redirected to http://foodpanda-app.iconicsolutionsbd.com/
Token is verified in foodpanda-app, and user is logged in

🔓 Logout Flow

User logs out from ecommerce-app
They are redirected to http://foodpanda-app.iconicsolutionsbd.com/sso-logout
Logout happens in both apps

✅ Requirements

PHP 8.2+
Laravel 12
Node.js & NPM
MySQL
