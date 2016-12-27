# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|

  # Every Vagrant virtual environment requires a box to build off of.
  config.vm.box = "ubuntu/trusty64"
  config.vm.boot_timeout = 2000

  # Create a private network, which allows host-only access to the machine using a specific IP.
  config.vm.network "private_network", ip: "192.168.33.19"

  # Share an additional folder to the guest VM. The first argument is the path on the host to the actual folder.
  # The second argument is the path on the guest to mount the folder.
  config.vm.synced_folder "./", "/var/www/myfwk"

  # db script before the guest is destroyed

  config.trigger.before :destroy do
    info "Dumping the database before destroying the VM..."
    run_remote  "bash /vagrant/myfwk/myfwk.sh"
  end

  # clean up files on the host after the guest is destroyed
  config.trigger.after :destroy do
    run "rm -Rf tmp/*"
  end

  # start apache on the guest after the guest starts
  config.trigger.after :up do
    run_remote "sudo service apache2 start"
  end
  
  
  # Define the bootstrap file: A (shell) script that runs after first setup of your box (= provisioning)
  config.vm.provision :shell, path: "bootstrap.sh"

end