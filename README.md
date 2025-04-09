# Inventory Management - Laravel

A simple inventory management web app built with Laravel.

## ✨ Features
- CRUD Barang (Nama, Kode, Stok, Kategori)
- CRUD Kategori
- Pencarian data barang & kategori
- Pagination
- User-friendly interface

## 🔧 Tech Stack
- Laravel 12.7.2
- Blade Template
- Tailwind CSS
- MySQL

## 📂 Folder Struktur
- `app/Models`: Model Laravel
- `resources/views`: Blade templates
- `routes/web.php`: Web routes

## 🚀 Setup
```bash
git clone https://github.com/9DwiErnawati/inventory-laravel.git
cd inventory-laravel
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
