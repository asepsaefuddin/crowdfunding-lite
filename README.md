# ⚙️ Instalasi Proyek

Ikuti langkah-langkah berikut untuk menjalankan proyek di lokal Anda:

```bash
# 1. Clone Repositori
git clone https://github.com/asepsaefuddin/crowdfunding-lite
cd crowdfunding-lite

# 2. Instalasi Dependency
composer install
npm install && npm run build

# 3. Konfigurasi Environment
cp .env.example .env
# Sesuaikan koneksi database di file .env

# 4. Generate App Key & Migrasi Database
php artisan key:generate
php artisan migrate

# 5. Jalankan Server
php artisan serve
