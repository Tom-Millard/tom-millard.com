---

title: BEM Syntax: Quick and Ugly Guide
tags:
-   css
-   bem
excerpt: These are quick notes on BEM mainly for me For more information take a look at these blog posts from csswizardry and smashing-mag block represents the higher level of an abstraction or component block element represents a descendent of block

---

These are quick notes on BEM, mainly for me. 

For more information take a look at these blog posts from [csswizardry](http://csswizardry.com/2013/01/mindbemding-getting-your-head-round-bem-syntax/) and [smashing-mag](http://www.smashingmagazine.com/2014/07/17/bem-methodology-for-small-projects/).

> -   **.block** represents the higher level of an abstraction or component.
> -   **.block\_\_element** represents a descendent of .block that helps form .block as a whole.
> -   **.block--modifier** represents a different state or version of .block.

_- From csswizardry_

\#Examples

This is your basic element:

```language-css
.info-window { 
	padding : 10px 15px;
    margin : 10px 0px;
	background-color : #fff; 
    border : 1px solid black; 
}
```

A decedent of info-window, might be the 'p' tag, or span, header etc. We can assign a colour to this:

```language-css
.info-window__content {
	color : white;
    font-weight : 700; 
}
```

If we need to modify this element, for example turn it into a 'warning window' we can add a modifier:

```language-css
.info-window--warning {
	background-color : #f2dede;
    border: 1px solid #d9534f;
}
```

We can chain this altogether to give the following selector, which would make the text red:

```language-css
.info-window--warning__content {
	font-weight : 700; 
	color : #d9534f;
}
```

All these styles are in-depend from each other. We can re-use them as we see fit. I have always been a fan of the "more classes" rule and feel this may suit me going forward.

Hopefully all this is correct. Feel free to tweet in a correction.
