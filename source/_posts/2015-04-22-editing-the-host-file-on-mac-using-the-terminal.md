---

title: Editing the Host File on Mac using the Terminal
tags:
-   bash
-   hosting
-   unix

excerpt: If you need to quickly override your internal rooting table in order to test out a site you just moved over to a new domain name or put live and the TTL on the domain is slow you can edit

---

If you need to quickly override your internal rooting table in order to test out a site you just moved over to a new domain name, or put live and the TTL on the domain is slow you can edit the host file and point the domain name to the server ip address. Which will stop your machine looking up the ip address outside of your Mac.

```language-bash
$ sudo nano /private/etc/hosts
```

Then we can add lines to this file

    [IP address]   [domain name]

Then save and exit.
