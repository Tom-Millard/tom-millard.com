---

title: Detecting touch in JavaScript and updating CSS
tags:
-   javascript
-   responsive-design

excerpt: Hover over effects are lovely but unfortunately on a responsive sites we have to take into account touch devices By simply checking the device and injecting a style into the body we can manipulate the element with some overriding CSS

---

Hover over effects are lovely, but unfortunately on a responsive sites we have to take into account touch devices.

By simply checking the device and injecting a style into the body we can manipulate the element with some overriding CSS.

```language-javascript
		var bodyClass = document.getElementsByTagName("body")[0];
		bodyClass.className += (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0)) ? " js-touch" : " js-not-touch";
		bodyClass.className = bodyClass.className.trim();
```
