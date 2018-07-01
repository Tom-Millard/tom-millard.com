---

title: An alias for php-server start up
tags:
-   php
excerpt: I added the below code to my bash profile so far its replaced harp as my go to pop-up server Seems allot more user friendly this way alias php-server 'echo server starting on localhost amp amp php -S '

---

I added the below code to my .bash_profile, so far its replaced [harp](http://harpjs.com/) as my go to "pop-up" server.

Seems allot more user friendly this way.

`alias php-server='echo "server starting on  localhost:9000" && php -S 0.0.0.0:9000'`
