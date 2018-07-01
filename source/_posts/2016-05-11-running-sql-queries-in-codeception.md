---

title: Running SQL queries in Codeception through PDO

excerpt: Codeception provides some basic functions for testing the current state of your database However when you need to run more complex queries you will need to expose the Db module This function will need adding to the relevant helper class

---

Codeception provides some basic functions for testing the current state of your database. However when you need to run more complex queries you will need to expose the Db module.

This function will need adding to the relevant helper class and is then available in your tests, normally though $I .

    public function runSqlQuery($query){
      $dbh = $this->getModule("Db")->dbh;
      $result = $dbh->query($query);
      return $result->fetchAll();
    }

I added this to my Helper/Acceptance class which allowed me to check the state of the app in my Cept tests.
