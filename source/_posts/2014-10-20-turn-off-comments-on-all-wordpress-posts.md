---

title: Turn off comments on all WordPress posts
tags:
-   wordpress
-   sql
excerpt: Quickest way I could find to turn off comments for a Wordpress install with over posts Was to run the following SQL query update post table SET comment status 'closed' Replacing post table with the name of your table Simply

---

Quickest way I could find to turn off comments, for a Wordpress install with over 1000+ posts. Was to run the following SQL query. 

```language-sql
update [post_table] SET `comment_status`='closed';
```

Replacing post table with the name of your table.

Simply turning off comments in the setting does not turn off comments on posts that already exist.

_As always back up your sql before making significant changes_
