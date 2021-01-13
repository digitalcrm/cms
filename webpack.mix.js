const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/sass/home.scss', 'public/css')
    .sass('resources/sass/thankyou.scss', 'public/css')
    .sass('resources/sass/userprofile_custome.scss', 'public/css')
    .sass('resources/sass/bootstrap4.scss', 'public/css')
    .sass('resources/sass/fontawesome.scss', 'public/css')
    .sass('resources/sass/theme2-crousel.scss', 'public/css')
    .sass('resources/sass/theme2-custom.scss', 'public/css')
    .sass('resources/sass/star/star-rating.scss', 'public/css/star/')
    .sass('resources/sass/star/star-theme.scss', 'public/css/star/')
    .js('resources/js/home.js','public/js')
    .js('resources/js/status_toggle.js','public/ajax/js')
    .js('resources/js/bookingevent_toggle.js','public/ajax/js')
    .js('resources/js/fullcalendar.js','public/ajax/js')
    .js('resources/js/tinymce-custom.js','public/js')
    .js('resources/js/star/star-rating.js','public/js/star/')
    .js('resources/js/star/star-theme.js','public/js/star/')
    .js('resources/js/jquery.js','public/js')
    .js('resources/js/chartjs/chart-js.js','public/js/chartjs/')
    .js('node_modules/popper.js/dist/popper.js', 'public/js').sourceMaps();

// mix.browserSync('acl.test');

