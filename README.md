<p align="center"><img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PrimaryLogo.svg" width="400" alt="Laravel Logo"></p>

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
 ### <img src="https://github.com/Moegamat-Tauriq-Osman/paw-point/blob/main/public/logos/PawVariation.svg" width="20" alt="Logo" /> Customer Registration & Login - Register at: `/register` - Login at: `/login` - Laravel Breeze handles authentication securely. Customers can also reset their passwords.

---

## Look of the Paw Point application

### Landing Page, Login, Registration & Password Reset

### Landing Page
<img width="1365" height="640" alt="Screenshot 2025-11-20 120703" src="https://github.com/user-attachments/assets/9fe6335d-55de-4535-a426-a3969436b913" />

### Login Page
<img width="1365" height="639" alt="Screenshot 2025-11-20 120719" src="https://github.com/user-attachments/assets/8934d3b3-dc2e-4e50-b469-a68fac4604b1" />

### Registration Page
<img width="1364" height="638" alt="Screenshot 2025-11-20 120739" src="https://github.com/user-attachments/assets/ffddd232-8820-445a-8f3e-775a021f58de" />

### Password Reset Page
<img width="1365" height="637" alt="Screenshot 2025-11-20 120755" src="https://github.com/user-attachments/assets/79ec9152-6470-4034-a3b1-f7c61128e288" />


## ⚙️ Installation

Note - Ensure you modify the env file to match your database!

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
