<p align="center"><img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PrimaryLogo.svg" width="400" alt="Laravel Logo"></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## <img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PawVariation.svg" width="20" alt="Logo" /> About Paw Point

Paw Point is a web application, digital booking system designed for feline care services offering feline owners a convenient way to book boarding/grooming or care services online which combines a modern web-based product with services, creating a seamless experience for both customers and staff.

---

## <img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PawVariation.svg" width="20" alt="Logo" /> Features

- Role-based Access (Admin, Staff Member, Customer)
- Manage Bookings
- Manage Services
- Manage Staff
- Email Notifications for booking confirmations
- Authentication via Laravel Breeze
- Simple user friendly interfaces

---

## <img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PawVariation.svg" width="20" alt="Logo" /> Technologies Used

- Laravel 12+
- Laravel Breeze (Auth)
- Blade (Templating)
- MySQL / SQLite
- Mailtrap (for local email)
- Bootstrap / Tailwind CSS / Css (template converted to Blade)
- PHPUnit (Testing)

---

## <img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PawVariation.svg" width="20" alt="Logo" /> Guide: How to Use the Application
 ### <img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PawVariation.svg" width="20" alt="Logo" /> User Roles
 - **Admin** - Monitor/Manage bookings, services and staff.
 - **Staff Member** - View, accept and complete bookings.
- **Customer** - View and create bookings.
 ### <img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PawVariation.svg" width="20" alt="Logo" /> Customer Registration & Login - Register at: `/register` - Login at: `/login` - Laravel Breeze handles authentication securely. Customers can also reset their passwords. ---

---

## ⚙️ Installation

### Prerequisites
- PHP 8.1+
- Composer
- Node.js & npm
- MySQL or SQLite
- Mailpit (for email testing)

### Steps
# 1. Clone the repository
git clone https://github.com/your-username/task-management-app.git
cd task-management-app

# 2. Install PHP dependencies
composer install

# 3. Install frontend dependencies
npm install && npm run dev

# 4. Copy .env and configure
cp .env.example .env

# 5. Set database config in .env (use SQLite or MySQL)
php artisan key:generate

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Start the local server
php artisan serve

---

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
