var gulp = require('gulp');
var scss = require('gulp-sass');
//var browserSync = require('browser-sync');

//emmet-lifestyle - плагин, для записывания изменений из консоли сразу в код


gulp.task('scss', function(){
  return gulp.src('web/bluetheme/sass/style.scss')
   .pipe(scss(
     //{outputStyle: 'compressed'}
   ).on('error', scss.logError))
   .pipe(gulp.dest('web/bluetheme/css'));
});

//gulp.task('browser-sync', function(){
  //browserSync({
    //server: {
      //baseDir: 'app'
    //},
    //notify: false
  //});
//});

gulp.task('default',function(){
  gulp.watch('web/bluetheme/sass/**/*.scss', ['scss']);
  // gulp.watch('app/css/**/*.css', browserSync.reload);
  // gulp.watch('app/*.html', browserSync.reload);
});
