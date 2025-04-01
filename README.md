# Order Product with Docker

This project is a Laravel application designed to handle order and product management, running in a Dockerized environment with Laravel Sail.

---

## Installation Guide / Kurulum Rehberi

### Prerequisites / Gereksinimler

- Docker (Make sure Docker is installed and running on your system)
- Docker Compose (Required for running Sail containers)
- Composer (For managing Laravel dependencies)
- Git (To clone the repository)

### 1. Clone the repository / Depoyu klonlayın

Clone the repository to your local machine.


git clone https://github.com/zaferyildiiz/order_product_with_docker.git

cd order_product_with_docker

2. Install Composer Dependencies / Composer Bağımlılıklarını Yükleyin
   
Run the following command to install Laravel dependencies.
composer install


3. Set up .env file / .env dosyasını ayarlayın
   
Copy the .env.example file to .env to configure your application environment.
cp .env.example .env


4. Set up Sail / Sail'i ayarlayın
 
If you haven't installed Laravel Sail yet, you can do so by running:

composer require laravel/sail --dev
Then, install the Sail environment:

php artisan sail:install

5. Build and start containers / Containerları oluşturun ve başlatın
Run the following command to start the containers in the background:

./vendor/bin/sail up -d

This will start your Docker containers and set up your environment.



6. Run Database Migrations / Veritabanı Migration'larını çalıştırın

Run the database migrations to set up the database schema:

./vendor/bin/sail artisan migrate


7. Seed the Database (Optional) / Veritabanını Seeding Yapın (Opsiyonel)
   
If you want to populate the database with sample data, run the following command:

./vendor/bin/sail artisan db:seed


8. Access the Application / Uygulamaya Erişim
Once the containers are running, you can access the application by navigating to:
http://localhost:3000


Usage / Kullanım


Artisan Commands / Artisan Komutları
You can use Laravel's Artisan commands through Sail like this:

./vendor/bin/sail artisan [command]


For example, to run the tinker shell:

./vendor/bin/sail artisan tinker


Composer Commands / Composer Komutları

To install Composer packages, you can use:

./vendor/bin/sail composer require [package-name]


Logs / Loglar

To view the logs of your application:

./vendor/bin/sail logs


Docker Management / Docker Yönetimi

Start the containers: ./vendor/bin/sail up -d

Stop the containers: ./vendor/bin/sail down

Stop and remove volumes (clean reset): ./vendor/bin/sail down --volumes



Troubleshooting / Sorun Giderme

If you encounter any issues with Docker containers, you can check logs or restart the containers

./vendor/bin/sail logs

./vendor/bin/sail restart

For any errors related to the database, try running migrations again:

./vendor/bin/sail artisan migrate:refresh



License / Lisans
This project is licensed under the MIT License - see the LICENSE file for details.
