# PHP Setup

## Environment
  - Ubuntu Server
  - Apache 2.4.66

## Installation
  - sudo apt install php libapache2-mod-php

## Verification
  - php -v
    - php 버전 확인

## PHP and Apache Test
  - DocumentRoot 로 이동
    - cd /var/www/html

  - PHP 테스트 파일 생성
    - sudo nano info.php
<?php
phpinfo();
?>

  - 브라우저에서 접속
    - http://localhost/info.php

  - PHP 정보 페이지 출력 확인
  - Apache 에서 PHP 가 정상적으로 실행되는 것을 확인

## Cleanup
  - 테스트 완료 후 PHP 정보 페이지 삭제
    - sudo rm /var/www/html/info.php