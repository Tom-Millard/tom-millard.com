---

title: Bulk Rename Images with Bash

excerpt: Recently I had to bulk rename some jpg's from a horrible naming convention to something a bit more user friendly I wanted them to be formatted like this string - integer jpg With the following bash command this was possible
---

Recently I had to bulk rename some jpg's from a horrible naming convention to something a bit more user friendly.

I wanted them to be formatted like this, 

    [string]-[integer].jpg

With the following bash command this was possible using a for loop

```language-bash
j=0; for file in *.jpg; do ((j++)) && mv "$file" "name-space-$j.jpg";  done
```

This piece of code does the following

-   Integrates over all the files (in this case jpg)
-   Increase the number variable by 1, j++
-   Then moves the file into a new name with our prefix and the integer

Now i have a loa of files with the following name name-space-0.jpg etc

**(Warning: Always backup files if your pissing around for the first time with the terminal)**

Also see [Mass Move (mmv)](http://ss64.com/bash/mmv.html)
