---

title: Connect Node mysql to your MAMP server on mac
excerpt: Whilst working on a node application on my Mac book and I needed to connect up MySql I wanted to recycle my MAMP server but had no luck with just smashing in the application login credentials Until I found http

---

Whilst working on a node application on my Mac book and I needed to connect up MySql.

I wanted to recycle my MAMP server, but had no luck with just smashing in the application login credentials. 

Until I found [http://getshao.com/](http://getshao.com/2013/07/14/the-surefire-way-to-connect-to-mysql-in-node-js-with-node-mysql/).

```language-javascript
socketPath : '/Applications/MAMP/tmp/mysql/mysql.sock'
```

all together we have something like this:

```language-javascript
var mysql      = require('mysql');   
var connection = mysql.createConnection({  
  host     : 'localhost',
  user     : 'root',
  password : 'hello',
  database : 'database',
  post : 3306,
  socketPath : '/Applications/MAMP/tmp/mysql/mysql.sock',
});
```

And everything worked.
