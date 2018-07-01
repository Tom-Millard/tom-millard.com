---

title: Completely Remove .sass-cache From Your Repo
tags:
-   bash
-   git
-   sass-2
excerpt: Every-time I start a project I forget to remove ' sass-cache then I end up committing allot of rubbish In order to fix your mistake do the following echo sass-cache gt gt gitignore git rm -r --cached sass-cache git add

---

Every-time I start a project I forget to remove '.sass-cache, then I end up committing allot of rubbish. In order to fix your mistake do the following:

```language-bash
$ echo ".sass-cache" >> .gitignore
$ git rm -r --cached.sass-cache
$ git add . 
$ git commit -m "DIE SASS-CACHE DIE!!!!"
```

and done.
