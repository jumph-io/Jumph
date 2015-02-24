var gulp = require('gulp');
var chmod = require('gulp-chmod');
var bower = require('gulp-bower');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var size = require('gulp-size');
var sourcemaps = require('gulp-sourcemaps');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var csso = require('gulp-csso');
var uglify = require('gulp-uglifyjs');
var imagemin = require('gulp-imagemin');
var iconfont = require('gulp-iconfont');
var consolidate = require('gulp-consolidate');

// General settings
var paths = {};
paths.js = {};
paths.css = {};
paths.images = {};
paths.fonts = {};

var dest = {
    fonts: 'web/fonts/',
    css: 'web/css/',
    js: 'web/js/',
    images: 'web/images/',
    public: 'web/'
};

// Bower task
gulp.task('bower', function() {
    return bower()
        .pipe(chmod(644))
        .pipe(gulp.dest('vendor/components/'));
});

// Bower CSS files
paths.css.vendor = [
    'vendor/components/bootstrap/dist/css/bootstrap.css',
    'vendor/components/fontawesome/css/font-awesome.css',
    'vendor/components/admin-lte/dist/css/AdminLTE.css',
    'vendor/components/admin-lte/dist/css//skins/skin-black.css',
    'vendor/components/admin-lte/dist/css//skins/skin-blue.css',
    'vendor/components/admin-lte/dist/css//skins/skin-green.css',
    'vendor/components/admin-lte/dist/css//skins/skin-purple.css',
    'vendor/components/admin-lte/dist/css//skins/skin-red.css',
    'vendor/components/admin-lte/dist/css//skins/skin-yellow.css',
    'vendor/components/bootstrap-datepicker/css/datepicker3.css',
    'vendor/components/bootstrap-daterangepicker/daterangepicker-bs3.css',
    'vendor/components/admin-lte/plugins/fullcalendar/fullcalendar.css',
    'vendor/components/admin-lte/plugins/iCheck/square/blue.css',
    'app/Resources/public/css/jumph.css',
    'vendor/components/admin-lte/plugins/iCheck/square/blue.png', //damn vendor :(
    'vendor/components/admin-lte/plugins/iCheck/square/blue@2x.png' //damn vendor :(
];

gulp.task('css:vendor', ['bower'], function() {
    return gulp.src(paths.css.vendor)
        .pipe(chmod(644))
        .pipe(gulp.dest(dest.css))
        .pipe(size({showFiles: true, title: 'css:vendor'}));
});

// Bower JS files
paths.js.vendor = [
    'vendor/components/jquery/dist/jquery.min.js',
    'vendor/components/bootstrap/dist/js/bootstrap.min.js',
    'vendor/components/admin-lte/dist/js/app.js',
    'vendor/components/bootstrap-datepicker/js/bootstrap-datepicker.js',
    'vendor/components/highcharts/highcharts.js',
    'vendor/components/highcharts/modules/exporting.js',
    'vendor/components/moment/min/moment-with-locales.min.js',
    'vendor/components/bootstrap-daterangepicker/daterangepicker.js',
    'vendor/components/admin-lte/plugins/fullcalendar/fullcalendar.min.js',
    'vendor/components/admin-lte/plugins/iCheck/icheck.min.js',
    'vendor/components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js'
];
gulp.task('js:vendor', ['bower'], function() {
    return gulp.src(paths.js.vendor)
        .pipe(chmod(644))
        .pipe(gulp.dest(dest.js))
        .pipe(size({showFiles: true, title: 'js:vendor'}));
});

// Bower font files
paths.fonts.vendor = [
    'vendor/components/bootstrap/fonts/glyphicons-halflings-regular.eot',
    'vendor/components/bootstrap/fonts/glyphicons-halflings-regular.svg',
    'vendor/components/bootstrap/fonts/glyphicons-halflings-regular.ttf',
    'vendor/components/bootstrap/fonts/glyphicons-halflings-regular.woff',
    'vendor/components/fontawesome/fonts/FontAwesome.otf',
    'vendor/components/fontawesome/fonts/fontawesome-webfont.eot',
    'vendor/components/fontawesome/fonts/fontawesome-webfont.svg',
    'vendor/components/fontawesome/fonts/fontawesome-webfont.ttf',
    'vendor/components/fontawesome/fonts/fontawesome-webfont.woff',
    'vendor/components/fontawesome/fonts/fontawesome-webfont.woff2',
];
gulp.task('fonts:vendor', ['bower'], function() {
    return gulp.src(paths.fonts.vendor)
        .pipe(chmod(644))
        .pipe(gulp.dest(dest.fonts))
        .pipe(size({showFiles: true, title: 'fonts:vendor'}));
});

// General watch
gulp.task('watch', ['css:vendor', 'js:vendor', 'fonts:vendor'], function() {
    gulp.watch(paths.css.vendor, ['css:vendor']);
    gulp.watch(paths.js.vendor, ['js:vendor']);
    gulp.watch(paths.fonts.vendor, ['fonts:vendor']);
});