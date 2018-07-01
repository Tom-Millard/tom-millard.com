---

title: Base64 Encode Images in php
tags:
-   php
-   html-2
excerpt: A simple function which will allow you to base encode images on the fly function getBase Image imgPath imgType end explode trim imgPath imgType strtolower imgType img file get contents imgPath img base encode img return data image imgType base

---

A simple function which will allow you to base64 encode images on the fly.

```language-php
	function getBase64Image($imgPath){
		$imgType 	= end(explode(".", trim($imgPath)));
		$imgType 	= strtolower($imgType);
		$img 		= file_get_contents($imgPath);
		$img 		= base64_encode($img);

		return "data:image/$imgType;base64,$img";
	}
```

```language-html
<img src="<?php echo getBase64Image('./mini.jpg') ?>" alt="">
```

**Why would I want to do this?** simply put by doing this the browser has to make one less network connection. Which in tern will speed up your website.

...However  
[On Mobile, Data URIs are 6x Slower than Source Linking (New Research)](http://www.mobify.com/blog/data-uris-are-slow-on-mobile/)
