---

title: Bind events on dynamic content using jQuery
tags:
-   javascript
-   jquery
excerpt: When you inject a view into a container any jQuery click event within that view will need to be bound again The best way to bind actions to dynamic content when using jQuery is to listen out for new DOM

---

When you inject a view into a container any jQuery click event within that view will need to be bound again. 

The best way to bind actions to dynamic content when using jQuery is to listen out for new DOM elements and bind on them when they appear.

```language-javascript
$('#somecontainer').on('click' ,'.js-tool-tip', actionListenedToolTip);
```

In this piece of code any html injected into _'#somecontainer'_ which has the class _'.js-tool-tip'_    will have our click event bound to it.
