#!/bin/bash

# Вот эту инструкцию будем назвать ШАГ 1
yum install -y --nogpgcheck \
    epel-release \
    http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    https://dev.mysql.com/get/mysql57-community-release-el7-8.noarch.rpm


# Тут ШАГ 2
sudo yum -y update # Вот это у нас будет ШАГ 2

# Вот эту инструкцию будем назвать ШАГ 3

yum --enablerepo=remi,remi-php72 install httpd php php-common
yum install --enablerepo=epel,remi,remi-php72 -y --nogpgcheck \
    git \
    mc \
    htop \
    vim \
    php-pecl-apcu \
    php-cli \
    php-pear \
    php-pdo \
    php-mysqlnd \
    php-pecl-memcache \
    php-pecl-memcached \
    php-gd \
    php-mbstring \
    php-mcrypt php-xml
sudo yum install -y wget # Это добавь в список ШАГ 3
sudo yum -y install mysql-server # Перенеси в ШАГ 3


sudo systemctl start mysqld
sudo systemctl enable mysqld
MYSQL_TEMP_PWD=`sudo cat /var/log/mysqld.log | grep 'A temporary password is generated' | awk -F'root@localhost: ' '{print $2}'`
mysqladmin -u root -p`echo $MYSQL_TEMP_PWD` password 'Passw0rd!'
cat << EOF > .my.cnf
[client]
user=root
password=root
EOF

curl https://getcomposer.org/composer.phar -o /usr/local/bin/composer
chmod +x /usr/local/bin/composer

curl https://phar.phpunit.de/phpunit-7.phar -o /usr/local/bin/phpunit
chmod +x /usr/local/bin/phpunit
