'use strict';
 
var autoprefixer = require('gulp-autoprefixer');
var gulp = require('gulp'); 
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var rename =  require('gulp-rename');
var cleanCss = require('gulp-clean-css');
var clone = require('gulp-clone');

gulp.task('sass', function (done) {
  var source = gulp.src(['sass/admin.scss'])
    .pipe(sourcemaps.init())
    .on('error', error)
    .pipe(sass())
    .on('error', error)
    .pipe(autoprefixer({browsers: ['last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4']}));
    
    var sourceOriginal = source.pipe(clone());
    sourceOriginal.pipe(sourcemaps.write())
    .on('error', error)
    .pipe(gulp.dest('.'));

    var sourceMinify = source.pipe(clone());
    sourceMinify.pipe(cleanCss())
    .pipe(sourcemaps.write())
    .on('error', error)
    
    .pipe( rename( { suffix: '.min' } ) )
    .on('error', error)
    .pipe(gulp.dest('.'));
    done();
});

gulp.task('default', gulp.series('sass', function(done) {
  gulp.watch('sass/*.scss', gulp.parallel('sass'));
  done();
}));

function error(error) {
  console.log(error.toString());
  this.emit('end');
}