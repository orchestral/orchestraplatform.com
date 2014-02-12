var gulp = require('gulp'),
    gutil = require('gulp-util'),
    coffee = require('gulp-coffee'),
    csso = require('gulp-minify-css'),
    less = require('gulp-less'),
    uglify = require('gulp-uglify');

dir = 'public/themes/epicism/assets';

gulp.task('less', function () {
    gulp.src(dir + '/css/style.less')
        .pipe(less({
            paths: [
                dir + '/css'
            ]
        }))
        .pipe(gulp.dest(dir + '/css'));
});

gulp.task('css', function () {
    gulp.src(dir + '/css/style.css')
        .pipe(csso())
        .pipe(gulp.dest(dir + '/css'));
});

gulp.task('coffee', function () {
    var options = {
        outSourceMaps: false,
        output: {
            max_line_len: 150
        }
    };

    return gulp.src(dir + '/js/script.coffee')
        .pipe(coffee().on('error', gutil.log))
        .pipe(uglify(options))
        .pipe(gulp.dest(dir + '/js'));
});

gulp.task('watch', function () {
    gulp.watch(dir + '/css/*.less', ['less']);
    gulp.watch(dir + '/css/style.css', ['css']);
    gulp.watch(dir + '/js/script.coffee', ['coffee']);
});

gulp.task('default', ['less', 'css', 'coffee', 'watch']);
