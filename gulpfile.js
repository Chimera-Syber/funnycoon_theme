'use strict';

const gulp = require('gulp');
const { series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const jsmin = require('gulp-jsmin');
const utf8convert = require('gulp-utf8-convert');
const zip = require('gulp-zip');

function buildStyles() {
    return gulp.src('./_source/scss/styles.scss')
        .pipe(sourcemaps.init())
        .pipe(sass.sync({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(utf8convert({
            encNotMatchHandle:function (file) {

            }
        }))
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

function funnycoonZip() {
    return gulp.src([
            'assets/**/*.*',
            'classes/**/*.*',
            'inc/**/*.*',
            'template-parts/**/*.*',
            'archive.php',
            'author.php',
            'comments.php',
            'footer.php',
            'front-page.php',
            'functions.php',
            'header.php',
            'index.php',
            'page-change-email.php',
            'page-change-password.php',
            'page-edit-profile.php',
            'page.php',
            'screenshot.png',
            'search.php',
            'searchform.php',
            'single.php',
            'style.css'
        ],
        { base: '.' }
    )
        .pipe(zip('funnycoon.zip'))
        .pipe(gulp.dest('./'))
};

exports.funnycoonZip = funnycoonZip;