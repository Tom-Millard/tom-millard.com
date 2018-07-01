---

title: Templating with PHP block statements
tags:
-   php
-   html-2
-   templating
excerpt: PHP templating languages have be come a stable when working with an MVC system Extensions such as smarty twig and blade can be found in most PHP frameworks or can be implemented with ease Templating engines simple to work with

---

PHP templating languages have be come a stable when working with an MVC system. Extensions such as smarty, twig and blade can be found in most PHP frameworks or can be implemented with ease. 

Templating engines simple to work with and force your team into an MVC approach by removing the ability to handle logic in the view. 

If you don't have access to a templating engine, or you feel it may add another level of complexity to your application.. or your working on an old system but want to separate your code from the spaghetti that exists, then block statements might be worth implementing.

I'm a huge fan of block statements when it comes to WordPress and find that it gives the necessary separation I need in my templates.

```language-php
<?php foreach(get_posts([args]) as $p) : ?>
     <div><?php echo $p->post_content; ?></div>
<?php endforeach ?>
```

This example is basic but from the out set you can see how it would help with a complex HTML view. If we compare the above to the norm we can see one clear advantage, and thats readability.

```language-php
<?php foreach(get_posts([args]) as $p) { ?>
     <div><?php echo $p->post_content; ?></div>
<?php } ?>
```

We have access to allot of control structures alternatives, here are a few:

```language-php
<?php if(x == y) : ?>
    //code
<?php endif ?>

<?php while(true) : ?>
    //code
<?php endwhile ?>

..etc
```

\##What about short codes?
I was a huge fan of short codes, however over the years people have moved away from using them. And in my opinion best practice always wins.

\##Echoing out HTML
No
