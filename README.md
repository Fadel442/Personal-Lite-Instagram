<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# Personal Lightgram

Personal Lightgram is a simple Laravel-based application designed to manage user profiles, including the ability to update profile images and personal information. This project demonstrates key features like authentication, file uploads, and database management.

## Features

- User Authentication
- Profile Image Upload
- Profile Information Editing (Name, Username, Bio)
- Seeded Demo Accounts

---

## Getting Started

Follow these steps to get the application up and running.

### 1. Clone the Repository
```bash
git clone https://github.com/your-username/personal-lightgram.git
cd personal-lightgram
```

### 2. Install Dependencies
```bash
composer install
npm install && npm run dev
```

### 3. Configure Environment
Copy the `.env.example` file and configure your database settings:
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Run Migrations and Seeding
```bash
php artisan migrate --seed
```

### 5. Start the Server
```bash
php artisan serve
```
Access the application at [http://localhost:8000](http://localhost:8000).

---

## Demo Accounts

To test the application, use the following demo accounts:

| Username | Email             | Password   |
|----------|-------------------|------------|
| fadel    | dummy@gmail.com   | 123456789  |
| dummy2   | dummy2@gmail.com  | 123456789  |

---

## Screenshots

### Initial Screen

![Tampilan Awal](public/images/tampilan-awal.png)

---

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

