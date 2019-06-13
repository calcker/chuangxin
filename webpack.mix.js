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

mix.js('resources/js/appLogin.js', 'public/js').version()
   .js('resources/js/appPersonReg.js', 'public/js').version()
   .sass('resources/sass/app.scss', 'public/css').version()
   .sass('resources/sass/auth.scss', 'public/css').version();


mix.webpackConfig({
    resolve:{
        alias: {
        'vue-router$': 'vue-router/dist/vue-router.common.js'
        }
    }
});
