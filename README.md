## Install
1. xampp
2. composser

jalankan xampp, centang `apache` dan `mysql`
## 01 Download source code dari Bitbucket
buka cmd dan ke working directory kita, ketikkan command berikut :
```
git clone --depth 1 https://github.com/adhawandiy99/skripsi_mt.git
```

## 02 Download Library
masuk ke folder aplikasi

```
cd skripsi_mt
```

install library untuk PHP
```
composer install
```

## 03 Setting Aplikasi
masuk dalam database kita bikin 1 database dengan nama `skripsi_mt`, kembali ke cmd dan ketikkan command berikut:
```
cp .env.example .env
```
buka file `.env`, edit DB_USERNAME dan DB_PASSWORD sesuaikan dengan akun login phpmyadmin agar web kita bisa akses database, setelah seselai setting koneksi, ketikkan command di bawah ini:

```
php artisan key:generate
php artisan migrate
```

## 04 Menjalankan Aplikasi
ketikkan command ini:
```
php artisan serve

```

buka browser ketik `localhost:8000`
