# LITTLE SHOP — Tropical Market
TR 11: E-Commerce DB + Secure Auth.

Fitur: 7 tabel bisnis + users, FK, 55 produk factory/seed, Eloquent relationships,
scope active(), authentication, role admin/editor/user, custom role middleware,
Product Policy (nama class PostPolicy mengikuti requirement tugas), protected routes,
5 Tinker queries, eager-loading demo, dan UI Tropical Market.

Paket ini adalah source layer untuk ditempel ke project Laravel baru. vendor/ dan
framework core tidak disertakan.

Install:
composer create-project laravel/laravel little-shop
cd little-shop
composer require laravel/breeze --dev
php artisan breeze:install blade
npm install
npm run build
Salin app/, database/, resources/views/, routes/ dari ZIP ini.
Atur .env MySQL, lalu php artisan migrate:fresh --seed
