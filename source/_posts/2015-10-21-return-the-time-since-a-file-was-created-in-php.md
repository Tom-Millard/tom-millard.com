---

title: Return the time since a file was created in PHP
tags:
-   php
excerpt: I needed to work out the time in minutes since a file was created in PHP PHP provides us with some basic file function one of which is filectime which will return a unix timestamp of when the file was

---

I needed to work out the time in minutes since a file was created in PHP.

PHP provides us with some basic file function, one of which is `filectime()` which will return a **unix timestamp** of when the file was created.

We can take this value and then get the difference by using time().

    function getFileAge($file){
    	if(!file_exists($file)){
    		return false;
    	}

    	return ceil(( (time() - filectime($file)) / 60 ));
    }
