---

title: Install node with Puppet, on Enterprise Linux and Fedora
tags:
-   puppet
-   node
excerpt: Installing Node and ensuring its up and running is nice and simple with this little puppet script package 'gcc-c ' ensure gt 'installed' package 'make' ensure gt 'installed' exec 'setup-node' command gt 'curl -sL https rpm nodesource com setup x
---

Installing Node 6 and ensuring its up and running is nice and simple with this little puppet script.

```language-ruby
package { 'gcc-c++':
  ensure => 'installed',
}

package { 'make':
  ensure => 'installed',
}

exec { 'setup-node':
  command => 'curl -sL https://rpm.nodesource.com/setup_6.x | sudo -E bash -',
  require => [Package['curl'], Package['gcc-c++'], Package['make']],
  path   => '/usr/bin:/usr/sbin:/bin',
  unless => 'ls /usr/bin/ | grep node'
}

package { 'nodejs':
  ensure => 'installed',
}
```

First we install some needed packages. Every time out puppet master pings one of our puppet nodes `package` ensures that this package is installed and working.

`exec` runs and execution and gets the Node 6 setup files, but only if `curl`, `gcc-c++` and `make` are installed. We avoid running this every time we ping our puppet node by checking if the Node package is installed in the `usr/bin` dir.

Finally we install the nodejs package with our `package` function.

All this together insures that node is installed and working on our servers.
