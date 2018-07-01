---

title: Javascript: Binding events by class name
tags:
-   javascript
excerpt: Adding event listeners to elements with class names in javascript without the use of jQuery or onClick by using addEventListener and getElementsByClassName By using these two functions in conjunction with each other we can assign a global action to an

---

Adding event listeners to elements with class names in javascript without the use of jQuery or onClick, by using [addEventListener](https://developer.mozilla.org/en-US/docs/Web/API/EventTarget/addEventListener) and [getElementsByClassName](https://developer.mozilla.org/en-US/docs/Web/API/Document/getElementsByClassName).

By using these two functions in conjunction with each other we can assign a global action to an element with a class name declared.

```language-html
	<a href="" class="button">btn 1</a><br />
	<a href="" class="button">btn 2</a><br />
	<a href="" class="button">btn 3</a><br />
```

```language-javascript
	<script>
		(function(){
			var button = document.getElementsByClassName("button");

			for(var x = 0, xl = button.length; x<xl; ++x){
				button[x].addEventListener("click", myAction);
			}
            
			function myAction(e){
				e.preventDefault();
				console.log(e);
			}
		})(document);
	</script>
```

(Note: we can assign variouse event types in the same way <https://developer.mozilla.org/en-US/docs/Web/API/Event/type>)
