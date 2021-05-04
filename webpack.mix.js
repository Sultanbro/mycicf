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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/login.js', 'public/js')
    .js('resources/js/admin.js', 'public/js')
    .js('resources/js/mobile.js', 'public/js')
    //.js('resources/js/agreement.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
    .options({
        processCssUrls: false,
        hmrOptions: {
            host: '127.0.0.1',
            port: 8080
        }
    });
