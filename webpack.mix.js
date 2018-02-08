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
//mix.autoload({
//  jquery: ['$', 'window.jQuery', 'jQuery']
//});

mix.js('resources/assets/js/bootstrap.js', 'public/js/bootstrap')
	.js('node_modules/node-waves/src/js/waves.js', 'public/js')
    .sass('resources/assets/sass/bootstrap.scss', 'public/css/bootstrap')
    .sass('resources/assets/sass/admin/admin.scss', 'public/css/admin')
    .sass('resources/assets/sass/admin/mdb.scss', 'public/css/admin');