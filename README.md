# 🛍️ Rasa Tangkit – E-Commerce Produk Olahan Nanas

Rasa Tangkit adalah sebuah platform e-commerce berbasis web yang dikembangkan sebagai proyek mata kuliah Pemrograman Website 2. Website ini dibuat untuk mempromosikan dan memasarkan **produk olahan nanas** dari **desa Tangkit Baru, Kabupaten Muaro Jambi**, agar dapat menjangkau pasar yang lebih luas secara digital.

## 📌 Tujuan Proyek
Proyek ini bertujuan untuk:
- Meningkatkan visibilitas dan penjualan produk UMKM lokal.
- Membantu digitalisasi usaha masyarakat desa Tangkit Baru.
- Mengimplementasikan teknologi web untuk solusi nyata di masyarakat.

## 🌐 Link Demo
📺 [Tonton Demo di YouTube](https://youtu.be/24bVzLU296k)

## 🧑‍💻 Fitur-Fitur
Berikut beberapa fitur utama dari website Rasa Tangkit:
- 👥 **Registrasi & Login** (Pembeli & Admin)
- 🛒 **Keranjang Belanja**
- 💳 **Pembayaran Online** (Midtrans)
- 📦 **Manajemen Pesanan** (Admin)
- ❤️ **Wishlist Produk**
- 📊 **Dashboard Admin** (manajemen produk, pesanan, penjualan)
- 💵 **Verifikasi Pembayaran** (Admin)
  
## 🛠️ Teknologi yang Digunakan
Email:
- Brevo

Frontend:
- Blade Template
- Bootstrap 5
- Switch Alert

Backend:
- Laravel 12
- MySQL
- Midtrans Snap (Payment Gateway)

## 🚀 Cara Menjalankan di Lokal

### 1. Clone Repository
```bash
git clone https://github.com/azizhadiid/Proyek_Peweb_2.git
cd rasatangkit
```

### 2. Setup Laravel 12
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

## 🤝 Kontributor
- Aziz Alhadiid (Project Lead and Back End)
- Hilmy Anandika Indra (Front End)
- Irfan Aziz (Front End)
- Daffa Dzulfaqor Dhiya Ulhaq (UIUX Design)

## 📣 Catatan
Proyek ini dibuat sebagai tugas proyek mata kuliah dan bertujuan edukatif. Namun, sistem ini bisa terus dikembangkan untuk digunakan langsung oleh UMKM Desa Tangkit Baru.


