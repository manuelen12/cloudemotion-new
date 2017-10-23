var gulp = require('gulp');
var browserSync = require('browser-sync').create();
var spa = require("browser-sync-spa");
var versionAppend = require('gulp-version-append');
var concat = require('gulp-concat');  
var rename = require('gulp-rename');  
var uglify = require('gulp-uglify');  
var minifyCSS = require('gulp-minify-css');


var jsFiles = [
'./assets/js/mainfiles/jquery.min.js',
'./assets/js/mainfiles/bootstrap.min.js',
'./assets/js/mainfiles/jquery.appear.min.js',
'./assets/js/mainfiles/jquery.easing.min.js',
'./assets/js/mainfiles/jquery-cookie.min.js',
'./assets/js/mainfiles/common.min.js',
'./assets/js/mainfiles/jquery.validation.min.js',
'./assets/js/mainfiles/jquery.easy-pie-chart.min.js',
'./assets/js/mainfiles/jquery.gmap.min.js',
'./assets/js/mainfiles/jquery.isotope.min.js',
'./assets/js/mainfiles/owl.carousel.min.js',
'./assets/js/mainfiles/jquery.magnific-popup.min.js',
'./assets/js/mainfiles/vide.min.js',

'./assets/js/mainfiles/moment.js',
'./assets/js/mainfiles/angular.min.js',
'./assets/js/mainfiles/angular-resource.min.js',
'./assets/js/mainfiles/angular-sanatize.min.js',
'./assets/js/mainfiles/angular-ui-router.min.js',
'./assets/js/mainfiles/pnotify.js',
'./assets/js/mainfiles/angular-pnotify.js',
'./assets/js/mainfiles/angular-translate.js',
'./assets/js/mainfiles/ui-bootstrap-tpls.min.js',
'./assets/js/mainfiles/ui-select.min.js',
'./assets/js/mainfiles/ng-table.min.js',

'./assets/js/mainfiles/bootstrap-datetimepicker.min.js',
'./assets/js/mainfiles/bootstrap-datepicker.min.js',
'./assets/js/mainfiles/bootstrap-toggle.min.js',
'./assets/js/mainfiles/ui-bootstrap-tpls.min.js',
'./assets/js/mainfiles/fullcalendar.min.js',
'./assets/js/mainfiles/Chart.js',
'./assets/js/mainfiles/custom.js',
'./assets/js/mainfiles/theme.js',
/*'./assets/js/mainfiles/functions.js',*/
'./assets/js/mainfiles/particles.js',
'./assets/js/mainfiles/sweetalert2.min.js',
'./assets/js/libs/**/*.js',
],
cssFile = [
"./assets/css/maincss/bootstrap.min.css",
"./assets/css/maincss/font-awesome.min.css",
"./assets/css/maincss/animate.min.css",
"./assets/css/maincss/simple-line-icons.min.css",
"./assets/css/maincss/owl.carousel.min.css",
"./assets/css/maincss/owl.theme.default.min.css",
"./assets/css/maincss/magnific-popup.min.css",
"./assets/css/maincss/ui-select.min.css",
"./assets/css/maincss/theme.css",
"./assets/css/maincss/theme-elements.css",
"./assets/css/maincss/theme-blog.css",
"./assets/css/maincss/theme-shop.css",
"./assets/css/maincss/settings.css",
"./assets/css/maincss/layers.css",
"./assets/css/maincss/navigation.css",
"./assets/css/maincss/skin-resume.css",
"./assets/css/maincss/style.css",
"./assets/css/maincss/custom.css",
"./assets/css/libscss/*.css",
],
jsDest =  './assets/production/dev_js',
cssDest = './assets/production/dev_css';


browserSync.use(spa({
    selector: "[ng-app]",
    history: {
        index: '/index.html'
    }
}));

gulp.task('serve', ['minifyJS','minifyCSS'/*,'versions'*/], function() {
  return browserSync.init({
/*    host: "192.168.0.118",*/
    server: {
      baseDir: './'
  }
});

});

/*gulp.task('versions', function () {
    return gulp.src('./dev/index.html')
    .pipe(versionAppend(['html', 'js', 'css']))
    .pipe(gulp.dest('./'))
    .pipe(rename('./index.html'))

});*/


gulp.task('minifyJS', function() {  
    return gulp.src(jsFiles)
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest(jsDest))
    .pipe(rename('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(jsDest))
    .pipe(browserSync.reload({ stream: true }));
});

gulp.task('minifyCSS', function() {  
    return gulp.src(cssFile)
    .pipe(minifyCSS({processImport: false}))
    .pipe(concat('main.min.css'))
    .pipe(gulp.dest(cssDest))
    .pipe(browserSync.stream());

});

gulp.task('watch_dev', ['serve'], function() {
    /* si da un error al momento de iniciar la tarea es por el numero de archivos que el Watch esta observando 
    con el siguiente comando expandiremos el numero de archivos para que haga reload si hay algun cambio:

    comando: echo fs.inotify.max_user_watches=524288 | sudo tee -a /etc/sysctl.conf && sudo sysctl -p

    */
    gulp.watch("./assets/css/**",["minifyCSS"]);
    gulp.watch(["**/*.html","./components/**/*.js","./core/*.js"]).on('change', browserSync.reload);
    gulp.watch(["./assets/js/**/*.js"],["minifyJS"]);
});

gulp.task('watch', ['serve'], function() {
    gulp.watch("**/*.html").on('change', browserSync.reload);
});

