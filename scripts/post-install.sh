#!/bin/bash

yum install -y --nogpgcheck \
    epel-release \
    http://rpms.remirepo.net/enterprise/remi-release-7.rpm \
    https://dev.mysql.com/get/mysql57-community-release-el7-8.noarch.rpm

yum -y update --nogpgcheck

yum install --enablerepo=epel,remi,remi-php72 -y --nogpgcheck \
    httpd \
    git \
    mc \
    htop \
    vim \
    wget \
    mysql-server \
    php \
    php-pecl-apcu \
    php-common \
    php-cli \
    php-pear \
    php-pdo \
    php-mysqlnd \
    php-pecl-memcache \
    php-pecl-memcached \
    php-gd \
    php-mbstring \
    php-mcrypt \
    php-xml

systemctl stop firewalld.service
systemctl disable firewalld.service

systemctl enable httpd.service
systemctl start httpd.service

systemctl enable mysqld
systemctl start mysqld

MYSQL_TEMP_PWD=`cat /var/log/mysqld.log | grep 'A temporary password is generated' | awk -F'root@localhost: ' '{print $2}'`
mysqladmin -u root -p`echo $MYSQL_TEMP_PWD` password 'Saenone1!'

cat << EOF > .my.cnf
[client]
user=root
password=Saenone1!
EOF

curl https://getcomposer.org/composer.phar -o /usr/local/bin/composer
chmod +x /usr/local/bin/composer

curl https://phar.phpunit.de/phpunit-7.phar -o /usr/local/bin/phpunit
chmod +x /usr/local/bin/phpunit