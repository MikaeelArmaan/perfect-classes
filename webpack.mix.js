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

// Compile the default Laravel assets
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

mix.copy('resources/views/frontend/assets/vendor/slick', 'public/assets/slick-carousel')
// Compile multiple custom frontend CSS files
mix.styles([
    'resources/views/frontend/assets/css/import_links.css',
    'resources/views/frontend/assets/vendor/bootstrap/css/bootstrap.css',
    'resources/views/frontend/assets/css/css.css',
    'resources/views/frontend/assets/vendor/select2/select2.css',
    'resources/views/frontend/assets/vendor/animate/animate.css',
    'resources/views/frontend/assets/vendor/select2/select2-bootstrap4.min.css',
    'resources/views/frontend/assets/vendor/slick/slick.css',
    'resources/views/frontend/assets/vendor/slick/slick-theme.css',
    'resources/views/frontend/assets/css/style.css',
    'resources/views/frontend/assets/css/responsive.css',
], 'public/assets/css/all-styles.css');

mix.styles([
    'node_modules/owl.carousel/dist/assets/owl.carousel.css',
    'node_modules/owl.carousel/dist/assets/owl.theme.default.css',
], 'public/assets/css/owl-carousel.css');

// Optionally, compile custom frontend JS files
mix.scripts([
    'resources/views/frontend/assets/vendor/jquery/jquery-3.2.1.min.js',
    'resources/views/frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js',
    'resources/views/frontend/assets/vendor/bootstrap/js/popper.js',
    'resources/views/frontend/assets/vendor/select2/select2.js',
    'resources/views/frontend/assets/vendor/slick/slick.js',
], 'public/assets/js/all-scripts.js')
.copy('resources/views/frontend/assets/images', 'public/assets/images');

mix.scripts([
    'node_modules/owl.carousel/dist/owl.carousel.min.js',
], 'public/assets/js/owl-carousel.js');

// Optionally, you can version your assets for cache busting
//if (mix.inProduction()) {
 mix.version();
//}