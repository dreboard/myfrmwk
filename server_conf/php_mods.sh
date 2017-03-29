#!/usr/bin/env bash

	echo "================= START INSTALL-php_mods.SH $(date +"%r") ================="
	echo " "
	# variables
	DBNAME='development'
	PASSWORD='1234'
	PROJECTFOLDER='./'
	PROJECTNAME='my_api'
	DBUSER='root'	
	##########################################################
	#				Install PHP
	##########################################################
	echo -e "\n--- Install PHP ---\n"
	sudo apt-get install -y php7.0-fpm php7.0-common php7.0-opcache php7.0-phpdbg php7.0-mbstring php7.0-gd php7.0-imap php7.0-ldap php7.0-pgsql php7.0-pspell php7.0-recode php7.0-snmp php7.0-tidy php7.0-dev php7.0-intl php7.0-gd php7.0-curl php7.0-zip php7.0-xml php7.0-curl php7.0-json php7.0-mcrypt

	sudo apt-get install -y php7.0-mysql

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

	
	echo ""
	echo "================= End INSTALL-php_mods.SH $(date +"%r") ================="
