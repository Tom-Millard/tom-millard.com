#Tom-Millard.com

In short this is the repo for [tom-millard.com](http://tom-millard.com).

#How it works
It's a pretty simple php site running off of two feeds - Twitter and blog.tom-millard.com, both served up as json.

Sass is compiled using gulp, and the css file is served up using php - file_get_contents.

Since the site is so small placing all the css in the header will stop any render blocking. [Font Awesome](http://fortawesome.github.io/Font-Awesome/) is used for icons, however the css has all icons from this library which is not ideal.

The javascript is built on top of vanilla.js, for simple scrolling.

#Images
Imagery is provided by [Andrew Foster](http://www.andrewfosterdesign.com/).