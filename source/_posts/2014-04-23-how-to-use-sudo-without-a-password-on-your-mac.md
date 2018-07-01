---

title: How to use sudo without a password on your mac
tags:
-   bash
excerpt: Using the terminal I find it annoying when you have to keep typing in 'sudo ' This blog post highlights how to get around this in a little more detail romkey com I found this useful however I find it

---

Using the terminal I find it annoying when you have to keep typing in 'sudo ....'.

This blog post highlights how to get around this in a little more detail [romkey.com](https://romkey.com/2008/11/08/use-sudo-without-a-password-on-your-mac/).

I found this useful, however I find it quicker just to assume root:

`sudo su`

Then type:

`nano /etc/sudoers`

In this file find the following

`%admin  ALL=(ALL) ALL`

Then just add your exception below:

`tom ALL=(ALL) NOPASSWD: ALL`

(change my name with your username)

Save, and your done.
