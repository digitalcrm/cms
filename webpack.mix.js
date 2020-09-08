const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .js('resources/js/status_toggle.js','public/ajax/js')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();


