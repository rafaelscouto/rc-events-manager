var gulp = require('gulp');
var sass = require('gulp-sass')(require('sass'));

var sassPaths = {
    admin: {
        src: 'src/assets/sass/admin/**/*.scss',
        mainSass: 'src/assets/sass/admin/rc-admin-main.scss',
        dest: 'src/assets/css/admin/'
    },
    frontend: {
        src: 'src/assets/sass/frontend/**/*.scss',
        mainSass: 'src/assets/sass/frontend/rc-frontend-main.scss',
        dest: 'src/assets/css/frontend/'
    }
};

function gulpSassAdmin() {
    return gulp
        .src(sassPaths.admin.mainSass)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(sassPaths.admin.dest));
}

function gulpSassFrontend() {
    return gulp
        .src(sassPaths.frontend.mainSass)
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest(sassPaths.frontend.dest));
}

function gulpWatch() {
    gulp.watch(sassPaths.admin.src, gulpSassAdmin);
    gulp.watch(sassPaths.frontend.src, gulpSassFrontend);
}

gulp.task('start', gulp.series(gulp.parallel(gulpSassAdmin, gulpSassFrontend), gulpWatch));
