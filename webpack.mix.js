const { mix } = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css')
    // .copy('resources/assets/lib/css/*', 'public/css')
    .copy('resources/assets/lib/js/*', 'public/js')
    .copy('node_modules/animate.css/animate.min.css', 'public/css')
    .copy('node_modules/snackbarjs/dist/snackbar.min.css', 'public/css')
    .copy('node_modules/snackbarjs/dist/snackbar.min.js', 'public/js')
    .styles(['resources/assets/lib/css/toolkit-inverse.css'], 'public/css/libraries.css')
    .version();
