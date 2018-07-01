---

title: Super fast WordPress set-up
tags:
-   wordpress
-   nginx
excerpt: WordPress has always suffered from the stigma of being slow its something I have always had trouble with You can do all the front-end optimization you like and install all the caching plugins in the world but speed will always

---

WordPress has always suffered from the stigma of being slow, its something I have always had trouble with. 

You can do all the front-end optimization you like and install all the caching plugins in the world, but speed will always be an issue until you get down and dirty with your server. 

Server providers like [wp-engine](http://wpengine.com/) boast fast WordPress hosting, so how can we achieve the same with an out the box VM, and reduce that $29 a month per instance cost into a $10 a month cost with no restriction (okay, maybe some restrictions if your getting millions of hits a month).

Below I will go over what you need to make a beefy WordPress server. I host all my sites on [Digital Ocean](https://www.digitalocean.com) as hardware also makes a huge difference to your sites speed - SSD's or bust.

\##Server
**Apache** has always been the old faithful of server admins, its well documented and achieves what you want - a server. However its slow at handling incoming requests and tends not to scale well. **Nginx** however is the opposite:

> ...nginx offers a higher transfer rate compared to Apache, but also has less of a wait time between receiving the request and passing a response back.
> I also noticed that nginx can handle more requests per second, and is able to ramp up as the load increases, however apache remained pretty static on this front.  
>
> -   [http://www.theorganicagency.com/](http://www.theorganicagency.com/apache-vs-nginx-performance-comparison/)

This will help our server handling incoming request, however your will be missing you precious .htaccess file. Which you shouldn't be using anyway.

It's not a WordPress specific improvement, nginx as a whole can bring some much needed speed to any site.

[How To Install Linux, nginx, MySQL, PHP (LEMP) stack on Ubuntu 12.04](https://www.digitalocean.com/community/tutorials/how-to-install-linux-nginx-mysql-php-lemp-stack-on-ubuntu-12-04)

\##Caching
**Memcached** is all the rage lately and will help to add some much needed speed to your WordPress site by caching object in RAM to save us making another annoying trip to the DB [this](https://github.com/tollmanz/wordpress-pecl-memcached-object-cache) plugin will help us to achieve an easy implementation of the library.

**Redis** is also an option but it's something I have yet to implement. Redis has [more](http://stackoverflow.com/questions/10558465/memcached-vs-redis) functionality than memcached and so might be worth looking at for future installations. 

(Personally I despise WordPress plugins, I have a few exceptions; but as a whole I hate them.) 

PHP also now comes with built in caching, **OPcache**. OPcache is relatively easy to install and with a simple change to your php.ini file. You can get the benefits of pre-compiled PHP scripts.

> OPcache improves PHP performance by storing precompiled script bytecode in shared memory, thereby removing the need for PHP to load and parse scripts on each request.  
>
> -   <http://php.net/manual/en/intro.opcache.php>

\##Simple CDN
Distributing your site across the world should not be a pain in the arse, I use [Cloudflare](https://www.cloudflare.com). I simply point all my domain names to use their name servers then turn it on and away we go. 

\##Basics
Finally and I can't stress this enough, **write efficient code**. 
