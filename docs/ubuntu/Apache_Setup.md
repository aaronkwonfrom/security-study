# Apache Web Server Setup

## Environment
  - Ubuntu Server
  - Apache 2.4.66

## Installation
```bash
sudo apt update
sudo apt upgrade
sudo apt install apache2
```

## Verification
```bash
apache2 -v
systemctl status apache2
```

## DocumentRoot
/var/www/html

## Test
```bash
cd /var/www/html
```
  - localhost 접속 확인
  - index.html 수정
  - 변경 내용 확인