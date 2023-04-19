## How to use

> pertama tama clone repo nya

```
git clone https://github.com/akufarish/template-project-laravel.git
```

> Lalu jalankan command composer install pasti kan composer sudah terinstall jika tidak bisa download terlebih dahulu [composer](https://getcomposer.org/Composer-Setup.exe)

```
composer install
```

> konfigurasi file .env

```
cp .env.example .env
ganti database pada DB_DATABASE=ganti value nya
```

> lalu jalankan command ini

```
php artisan key:generate
php artisan migrate
```

> run server nya

```
php artisan serve
```

## Fitur yang tersedia

1. Crud
    - Store image
    - Create
    - Read
    - Update
    - Delete
2. Login
    - Validasi ketika input kosong
    - Validasi ketika akun tidak terdaftar
3. Register
    - Validasi ketika input kosong
    - Validasi ketika akun sudah ada yang terdaftar
4. Throw message
    - Throw message ketika sukses
    - Throw message ketika error

## Fitur yang akan ditambahkan

1. Kada tahu lagi
