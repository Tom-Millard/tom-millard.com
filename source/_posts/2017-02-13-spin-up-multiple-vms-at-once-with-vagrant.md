---
title: Spin up multiple VM's at once, with Vagrant
tags:
-   puppet
-   vagrant
-   devops
excerpt: I recently wanted to spin up multiple VM in order to test my puppet scripts in a similar enviroment to live The simplest way to set up multiple VM is with vagrant This post will require a basic knowledge vagrant
---

I recently wanted to spin up multiple VM in order to test my puppet scripts in a similar enviroment to live.

The simplest way to set up multiple VM is with vagrant. 

This post will require a basic knowledge vagrant and the terminal.

First we put together a simple YAML file outlining the settings for each box:

```language-yaml
boxes:
  -
    host: '192.168.33.142'
    name: 'node-ns'
    private_name: 'node-ns.local.puppet.dev'
  -
    host: '192.168.33.144'
    name: 'node-lb'
    private_name: 'node-lb.local.puppet.dev'
  -
    host: '192.168.33.145'
    name: 'node-a'
    private_name: 'node-a.local.puppet.dev'
  -
    host: '192.168.33.146'
    name: 'node-b'
    private_name: 'node-b.local.puppet.dev'
  -
    host: '192.168.33.143'
    name: 'node-master'
    private_name: 'node-master.local.puppet.dev'
    memory: 1024
    cpu: 2
```

This is a pretty basic set up, in each case i declare the ip address, name and private name of each box. With these details we can set up a FQDN server (node-ns) and have our puppet master send out manifests (node-master). I also have a node for load balancing (node-lb) between node-a and node-b.

My puppet server also has additional values in order to beef up its resources.

In our vagrant file we iterate through this YAML file and building each box:

```language-ruby
Vagrant.configure(2) do |config|
  conf = YAML.load_file("./boxes.yaml")
  conf['boxes'].each do |box|
    config.vm.define box['name'] do |node|
      node.vm.hostname = box['private_name']
      node.vm.network "private_network", ip: box["host"]
      node.vm.box = "[point to your box]"
      node.vm.synced_folder './shared', "/shared", :nfs => { :mount_options => ["dmode=777","fmode=666"] }
      node.ssh.pty = true

      memory = if box['memory'].nil? then 256 else box['memory'] end
      cpu = if box['cpu'].nil? then 1 else box['cpu'] end

      node.vm.provider :virtualbox do |vb|
        vb.name = box['name']
        vb.memory = memory
        vb.cpus = cpu
      end

      script = "sudo sh /shared/code/sh/common.sh; \n"
      node.vm.provision "shell", inline: script, run: "always"

    end
  end
end
```

Each box can run its own shell scripts these shell scripts need to be accessible inside the VM, to do this all shell files are placed in a shared dir. To make it simple place everything in shared, this way accessing resources on each box is easy. 

Basic directory/file structure

-   ./Vagrantfile
-   ./boxes.yaml
-   ./shared
-   ./shared/code/sh
-   ./shared/code/sh/common.sh
-   ./shared/templates
-   ./shared/templates/ntp.conf
-   ./shared/puppet/..

Each box will run a common shell script used to install some basic packages along with puppet.

My common file looks like this: 

```language-bash
#!/bin/bash

##
#   Install bind functions
##
sudo yum -y install bind bind-utils wget;

##
#    Set time zone to Europe, this is so puppet stays up to date with all its nodes
##
sudo timedatectl set-timezone Europe/Dublin;

##
#   Install ntp
#
sudo yum -y install ntp;

##
#  Set ntpdata url so we can look up time zones
##
sudo ntpdate pool.ntp.org;

##
#  Copy over the ntp name servers so we know where to look
##
sudo cp /shared/templates/ntp.conf /etc/ntp.conf;

##
#  Restart ntpd and enable it on start-up
##
sudo systemctl restart ntpd;
sudo systemctl enable ntpd;

##
#  Install puppet agent
##
sudo rpm -ivh https://yum.puppetlabs.com/puppetlabs-release-pc1-el-7.noarch.rpm;
sudo yum -y install puppet;

##
#  Start the puppet agent
##
sudo -i /opt/puppetlabs/bin/puppet resource service puppet ensure=running enable=true;
```

(Note: I will cover setting up a private dns server, automatically in the next blog post. [Digital Ocean cover setting it up manually here.](https://www.digitalocean.com/community/tutorials/how-to-configure-bind-as-a-private-network-dns-server-on-centos-7))

Once each box is set up and talking to each other, we can run vagrant commands as normal. To target an individual boxes you will need to pass in the name of the box as the 2nd argument:

-   `vagrant ssh node-master`  
-   `vagrant up node-master`  
-   `vagrant destroy node-master`

Running `vagrant up` or `vagrant destroy` will run on all boxes in your enviroment.
