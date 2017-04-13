#!/usr/bin/env bash

echo "================= START INSTALL-dev_tools.SH $(date +"%r") ================="
echo " "

##########################################################
#				Install Extras
##########################################################
# install Composer
curl -s https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

sudo apt-get install -y snmp

# Adding NodeJS from Nodesource. This will Install NodeJS and npm
sudo apt-add-repository ppa:chris-lea/node.js
sudo apt-get update
sudo apt-get install -y nodejs

# Installing Bower and Gulp
sudo npm install -g bower gulp
sudo apt-get -y autoremove
echo ""
echo "================= End INSTALL-dev_tools.SH $(date +"%r") ================="
