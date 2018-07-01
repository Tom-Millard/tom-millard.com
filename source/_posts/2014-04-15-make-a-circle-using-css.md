---

title: Make a circle using CSS
tags:
-   css
-   html

excerpt: How to make a circle shape using css and html lt div class circle gt lt div gt circle border-radius background-color red width px height px and thats it Unfortunately this is still a box element so adding content will

---

How to make a circle shape using css and html.

```language-html
<div class="circle"></div>
```

```language-css
.circle {
  border-radius : 50%;
  background-color : red;
  
  width : 100px;
  height : 100px;
 }
```

and thats it.

Unfortunately this is still a box element so adding content will overflow outside the circle :( 

```language-html
<div class="circle">
	<span>something something something</span>
</div>
```

[>The fiddle](http://jsfiddle.net/xEB8D/)
