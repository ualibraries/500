var gulp = require('gulp');
var less = require('gulp-less');
var minifyCSS = require('gulp-csso');

gulp.task('css', function(){
  return gulp.src('source/*.less')
  .pipe(less())
  .pipe(minifyCSS())
  .pipe(gulp.dest('.'))
})

gulp.task('default', [ 'css' ]);
