# Sistem Peminjaman Barang

Aplikasi Sistem Peminjaman Barang berbasis Laravel untuk memenuhi tugas mata kuliah Pemrograman Full Stack.

## Fitur

- Login Authentication
- CRUD Barang
- CRUD Peminjam
- Transaksi Peminjaman
- Validasi Stok
- Database Transaction
- Dashboard

## Teknologi

- Laravel 12
- PHP 8.2
- MySQL
- Bootstrap 5

## Login

Email:

[admin@gmail.com](mailto:admin@gmail.com)

Password:

password

## Instalasi

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

## Struktur Modul

- Master Barang
- Master Peminjam
- Transaksi Peminjaman

## Fitur Transaksi Kompleks

Saat transaksi disimpan:

1. Menyimpan data peminjaman.
2. Menyimpan detail peminjaman.
3. Mengurangi stok barang.
4. Menggunakan database transaction.
5. Rollback jika terjadi error.

```

```
