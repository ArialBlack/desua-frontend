module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

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
                    '../themes/huloa/css/style.css': 'styles/scss/style.scss',
                }
            }
        },

        watch: {
            grunt: {
                files: ['Gruntfile.js']
            },

            sass: {
                files: [
                    'styles/scss/**/*.scss'
                ],
                tasks: ['sass']
            }
        },

        postcss: {
            options: {
                processors: [
                    require('autoprefixer')({browsers: ['last 2 versions', 'ie 10']})
                ]
            },
            dist: {
                src: '../themes/huloa/css/style.css'
            }
        }

    });

    // load npm modules
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-postcss');

    grunt.registerTask('default', ['sass:main', 'postcss', 'watch']);
};
