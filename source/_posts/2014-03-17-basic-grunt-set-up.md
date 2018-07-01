---
title: Basic Grunt set up
tags:
    -   grunt
    -   javascript
    -   node
excerpt: Im pretty new to grunt my only real use of it so far is to concat and uglify This kind of set up is covered in the opening tutorial on gruntjs com Below is my set up and is a
---

Im pretty new to grunt, my only real use of it so far is to concat and uglify. This kind of set up is covered in the opening tutorial on [gruntjs.com](http://gruntjs.com/).

Below is my set up and is a reminder of how to set up a similar system in the future.

First you need [node](http://nodejs.org/) installed on your machine, this comes bundled with [npm](https://www.npmjs.org/).

\#Package.json file
Lets start with the package.json file. This file lets us know the dependencies which need to be fetched from npm.

```language-javascript
{
  "name": "grunt_basics",
  "version": "0.1.0",
  "devDependencies": {
    "grunt": "~0.4.2",
    "grunt-contrib-uglify": "~0.2.2",
    "grunt-contrib-concat" : "~0.3.0",
    "grunt-contrib-watch" : "~0.5.3"
  }
}
```

Name is the name (no spaces) of the project, the version and finally the dependencies:

-   [grunt](https://github.com/gruntjs/grunt)
-   [grunt uglify](https://github.com/gruntjs/grunt-contrib-uglify)
-   [grunt concat](https://github.com/gruntjs/grunt-contrib-concat)
-   [grunt watch](https://github.com/gruntjs/grunt-contrib-watch)

These are the node modules which will be downloaded.

\#Installing node Module's
If we navigate to the file in a terminal window (Sorry no Windows OS love) and run the following:
`npm install`

This will then run something like this:
![Terminal installing NPM](https://s3-us-west-2.amazonaws.com/droplr.storage/files/acc_191988/bypm?AWSAccessKeyId=AKIAJSVQN3Z4K7MT5U2A&Expires=1395070361&Signature=DmzLfYc2C8SWkTRexF7pkWQhNqA%3D&response-content-disposition=inline%3B%20filename%3DScreen%20Shot%202014-03-13%20at%2012.49.04.png%3B)

You will now find a node module file inside the same directory as your package.json file

\#Setting up grunt
Create a Gruntfile.js in the same folder as your package.json file and your node modules folder.

Outline of the file

```language-javascript
module.exports = function(grunt) {
  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    concat: {
      dist: {
        src: ['location of js files'],
        dest: 'output location',
      },
    },
    uglify: {
      build: {
        src: 'output location from concat',
        dest: 'min file location'
      }
    },
    watch: {
      files: ['which files are being watched for changes, normally the output location'],
      tasks: ['concat', 'uglify']
    }
  });
  // Load the modules
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Default task(s).
  grunt.registerTask('default', ['concat', 'uglify']);
};
```

\##Concat
First we need to concat the files into one, we do this with the following piece of code

```language-javascript
concat: {
	dist: {
        src: ['location of js files'],
        dest: 'output location',
      },
    },
```

Location of the script and the output location.

The order of these files will depend on your individual set up, mine normally looks something like this:

`src: ['app/scripts/development/frameworks/jquery.js', 'app/scripts/development/plugins/\*.js', app/scripts/development/classes/\*.js, app/scripts/development/main.js]`

\##Uglify
We then need to uglify the output from the concat, this will minify our output script.

```language-javascript
uglify: {
      build: {
        src: 'output location from concat',
        dest: 'min file location'
      }
    },
```

The src will be whats produced by the concat, normally a main.js file. This will then be uglified into another file normally names main.min.js and this is the file which you will pass into the production site.

\##Watch
This is used by grunt to watch for changes to your files.

```language-javascript
watch: {
files: ['which files are being watched for changes, normally the output location'],
tasks: ['concat', 'uglify']
}
```

We normally want to watch all the js files in your script folder (or whatever your js folder is).

```language-javascript
files:['app/scripts/\*\*/\*.js']
```

This will incorporate all your js files in the scripts folder.

Tasks - is the order we want to run these functions, concat then uglify.

\##Includes
We need to include the following at the end.

```language-javascript
// Load the modules
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');
  // Default task(s).
  grunt.registerTask('default', ['concat', 'uglify']);
```

This loads in the node modules, and register the default task.

Then we run the following command in the command line

<code>grunt watch</code>

We can also run 

<code>grunt default</code>

Which will run the process once.

\#Conclusion
This is a very basic introduction to grunt, from my perspective. Hopefully over time I will improve on this "recipe", but for now this will do for me.

If you want to contribute to this post of highlight anything you think needs changing feel free to send me a tweet - [millard\_](https://twitter.com/millard_)

This post is open to changes.

\-Tom

_Edit:  
And the git hub link to my basic [boiler plate](https://github.com/Tom-Millard/boilerplate)_
