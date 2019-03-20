const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix
   .js('resources/js/app.js', 'public/js')
   .js('resources/js/uploader/uploader.init.js', 'public/js/uploader.min.js')
   .sass('resources/sass/app.scss', 'public/css')
   .styles([
        'resources/css/styles.css',
        'resources/css/styles.responsive.css'
    ], 'public/css/styles.min.css');
