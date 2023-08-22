const mix = require('laravel-mix');

mix.sass('resources/styles/panel/index.scss', 'public/css/panel.css')
    .sass('resources/styles/login/index.scss', 'public/css/login.css')
    .js('resources/scripts/login/index.js', 'public/js/login.js')
    .ts('resources/scripts/panel/index.ts', 'public/js/panel.js')
    .copyDirectory('resources/images', 'public/images')
    .options({processCssUrls: false});
