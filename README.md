# PetCare Stay

PetCare Stay adalah aplikasi web berbasis Laravel untuk mengelola penitipan hewan, data pemilik hewan, kamar penitipan, dan booking.

## Fitur

* Login Admin dan User
* Registrasi User
* Data Pet Owner otomatis dibuat saat registrasi user
* CRUD Data Pemilik Hewan
* CRUD Data Hewan
* CRUD Data Kamar Penitipan
* CRUD Data Booking
* Validasi Input Laravel
* Perhitungan biaya penitipan otomatis
* Tampilan responsive

## Hak Akses

### Admin

* Melihat seluruh data pemilik hewan
* Melihat seluruh data hewan
* Melihat seluruh data booking
* Mengelola kamar penitipan
* Dapat memilih semua hewan saat membuat booking

### User

* Registrasi akun sendiri
* Data Pet Owner dibuat otomatis saat registrasi
* Menambah data hewan miliknya sendiri
* Membuat booking untuk hewan miliknya sendiri
* Tidak dapat memilih hewan milik pengguna lain

## Relasi Database

* Satu Pet Owner memiliki banyak Hewan
* Satu Hewan dimiliki oleh satu Pet Owner
* Satu Hewan dapat memiliki banyak Booking
* Satu Kamar dapat memiliki banyak Booking
* Booking terhubung ke Hewan dan Kamar

## Cara Menjalankan

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```

Buka browser:

http://127.0.0.1:8000

## Akun Demo

Admin:

* Email: [admin@petcare.test](mailto:admin@petcare.test)
* Password: password

## Fitur Booking

* Paket Basic
* Paket Premium
* Paket Grooming Plus
* Status Menunggu
* Status Check In
* Status Selesai
* Status Dibatalkan

Sistem akan menghitung total biaya berdasarkan lama penitipan, harga kamar, dan paket layanan yang dipilih.
