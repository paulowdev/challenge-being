var gulp = require('gulp');
var concat = require('gulp-concat');
var rename = require('gulp-rename');
var plumber = require('gulp-plumber');
var watch = require('gulp-watch');//WATCH 0.6.9
var jshint = require('gulp-jshint');//JS
var uglify = require('gulp-uglify');//JS
var minifyCss = require('gulp-minify-css');//CSS
var sass = require('gulp-sass');//SASS

var paths = {
    sass: './src/sass/main.scss',
    watchSass: './src/sass/*.scss',
    watchScripts: './src/js/*.js',
    fonts: './src/fonts/*.{ttf,woff,woff2,eof,svg,otf,eot}'
};

var pathsLibs = {
    jquery: './bower_components/jquery/dist/jquery.min.js',
    jqueryValidation: './bower_components/jquery-validation/dist/jquery.validate.min.js',
    jqueryUiJs: './bower_components/jquery-ui/jquery-ui.min.js',
    browserJs: './bower_components/browser-detection/src/browser-detection.js',
    bootstrapCss: './bower_components/bootstrap/dist/css/bootstrap.min.css',
    bootstrapFonts: './bower_components/bootstrap/dist/fonts/*',
    bootstrapJs: './bower_components/bootstrap/dist/js/bootstrap.min.js'
};

//ASSETS
gulp.task('fonts', function () {
    return gulp.src([paths.fonts])
        .pipe(rename({dirname: '/fonts'}))
        .pipe(gulp.dest('./../web-app/public/fonts/'))
});

//SASS
gulp.task('sass', function () {
    return gulp.src([paths.sass])
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('./../web-app/public/css/'));
});

//JS
gulp.task('scripts', function () {
    return gulp.src([paths.watchScripts])
        .pipe(concat('main.js'))
        .pipe(jshint())
        .pipe(uglify())
        .pipe(gulp.dest('./../web-app/public/js/'))
});

//TASK ASSETS
gulp.task('assets', ['fonts', 'sass', 'scripts']);

//BOWER COMPONETS
gulp.task('libsFonts', function () {
    return gulp.src([pathsLibs.bootstrapFonts])
        .pipe(gulp.dest('./../web-app/public/fonts/'))
});
gulp.task('libsCss', function () {
    return gulp.src([pathsLibs.bootstrapCss])
        .pipe(concat('core.min.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('./../web-app/public/css/'))
});
gulp.task('libsScripts', function () {
    return gulp.src([pathsLibs.jquery, pathsLibs.jqueryValidation, pathsLibs.bootstrapJs, pathsLibs.jqueryUiJs, pathsLibs.browserJs])
        .pipe(concat('core.min.js'))
        .pipe(gulp.dest('./../web-app/public/js/'))
});

//CORE LIBS
gulp.task('assetsLibs', ['libsFonts', 'libsCss', 'libsScripts']);

//WATCH ASSETS
gulp.task('watch', function () {
    gulp.watch([paths.watchSass], ['sass']);
    gulp.watch([paths.watchScripts], ['scripts']);
});

//GULP FRONTEND
gulp.task('default', ['assets', 'assetsLibs', 'watch']);