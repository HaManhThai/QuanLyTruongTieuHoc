# QuanLyTruongTieuHoc
Trang web quản lý trường tiểu học

## Introduction

Trang web quản lý trường tiểu học cho phép nhà trường có thể xem thông tin về giáo viên, học sinh, lớp học, khối, môn học, kì, năm học, điểm số và nhập điểm cho các học sinh.

## System Requirements

- PHP >= 8.3
- Composer
- MySQL
- Laravel >= 10.x

## Installation Guide

### 1. Clone the Project
```bash
  git clone https://github.com/HaManhThai/QuanLyTruongTieuHoc.git
  cd QuanLyTruongTieuHoc
```

### 2. Setting Database
```bash
  Chạy file sql (gửi kèm) để có csdl
```

### 3. Start the Server
```bash
  php artisan serve
```
Open your browser and access:
```
http://127.0.0.1:8000/admin
```

## Directory Structure
```
├── app/             # Contains backend code (Models, Controllers,...)
├── bootstrap/       # Bootstrap files
├── config/          # Application configuration
├── database/        # Migrations, Seeders
├── public/          # Static files like images, CSS, JS
├── resources/       # Blade templates, CSS, JS
├── routes/          # Defines routes (web.php, api.php)
├── storage/         # Cache, logs
├── tests/           # Unit tests
└── vendor/          # Packages installed via Composer
```
