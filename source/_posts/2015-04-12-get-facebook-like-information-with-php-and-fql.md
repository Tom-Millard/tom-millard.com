---

title: Get Facebook like information with php and fql
tags:
-   php
-   fql
excerpt: Social media share and like counters always look a bit awkward on websites and normally allow very little change when it comes to appearance About - years ago I wrote a little plugin for expression engine which used various social

---

Social media share and like counters always look a bit awkward on websites and normally allow very little change when it comes to appearance.

About 2-3 years ago I wrote a little plugin for expression engine which used various social media feed to count and display likes/shares/tweets etc

The code is a bit out of date now but might be of some use [Github/share-counters](https://github.com/Tom-Millard/share-count).

Taking this code I formatted the response to JSON then en-coded the result to give us an object we can use.

```language-php
function getFacebookLikeInfo($url){
	$url = "
    	https://api.facebook.com/method/fql.query?query=SELECT%20like_count,%20total_count,%20share_count,%20click_count%20from%20link_stat%20WHERE%20url=%22$url%22&format=json
        ";
    
	$json = file_get_contents($url);

	return json_decode($json);
}

print_r(getFacebookLikeInfo("www.google.com"));
```

Which gives us

```language-php
Array
(
    [0] => stdClass Object
        (
            [like_count] => 3137662
            [total_count] => 12094803
            [share_count] => 6994340
            [click_count] => 265614
        )

)
```
