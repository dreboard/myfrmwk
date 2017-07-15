# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Every Vagrant virtual environment requires a box to build off of.
    config.vm.box = "ubuntu/xenial64"
    config.vm.boot_timeout = 2000
    config.vm.host_name = "myfrmwk.dev"
    config.vm.network "forwarded_port", guest: 80, host: 8888, auto_correct: true
    config.vm.synced_folder "./public", "/var/www/html"

    config.vm.provider "virtualbox" do |vb|
        # Customize the amount of memory on the VM:
        vb.memory = "512"
    end

    config.vm.provision "bootstrap", type: "shell", path: "./server_conf/bootstrap.sh"
    config.vm.provision "php_mods", type: "shell", path: "./server_conf/php_mods.sh"
    config.vm.provision "sql", type: "shell", path: "./server_conf/sql.sh"
    config.vm.provision "apache", type: "shell", path: "./server_conf/apache.sh"
    config.vm.provision "dev_tools", type: "shell", path: "./server_conf/dev_tools.sh"
    config.vm.provision "complete", type: "shell", path: "./server_conf/complete.sh"

      config.vm.provision "shell", inline: <<-SHELL2
      echo -e "\n------------------------------------------- Installing Composer\n"
      fromdos /vagrant/composer.sh
      curl -s https://getcomposer.org/installer | php
      sudo mv composer.phar /usr/local/bin/composer
      cd /vagrant && php composer.phar install
      SHELL2

end