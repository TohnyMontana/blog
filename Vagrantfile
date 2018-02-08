Vagrant.configure("2") do |config|

  config.vm.box = "centos/7"
  config.vm.network "private_network", ip: "192.168.50.10"
  config.vm.synced_folder ".", "/var/www"

  config.vm.provider "virtualbox" do |vb|

    vb.memory = "1024"
    end

  config.vm.provision "shell", path: '\scripts\post-install.sh', privileged: true, run: "once"

end