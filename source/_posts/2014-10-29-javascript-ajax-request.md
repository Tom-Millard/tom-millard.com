---

title: Javascript Ajax Request
tags:
-   javascript
-   ajax

excerpt: In an attempt to avoid using a framework in one of my project I went in search of the illusive javascript Ajax function to pull in some JSON Lots of references to archaic scripts and 'just use jQuery' replies but

---

In an attempt to avoid using a framework in one of my project I went in search of the _illusive_ javascript Ajax function to pull in some JSON. Lots of references to archaic scripts and 'just use jQuery' replies, but amongst the babbling I came across this clean and easy to use function:

```language-javascript
			var _get = function(url, successHandler, errorHandler) {
			  var xhr = typeof XMLHttpRequest != 'undefined'
			    ? new XMLHttpRequest()
			    : new ActiveXObject('Microsoft.XMLHTTP');
			  xhr.open('get', url, true);
			  xhr.onreadystatechange = function() {
			    var status;
			    var data;

			    if (xhr.readyState == 4) {
			      status = xhr.status;
			      if (status == 200) {
			        data = xhr.responseText;
			        successHandler && successHandler(data);
			      } else {
			        errorHandler && errorHandler(status);
			      }
			    }
			  };
			  xhr.send();
			};
```

Simple.

(I have no idea where I found this, but if it looks like something you put on the internet let me know!)
