---

title: Wordpress: Override the url set by MySql
tags:
-   wordpress
-   php
excerpt: Setting up a Wordpress workflow can be a bit difficult one of the main issues is keeping your site up to date with the environment domain I normally keep the sql set to the live domain then all other version

---

Setting up a Wordpress workflow can be a bit difficult, one of the main issues is keeping your site  up to date with the environment domain. I normally keep the sql set to the live domain, then all other version (local, development) etc have individual wp-config files - with all your normal Wordpress config setting, along with these two lines:

```language-php
define('WP_HOME','http://example:8080');
define('WP_SITEURL', 'http://example:8080');
```

place these lines just bellow the table prefix options. Your site will now run off of the domain set in these options.
