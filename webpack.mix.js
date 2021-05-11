const mix = require('laravel-mix');
const dotenv = require("dotenv");

let env = dotenv.config().parsed;

require("laravel-mix-react-typescript-extension");

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
    .js('resources/js/documentation/index.js', 'js/documentation/index.js')
    .js('resources/js/documentation/login.js', 'js/documentation/login.js')
    //.js('resources/js/agreement.js', 'public/js')
    .sass('resources/sass/documentation/style.scss', 'public/css/documentation')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/admin.scss', 'public/css')
    .sass('resources/sass/admin_head.scss', 'public/css')
    .sass('resources/sass/main.scss', 'public/css')
    .sass('resources/sass/mobile.scss', 'public/css')
    .sass('resources/sass/styles.scss', 'public/css')
    .sass('resources/sass/style_parse.scss', 'public/css')
    .sass('resources/sass/util.scss', 'public/css')
    .reactTypeScript('resources/jsx/app.ts', 'public/jsx')
    .webpackConfig({
    watchOptions: {
        ignored: /public/
    }
});

if (env && !mix.inProduction()) {
    mix
        .browserSync({
            proxy: env.APP_URL,
            ui: false,
        })
        .sourceMaps()
        .disableNotifications();
}
