---
title: Three tools to increase the qulity of your php code
tags:
-   php
excerpt: Working on a mac and coding with PHP Its probably time to install PHP It's like the second coming of christ in PHP so why not join in Lets start by updating brew brew update Un-install old version of php
---

Over the last few years i've tried to up my php game. Along with just trying to write better code i've also invested in using better tools.

## PHP CS (with doctrine code styles)

[PSR-2](https://www.php-fig.org/psr/psr-2/) sets a good standard for formatting php. However we can go one step further and use the [Doctrine code style](https://github.com/doctrine/coding-standard) which pushes the use of types and forces strict comparison operations. Both of which allow us to write redcue bugs in our code, or the potential for bugs.

Your IDE should be able to run `phpcbf` when you save. This will try and fix as many issues as it can.

Preferably before any git commit all code style issues should be fixed.

We can produce checkstyle report on our CI server and keep track of any known issues along with a threshold for leanency.

## PHP Stan

What is php-stan:

> PHPStan focuses on finding errors in your code without actually running it. It catches whole classes of bugs even before you write tests for the code. It moves PHP closer to compiled languages in the sense that the correctness of each line of the code can be checked before you run the actual line.

PHP cs will help PHP stan better understand what your code is tyring to use with the use of strict types and docblocks.



## PHP metrix