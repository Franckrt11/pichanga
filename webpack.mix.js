const mix = require('laravel-mix');

mix.sass('resources/styles/admin/index.scss', 'public/css/admin.css')
    .sass('resources/styles/login/index.scss', 'public/css/login.css')
    .js('resources/scripts/login/index.js', 'public/js/login.js')
    .ts('resources/scripts/admin/index.ts', 'public/js/admin.js')
    .copyDirectory('resources/images', 'public/images')
    .options({processCssUrls: false});
