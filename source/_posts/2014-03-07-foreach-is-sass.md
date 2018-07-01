---
title: Foreach in Sass
tags:
    - sass
excerpt: Recently I had a website to build which had different sectors and each sector had a different colour association for example section red section blue section green Normally I would write out each css style something like this red section-background-color
---

Recently I had a website to build which had different sectors, and each sector had a different colour association.

for example:

-   section 1 : red
-   section 2 : blue
-   section 3 : green

Normally I would write out each css style, something like this:

`.red .section-background-color{ 
	backgroud-color : #CF0A2C; 
    ..etc
}
.blue .section-background-color{ 
	background-color : #6CAAE4;
    ..etc
}`
...etc

\#Using sass
Since I was using [sass](http://sass-lang.com/) this was made easier.

First I declared my colour variables:
`$blue 	: (blue, #6CAAE4)
$red 	: (red, #CF0A2C)`

Then I ran a loop:
`@each $color in $blue, $red
	$name : nth($color, 1)
	$val  : nth($color, 2)
	.#{name}
    	.section-background-color
        	background-color : val`

In total I had about 8 different colours, each requiring a different background colour and text-color declaration.

I soon built up a little collection of classes I could use through out the project. In order to change the colour of a page all i would need to do is change the parent class and the colour scheme would change accordingly.

If you have a better way of doing this let me know over twitter [@millard\_](https://twitter.com/millard_)

_Edit:  
A rather nice blog post on the subject [Doing More with Sass’ @each Control Directive](http://flippinawesome.org/2014/03/17/doing-more-with-sass-each-control-directive/)_

\-Tom
