/*global module*/
module.exports = function(grunt) {

    'use strict';

    grunt.initConfig({

        browserify: {
            lexicon: {
                files: {
                    'lexicon/dist/js/lexicon-bundle.js': ['vendor/jadu/pulsar/js/lexicon/lexicon-index.js']
                },
                options: {
                    browserifyOptions: {
                        debug: true
                    },
                    transform: [
                        ['babelify', { presets: ['es2015'] } ],
                        ['aliasify', { global: true }]
                    ]
                }
            },
            dist: {
                files: {
                    'lexicon/dist/js/bundle.js': ['vendor/jadu/pulsar/js/index.js']
                },
                options: {
                    browserifyOptions: {
                        standalone: 'pulsar'
                    },
                    transform: [
                        ['babelify', { presets: ['es2015'] } ],
                        ['aliasify', { global: true }]
                    ]
                }
            }
        },

        sass: {
            dist: {
                options: {
                    outputStyle: 'compressed',
                    sourceMap: true,
                    includePaths: [
                        'node_modules/',
                        'public_html/jadu/pulsar/jadu/scss',
                        'vendor/jadu/pulsar/stylesheets',
                        'vendor/jadu/pulsar-fonts/src'
                    ]
                },
                files: [{
                    cwd:    'node_modules/jadu-pulsar/stylesheets/',
                    dest:   'lexicon/css/',
                    expand: true,
                    flatten: true,
                    ext:    '.css',
                    extDot: 'first',
                    src:    ['pulsar.scss']
                }]
            },
            lexicon: {
                options: {
                    outputStyle: 'nested',
                    sourceMap: true
                },
                files: [{
                    cwd: 'vendor/jadu/pulsar/stylesheets/lexicon/',
                    dest:   'lexicon/css/',
                    expand: true,
                    ext:    '.css',
                    extDot: 'first',
                    src:    '*.scss'
                }]
            }
        },

        autoprefixer: {
            dev: {
                options: {
                    browsers: ['last 2 versions', 'IE 10']
                },
                expand: true,
                src:    'lexicon/css/*.css'
            }
        },

        copy: {
            dist: {
                files: [{
                    expand: true,
                    cwd: 'vendor/jadu/pulsar',
                    src: [
                        'images/**/*',
                        'js/**/*'
                    ],
                    dest: 'lexicon/'
                }]
            },
            fonts: {
                files: [{
                    expand: true,
                    cwd: 'node_modules/font-awesome',
                    src: [
                        'fonts/**/*',
                    ],
                    dest: 'lexicon/css/font-awesome/'
                }]
            }
        },

    });

    grunt.registerTask('default', [
        'build'
    ]);

    grunt.registerTask('build', [
        'sass:dist',
        'sass:lexicon',
        'autoprefixer',
        'browserify:dist',
        'browserify:lexicon',
        'copy:dist',
        'copy:fonts'
    ]);

    require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);
};
