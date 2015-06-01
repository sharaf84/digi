/**
 * Main Namespace:
 */
TSS = function() {
	var self                 = this;
	self.sass                = require('gulp-sass');
	self.gulp                = require('gulp');
	self.babel               = require("gulp-babel");
	self.react               = require('gulp-react');
	self.sourcemaps          = require('gulp-sourcemaps');
	self.minifycss           = require('gulp-minify-css');
	self.concat              = require('gulp-concat');
	self.rename              = require('gulp-rename');
	self.premailer           = require('gulp-premailer');
	self.mainBowerFiles      = require('main-bower-files');
	self.uglify              = require('gulp-uglify');
	self.gzip                = require('gulp-gzip');
	self.jade                = require('gulp-jade');
};

Builder = new TSS();

Builder.gulp.task('default', function() {
	console.info('Sorry, there are no default task. Please try a sepcific task!');
});

// Dev:
Builder.gulp.task('dev', ['watchSASS', 'watchJade'], function() {
    Builder.gulp.src('./css/src/*.scss')
        .pipe(Builder.sass())
        .pipe(Builder.sourcemaps.write('.'))
        .pipe(Builder.gulp.dest('./css/build'));

	Builder.gulp.src('./html/src/*.jade')
		.pipe(Builder.jade({
			'pretty': true,
			'path': './html/src/includes/'
		}))
		.pipe(Builder.gulp.dest('./html/build'));

});

// SASS Watcher
Builder.gulp.task('watchSASS', function() {
    Builder.gulp.watch('./css/src/*.scss', ['dev']);
});
// Jade Watcher
Builder.gulp.task('watchJade', function() {
	Builder.gulp.watch('./html/src/*.jade', ['dev']);
});


// Build Release:
Builder.gulp.task('js', function() {
	//var files = mainBowerFiles();

	var jsFiles = [
		'./js/front/app.js',
		'./js/front/dev.js'
	];

	Builder.gulp.src( jsFiles ).pipe( Builder.gulp.dest('./js/dist/src') );

    Builder.gulp.src( jsFiles )
    .pipe(Builder.concat('./app.js'))
    .pipe(Builder.gulp.dest('./js/dist/'))
	//.pipe(Builder.babel())
    .pipe(Builder.uglify())
	//.pipe(Builder.sourcemaps.write('.'))
    .pipe(Builder.gzip({ append: false }))
    .pipe(Builder.gulp.dest('./js/dist/min'));

});

// Build Release:
Builder.gulp.task('css', function() {

    var cssFiles = [
        './css/front/app.css'
    ];

    Builder.gulp.src( cssFiles )
    .pipe(Builder.concat('./app.css'))
    .pipe(Builder.gulp.dest('./css/dist/'))
    //.pipe(sourcemaps.init())
    .pipe(Builder.minifycss())
    .pipe(Builder.gzip({ append: false }))
    //.pipe(Builder.sourcemaps.write('.'))
    .pipe(Builder.gulp.dest('./css/dist/min'));

});
