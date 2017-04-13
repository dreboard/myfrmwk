#!/usr/bin/env bash

echo "================= Start INSTALL-complete.SH $(date +"%r") ================="
echo ""

# restart apache
#sudo apt-get -y install libapache2-mod-php7.1
#sudo a2dismod php5 || echo "================= DID NOT REMOVE PHP5 ================= "
#sudo a2dismod php7 || echo "================= DID NOT REMOVE PHP7.0 ================= "
#sudo a2enmod php7.1

sudo service apache2 restart

echo ""
echo "================= End INSTALL-complete.SH $(date +"%r") ================="