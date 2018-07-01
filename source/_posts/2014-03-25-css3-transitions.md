---
title: CSS3 Transitions (basics)
tags:
    -   sass
    -   css3
excerpt: I recently did some work with css Transition this is something i've done many times before hit and miss so I decided to write a quick blog post on the subject and incorporate the use of sass and compass So
---

I recently did some work with css3 [Transition](http://www.w3.org/TR/css3-transitions/), this is something i've done many times before (hit and miss) so I decided to write a quick blog post on the subject and incorporate the use of sass and [compass](http://compass-style.org/).

So this is what I came up with, html:  
`<div class="square"></div>`

and the sass:  
`.square
  @include transition(left, 0.5s)
  width : 100px
  height : 100px
  background-color : red
  position : relative
  left : 0px
  cursor : pointer
  &:hover
    left : 20px`

With the use of compass we can use the transition mixing which will help us to inject all the browser specifications with one line.

The transition will listen out for any changes which occur to this element and the style we have chosen so in this case, left.

When the hover state occurs the transition will be fired and the element will move 20px to the left. Simple.

[codepen](http://codepen.io/anon/pen/kcrED/)

\#Why not javascript
Transition are simple to use, as you can see I wrote all of one line  and achieved something very subtle which could greatly enhance the design of the site.

~~Transition are hardware accelerated meaning they will come across smoother on devices.~~

You can take full advantage of transition in your javascript with the use of shivs like [transit](http://ricostacruz.com/jquery.transit/).

\#Conclusion
What i've done is pretty simple. Over the next few months I plan to put together more transition pieces and see how far I can go with just css.

Tom
Twitter: [millard\_](https://twitter.com/millard_)

_Edit:  
As highlighted to me by [Adam](https://twitter.com/ImAdamTM) im wrong on this (harware acceloration) and will follow up with another example once I've had time to look into it further._
