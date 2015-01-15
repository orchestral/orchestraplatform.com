var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

var dir = {
  web: 'public',
  html: 'resources/html',
  vendor: 'vendor/bower_components'
};

elixir(function(mix) {
  mix.less('app.less')
    .copy(dir.vendor+'/jquery/dist/jquery.min.js', dir.web+'/js/vendor')
    .copy(dir.vendor+'/jquery/dist/jquery.min.map', dir.web+'/js/vendor')
    .copy(dir.vendor+'/bootstrap/dist/css/bootstrap.min.css', dir.web+'/css/vendor')
    .copy(dir.vendor+'/bootstrap/dist/js/bootstrap.min.js', dir.web+'/js/vendor')
    .copy(dir.vendor+'/font-awesome/css/font-awesome.min.css', dir.web+'/css/vendor')
    .copy(dir.vendor+'/font-awesome/fonts/*', dir.web+'/css/fonts')
    .copy(dir.html+'/fonts/*', dir.web+'/css/fonts')
    .copy(dir.html+'/img/*', dir.web+'/img');
});
