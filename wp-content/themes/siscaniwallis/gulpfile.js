var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');
var minifyCSS = require('gulp-csso');
// var uglify = require('gulp-uglify');
// var gulpIf = require('gulp-if');
var concat = require('gulp-concat');

let cleanCSS = require('gulp-clean-css');
const minify = require('gulp-minify');


gulp.task('sass', function() {
    return gulp.src('./css/src/app.sass') // Gets all files ending with .scss in app/scss
    //   .pipe(concat('app-min.css'))
      .pipe(sass())
    //   .pipe(cleanCSS())
      .pipe(minifyCSS())
      .pipe(gulp.dest('./css/build/'));
});

gulp.task('js', function(){
    gulp.src('./js/src/*.js')
      .pipe(concat('app-js.js'))
      .pipe(minify())
      .pipe(sourcemaps.init())
      .pipe(sourcemaps.write())
      .pipe(gulp.dest('./js/build/'))
});

gulp.task('watch', function (){
    gulp.watch('./css/src/**/*.sass', ['sass']);
    gulp.watch('./js/src/**/*.js', ['js']);
    // Other watchers
})

gulp.task('default', ['sass']);