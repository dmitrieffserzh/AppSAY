let mix = require('laravel-mix');

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
    .js('resources/assets/js/components/comments.js', 'public/js/components')
    .js('resources/assets/js/components/jq_hotkeys.js', 'public/js/components')
    .js('resources/assets/js/components/wysiwyg.js', 'public/js/components')
    .sass('resources/assets/sass/app.scss', 'public/css');

// ADMIN
mix.js('resources/assets/js/admin.js', 'public/js')
    .sass('resources/assets/sass/admin.scss', 'public/css');

