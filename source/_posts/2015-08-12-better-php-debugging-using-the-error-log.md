---

title: Better PHP debugging using the error log
tags:
-   php
-   unix
-   errors
-   debugging
excerpt: I have worked with some difficult systems PHP can be a nasty language when it wants to be But one thing which remains consistent is the error log As long as PHP is set up to pump all its errors

---

I have worked with some difficult systems, PHP can be a nasty language when it wants to be. But one thing which remains consistent is the **error.log**. 

As long as PHP is set up to pump all its errors into this file we can get on the fly PHP error reporting with the following command line.

`tail -f error.log | sed 's/\\n/\n/g'`

Error logs are normally kept in /var/log then depending on the OS and Server it can be httpd, nginx, apache etc. 

Logs are normally set up my default in the server conf unless they are overridden in the sites .conf file. Always worth looking in the /var/log first, or checking the php.ini file.
