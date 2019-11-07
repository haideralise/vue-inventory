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
var modulesPath = 'resources/js/modules/';
var modules = [
    'vendors'
];

modules.forEach(function (module, index) {
    mix.js(`${modulesPath}/${module}/index.js`, `public/js/${module}.js`)
});

mix.sass('resources/sass/app.scss', 'public/css')
.styles([
        'node_modules/open-sans-all/css/open-sans.css',
        'node_modules/font-awesome/css/font-awesome.css',
         'resources/css/style.css'
        ], 'public/css/style.css')
    .copy('node_modules/open-sans-all/fonts', 'public/fonts')
    .copy('node_modules/font-awesome/fonts', 'public/fonts')
    .copy('resources/images', 'public/images');


