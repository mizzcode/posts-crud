<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Features
- Preview Image before upload
- Toastr Alert
- CKEditor

## Installation
```sh
## clone repo
git clone https://github.com/mizzcode/posts-crud.git

## install packages
composer install

## set env
cp .env.example .env
filesystem_disk = public

## run symbolic links
php artisan storage:link

## run database migration
php artisan migrate

## run server
php artisan serve
```

## Screenshot
![image](https://user-images.githubusercontent.com/101040281/235976338-0cece49f-73b3-4ce5-9ed1-4e190040a6ff.png)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
