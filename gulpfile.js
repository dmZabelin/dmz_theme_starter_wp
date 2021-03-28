var gulp = require('gulp'),
	autoprefixer = require("gulp-autoprefixer"),
	watch = require('gulp-watch'),
	rename = require('gulp-rename'),
	sass = require('gulp-sass'),
	sourcemaps = require('gulp-sourcemaps'),
	rimraf = require('rimraf'),
	uglify = require('gulp-uglify'),
	cleanCSS = require('gulp-clean-css');


gulp.task('scss:build', function () {
	gulp.src('assets/scss/*.scss')
		.pipe(sass().on('error', sass.logError))
		.pipe(sass({ includePaths: './node_modules/' }))
		.pipe(autoprefixer({
			cascade: true
		}))
		.pipe(gulp.dest('./assets/scss'));
});

gulp.task('css:build', function () {
	gulp.src('assets/scss/*.css')
		.pipe(sourcemaps.init())
		.pipe(cleanCSS({
			level: 2
		}))
		.pipe(sourcemaps.write())
		.pipe(rename({
			suffix: '.min',
			extname: '.css'
		}))
		.pipe(gulp.dest('assets/dist'));
});

gulp.task('js:build', function () {
	gulp.src('assets/js/main.js')
		.pipe(sourcemaps.init())
		.pipe(uglify({
			toplevel: true
		}))
		.pipe(sourcemaps.write())
		.pipe(rename({
			suffix: '.min',
			extname: '.js'
		}))
		.pipe(gulp.dest('assets/dist'));
});

gulp.task('libsJs:build', function () {
	gulp.src('assets/js/libs/*.js')
		.pipe(gulp.dest('assets/dist/libs'));
});

gulp.task('build', gulp.parallel(
	'scss:build',
	'css:build',
	'js:build'
));

gulp.task('watch', function () {
	watch(['assets/scss/*.scss'], { readDelay: 1000 }, gulp.parallel('scss:build'));
	watch(['assets/scss/*.css'], gulp.parallel('css:build'));
	watch(['assets/js/main.js'], gulp.parallel('js:build'));
});

gulp.task('clean', function (cb) {
	rimraf('assets/dist', cb);
});

gulp.task('default', gulp.parallel('build', 'watch'));