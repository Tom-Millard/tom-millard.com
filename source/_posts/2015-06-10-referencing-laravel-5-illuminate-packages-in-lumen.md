---

title: Referencing Laravel 5 illuminate packages in Lumen
tags:
-   laravel
-   lumen
excerpt: This was strangely confusing for me I went straight from Laravel which might explain the problem I need to use Lumen for a lightweight project i was doing for a client the whole Laravel framework seemed a bit overkill All

---

This was strangely confusing for me, I went straight from Laravel 4, which might explain the problem.

I need to use Lumen for a lightweight project i was doing for a client, the whole Laravel framework seemed a bit overkill. 

All i needed was 'Files' support in one of my Seeders, it turned out to be a bit of an ordeal. However looking back it was obvious, I just needed to include the **namespace**.

In order to use 'file' you would do something like this

```language-php
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use App\Models\Files;

class FileSeeder extends Seeder {

	public function run()
	{
      File::allFiles([directory]);
    }

}
```

This then gives you access to that namespace.

You can also include it globally using 'class_alias' and adding it to your bootstrap/app.php file.

or you can use it like this

```language-php
App\Models\Files\File::allFiles([directory]);
```

We can apply this method to any of the available libraries under 'vendor/illuminate/\*'
