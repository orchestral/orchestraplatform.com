var elixir = require('laravel-elixir'),
    gulp = require('gulp'),
    gutil = require('gulp-util'),
    coffee = require('gulp-coffee'),
    compass = require('gulp-compass'),
    less = require('gulp-less'),
    uglify = require('gulp-uglify');

assetDir = './public/themes/react/assets';

gulp.task('theme', function () {
    gulp.src(assetDir + '/css/theme.scss')
        .pipe(compass({
            relative: true,
            config_file: './config.rb',
            css: 'css',
            sass: 'css'
        }))
        .pipe(gulp.dest(assetDir + '/css'));
});

gulp.task('custom', function () {
    gulp.src(assetDir + '/css/custom.scss')
        .pipe(compass({
            relative: true,
            config_file: './config.rb',
            css: 'css',
            sass: 'css'
        }))
        .pipe(gulp.dest(assetDir + '/css'));
});

gulp.task('coffee', function () {
    var options = {
        outSourceMaps: false,
        output: {
            max_line_len: 150
        }
    };

    return gulp.src(assetDir + '/js/theme.coffee')
        .pipe(coffee().on('error', gutil.log))
        .pipe(uglify(options))
        .pipe(gulp.dest(assetDir + '/js'));
});

gulp.task('watch', function () {
    gulp.watch(assetDir + '/css/**/*.scss', ['theme', 'custom']);
    gulp.watch(assetDir + '/js/theme.coffee', ['coffee']);
});

gulp.task('basic', ['theme', 'custom', 'coffee']);
gulp.task('default', ['basic', 'watch']);
