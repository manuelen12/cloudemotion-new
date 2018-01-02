var gulp = require('gulp'),
concat = require('gulp-concat'),
minify = require('gulp-minifier'),
uglify = require('gulp-uglify'),
imagemin = require('gulp-imagemin'),
sourcemaps = require('gulp-sourcemaps'),
del = require('del'),
gutil = require('gulp-util'),
js="assets/js/";
css="assets/css/";


var paths = {
  scripts: [
  js+'libs/jquery-3.2.1.min.js',
  js+'libs/blazy.js',
  js+'libs/particles.min.js',
  js+'libs/core.min.js',
  js+'libs/waypoints.min.js',
  js+'libs/bootstrap.min.js',
  js+'libs/global.js',
  js+'libs/angular.min.js',
  js+'libs/angular-translate.js',
  js+'libs/angular/ng-flag.js',
  js+'libs/html5.js',
  js+'libs/owl-carousel.min.js',
  js+'libs/moment.js',
  js+'libs/pnotify.min.js',
  js+'angular/services/pnotify.service.js',
  js+'angular/app.js',
  js+'angular/directives/js/upload-error.directive.js',
  js+'angular/helper/validator.helper.js',
  js+'angular/helper/method.helper.js',
  js+'angular/services/employee.service.js',
  js+'angular/controller/MainCtrl.js',
  ],
  styles:[
  css+'style.css',
  css+'style.min.css',
  css+'estilo.css',
  css+'blog-responsive.min.css',
  css+'blogs.css',
  css+'font-awesome.min.css',
  css+'ionicons.min.css',
  css+'layerslider.css',
  css+'modules-responsive.min.css',
  css+'modules.min.css',
  css+'plugins.min.css',
  css+'settings.css',
  css+'owl.carousel.css',
  css+'animate.min.css',
  css+'simple-line-icons.css',
  css+'style_dynamic.css',
  css+'styles.css',
  css+'abacosystems.css',
  css+'bootstrap.min.css',
  css+'flag.css',
  css+'nucleoo.css',
  css+'cloud-animation.css',
  css+'style_dynamic_responsive.css',
  css+'menu.min.css'
  ],
  images: 'assets/img/**/*'
};

var minifiedOptions={
  minify: true,
  collapseWhitespace: true,
  conservativeCollapse: true,
  minifyJS: true,
  minifyCSS: true,
  getKeptComment: function (content, filePath) {
    var m = content.match(/\/\*![\s\S]*?\*\//img);
    return m && m.join('\n') + '\n' || '';
  }
}


// Not all tasks need to use streams
// A gulpfile is just another node program and you can use any package available on npm
gulp.task('clean', function() {
  return del(['build']);
});

gulp.task('scripts', ['clean'], function() {

  gulp.src(paths.scripts)
  .pipe(sourcemaps.init())
  .pipe(minify(minifiedOptions))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('build/js'))

});

gulp.task('styles', ['clean'], function() {

  gulp.src(paths.styles)
  .pipe(sourcemaps.init())
  .pipe(minify(minifiedOptions))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('build/css'))

});

// Copy all static images
gulp.task('images', ['clean'], function() {
  return gulp.src(paths.images)
    // Pass in options to the task
    .pipe(imagemin({optimizationLevel: 5}))
    .pipe(gulp.dest('build/img'));
  });

// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch(paths.scripts, ['build']);
  gulp.watch(paths.styles, ['build']);
  gulp.watch(paths.images, ['images']);
});

// The default task (called when you run `gulp` from cli)
gulp.task('default', ['watch', 'scripts', 'styles', 'images']);
gulp.task('build', ['scripts', 'styles']);