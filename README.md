# 🚀 Project Setup Guide (Laravel + Filament)

Halo! Makasih udah nge-clone repo ini. Sebelum kamu bisa jalanin project-nya, ada beberapa langkah penting yang harus kamu ikutin supaya semuanya berjalan lancar.

---

## 📦 1. Clone Repository

Clone repo ini ke lokal kamu:

```bash
git clone https://github.com/briellaYourBae/Ujian-Sertifikasi-Kompetensi-USK2025-.git
cd Ujian-Sertifikasi-Kompetensi-USK2025-


⚙️ 2. Install Dependencies
Pastikan kamu sudah install:
PHP 8.x
Composer
Node.js & NPM
MySQL / MariaDB
Lalu jalankan perintah berikut:
composer install
npm install


🔑 3. Setup Environment
Salin file environment dan generate app key:
cp .env.example .env
php artisan key:generate


🧪 4. Konfigurasi Database
Edit file .env dan isi bagian database sesuai dengan konfigurasi lokal kamu:
ini
DB_DATABASE=namadb
DB_USERNAME=username
DB_PASSWORD=password


🛠️ 5. Migrasi Database
Setelah semuanya siap, jalankan perintah berikut:
php artisan migrate
⚠️ WAJIB dijalankan setelah clone repo agar struktur database-nya terbentuk dengan benar.

Kalau ada seeder (opsional):
php artisan db:seed

🖥️ 6. Jalankan Aplikasi
Untuk menjalankan Laravel:
php artisan serve

Kalau frontend-nya pakai Vite:
npm run dev
📚 Dokumentasi & Tutorial Lengkap


Filament PHP Documentation
🔗 https://filamentphp.com/
Laravel Official Documentation
🔗 https://laravel.com/

❓ Troubleshooting
✅ Pastikan file .env sudah sesuai
✅ Pastikan database sudah dibuat dan bisa diakses
✅ Jalankan ulang composer install jika ada error
✅ Jalankan php artisan config:clear kalau ada error konfigurasi
✅ Aktifkan semua ekstensi PHP yang dibutuhkan Laravel (contoh: pdo, mbstring, openssl, dll.)


🙌 Credits
Developed by Faqih
Feel free to fork, clone, and modify ✨
