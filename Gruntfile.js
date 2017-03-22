module.exports = function (grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        cssmin: {
            target: {
                files: [{
                        expand: true,
                        cwd: 'wp-content/themes/bandaid/css/',
                        src: ['**/*.css', '!*.min.css'],
                        dest: 'wp-content/themes/bandaid/build_css',
                        ext: '.min.css'
                    }]
            }
        },
        uglify: {
            files: {
                expand: true,
                cwd: 'wp-content/themes/bandaid/js/',
                src: ['**/*.js', '!*.min.js'],
                dest: 'wp-content/themes/bandaid/build_js/',
                ext: '.min.js'
            }
        },
        watch: {
            js: {files: 'wp-content/themes/bandaid/js/**/*.js', tasks: ['uglify']},
            css: {files: 'wp-content/themes/bandaid/css/**/*.css', tasks: ['cssmin']},
        },
        concat: {
            options: {              
                separator: ' '
            },
            js: {
                src: ['wp-content/themes/bandaid/build_js/scripts.min.js', 'wp-content/themes/bandaid/build_js/bootstrap.min.js', 'wp-content/themes/bandaid/build_js/modal.min.js', 'wp-content/themes/bandaid/build_js/custom/global-helpers.min.js', 'wp-content/themes/bandaid/build_js/custom/config-vars.min.js', 'wp-content/themes/bandaid/build_js/slick.min.js'], 
                dest: 'wp-content/themes/bandaid/build_js/custom/common.min.js'
            },
             css: {
                src: [
                    'wp-content/themes/bandaid/build_css/bootstrap.min.css',
                    'wp-content/themes/bandaid/build_css/menu.min.cs',                     
                    'wp-content/themes/bandaid/build_css/content.min.css', 
                    'wp-content/themes/bandaid/build_css/custom/general.min.css', 
                    'wp-content/themes/bandaid/build_css/modal.min.cs',                     
                    'wp-content/themes/bandaid/build_css/skeleton1200.min.cs',                     
                    'wp-content/themes/bandaid/build_css/slick.min.cs',                     
                    'wp-content/themes/bandaid/build_css/slick-theme.min.cs',                     
                    ], 
                dest: 'wp-content/themes/bandaid/build_css/common.min.css'
            }   
        },
        concat_css: {
            options: {},            
            all: {
                src: [
                    'wp-content/themes/bandaid/build_css/bootstrap.min.css',
                    'wp-content/themes/bandaid/build_css/content.min.css', 
                    'wp-content/themes/bandaid/build_css/custom/general.min.css', 
                    'wp-content/themes/bandaid/build_css/skeleton1200.min.cs',                     
                    'wp-content/themes/bandaid/build_css/menu.min.cs',                     
                    'wp-content/themes/bandaid/build_css/modal.min.cs',                     
                    'wp-content/themes/bandaid/build_css/slick.min.cs',                     
                    'wp-content/themes/bandaid/build_css/slick-theme.min.cs'
                    ], 
                dest: 'wp-content/themes/bandaid/build_css/common.min.css'
            }            
        }
    });

    // Load the plugin that provides the "concat" task.
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-concat-css');
    grunt.loadNpmTasks('grunt-contrib-watch');
    // Default task(s).
    grunt.registerTask('default', ['uglify', 'cssmin']);

};
