# 🍽️ Kulineran Bareng – Platform Berbagi Tempat Kuliner

**Kulineran Bareng** adalah sebuah website berbasis Laravel yang dirancang untuk para pecinta kuliner agar dapat berbagi, mencari, dan merekomendasikan tempat makan favorit mereka. Website ini membantu pengguna menemukan spot kuliner terbaik berdasarkan lokasi, kategori, dan ulasan pengguna lain.

---

## ✨ Fitur Utama

- 🔍 **Cari Tempat Kuliner** berdasarkan lokasi, jenis makanan, dan rating
- 📝 **Review & Rating**: Pengguna bisa menulis ulasan dan memberi rating
- 📸 **Upload Foto Tempat Makan**
- 👥 **Autentikasi Pengguna**: Login dan registrasi
- 🗺️ **Peta Lokasi** (integrasi Google Maps opsional)
- 📂 **Dashboard Admin**: Kelola data tempat, review, dan pengguna
- 📱 **Desain Responsive**: Nyaman digunakan di desktop dan mobile

---

## 🛠️ Teknologi yang Digunakan

- **Laravel** (PHP Framework)
- **Blade** Template Engine
- **MySQL** / SQLite Database
- **Bootstrap** / TailwindCSS (untuk tampilan)
- **Google Maps API** *(opsional untuk lokasi)*

---

## 📷 Cuplikan Tampilan

> *(Kamu bisa menambahkan tangkapan layar di sini untuk memperlihatkan antarmuka aplikasi)*

---

## 🚀 Cara Menjalankan (Local)

```bash
git clone https://github.com/username/kulineran-bareng.git
cd kulineran-bareng
composer install
cp .env.example .env
php artisan key:generate
# Atur konfigurasi DB di .env
php artisan migrate
php artisan serve
