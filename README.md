# 🚀 Order Product with Docker

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=for-the-badge&logo=mysql&logoColor=white)

Bu proje, Laravel Sail ile Docker ortamında çalışan bir sipariş ve ürün yönetim uygulamasıdır.

## 📋 Ön Koşullar

- Docker ([Kurulum Rehberi](https://docs.docker.com/get-docker/))
- Docker Compose
- PHP 8.0+
- Composer ([Kurulum Rehberi](https://getcomposer.org/download/))
- Git

## 🛠️ Kurulum

```bash
1- Projeyi Klonlayın

git clone https://github.com/zaferyildiiz/order_product_with_docker.git
cd order_product_with_docker

2- Gerekli Bağımlılıkları Yükleyin
composer install

3- Ortam Değişkenlerini Ayarlayın
cp .env.example .env
.env dosyasını düzenleyerek gerekli ayarları yapın (özellikle veritabanı bağlantı bilgileri).

4. Laravel Sail'i Kurun
composer require laravel/sail --dev
php artisan sail:install

5. Docker Container'larını Başlatın
./vendor/bin/sail up -d

6- Veritabanı Migrasyonlarını Çalıştırın
./vendor/bin/sail artisan migrate

7. (Opsiyonel) Test Verilerini Yükleyin
 
./vendor/bin/sail artisan db:seed

8. Uygulamayı Başlatın

Uygulamaya tarayıcınızdan erişin:
http://localhost



🏗️ Development Komutları


Artisan Komutları
 
./vendor/bin/sail artisan [command]

Örnekler:

./vendor/bin/sail artisan tinker
./vendor/bin/sail artisan make:model Product -m

Composer Komutları
 

./vendor/bin/sail composer [command]

Logları Görüntüleme
bash
Copy

./vendor/bin/sail logs

Testleri Çalıştırma
 

./vendor/bin/sail test

🐛 Sorun Giderme
Container'ları Yeniden Başlatma
 

./vendor/bin/sail restart

Veritabanı Sorunları
 

./vendor/bin/sail artisan migrate:fresh
./vendor/bin/sail artisan migrate:fresh --seed

Dependency Sorunları
 
./vendor/bin/sail composer install
./vendor/bin/sail composer update



