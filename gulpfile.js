/*
 *	Adam
 *  Automad Theme
 *
 *	Copyright (c) 2020 by Marc Anton Dahmen
 *	http:/marcdahmen.de
 *
 *  MIT license
 */


var gulp = require('gulp'),
	autoprefixer = require('gulp-autoprefixer'),
	cleanCSS = require('gulp-clean-css'),
	concat = require('gulp-concat'),
	header = require('gulp-header'),
	merge2 = require('merge2'),
	less = require('gulp-less'),
	remoteSrc = require('gulp-remote-src'),
	rename = require('gulp-rename'),
	uglify = require('gulp-uglify-es').default,
	gutil = require('gulp-util'),
	cleanCSSOptions = {
		format: { wrapAt: 500 },
		rebase: false
	};
	
	
// Error handling to prevent watch task to fail silently without restarting.
var onError = function(err) {
		gutil.log(gutil.colors.red('ERROR', err.plugin), err.message);
		gutil.beep();
		new gutil.PluginError(err.plugin, err, {showStack: true})
		this.emit('end');
	};
	

// Concat minify and prefix all required js files.
gulp.task('adam-js', function() {
	
	var	uglifyOptions = { 
			compress: { 
				hoist_funs: false, 
				hoist_vars: false 
			},
			output: {
				comments: /(license|copyright)/i,
				max_line_len: 500
			}
		},
		pkgUIkit = require('./node_modules/uikit/package.json');
	

	return 	merge2(
			gulp.src([
				'node_modules/jquery/dist/jquery.min.js',
				'node_modules/imagesloaded/imagesloaded.pkgd.min.js'
			]),
			gulp.src([
				// Core. 
				// Order of files taken from lib/vendor/uikit/uikit/gulpfile.js
				'node_modules/uikit/src/js/core/core.js',
				'node_modules/uikit/src/js/core/touch.js',
				'node_modules/uikit/src/js/core/utility.js',
				'node_modules/uikit/src/js/core/dropdown.js',
				'node_modules/uikit/src/js/core/grid.js',
				'node_modules/uikit/src/js/core/modal.js',
				'node_modules/uikit/src/js/core/nav.js',
				// Selected components.
				'node_modules/uikit/src/js/components/autocomplete.js',
				'node_modules/uikit/src/js/components/lightbox.js',
				'node_modules/uikit/src/js/components/pagination.js',
				'node_modules/uikit/src/js/components/slider.js',
				'node_modules/uikit/src/js/components/slideshow.js',
				'node_modules/uikit/src/js/components/tooltip.js'
			])
			.pipe(uglify(uglifyOptions))
			.pipe(concat('uikit.js', { newLine: '\r\n\r\n' } )) // Doesn't get saved to disk.
			.pipe(header('/*! <%= pkg.title %> <%= pkg.version %> | <%= pkg.homepage %> | (c) 2014 YOOtheme | MIT License */\n', { 'pkg' : pkgUIkit } )),
			// Sticky sidebar.
			gulp.src([
				'node_modules/css-element-queries/src/ResizeSensor.js'
			])
			.pipe(uglify(uglifyOptions)),
			gulp.src([
				'node_modules/sticky-sidebar/dist/sticky-sidebar.min.js'
			]),
			remoteSrc([
					'automad/gui/js/scroll_position.js',
					'packages/standard/js/autocomplete.js', 
					'packages/standard/js/masonry.js',
					'packages/standard/js/modal.js', 
					'packages/standard/js/pagination.js', 
					'packages/standard/js/sidebar.js'
				], {
					base: 'https://raw.githubusercontent.com/marcantondahmen/automad/1.5.1/'
			})
			.pipe(uglify(uglifyOptions))
		)
		.pipe(concat('adam.min.js', { newLine: '\r\n\r\n' } ))
		.pipe(gulp.dest('dist'));
	
});	
	
// Compile, minify and prefix alpha.less.
gulp.task('adam-less', function() {

	return 	gulp.src('less/adam.less')
			.pipe(less())
			.on('error', onError)
			.pipe(autoprefixer({ grid: false }))
			.pipe(cleanCSS(cleanCSSOptions))
			.pipe(rename({ suffix: '.min' }))
			.pipe(gulp.dest('dist'));
	
});


// Watch task.
gulp.task('watch', function() {

	gulp.watch('less/*.less', gulp.series('adam-less'));
	
});


// The default task.
gulp.task('default', gulp.series('adam-js', 'adam-less'));