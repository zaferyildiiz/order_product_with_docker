<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Product with Docker - Kurulum Rehberi</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
        }
        h1, h2, h3 {
            color: #2c3e50;
        }
        h1 {
            border-bottom: 2px solid #3498db;
            padding-bottom: 10px;
        }
        h2 {
            background-color: #eaf2f8;
            padding: 8px 12px;
            border-left: 4px solid #3498db;
        }
        code {
            background-color: #f0f0f0;
            padding: 2px 5px;
            border-radius: 3px;
            font-family: 'Courier New', Courier, monospace;
        }
        pre {
            background-color: #282c34;
            color: #abb2bf;
            padding: 15px;
            border-radius: 5px;
            overflow-x: auto;
        }
        .container {
            background-color: white;
            border-radius: 8px;
            padding: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .note {
            background-color: #fffde7;
            border-left: 4px solid #ffd600;
            padding: 12px;
            margin: 15px 0;
        }
        .command {
            color: #4CAF50;
            font-weight: bold;
        }
        .lang-switch {
            text-align: right;
            font-style: italic;
            color: #7f8c8d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Product with Docker</h1>
        <p>Bu proje, Laravel Sail ile Docker ortamında çalışan bir sipariş ve ürün yönetim uygulamasıdır.</p>

        <h2>Installation Guide / Kurulum Rehberi</h2>

        <h3>Prerequisites / Gereksinimler</h3>
        <ul>
            <li>Docker (Sisteminizde Docker kurulu ve çalışıyor olmalı)</li>
            <li>Docker Compose (Sail container'ları için gerekli)</li>
            <li>Composer (Laravel bağımlılıklarını yönetmek için)</li>
            <li>Git (Depoyu klonlamak için)</li>
        </ul>

        <h3>1. Clone the repository / Depoyu klonlayın</h3>
        <p>Projeyi yerel makinenize klonlayın:</p>
        <pre><code>git clone https://github.com/zaferyildiiz/order_product_with_docker.git
cd order_product_with_docker</code></pre>

        <h3>2. Install Composer Dependencies / Composer Bağımlılıklarını Yükleyin</h3>
        <p>Laravel bağımlılıklarını yüklemek için:</p>
        <pre><code>composer install</code></pre>

        <h3>3. Set up .env file / .env dosyasını ayarlayın</h3>
        <p>Uygulama ortamını yapılandırmak için:</p>
        <pre><code>cp .env.example .env</code></pre>

        <div class="note">
            <strong>Not:</strong> .env dosyasını düzenleyerek veritabanı bağlantı bilgilerini güncellemeyi unutmayın.
        </div>

        <h3>4. Set up Sail / Sail'i ayarlayın</h3>
        <p>Laravel Sail kurulumu:</p>
        <pre><code>composer require laravel/sail --dev
php artisan sail:install</code></pre>

        <h3>5. Build and start containers / Containerları oluşturun ve başlatın</h3>
        <p>Container'ları arka planda başlatmak için:</p>
        <pre><code>./vendor/bin/sail up -d</code></pre>

        <h3>6. Run Database Migrations / Veritabanı Migration'larını çalıştırın</h3>
        <p>Veritabanı şemasını oluşturmak için:</p>
        <pre><code>./vendor/bin/sail artisan migrate</code></pre>

        <h3>7. Seed the Database (Optional) / Veritabanını Seeding Yapın (Opsiyonel)</h3>
        <p>Örnek verilerle veritabanını doldurmak için:</p>
        <pre><code>./vendor/bin/sail artisan db:seed</code></pre>

        <h3>8. Access the Application / Uygulamaya Erişim</h3>
        <p>Container'lar çalıştıktan sonra uygulamaya şu adresten erişebilirsiniz:</p>
        <p><a href="http://localhost:3000" target="_blank">http://localhost:3000</a></p>

        <h2>Usage / Kullanım</h2>

        <h3>Artisan Commands / Artisan Komutları</h3>
        <p>Laravel Artisan komutlarını Sail ile çalıştırma:</p>
        <pre><code>./vendor/bin/sail artisan [command]</code></pre>
        <p>Örneğin, tinker shell'i başlatmak için:</p>
        <pre><code>./vendor/bin/sail artisan tinker</code></pre>

        <h3>Composer Commands / Composer Komutları</h3>
        <p>Composer paketlerini yüklemek için:</p>
        <pre><code>./vendor/bin/sail composer require [package-name]</code></pre>

        <h3>Logs / Loglar</h3>
        <p>Uygulama loglarını görüntülemek için:</p>
        <pre><code>./vendor/bin/sail logs</code></pre>

        <h3>Docker Management / Docker Yönetimi</h3>
        <ul>
            <li>Container'ları başlat: <code class="command">./vendor/bin/sail up -d</code></li>
            <li>Container'ları durdur: <code class="command">./vendor/bin/sail down</code></li>
            <li>Container'ları ve volume'leri temizle: <code class="command">./vendor/bin/sail down --volumes</code></li>
        </ul>

        <h2>Troubleshooting / Sorun Giderme</h2>
        <ul>
            <li>Logları görüntüle: <code class="command">./vendor/bin/sail logs</code></li>
            <li>Container'ları yeniden başlat: <code class="command">./vendor/bin/sail restart</code></li>
            <li>Veritabanı sorunlarında migration'ları yeniden çalıştır: <code class="command">./vendor/bin/sail artisan migrate:refresh</code></li>
        </ul>

        <h2>License / Lisans</h2>
        <p>Bu proje MIT Lisansı altında lisanslanmıştır - detaylar için LICENSE dosyasına bakınız.</p>
    </div>
</body>
</html>
