module.exports = function(grunt) {
	// Time how long tasks take. Can help when optimizing build times
	require('time-grunt')(grunt);

	// Load grunt tasks automatically
	require('load-grunt-tasks')(grunt);

	grunt.initConfig({
		clean : {
			all : [ 'dist/Meeas/**/*' ]
		},
		copy : {
			src : {
				files : [ {
					expand : true,
					cwd : '',
					src : [ 'min.html' ],
					dest : 'dist/'
				} ]
			},
			image : {
				files : [ {
					expand : true,
					cwd : '',
					src : [ 'images/{,*/}*.{png,jpg,jpeg,gif}' ],
					dest : 'dist/Meeas/'
				} ]
			},
			admin : {
				files : [ {
					expand : true,
					cwd : '',
					src : [ 'admin/{,*/}*.*', 'inc/{,*/}*.*' ],
					dest : 'dist/Meeas/'
				} ]
			},
			php : {
				files : [ {
					expand : true,
					cwd : '',
					src : [ '*.php' ],
					dest : 'dist/Meeas/'
				} ]
			},
			other : {
				files : [ {
					expand : true,
					cwd : '',
					src : [ 'index.html', 'style.css', 'share.css',
							'screenshot.jpg', 'js/html5.js' ],
					dest : 'dist/Meeas/'
				} ]
			},
			need_replace:{
				files : [ {
					expand : true,
					cwd : 'dist',
					src : [ '*.php' ],
					dest : 'dist/Meeas/'
				} ]
			}
		},
		concat : {
			options : {
				separator : ';',
				stripBanners : true
			}
		},
		useminPrepare : {
			options : {
				dest : 'dist/Meeas/'
			},
			html : 'min.html'
		},

		usemin : {
			html : 'dist/min.html'
		},

		autoprefixer : {
			options : {
				browsers : [ '> 1%', 'last 2 versions', 'Firefox ESR',
						'Opera 12.1' ]
			},
			dist : {
				files : [ {
					expand : true,
					cwd : '.tmp/styles/',
					src : '{,*/}*.css',
					dest : '.tmp/styles/'
				} ]
			}
		}
	});

	grunt.registerTask('default', [ 'clean', 'copy', 'useminPrepare',
			'autoprefixer', 'concat', 'uglify', 'cssmin', 'usemin' ]);
};