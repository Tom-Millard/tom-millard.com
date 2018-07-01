---
title: Creating a custom LAMP stack Vagrant box running Centos

excerpt: The problem Being a developer can be hard To enforce this statement I recently spent the last couple of days debugging an off-the-shelf vagrant box which was packaged about a years ago Things that went wrong with Vagrant this week
---

\##The problem

**Being a developer can be hard.**

To enforce this statement I recently spent the last couple of days debugging an "off-the-shelf" vagrant box which was packaged about a years ago.

<blockquote class="twitter-tweet" data-lang="en"><p lang="en" dir="ltr">Things that went wrong with Vagrant this week:<br>- Redhat mirror 404<br>- Vagrant box not found<br>- Centos 7 failing to mount folder<br>etc</p>&mdash; ಠ_ಠ (@millard_) <a href="https://twitter.com/millard_/status/751016818316288000">July 7, 2016</a></blockquote>
<script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

At the time I generated the box from <https://puphpet.com/>. Puphpet is still an excellent place to create a vagrant box with the added benefit of not needing to know how anything works. Unfortunately Redhat recently made some significant changes which has resulted in our box failing (see above tweet).

**Why did it not fail sooner?** simple: our vagrant boxes are cached locally. We had the joy of not needing to update anything due to the application we worked on being about 5 years old. So... ignorance is bliss.

It was only ever meant to be a temporary solution to our local development problem and the plan was always to build our own vagrant box which more accurately represented our productions enviroment.  

\##The Solution
First thing was to strip out everything and start again. As versatile as Puphpet can be, we did not need everything it came with. We also didn't need half the security packages.

All we needed to build was a local LAMP stack, so we can develop with ease on our local systems.

The OS of choice had to be CentOS. CentOS is one of the more enterprise level linux distros and its what we run in production.

> ...we got hit with a wave of 404 mirror errors

The problems all started because we were using Centos 6.5 which is now deprecated(?) and vagrant wished to update those boxes. In doing so we got hit with a wave of 404 mirror errors followed by some puppet failures due to a difference in the puppet version. Long story short it was a mess. A decision was made to re-build the box and simplify the process.

We decided to role out Centos 7. The latest stable version. Our production enviroment is only on 6.8 however; but we might be rolling out a update to this. #Security

(Read future plans at the end for why this will change)

\###Keeping the box

Normally we pull our box down from the vagrant website. However this was not working out and they also added some strange login wall? 

