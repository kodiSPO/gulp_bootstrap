'use strict';

const gulp = require('gulp');
const sass = require('gulp-sass');
sass.compiler = require('node-sass');
const sourcemaps = require('gulp-sourcemaps');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');


gulp.task('css', function () {
    return gulp.src('./css/**/*.scss')
        .pipe(sourcemaps.init())
        .pipe(sass.sync().on('error', sass.logError))
        .pipe(concat('theme.min.css'))
        .pipe(autoprefixer())
        .pipe(cleanCSS())
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist'));
});

gulp.task('js', function () {
    return gulp.src('./js/**/*.js')
        .pipe(sourcemaps.init())
        .pipe(concat('theme.min.js'))
        .pipe(sourcemaps.write('./map'))
        .pipe(gulp.dest('./dist'));
});