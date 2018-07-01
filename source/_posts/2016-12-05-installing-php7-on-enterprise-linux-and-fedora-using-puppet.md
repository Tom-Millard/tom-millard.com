---

title: Installing PHP7 on Enterprise Linux and Fedora using puppet.
tags:
-   php
-   php7
-   puppet
-   linux
excerpt: PHP is now stable and totally a thing so all your future php projects should be using PHP as standard At the moment installing PHP using puppet is not supported by allot of the more popular puppet packages However the
---

PHP 7 is now stable and totally a thing, so all your future php projects should be using PHP 7 as standard. 

At the moment installing PHP 7 using puppet is not supported by allot of the more popular puppet packages.

However the process is easy to do.

```language-ruby
class php7::install inherits php7
{

    package { 'epel-release-7-8.noarch':
        ensure => 'installed',
        provider => 'rpm',
        source => 'https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm',
        install_options => ['-U', '-v', '-h']
    }

    package { 'webtatic-release':
        ensure => 'installed',
        provider => 'rpm',
        source => 'https://mirror.webtatic.com/yum/el7/webtatic-release.rpm',
        install_options => ['-U', '-v', '-h']
    }

    package { 'php70w':
      ensure => 'installed',
    }

    each($php7::package_ensured) |String $pack| {
      package { $pack :
        ensure => 'installed',
      }
    }

}
```

All we do is add the relative packages needed to install php 7 then install php 7 itself.

Of course we will likely need some additional php packages, likely `php70w-fpm`, `php70w-common`, etc so the option is there to add any additional packages, like so: 

```language-ruby
class { 'php7': package_ensured => ['php70w-fpm', 'php70w-cli', 'php70w-common', 'php70w-mysql', 'php70w-opcache', 'php70w-pdo', 'php70w-xml'] }
```

And here it is all wrapped up in a nice little [git-repo](https://github.com/Tom-Millard/puppet-php7).
