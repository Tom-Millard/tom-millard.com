---
title: Inject css into the header
tags:
    - wordpress
    - php
    - css
excerpt: A little while ago I read a blog post which highlighted the benefits of injecting your css straight into the header A method which is being adopted by both the new BBC responsive site and the Guardian rebuild The idea
---

A little while ago I read a blog post which highlighted the benefits of injecting your css straight into the header. 

A method which is being adopted by both the new [BBC](http://m.bbc.co.uk/news?view=beta) responsive site and the [Guardian](http://www.theguardian.com/info/series/guardian-beta) rebuild.

The idea is to place the css straight into the header so that your site doesn't stop rendering whilst it waits for the css file to load.

This is something which is highlighted on the google [PageSpeed](https://developers.google.com/speed/pagespeed/insights/) testing tool.

I gave this theory ago on a site i was working on to see if it would make any difference.

\#Injecting the styles
So I came up with this quick idea for Wordpress

`$style_string = strtolower(get_theme_root()."/".get_current_theme()."/styles/main.css");
$x = file_get_contents($style_string);`     

A bit of tweaking is required to get it working on different set ups, but the idea is pretty solid and none intrusive.

This way we can keep our stylesheet separate from the header.php file but still achieve the above result.

Also we can role back to a link tag pretty easily if you find this method does nothing for you.

\#Results
I've done this as an experiment. If you had more time you should render only the bare minimum of styles on the page then load in your stylesheet as normal.

For me this seems to have sped up the site. I plan to run a few more tests but pingdom and google both report an increase in site speed for me.

_Edit:  
If your using something like [respond.js](https://github.com/scottjehl/Respond) you will still need the stylesheet link :(_

Tom
Twitter: [@millard\_](https://twitter.com/millard_)
