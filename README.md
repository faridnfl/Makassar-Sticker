# Makkasar Sticker

## Cara Jalankan

```bash
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate
npm install
npm run dev
php artisan serve

