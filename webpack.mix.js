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
   .sass('resources/sass/app.scss', 'public/css');

mix.sass('resources/sass/login.scss', 'public/css');

mix.sass('resources/sass/layout.scss', 'public/css');

mix.sass('resources/sass/register.scss', 'public/css');

mix.sass('resources/sass/profile.scss', 'public/css');

mix.sass('resources/sass/note.scss', 'public/css');

//mix.js('resources/js/noteFetch.js', 'public/js')