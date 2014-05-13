var gulp = require('gulp'),
    gutil = require('gulp-util'),
    coffee = require('gulp-coffee'),
    compass = require('gulp-compass'),
    csso = require('gulp-minify-css'),
    less = require('gulp-less'),
    uglify = require('gulp-uglify');

assetDir = './public/themes/react/assets';

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
    gulp.watch(assetDir + '/js/theme.coffee', ['coffee']);
});

gulp.task('basic', ['coffee']);
gulp.task('default', ['basic', 'watch']);
