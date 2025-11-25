# UjuziShopMall

UjuziShopMall is a small e-commerce / inventory demo application built with Laravel. It manages products, stock movements, and user profiles — suitable as a starting point for a marketplace or inventory management system.

## Key Features

- Product management (see `app/Models/Product.php`)
- Stock movements and audit fields (`app/Models/StockMovement.php`)
- Authentication and basic profile pages (`app/Models/User.php` and `resources/views/profile`)
- Database migrations and seeders in `database/migrations` and `database/seeders`

## Requirements

- PHP 8.1+ (verify with `php -v`)
- Composer
- MySQL / MariaDB (or any DB supported by Laravel)
- Node.js + npm (for frontend assets)
- XAMPP (optional, for local Apache+MySQL environment on Windows)

## Quick Start (Windows / XAMPP)

1. Clone the repository (or create a new repo locally):

```powershell
cd C:\xampp\htdocs
git clone https://github.com/YOUR_USERNAME/UjuziShopMall.git
cd UjuziShopMall
```

2. Install PHP dependencies:

```powershell
composer install
```

3. Install Node dependencies and build assets:

```powershell
npm install
npm run dev
```

4. Copy the example environment file and set your environment variables:

```powershell
copy .env.example .env
```

Edit `.env` and set your database credentials (DB_DATABASE, DB_USERNAME, DB_PASSWORD) and other values. On Windows with XAMPP, a typical local DB host is `127.0.0.1` and username `root` (no password by default).

5. Generate an application key and run migrations:

```powershell
php artisan key:generate
php artisan migrate
php artisan db:seed
```

6. (Optional) Create storage symlink for public uploads:

```powershell
php artisan storage:link
```

7. Run the app locally:

```powershell
php artisan serve
# or use XAMPP Apache by placing the project in htdocs and configuring a virtual host
```

Open `http://127.0.0.1:8000` (or your configured vhost).

## Tests

Run PHPUnit tests:

```powershell
./vendor/bin/phpunit
```

On Windows you may run the bundled `phpunit.bat` in the `vendor/bin` folder if available.

## Project Structure Notes

- `app/Models` — Eloquent models (Product, StockMovement, User)
- `app/Http/Controllers` — Controllers for web routes
- `database/migrations` — Schema definition and migrations
- `database/seeders` — Seed data used in development
- `resources/views` — Blade templates for UI
- `routes/web.php` — Application routes

## Environment & Deployment

- Make sure to set `APP_ENV`, `APP_DEBUG`, and production database credentials when deploying.
- Use a process manager (e.g., Supervisor) for queue workers in production.
- Use a secure storage and do not commit `.env` to version control.

## Contributing

If you'd like to contribute:

- Fork the repository
- Create a feature branch
- Submit a pull request with a clear description of changes

Please open issues for bug reports or feature requests.

## License

This project is provided under the MIT License unless otherwise noted. See the `LICENSE` file if present.

## Contact

If you need help, provide details in an issue or contact the repository owner.

---

Useful files to inspect while working on this project:

- `routes/web.php`
- `app/Models/Product.php`
- `app/Models/StockMovement.php`
- `database/migrations/2025_11_24_153140_create_products_table.php`

