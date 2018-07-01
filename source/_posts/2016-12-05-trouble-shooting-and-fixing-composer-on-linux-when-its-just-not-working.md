---

title: Trouble shooting and fixing composer on linux (When it's just not working)
tags:
-   php
-   composer
-   linux
excerpt: Composer is a php package manager used in all modern php frameworks and projects Installing it and getting it up and running is often a simple and easy to do However sometimes it can cause an issue This method is
---

Composer is a php package manager used in all modern php frameworks and projects. Installing it and getting it up and running is often a simple and easy to do. However sometimes it can cause an issue. 

This method is a sure fired way to get composer running globally using puppet on a Centos box (i'm sure this method can be used on any distro, not tested).

The plan is to hardwire every user to have access to composer based on where it is installed on the system. To do this will be installing composer then making an alias file which points to the `composer.phar` file. 

First make a directory and download composer:

```language-bash
$ mkdir -p /usr/local/bin/composer;
$ cd /usr/local/bin/composer && wget https://getcomposer.org/composer.phar -O composer.phar';
$ chmod 777 /usr/local/bin/composer/composer.phar;
```

Simple, if we type the following `php /usr/local/bin/composer/composer.phar install` in a dir with a `composer.json` file we will see all our package being installed.

This is a work around, what we actually want to happen is to just type `composer install`. Like any easy to use system.

By adding the alias file to `/etc/profile.d/` every user inherits the alias.

So will add this short-cut: 

`echo "alias composer='php /usr/local/bin/composer/composer.phar'" > /etc/profile.d/00-composer-alias.sh` 

The `00` means its parsed first.

Remember to restart your session.

This is a long work around, but a solid one. If you can get composer working right off then well done. If your finding it a pain to access globally on your distro then this method should work.
