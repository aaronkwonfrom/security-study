# PHP, MySQL Connection

## Environment
  - Ubuntu Server
  - Apache 2.4.66
  - PHP
  - MySQL
  - Database : Study
  - MySQL User : aaron

## Install PHP MySQL Module
```bash
sudo apt install php-mysql
```
  - PHP 에서 MySQL 에 접속하기 위해 'php-mysql' 패키지 설치

## Verify mysqli Module
```bash
php -m | grep mysqli
```

## Restart Apache
```bash
sudo systemctl restart apache2
sudo systemctl status apache2
```

## PHP, MySQL Connection Test
```bash
cd /var/www/html
sudo nano db_test.php
```
```php
<?php

$mysql = new mysqli(
    "localhost",
    "boarduser",
    "password",
    "study"
);

if ($mysqli->connect_error) {
    die("MySQL connection failed: " . $mysqli->connect_error);
}

echo "MySQL connection success!";
?>
```

## Browser Test
http://localhost/db_test.php
  - 접속
MySQL connection success!
  - 출력시 성공

## Remove test file
```bash
sudo rm /var/www/html/db_test.php
```