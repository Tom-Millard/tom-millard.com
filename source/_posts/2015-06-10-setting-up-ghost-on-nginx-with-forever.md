---

title: Setting up Ghost on Nginx, with Forever
tags:
-   node
-   ghost-tag
-   nginx
excerpt: To start with I'm going to make the following assumptions Your using Ubuntu Node is installed and working Nginx is installed and working Ghost has been uploaded into a directory and 'npm install' has been run Lets go Forever Forever

---

To start with I'm going to make the following assumptions,

-   Your using Ubuntu
-   Node is installed and working
-   Nginx is installed and working
-   Ghost has been uploaded into a directory and 'npm install' has been run

Lets go,

\##Forever
Forever is an npm package which is used to keep your ghost site up in the background of your OS. You will need to start by installing Forever globally (-g).

`````language-bash
sudo npm install -g forever
```
##Setting up Nginx as a proxy
Now we need to create a server block, which will point to our local server running ghost, go ahead and create a config file in /etc/nginx/site-avalible 

````language-bash
cd /etc/nginx/site-avalible && touch www.mysite.com
```
[www.mysite.com, is my naming convention, you can name the file whatever you like just remember to be consistent]

Then go ahead and open that bad boy up with nano, or if your a pro vim and copy the following in. Remember to replace [my-site-url] with your url.

````nginx
server {
    listen 80;
    server_name [my-site-url];
    location / {
        proxy_set_header   X-Real-IP $remote_addr;
        proxy_set_header   Host      $http_host;
        proxy_pass         http://127.0.0.1:2368;
    }
}
```
[Note: By default ghost runs on port 2368]  
We now need to symlink up the server block to '/etc/nginx/site-enabled/'

```language-bash
ln -s /etc/nginx/sites-available/www.mysite.com /etc/nginx/sites-enabled/www.mysite.com
```
##Forever and ever
To start our node server - Ghost blog. First we need to navigate to the location of our index.js file. Then we need to run the following command
````language-bash
node index.js
```
Yep that's not forever, im just testing to see if its working.
If that's all good, go ahead and terminate.
Then run:
````language-bash
sudo forever start index.js
```
and finally reload nginx
```language-bash
service nginx reload
```
If everything went to plan we should have a ghost blog.
##ctrl+c Forever
To stop Forever simply run
```language-bash
sudo forever stop 0
```
This will terminate the first instance of forever running on your server, if you have multiple version you will need to list them out and terminate the corresponding index.
`````
