#!/usr/bin/env bash

echo "================= START INSTALL-MYSQL.SH $(date +"%r") ================="
echo " "
DBNAME='development'
PASSWORD='1234'
DBUSER='root'

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
mysql -uroot -p$PASSWORD -e "CREATE DATABASE $DBNAME" >> /vagrant/vm_build.log 2>&1
mysql -uroot -p$PASSWORD -e "grant all privileges on $DBNAME.* to '$DBUSER'@'localhost' identified by '$PASSWORD'" > /vagrant/vm_build.log 2>&1

echo " "
echo "================= END INSTALL-MYSQL.SH $(date +"%r") ================="