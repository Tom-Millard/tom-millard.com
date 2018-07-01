---

title: Setting up Models in Lumen
tags:
-   laravel
-   lumen
excerpt: Getting started with Models in Lumen Firstly we need to uncomment the ' app- withEloquent ' in the bootstrap app php file Laravel seems to have a stance of whatever when it comes to the location of your Models Some

---

Getting started with Models in Lumen.

Firstly we need to uncomment the '$app->withEloquent();' in the bootstrap/app.php file.

Laravel 5 seems to have a stance of "whatever", when it comes to the location of your Models. Some peasants have started placing model's in the app folder letting them run free. However I come from a strict household and expect things to be in certain places. So I went ahead and created a Models folder in my app folder. 

(at this point I have no idea where the 'generators' place the generated models from things like artisan:make, this is simply because I have yet to use laravel 5 and lumen does not come with this built in)

This is your basic Model bootstrap: 

```language-php
<?php namespace App\Models;

//Files.php

use Illuminate\Database\Eloquent\Model;

class Files extends Model {
	protected $table = 'files';
}
```

Notice the namespace references the location of the class, we use this when we wish to use this Model in a controller or a seeder.

Like so:

````language-php
use App\Models\Files
``

or we can use it directly in the code like so

```language-php
App\Models\Files::All();
````

Note: Remember to sprinkle around some **composer dump-autoload**, throw it around like fairy dust.
