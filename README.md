## About Einpi Online Shop

Ditugaskan untuk seleksi tahap 3


## Installasi
- Download repository dan ekstrak 

- Masuk ke direktori aplikasi dan jalankan composer
	```sh
	$ cd einpi
	$ composer install
	```
 - Copy file .env.example menjadi .env
	```sh
	$ cp .env.example .env
	```
- Generate key application
	```sh
	$ php artisan key:generate
	```
- Import Database
- Edit database name, database username dan database password di file .env
    ```sh
	DB_DATABASE=your_db.
    DB_USERNAME=your_mysql_username.
    DB_PASSWORD=your_mysql_password.
	
- Login
    ```sh
	Username :  admin@admin.com
    Password :  password
	```
    ```sh
	Username :  user1@example.com
    Password :  password