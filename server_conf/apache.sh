#!/usr/bin/env bash

echo "================= START APACHE.SH $(date +"%r") ================="
echo " "
SITENAME='myfrmwk'
PROJECTFOLDER='./public'

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
echo " "
echo "================= END APACHE.SH $(date +"%r") ================="