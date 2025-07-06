# 🚀 Laravel 11 REST API – Sanctum Authentication & User CRUD

Project ini adalah REST API menggunakan Laravel 11 dengan Laravel Sanctum untuk autentikasi token. Tersedia endpoint login dan CRUD user, dilengkapi dengan seeder user dummy agar langsung bisa digunakan.

---

## 📋 Fitur

- Login API menggunakan token
- Laravel Sanctum untuk autentikasi API
- Endpoint CRUD untuk data `User`
- Middleware `auth:sanctum` untuk proteksi route
- Seeder user dummy (`admin@crunchflux.com` / `crunchflux`)

---

## ⚙️ Instalasi

### 1. Clone Repository

```bash
git clone https://github.com/adistio/laravel-api-example.git
cd laravel-api-example
```

### 2. Install Dependency PHP

```bash
composer install
```

### 3. Salin File .env
```bash
cp .env.example .env
```

### 4. Konfigurasi Database
Edit file .env sesuai koneksi lokalmu, contoh:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=secret
```

### 5. Generate App Key
```bash
php artisan key:generate
```

### 6. Jalankan Migrasi + Seeder
```bash
php artisan migrate --seed
```

### 🔐 Login API
- Endpoint

```bash
POST /api/login
```

```bash
Request JSON
{
  "email": "admin@crunchflux.com",
  "password": "crunchflux"
}
```

```bash
Response JSON
{
  "token": "your_api_token"
}
```

### 📡 Endpoint CRUD User
| Method | Endpoint          | Auth |
| ------ | ----------------- | ---- |
| GET    | `/api/users`      | ❌    |
| GET    | `/api/users/{id}` | ✅    |
| POST   | `/api/users`      | ✅    |
| PUT    | `/api/users/{id}` | ✅    |
| DELETE | `/api/users/{id}` | ✅    |

- Untuk endpoint yang membutuhkan autentikasi kirimkan header:
Authorization: Bearer your_api_token

### 👤 Seeder User
User dummy otomatis dibuat saat menjalankan:
php artisan migrate --seed

```bash
Detail akun:
Email: admin@crunchflux.com
Password: crunchflux
```

### 🧪 Tes API
Gunakan tools seperti:
- Postman
- curl
- Thunder Client (VS Code extension)

