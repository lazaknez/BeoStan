'use strict';
 
var autoprefixer = require('gulp-autoprefixer');
var gulp = require('gulp'); 
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var rename =  require('gulp-rename');
var cleanCss = require('gulp-clean-css');
var clone = require('gulp-clone');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');


gulp.task('sass', function (done) {
  var source = gulp.src(['sass/style.scss'])
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

    gulp.src([
      'node_modules/bootstrap/dist/css/bootstrap.min.css',
      'node_modules/font-awesome/css/font-awesome.min.css',
      'node_modules/slick-carousel/slick/slick.css',
    ])
    .pipe(concat('vendors.css'))
    .on('error', error)
    .pipe(gulp.dest('css'));

    done();

});

gulp.task('fonts', function(done) {
  gulp.src([
    'node_modules/font-awesome/fonts/*'
  ])
  .pipe(gulp.dest('fonts'));
  done();
});

gulp.task('scripts', function(done) {
  gulp.src([
      'node_modules/bootstrap/dist/js/bootstrap.min.js',
      'node_modules/slick-carousel/slick/slick.min.js'
    ])
    .pipe(concat('vendors.js'))
    .on('error', error)
    .pipe(gulp.dest('js'));

  return gulp.src(['js/functions.js'])
    .pipe(uglify())
    .on('error', error)
    .pipe(rename({
        extname: ".min.js"
     }))
    .on('error', error)
    .pipe(gulp.dest('js'));
});

gulp.task('themekit', function(done){
  return gulp.src('node_modules/c4d-theme-kit/**/*')
  .pipe(gulp.dest('themekit'))
  done();
});

gulp.task('default', gulp.series('sass', 'scripts', 'fonts', 'themekit', function(done) {
  gulp.watch('sass/*.scss', gulp.parallel(['sass', 'fonts']));
  gulp.watch('js/functions.js', gulp.parallel('scripts'));
  done();
}));

function error(error) {
  console.log(error.toString());
  this.emit('end');
}