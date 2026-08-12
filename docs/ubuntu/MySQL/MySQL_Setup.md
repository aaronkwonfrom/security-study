# MySQL Setup

## Environment
  - Ubuntu Server
  - MySQL Server

## Installation
```bash
sudo apt update
sudo apt upgrade -y
sudo apt install mysql-server
```

## Verification
```bash
mysql --version
sudo systemctl status mysql
```
  - MySQL 버전 확인
  - MySQL 서비스 실행 상태 확인

## MySQL Access
```bash
sudo mysql
```

## Database Creation
```SQL
CREATE DATABASE study;
```
  - 데이터베이스 확인
```SQL
SHOW DATABASES;
```

## MySQL User Creation
```SQL
CREATE USER 'boarduser'@'localhost'
IDENTIFIED BY '비밀번호';
```

## Grant Privileges
```SQL
GRANT ALL PRIVILEGES
ON study.*
TO 'boarduser'@'localhost';
```

## User Access Test
  - MySQL 나가기
```SQL
exit;
```
  - 전용 사용자로 접속
```bash
mysql -u boarduser -p
```