module.exports = function (grunt) {
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        bowercopy: {
            options: {
                srcPrefix: 'bower_components',
                destPrefix: 'web/assets'
            },
            scripts: {
                files: {
                    'js/jquery.js': 'jquery/dist/jquery.js',
                    'js/bootstrap.js': 'bootstrap/dist/js/bootstrap.js',
                    'js/adminlte.js': 'admin-lte/js/AdminLTE/app.js',
                    'js/fullcalendar.js': 'admin-lte/js/plugins/fullcalendar/fullcalendar.js',
                    'js/bootstrap-datepicker.js': 'bootstrap-datepicker/js/bootstrap-datepicker.js',
                    'js/bootstrap-daterangepicker.js': 'bootstrap-daterangepicker/daterangepicker.js',
                    'js/moment.js': 'moment/min/moment-with-locales.min.js',
                    'js/highcharts.js': 'highcharts/highcharts.js',
                    'js/highcharts-exporting.js': 'highcharts/modules/exporting.js'
                }

            },
            stylesheets: {
                files: {
                    'css/bootstrap.css': 'bootstrap/dist/css/bootstrap.css',
                    'css/font-awesome.css': 'fontawesome/css/font-awesome.css',
                    'css/adminlte.css': 'admin-lte/css/AdminLTE.css',
                    'css/fullcalendar.css': 'admin-lte/css/fullcalendar/fullcalendar.css',
                    'css/bootstrap-datepicker.css': 'bootstrap-datepicker/css/datepicker3.css',
                    'css/bootstrap-daterangepicker.css': 'bootstrap-daterangepicker/daterangepicker-bs3.css'
                }
            },
            fonts: {
                files: {
                    'fonts': 'fontawesome/fonts'
                }
            }
        },
        cssmin : {
            bundled:{
                src: 'web/assets/css/bundled.css',
                dest: 'web/assets/css/bundled.min.css'
            }
        },
        uglify : {
            js: {
                files: {
                    'web/assets/js/bundled.min.js': ['web/assets/js/bundled.js']
                }
            }
        },
        concat: {
            options: {
                stripBanners: true
            },
            css: {
                src: [
                    'web/assets/css/bootstrap.css',
                    'web/assets/css/font-awesome.css',
                    'web/assets/css/adminlte.css',
                    'web/assets/css/bootstrap-datepicker.css',
                    'web/assets/css/bootstrap-daterangepicker.css',
                    'src/Jumph/Bundle/*/Resources/public/css/*.css'
                ],
                dest: 'web/assets/css/bundled.css'
            },
            js : {
                src : [
                    'web/assets/js/jquery.js',
                    'web/assets/js/bootstrap.js',
                    'web/assets/js/adminlte.js',
                    'web/assets/js/moment.js',
                    'web/assets/js/bootstrap-datepicker.js',
                    'web/assets/js/bootstrap-daterangepicker.js',
                    'src/Jumph/Bundle/*/Resources/public/js/*.js'
                ],
                dest: 'web/assets/js/bundled.js'
            }
        },
        copy: {
            images: {
                expand: true,
                cwd: 'src/Jumph/Bundle/*/Resources/public/images',
                src: '*',
                dest: 'web/assets/images/'
            },
            icheck: {
                expand: true,
                cwd: 'bower_components/admin-lte/css/iCheck',
                src: '**',
                dest: 'web/assets/css/iCheck'
            }
        }
    });

    grunt.loadNpmTasks('grunt-bowercopy');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-contrib-uglify');

    grunt.registerTask('default', ['bowercopy','copy', 'concat', 'cssmin', 'uglify']);
};