---
title: Install PHP 7 on Mac with homebrew (updated)
tags:
-   php
-   php7
-   homebrew
-   mac
excerpt: Working on a mac and coding with PHP Its probably time to install PHP It's like the second coming of christ in PHP so why not join in Lets start by updating brew brew update Un-install old version of php
---

Edit: Brew recently changed its syntax, in order to install the latest version of php you would need a command like this - `brew install php@7.2 --with-pear`m always read the output :D

Working on a mac and coding with PHP? 

It's probably time to install PHP 7. It's like the second coming of christ in PHP, so why not join in.

Lets start by updating, brew:

```language-bash
brew update;
```

Un-install old version of php:

```language-bash
brew unlink php53 php54 php55 php56;
```

Then will need to install php7

```language-bash
brew tap homebrew/dupes;
brew tap homebrew/versions;
brew tap homebrew/homebrew-php;
brew install php70;
```

Install composer

```language-bash
brew install composer;
```

Run it in one command, just copy and paste this into your terminal:

```language-bash
wget -O - https://gist.githubusercontent.com/Tom-Millard/7391a827ddfb617a4a69dbfd985a4b65/raw/8d25a0d52938b0a94858b7f63343e372076bb5e2/gistfile1.sh | bash
```
