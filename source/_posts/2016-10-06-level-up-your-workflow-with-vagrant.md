---

title: Level up your workflow with Vagrant
tags:
-   vagrant
-   puppet
-   workflow
-   ruby
excerpt: Vagrant is a powerful tool to help keep your development enviroment as close to your production server as possible No matter the OS Vagrant can help remove deployment woes However one of the biggest issues with vagrant is creating a
---

Vagrant is a powerful tool to help keep your development enviroment as close to your production server as possible. No matter the OS, Vagrant can help remove deployment woes.

However one of the biggest issues with vagrant is creating a development box at the beginning of every project. So lets remove that barrier and get your box up and running in a few min, and not a few hours.

(I covered how to set up a basic LAMP stack with puppet and vagrant in a previous post. More technical information can be found [here](http://blog.tom-millard.com/creating-a-custom-vagrant-box-for-legacy-applications/))

We need to create a git repo with your new Vagrant box setting. This way we can quickly pull in the repo when we start a new project. We can separate out the box settings from the actual codebase. By putting our Vagrant box changes in a git repo we can also make changes which we can then distribute across all projects.

My basic vagrant project layout is the following:

-   maifest/default.pp
-   www/index.php
-   Vagrantfile

The manifest contains our puppet settings for this box. The index page is the default virtual dir for our web server, and of course we have our Vagrantfile. 

We also have another file which is specific to the project and not the vagrant repo, so this need to go into your gitignore file:

```language-bash
.vagrant
config.yaml
```

**What is our config.yaml file?**

The `config.yaml` file contains all the setting for this project and at its simplest form it will contain:

-   `name`: The name of the box 
-   `host_name`: The host name
-   `network`: The network ip address

The config.yaml file needs to be stored with the codebase and not the vagrant repo. So in your code base you would have the following in your gitignore:

```language-bash
./vagrant
!./vagrant/config.yaml
```

Once our file structure is all set up we need to load the yaml file into the `Vagrantfile`.

```language-ruby
const = YAML.load_file('./config.yaml')
config.vm.hostname = const['host_name']
config.vm.box = "[url to our box]"
config.vm.network "private_network", ip: const["network"]
config.vm.provider "virtualbox" do |v|
    v.name = const['name']
end
  config.vm.synced_folder "../", const["vagrant_file"], :nfs => { :mount_options => ["dmode=777","fmode=666"] }
```

This is our vagrant file, it inherits all the values in our config.yaml file. We also reference the parent dir in the sync folder. This is the location of our codebase.

As a git repo all we need to do is run:

```language-bash
git clone [vagrant-repo] vagrant;
cd vagrant && vagrant up;
```
