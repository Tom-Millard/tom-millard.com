'use strict';

var gulp 	= require('gulp');
var compass = require('gulp-compass');
var minifyCSS = require('gulp-minify-css');
var rename = require("gulp-rename");
var webserver = require('gulp-webserver');

var concat = require('gulp-concat');
var stripDebug = require('gulp-strip-debug');
var uglify = require('gulp-uglify');

var cssVars = {sassDir : "./sass/", css : "./app/styles/"};
var webserverVars = {port : 8888};


/**************
*
*	Sass with compass, built into watch
*
***************/
gulp.task('styles', function() {
	gulp.src(['./sass/*.scss'])
		.pipe(compass(cssVars))
		.pipe(rename({ suffix: '.min' }))
		.pipe(minifyCSS())
		.pipe(gulp.dest(cssVars.css));
});

/**************
*
* js concat and uglify
*
***************/
gulp.task('scripts', function() {
  gulp.src(['./scripts/classes/*.js', './scripts/main.js'])
      .pipe(concat('main.js'))
      .pipe(stripDebug())
      .pipe(uglify())
      .pipe(gulp.dest('./app/scripts/'));
});

/**************
*
*	Web server running with live-reload
*
***************/
gulp.task('webserver', function() {
  gulp.src('./app/')
    .pipe(webserver({
      livereload: true,
      directoryListing: false,
      open: true,
      port: webserverVars.port,
      fallback: 'index.html',
      host: "0.0.0.0"
    }));
});

gulp.task('watch', ['styles'], function() {
	gulp.watch(['./sass/**/*.scss'], ['styles']);
});