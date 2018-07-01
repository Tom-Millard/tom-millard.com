---

title: Using Traits in Laravel
tags:
-   php
-   laravel

excerpt: Traits are essentially includes for your classes I'm sure someone will correct me on that In Laravel I find them very useful for sharing functions variables etc between controllers For example string manipulation functions which need to be shared across

---

**Traits** are essentially includes for your classes (I'm sure someone will correct me on that).

In Laravel I find them very useful for sharing functions/variables/etc between controllers.

For example **string manipulation functions**, which need to be shared across various controllers. 

\##Mapping traits
First we need to tell **Laravel** about the existence of traits. Start by including the traits folder in the "autoload" part of the composer.json file.

```json
	"autoload": {
		"classmap": [
			"app/commands",
			"app/controllers",
			"app/models",
			"app/database/migrations",
			"app/database/seeds",
			"app/tests/TestCase.php",
			"app/traits"
		]
	},
```

In this layout the traits folder is in the app file, but it can be wherever you like or named anything. As long as this path matches up.

\##Traits Syntax
After this create a new file in your traits folder, so for me I created Strings.php

```language-php
<?php
	trait Strings {

		private function clean($string) {
		   return preg_replace("/[^ \w]+/", '', $string);
		}

	}
```

Name the trait the same as the file.

After saving this we need to run **composer dump-autoload**

\##Hooking it all up
Now that we have a trait and laravel is aware of its existence we simply use the following command under the class declaration, in any controlled we wish to include the trait.

```language-php
use Strings;
```

and now we have access to the `$this->clean([string])` function.

---

Thanks to [Alex Hollyman](http://www.albofish.co.uk/) 👍
