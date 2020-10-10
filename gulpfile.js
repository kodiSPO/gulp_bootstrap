'use strict';

const gulp         = require('gulp');
const sass         = require('gulp-sass');
sass.compiler      = require('node-sass');
const sourcemaps   = require('gulp-sourcemaps');
const concat       = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS     = require('gulp-clean-css');
const uglify       = require('gulp-uglify');
const livereload   = require('gulp-livereload');


gulp.task('css', function () {
    return gulp.src([
        './css/plugins/**/*.{css,scss}',
        './css/main.scss',
        './templates/**/*.scss',
        './blocks/**/*.scss'
    ])
        .pipe(sourcemaps.init())
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(concat('theme.min.css'))
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist'))
        .pipe(livereload());
});


gulp.task('js', function () {
    return gulp.src([
        './js/plugins/**/*.js',
        './js/main.js',
        './js/parts/**/*.js',
        './templates/**/*.js',
        './blocks/**/*.js'
    ])
        .pipe(sourcemaps.init())
        .pipe(concat('theme.min.js'))
        .pipe(uglify())
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist'))
        .pipe(livereload());
});


gulp.task('default', function() {
    livereload.listen();
    gulp.watch([
        './css/**/*.{css,scss}',
        './templates/**/*.scss',
        './blocks/**/*.scss'
    ], gulp.series(
        'css'
    ));
    gulp.watch([
        './js/**/*.js',
        './templates/**/*.js',
        './blocks/**/*.js'
    ], gulp.series(
        'js',
    ));
});


gulp.task('build', gulp.series('css', 'js'));