# 🎓 Sistem Informasi Akademik (SIAKAD) — Laravel

Sistem Informasi Akademik berbasis web yang dibangun menggunakan **Laravel**.  
Project ini dibuat sebagai tugas mid dan akan terus dikembangkan secara bertahap setiap bulan.

---

## 🚀 Teknologi yang Digunakan

| Teknologi | Keterangan |
|---|---|
| Laravel 11/12/13 | Framework utama |
| PHP 8+ | Backend language |
| MySQL / MariaDB | Database |
| Bootstrap 5 | Frontend styling |
| Blade Template Engine | Templating Laravel |
| SMTP Gmail | Email verification |
| Session Authentication | Manajemen login |

---

## 📌 Fitur Utama

### 🔐 Authentication System
- Register user
- Login & Logout user
- Session-based login

### 📧 Email Verification
- Kirim email verifikasi saat register
- Token verifikasi unik per user
- Status user diperbarui setelah verifikasi
- Proteksi login sebelum email diverifikasi

### 👤 User Management

| Field | Keterangan |
|---|---|
| `username` | Nama pengguna |
| `email` | Alamat email |
| `password` | Hashed (bcrypt) |
| `status_login` | `0` = belum verifikasi, `1` = aktif |
| `verification_token` | Token unik email verifikasi |

### 🏠 Dashboard
- Halaman dashboard setelah login berhasil
- Menampilkan status user yang sedang login
- Akses terbatas — hanya untuk user yang sudah login

---

## 📁 Struktur Project

```
resources/views/
├── layouts/
├── auth/
├── dashboard/
├── components/
├── partials/
└── email/

app/Http/Controllers/
└── AuthController.php

database/migrations/
├── users table
├── sessions
└── password reset
```

---

## ⚙️ Instalasi Project

### 1. Clone Repository
```bash
git clone https://github.com/username/siakad.git
cd siakad
```

### 2. Install Dependency
```bash
composer install
npm install
```

### 3. Copy File Environment
```bash
cp .env.example .env
```

### 4. Generate Key
```bash
php artisan key:generate
```

### 5. Setup Database
Edit file `.env`:
```env
DB_DATABASE=sistem_informasi_akademik
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Jalankan Migration
```bash
php artisan migrate
```

### 7. Jalankan Server
```bash
php artisan serve
```

---

## 📧 Konfigurasi Email (Gmail SMTP)

Gunakan **App Password** dari akun Gmail kamu:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=yourgmail@gmail.com
MAIL_PASSWORD=app_password_gmail
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=yourgmail@gmail.com
MAIL_FROM_NAME="SIAKAD"
```

> 💡 **Cara membuat App Password Gmail:** Buka [myaccount.google.com](https://myaccount.google.com) → Security → 2-Step Verification → App Passwords.

---

## 🔐 Alur Sistem

### Register
1. User mengisi form register
2. Data tersimpan ke database (`status_login = 0`)
3. Email verifikasi dikirim ke user
4. User klik link verifikasi di email

### Verifikasi
1. Token dicek ke database
2. Jika valid → `status_login` diubah menjadi `1`
3. User dapat langsung login

### Login
1. Cek `username` & `password`
2. Cek status verifikasi email
3. Jika valid → diarahkan ke dashboard

---

## 🧪 Validasi Sistem

| Kondisi | Hasil |
|---|---|
| ❌ Email sudah terdaftar | Error — tidak bisa register ulang |
| ❌ Password salah | Error — login ditolak |
| ❌ Belum verifikasi email | Error — login diblokir |
| ✅ Semua valid | Login sukses → masuk dashboard |

---

## 📅 Roadmap Pengembangan

### 📌 Bulan 1 — *Current*
- [x] Authentication system
- [x] Email verification
- [x] Dashboard basic

### 📌 Bulan 2
- [ ] CRUD Data Siswa
- [ ] CRUD Data Guru
- [ ] CRUD Mata Pelajaran

### 📌 Bulan 3
- [ ] Absensi siswa
- [ ] Nilai siswa
- [ ] Laporan PDF

### 📌 Bulan 4
- [ ] Role admin / guru / siswa
- [ ] Middleware role access
- [ ] UI dashboard admin

### 📌 Bulan 5
- [ ] API integration
- [ ] Mobile version *(opsional)*
- [ ] Laravel API + React/Vue *(opsional)*

---

## 🧑‍💻 Developer Notes

> Project ini masih dalam tahap **pengembangan aktif**.  
> Struktur dan fitur akan terus diperbaiki untuk menjadi sistem akademik yang lengkap dan fungsional.

---

## 📌 Status Project

| Status | Keterangan |
|---|---|
| 🟢 Active Development | Sedang aktif dikembangkan |
| 🟡 Prototype Stage | Masih tahap prototipe |
| 🔵 Academic Project | Dibuat untuk keperluan akademik |