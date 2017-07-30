module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		concat: {
		    basic: {
				src: ['dev/js/app.js'],
				dest: 'dist/js/<%= pkg.name %>.js'
		    },
			extras: {
				options: {
					separator: ';'
				},
				src: ['dev/js/plugins/**/*.js'],
				dest: 'dist/js/plugins.js'
			},
		},
		uglify: {
			options: {
				banner: '/*! <%= pkg.name %> <%= grunt.template.today("dd-mm-yyyy") %> */\n'
			},
			dist: {
				files: {
					'dist/js/plugins.min.js': ['dist/js/plugins.js'],
					'dist/js/<%= pkg.name %>.min.js': ['dist/js/<%= pkg.name %>.js']
				}
			}
		},
		sass: {
			dist: {
				files: {
					'dist/css/<%= pkg.name %>.css' : 'dev/scss/default.scss'
				}
			}
		},
		watch: {
			css: {
				files: 'dev/scss/**/*.scss',
				tasks: ['sass']
			},
			js: {
				files: 'dev/js/**/*.js',
				tasks: ['concat', 'uglify']
			}
		},
		browserSync: {
            dev: {
                bsFiles: {
                    src : [
                        'dist/css/*.css',
                        'dist/js/*.js',
                        '*.php'
                    ]
                },
                options: {
                    watchTask: true,
		            proxy: "localhost",
		            host: "127.0.0.1"
                }
            }
        }
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-concat');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-browser-sync');

	grunt.registerTask('default',['browserSync' ,'watch']);
}