---

title: Generate a set of width's with a sass loop
tags:
-   css
-   sass
excerpt: For large scale applications with dynamic content you will likely need a set of css tools I normally have a tools scss file where I place generic pieces of code for general purpose use If you need a set of

---

For large scale applications with dynamic content you will likely need a set of css tools. I normally have a \_tools.scss file where I place generic pieces of code for general purpose use.

If you need a set of out the box width, this piece of code will create you a set of 10% width which you can use for any purpose.

```language-sass
@for $i from 1 through 10 {
  .w--#{ ($i * 10) } { width : #{ ($i * 10) }% }
}
```

You could also use this idea to put together a series of light-weight css styles to create a micro css framework, like this - [basscss](http://www.basscss.com/)
