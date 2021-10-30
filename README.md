<p align="center"><a href="#" target="_blank"><img src="https://raw.githubusercontent.com/alifnuryana/kpum2021/master/public/img/logo.png" width="400"></a></p>

## E-Voting | KPUM UTAMA

KPUM UTAMA adalah sebuah website e-voting yang dilakukan di lingkungan kampus Universitas Widyatama.
Untuk melakukan voting :
- MPM
- Presma
- Senat
- UKM

## Requirements

- PHP 7.3+
- Node 14+
- MySql 5.7+

## Instalasi

Melakukan clone ke repository ini.
```bash
git clone https://github.com/alifnuryana/kpum-utama.git
```

Melakukan instalasi
```bash
composer install
npm install
```

Duplikasi file .env.example dengan file baru .env menyesuaikan dengan environment yang akan diinstall
```bash
cp .env.example .env
```

Membuat database baru
```bash
CREATE DATABASE kpum2021
```

Membuat .env untuk kebutuhan Aplikasi
```bash
APP_NAME=KPUMUTAMA
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost
```

Menyesuaikan .env untuk kebutuhan Database
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kpum2021
DB_USERNAME=root
DB_PASSWORD=
```

Menyesuaikan .env untuk kebutuhan Email
```bash
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

Generate App Encryption Key
```bash
php artisan key:generate
```

Melakukan migrasi dan seed terhadap database baru
```bash
php artisan migrate:fresh --seed
```

Jalankan aplikasi
```bash
php artisan serve
```
