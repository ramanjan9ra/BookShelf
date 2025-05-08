<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Bookshelf Application

A web application for managing book collections and authors built with Laravel.

## Features

- Manage books and authors
- Search functionality
- Chatbot interface for quick information

## Requirements

- PHP 8.1 or higher
- Composer
- MySQL/MariaDB
- Git

## Installation

### 1. Clone the repository

```bash
git clone https://github.com/yourusername/bookshelf.git
cd bookshelf
```

### 2. Install dependencies

```bash
composer install
npm install
```

### 3. Environment setup

```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure your database

Edit the `.env` file and update the database connection settings:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bookshelf
DB_USERNAME=root
DB_PASSWORD=
```

### 5. Run migrations and seed the database

```bash
php artisan migrate
php artisan db:seed
```

### 6. Start the development server

```bash
php artisan serve
npm run dev
```

The application will be available at http://localhost:8000

## Using the Chatbot

The application includes a chatbot that can answer the following questions:
- "How many authors are there?"
- "How many books are available?"
- "List top 5 authors."

## API Endpoints

### Chatbot API

- **POST /api/chatbot** - Process chatbot queries
  - Parameters: `query` (string)
  - Example: `{query: "How many books are available?"}`

## License

[MIT License](LICENSE)
