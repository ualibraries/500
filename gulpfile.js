var gulp = require('gulp');
var postcss = require('gulp-postcss');
var scss = require('postcss-scss');

var processors = [
  require('precss')(),
  require('postcss-strip-inline-comments')
];

gulp.task('css', function(){
  return gulp.src('css/source/main.css')
  .pipe(postcss(processors, {syntax: scss}))
  .pipe(gulp.dest('css'))
})

gulp.task('default', [ 'css' ]);
