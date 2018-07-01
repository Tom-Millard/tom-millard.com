---

title: Arguments array in JavaScript Functions
tags:
-   javascript
excerpt: Arguments is something I stumbled upon whilst looking through my twitter feed the other day so I chose to do a little bit of research Argument is a local variable available within a function Arguments contains an array of each

---

Arguments is something I stumbled upon whilst looking through my twitter feed the other day, so I chose to do a little bit of research.

Argument is a local variable available within a function. Arguments contains an array of each argument passed into the function, starting at an index of 0.

```language-javascript
var x = function(){return arguments}
```

will return..

```language-bash
>x(1,2,3,4);
>[1,2,3,4]
```

So thats about it, personally I find this approach a bit _vague_ and would prefer declared arguments, however if you are interested in this approach maybe an object would be better.

```language-javascript
var y = function(options){ return options.time };
```

which will return   

```language-bash
>y({time : new Date()})
>Mon Aug 04 2014 21:23:21 GMT+0100 (BST)
```

I find this gives a little more structure to your function arguments.

Let me know your thoughts: [@millard\_](https://twitter.com/millard_).

_Some lovely examples can be found on - [MDN](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Functions_and_function_scope/arguments)_
