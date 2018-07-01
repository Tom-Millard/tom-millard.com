---

title: Getting started with PHP, Composer, Git and Vagrant on Windows
tags:
-   php
-   git
-   windows
-   vagrant

excerpt: Recently I have found myself back on a windows machine after a year stint with Macs I seem to have gone full circle Its interesting to see how easy it is to install some of these thing on to my

---

Recently I have found myself back on a windows machine after a 3 year stint with Macs, I seem to have gone full circle.

Its interesting to see how easy it is to install some of these thing on to my Windows box so I thought a break down of everything i'm going to install and how to get things up and running.

\##Overview
The type of development environment i'm looking to run is quite lean, and instead of using the windows box to do the majority of the grunt work I will be leaning on Vagrant to do all the heavy lifting. So you wont find any reference to xamp.

This blog post is meant as a guide, it requires some basic knowledge of the innards of a Windows machine. If you have no idea what I'm talking about when I say 'PATH' you might want to read something more detailed (Please don't break your machine doing this).

The major pit fall is a lack of a half decent terminal, i'm sure the windows shell(?) is just the best for someone somewhere but unfortunately I have no interest in learning another command line tool.

Luckily git gives us a rather lovely terminal with [git bash](https://git-scm.com/download/win)

Once this is installed we have access to a terminal, which seems to translate allot of the native functionality you might be use to on Linux on to Windows.

Note: You might want to run 'ssh-keygen' in the terminal, this way we can generate some ssh keys.

\##PHP
We need PHP for composer and its just generally nice to have it on your machine. I chose to install PHP manually by downloading the [zip file](http://windows.php.net/download/)

Once downloaded I placed the PHP folder into the root of the machine AKA C://php

This way things are pretty easy to handle, I found that allot of these tools fall down with the way Windows names folders so this way we avoid having to navigate too far when we identify paths.

> I found that allot of these tools fall down with the way Windows names folders

Once this is done you will need to edit the php init class to include any extensions you wish to install. First make sure the extension_dir is pointed to the PHP extensions file.

    extension_dir = "C:\php\ext"

Then turn on all the extensions you wish to use, some of them will cause issues with how php runs so best to only turn on the ones you need when you need them.

Finally will hook up php to the PATH var in windows so we can use it in our shinny git-hub terminal.

My computer -> right-click -> properties -> (on the left) Advanced system settings -> Environment Variables

Then click Path and click edit. We want to add the following to the end of the text in the 'Variable value:' box. 

    ;C:\php;

Do not DELETE anything and save.

We should now have php running in git-bash, simply type 'php -v' and you should get the version details back. Bingo we are done.

\#Composer
Composer can be run locally within a project, but in this instance we will be installing it globally. Because its windows we can install this using the exe file. Simply follow this and composer will be installed and added to your PATH var, again you can do it manually and all you would have to do is point your path var to the composer exe.

\#Vagrant
I have always found vagrant tricky to set up and maintain on windows, incidence where virtual boxes have been lost or destroyed after your machine goes into sleep have happened on more than one occasion. However this problem seems to have been fixed on windows.

_As of writing this Vagrant does not seem to work on Windows 10_

First will need to install [virtualbox](https://www.virtualbox.org/).

Once this is installed will need to install Vagrant, hopefully vagrant will install with out a hitch but to make sure. Ensure that vagrant is install in the root of the C drive. Again you will find the software has trouble with the way Windows names files.

If you are having trouble sometimes its worth declaring the VAGRANT_HOME variable, this can be found here - My computer -> right-click -> properties -> (on the left) Advanced system settings. Then add a **System variable** called VAGRANT_HOME and point it to were you install vagrant home dir. Typically this is 'C:\\Vagrant\\home\\' if you followed my above suggestion.

To save sometime I normally get my vagrant boxes generated from the rather lovely open source project - [puphpet](https://puphpet.com/). For the purest of you this probably wont be accurate to your current live site, so you will have to go about building a vagrant box. 

\#SSH Keys
If you managed to read all this and didn't get lost I assume your aware of ssh keys, they work in exactly the same way on windows except you might need to also generate some ssh keys with [putty](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html) for windows specific programs which rely on the software.

This post will be followed up by a list of windows tools. 

---

Currently I have spent about a month working on windows and although its a fine platform I find myself working slower than if I was working on Uinx environment.
