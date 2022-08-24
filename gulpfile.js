'use strict';

const gulp = require('gulp');
const { series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const jsmin = require('gulp-jsmin');

function buildStyles() {
    return gulp.src('./_source/scss/styles.scss')
        .pipe(sourcemaps.init())
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/css'));
}

function buildJS() {
    return gulp.src('./_source/js/*.js')
        .pipe(sourcemaps.init())
        .pipe(jsmin())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./assets/js'));
}

exports.build = series(buildStyles, buildJS);