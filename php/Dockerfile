FROM php:8.2-apache

# ติดตั้ง extension ที่ใช้บ่อย
RUN docker-php-ext-install pdo pdo_mysql mysqli

# เปิด mod_rewrite
RUN a2enmod rewrite

# ตั้งค่าโฟลเดอร์โค้ด
WORKDIR /var/www/html
