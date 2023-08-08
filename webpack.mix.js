const mix = require('laravel-mix');

mix.js('public/js/app.js', 'public/js')  // Notez l'emplacement du fichier app.js
   .sass('resources/sass/app.scss', 'public/css')
   .sass('node_modules/bootstrap/scss/bootstrap.scss', 'public/css');
