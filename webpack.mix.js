const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/thankyou.scss', 'public/css')
    .sass('resources/sass/userprofile_custome.scss', 'public/css')
    .js('resources/js/home.js','public/js')
    .js('resources/js/status_toggle.js','public/ajax/js')
    .js('resources/js/bookingevent_toggle.js','public/ajax/js')
    .js('resources/js/fullcalendar.js','public/ajax/js')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();

mix.browserSync('acl.test');

