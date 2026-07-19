#!/bin/bash

# Update packages
dnf update -y

# Install Nginx
dnf install nginx -y

# Install PHP and MySQL client
dnf install php php-mysqlnd mariadb105 -y

# Start and enable Nginx
systemctl enable nginx
systemctl start nginx

# Start and enable PHP-FPM
systemctl enable php-fpm
systemctl start php-fpm

# Create application directory
mkdir -p /usr/share/nginx/html

# Set permissions
chown -R nginx:nginx /usr/share/nginx/html
chmod -R 755 /usr/share/nginx/html

echo "Server bootstrap completed successfully."