I got a fresh copy from [Redhat](http://cloud.centos.org/centos/7/vagrant/x86_64/images/). I then took that image and uploaded it to our local webserver.

\###Failure to mount drive

After this I made a very simple vagrant file with just a reference to my new local box. 

`$vagrant up`

So that worked.. kind of. The vagrant file failed to mount to the vagrant directory and so I was unable to modify files between my local OS and the virtual box.

**Solution:** You need to specify in the Vagrant file that you want this to happen. Bit of a strange one as the normal default response is: yes i want to mount the vagrant file. 

```language-ruby
config.vm.synced_folder "./", "/vagrant"
```

This will map the directories to its default location. 

Also worth noting is: do not add anything to this line, half the additional arguments fail. Just leave the default group access and directory type.

**Problem number 2: SELinux**

By default Centos comes with [SELinux](https://en.wikipedia.org/wiki/Security-Enhanced_Linux) turned on. SELinux is a must on your production enviroment. However on a development enviroment it restricts us; and one area it restricts us the most is when it comes to mounting our vagrant file. So lets just turn it off.

SELinux can be disabled here: `/etc/selinux/config`. SSH into your vagrant box and then use vi to go into this file and change it to look like this.

```language-bash
# This file controls the state of SELinux on the system.
# SELINUX= can take one of these three values:
#     enforcing - SELinux security policy is enforced.
#     permissive - SELinux prints warnings instead of enforcing.
#     disabled - No SELinux policy is loaded.
SELINUX=disabled
# SELINUXTYPE= can take one of three two values:
#     targeted - Targeted processes are protected,
#     minimum - Modification of targeted policy. Only selected processes are protected.
#     mls - Multi Level Security protection.
SELINUXTYPE=targeted
```

In order for this to take effect the box needs to be rebooted.

Rebooting the box will interfere with our set-up so we need to re-package the box with SELinux turned off. Exit your vagrant box and repackage what we have so far:

`vagrant package [name]`

Optionally upload this box to your local webserver and reference the new box in your Vagrant file.

\##Using Puppet

I decided to keep with puppet instead of building a box then re-packaging it. The decision to use puppet means that we can be more flexible with our system set up in the future without having to re-build the box again.

\###Avoiding the default Vagrant config

Vagrant comes with allot of configuration option you can apply. However some of them were causing errors with our new box so I made the decision to avoid them and instead make all the necessary configurations to the box with shell scripts and puppet packages.

This means I relied heavily on the inline shell argument.

```language-ruby
  config.vm.provision :shell do |shell|
    shell.inline = "[all the things]"
  end
```

Another reason for doing this is the lack of puppet on the new box. In order to get puppet up and running you will need to add the following commands to your shell variable:

```language-ruby
  config.vm.provision :shell do |shell|
    shell.inline = "rpm -ivh http://yum.puppetlabs.com/puppetlabs-release-el-7.noarch.rpm;
                    yes | yum -y install puppet;
                    "
  end
```

Once the box is built the shell commands will be run. Above puppet is downloaded and installed. Along with wget.

(The argument `-y` means: Answer yes to everything)

\###Downloading puppet packages

To avoid too much bloat in the git repo I decided to pull down the puppet packages I was using on the fly. So I added the following lines to the shell argument.

```language-bash
                    sudo touch /etc/puppet/hiera.yaml;
                    sudo rm -rf /etc/puppet/modules/*;
                    mkdir -p /etc/puppet/modules;
                    puppet module install thias-php;
                    puppet module install puppetlabs-mysql;
                    puppet module install puppetlabs-apache;
```

The first line creates a yaml file which stops puppet throwing a warning. After this we remove any packages from the modules file (just incase), then we make it again. Finally we pull down php, mysql and apache puppet packages.

(Read future plans at the end for why this will change)

\###Building the box

After we pull down the packages we will need to make a reference to the puppet manifest file. My manifest file is in the vagrant dir under - manifest.

`sudo puppet apply /vagrant/manifests/default.pp;`

This will then run our manifest file. 

I will post up a simple **default.pp** file after this post. However the puppet modules have very good documentation and it shouldn't take long to set up (copy and paste is your friend).

-   [thias-php](https://github.com/thias/puppet-php)
-   [puppetlabs-mysql](https://github.com/puppetlabs/puppetlabs-mysql)
-   [puppetlabs-apache](https://github.com/puppetlabs/puppetlabs-apache)

\###Altogether

You should end up with something like this:

```language-ruby
Vagrant.configure(2) do |config|
  config.vm.hostname = "local.dev"
  config.vm.box = "http://192.168.1.1/boxes/centos-7.box"
  config.vm.network "private_network", ip: "192.168.33.135"
  config.vm.synced_folder "./", "/vagrant"

  config.ssh.pty = true

  config.vm.provision :shell do |shell|
    shell.inline = "rpm -ivh http://yum.puppetlabs.com/puppetlabs-release-el-7.noarch.rpm;
                    yes | yum -y install puppet;
                    sudo yum -y install wget;
                    sudo touch /etc/puppet/hiera.yaml;
                    sudo rm -rf /etc/puppet/modules/*;
                    mkdir -p /etc/puppet/modules;
                    puppet module install thias-php;
                    puppet module install puppetlabs-mysql;
                    puppet module install puppetlabs-apache;
                    sudo puppet apply /efiling/vagrant/manifests/default.pp;
                    "
  end

end
```

\##Other Configurations

Normally once this is done you might find your missing some PHP packages or you need to import an sql file into your new database. This can all be done using shell scripts then simply add a line in to run each one.

`sh /vagrant/scripts/mysql-setup.sh`

\##Future plans

Although I said it was a bad idea to keep the puppet packages under version control, you should still keep a local version. If the author of the packages changes something; or they simply delete the repo you will have to debug your box again. So keep a copy of the puppet packages. Probably in the same place as your box is and download them with wget when your need them.

`wget http://192.168.1.1/packages/thias-php`

Running a different version of your production OS is going to lead to trouble. One of the issues I encountered was, CentOS dropping support for mysql and favouring MariaDB. The mysql puppet package i use instals MariaDB but our production enviroment uses mysql. I have yet to find an issue but its not something I want to test for very long.

Next job is to drop CentOS 7 and package up a copy of CentOS 6.7 which will have support for mysql and will be faithful to our production enviroment.

Another issue is a heavy reliance on shell scripts. Although in this situation its not a problem it would be better to move everything over to puppet. 
