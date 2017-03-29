#!/usr/bin/env bash

# Use single quotes instead of double quotes to make it work with special-character passwords
# variables
SITENAME='myfwk'
DBNAME='development'
PASSWORD='1234'
PROJECTFOLDER='./public'
DBUSER='root'


# update / upgrade
sudo apt-get update
sudo apt-get -y upgrade

# install apache 2.5 and php 7
sudo apt-get install -y apache2

sudo apt-get install software-properties-common python-software-properties
sudo add-apt-repository ppa:ondrej/php

sudo apt-get update

##########################################################
#				Install PHP
##########################################################
echo -e "\n--- Install PHP ---\n"

sudo apt-get install -y php7.1-fpm php7.1-common php7.1-opcache php7.1-phpdbg php7.1-mbstring php7.1-gd php7.1-imap php7.1-ldap php7.1-pgsql php7.1-pspell php7.1-recode php7.1-snmp php7.1-tidy php7.1-dev php7.1-intl php7.1-gd php7.1-curl php7.1-zip php7.1-xml php7.1-curl php7.1-json php7.1-mcrypt
sudo apt-get install -y php7.1-mysql

##########################################################
#				Install Xdebug
##########################################################
echo -e "\n--- Installing Xdebug ---\n"
sudo apt-get install -y php-xdebug
cat << EOF | sudo tee -a /etc/php/7.0/cli/conf.d/xdebug.ini
zend_extension="/usr/lib/php/20160303/xdebug.so"
xdebug.remote_enable=on
xdebug.remote_connect_back=on
EOF


##########################################################
#				Install MySQL
##########################################################
# install mysql and give password to installer
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get -y install mysql-server mysql-client

# install phpmyadmin and give password(s) to installer
# for simplicity I'm using the same password for mysql and phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get -y install phpmyadmin

echo -e "\n--- Setting up our MySQL user and db ---\n"
mysql -uroot -p$DBPASSWD -e "CREATE DATABASE $DBNAME" >> /vagrant/vm_build.log 2>&1
mysql -uroot -p$DBPASSWD -e "grant all privileges on $DBNAME.* to '$DBUSER'@'localhost' identified by '$DBPASSWD'" > /vagrant/vm_build.log 2>&1


##########################################################
#				Apache Vhosts
##########################################################
# create project folder
sudo chmod -R 755 /var/www
sudo mkdir "/var/www/$SITENAME"
sudo mkdir "/var/www/$SITENAME/log"

# setup hosts file
VHOST=$(cat <<EOF
<VirtualHost *:80>
    ServerName $SITENAME.dev
    DocumentRoot /var/www/$SITENAME/public
    ErrorLog /var/www/$SITENAME/log/apache.error.log
    CustomLog /var/www/$SITENAME/log/apache.access.log common
    php_flag log_errors on
    php_flag display_errors on
    php_value error_reporting 2147483647
    php_value error_log /var/www/$SITENAME/log/php.error.log
   <Directory "/var/www/$SITENAME">
        AllowOverride All
        Require all granted
   </Directory>
</VirtualHost>
EOF
)
echo "${VHOST}" > /etc/apache2/sites-available/000-default.conf

sudo cp /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/$SITENAME.conf

echo "${VHOST}" | sudo tee /etc/apache2/sites-available/$SITENAME.conf

sudo a2ensite $SITENAME.conf

# enable mod_rewrite
sudo a2enmod rewrite

##########################################################
#				Install Extras
##########################################################
# install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

sudo apt-get install snmp

# Adding NodeJS from Nodesource. This will Install NodeJS and npm
sudo apt-add-repository ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install -y nodejs

# Installing Bower and Gulp
sudo npm install -g bower gulp

# restart apache
sudo apt-get -y install libapache2-mod-php7.1
sudo a2dismod php5
sudo a2enmod php7.1

service apache2 restart