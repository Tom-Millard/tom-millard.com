---

title: Ternary in Handlebars
tags:
-   javascript
-   handlebars
excerpt: I recently started using Handlebars for an internal project A fresh install of handlebars gives you very little to work with With the help of Handlebars helpers we can expand on the core functionality and mold the library into something
---

I recently started using Handlebars for an internal project. A fresh install of handlebars gives you very little to work with. With the help of Handlebars helpers we can expand on the core functionality and mold the library into something which better serves our needs.

**Ternary helpers**

```language-javascript
function ternary(value, yes, no){
    return value ? yes : no;
```

This is the basic function we want to run, we can then tell Handlebars about this helper:

```language-javascript
Handlebars.registerHelper("?", ternary);
```

Finally we can use it in our template like so:

```language-javascript
{ ? true 'then this' 'else this'}
```
