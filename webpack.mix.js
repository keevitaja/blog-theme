const { mix } = require('laravel-mix');

mix.js('resources/assets/js/app.js', 'compiled')
    .sass('resources/assets/sass/app.scss', 'compiled')
    .version();
