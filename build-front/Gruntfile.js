module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        svgstore: {
            logos: {
                files: {
                    //'app-assets/images/svg-images-sprite.svg': 'src/images-svg/*.svg'
                    //use like <span class="svg-image logo"><svg preserveAspectRatio="xMidYMid" focusable="false"><use xlink:href="/app-assets/images/svg-images-sprite.svg#bihus-logo"></use></svg></span>
                }
            }
        },

        bake: {
            your_target: {
                options: {
                    // Task-specific options go here.
                },

                files: {
                   // "index.html": "src/html/index.html",
                    
                }
            }
        },

        sass: {
            options: {
                precision: 6,
                sourcemap: 'auto',
                sourceComments: 'true',
                style: 'expanded',
                trace: true,
                bundleExec: true
            },
            main: {
                files: {
                    'app-assets/css/bootstrap.css': 'app-assets/scss/bootstrap.scss',
                }
            },

        },

        watch: {
            grunt: {
                files: ['Gruntfile.js']
            },

            svgstore: {
                files: [
                    'src/images-svg/*.svg'
                ],
                tasks: [ 'svgstore']
            },

            bake: {
                files: [
                    'src/html/**/*.html'
                ],
                tasks: ['bake']
            },

            sass: {
                files: [
                    'app-assets/scss/**/*.scss',
                    'assets/scss/**/*.scss'
                ],
                tasks: ['sass']
            }
        },

        browserSync: {
            bsFiles: {
                src : [
                    'assets/css/**/*.css',
                    'app-assets/css/**/*.css',
                    './*.html',
                    'app-assets/js/**/*.js',
                    'assets/js/**/*.js'
                ]
                },
            options: {
                watchTask: true,
                server: './'
            }
        }

    });

    // load npm modules
    grunt.loadNpmTasks('grunt-bake');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-svgstore');

    grunt.registerTask('default', ['svgstore', 'bake', 'sass:main', 'sass:core', 'sass:pages', 'sass:plugins', 'browserSync', 'watch']);
};
