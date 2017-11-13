var gulp = require('gulp');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename-plus');
var destinationStyle = 'public/css';
var destinationJs = 'public/js';

gulp.task('copy-css', function () {
    gulp.src([
        'resources/assets/css/app.bundle.css',
        'resources/assets/css/theme-a.css',
        'resources/assets/css/vendor.bundle.css',
        'resources/assets/css/custom.css'
    ])
        .pipe(gulp.dest(destinationStyle))
});

gulp.task('copy-js', function () {
   gulp.src([
       'resources/assets/js/app.bundle.js',
       'resources/assets/js/vendor.bundle.js',
       'resources/assets/js/jquery.min.js',
       'resources/assets/js/customs.js'
   ])
       .pipe(gulp.dest(destinationJs));
});

gulp.task('default', ['copy-css','copy-js']);