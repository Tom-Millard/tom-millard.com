---

title: Ghost after one month
tags:
    - ghost-tag

excerpt: It's been a month since I started using ghost as my writing platform of choice for my new blog and I'm happy I made the decision to use it over Wordpress The good Simply put it does exactly what I

---

It's been a month since I started using ghost as my writing platform of choice for my new blog, and I'm happy I made the decision to use it over Wordpress.

\#The good
Simply put it does exactly what I needed it to do, allow me to write a blog free of any real hassle.

The interface is free of any distractions, the set up process is easy to do (I'm hosting through ghost so from that point its easy), and the user interface is pretty straight forward, minus a few quirks here and there.

\##Features
I have it running straight out the box so not a huge list of features. I don't have access to plugins through the hosting set up I have, which might help to expand on whats available.

> It's important to remember that this is a blogging platform

It's important to remember that this is a blogging platform and it was never meant to be anything else, it fulfils that role well. 

A few missing features which I would like to see implemented:  

-   no media library, a solution to this is to host images and other things through a CDN
-   would like the option to connect some kind of url shortener
-   no spell checker
-   no WYSIWYGs, however I find markdown to be a better solution. But there is a bit of a learning curve for newbies. Anyone coming over from word might find it a bit of a shock
-   exporting your blog posts - have yet to find a button which allows me to back up all my posts (which would also be good for migration).

\#Under the hood
I took a quick dive in to theming a little while ago, i didn't do too much. What i did do i found quite straight forward and easy to change.

\##Themes
Theme'ing runs off the [handlebars](http://handlebarsjs.com/) templating engine which is quite nice to work with. Having done some work with node templating languages before this was quite easy to use.

Hopefully I will come back to templating at some point and write an in-depth article about the basics.

\##Speed
Yes, I'm one of those developers who does speed tests. So here we go.

_Im running the basic theme, I have not done allot to change to it_

\###Google
Google page speed test show an average of 60/100 which for a site as simple as this one isn't the best. Some small changes can be made, such as minifying the css/js and [stuffing it in the header](http://blog.tom-millard.com/2014/03/06/php-inject-css-into-the-header/). Along with allowing compression and caching certain files client side.

\##Pingdom
Pingdom is normally a bit less critical of site performance. It's also a bit inconsistent so worth running a few times.

> Your website is faster than 98% of all tested websites

_This then changed to 80% but thats close enough_

First thing to note is the server speed is consistently fast. Rocking in at about 0.2 sec. This could be that they recently rolled out [cloudflare](http://www.cloudflare.com/) over all paid for blogs (which is nice of them :) )

![pingdom results image](http://files.tom-millard.com/pingdom.png)

(They might not have optimised the theme so its easier to develop in, in which case I'll throw together a stripped down version of this theme for production use and post it up here)

\#Conclusion
If you just want a blog this is definitely worth the $5 a month. If you want something more then its probably not for you.

\#Things to do

-   cover the set up process
-   build a theme
-   look at plugin development
-   report back on both.
