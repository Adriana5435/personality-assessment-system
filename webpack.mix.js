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

mix.options({
    fileLoaderDirs: {
        fonts: 'assets/fonts',
        images: 'assets/images'
    }
});

mix.js('resources/js/app.js', 'public/assets/js')
    .js('resources/js/adminlte.js', 'public/assets/js')
    .sass('resources/sass/app.scss', 'public/assets/css')
    .sass('resources/sass/app-ltr.scss', 'public/assets/css')
    .copy([
        'resources/images/head.png',
        'resources/images/logo.png'
    ], 'public/assets/images');
