# Studio Notes

A small blog for the Week 9 class: Blade layouts and components, posts, and session login. The database is SQLite.

## Requirements

- PHP 8.3 or newer
- Composer
- Node.js and npm

## Install

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed
npm install
npm run build
php artisan serve
```

Open [http://localhost:8000](http://localhost:8000).

`migrate --seed` creates the tables and the classroom posts. Sign in with:

- Email: `alex@studio.test`
- Password: `password`

While you edit CSS or Blade classes, run `npm run dev` in a second terminal so Vite rebuilds the assets. `npm run build` is enough for a normal class session.

## Tests

```bash
php artisan test
```
