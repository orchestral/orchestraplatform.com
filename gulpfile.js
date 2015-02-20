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
  build: 'public/build/resources',
  html: 'resources/html',
  vendor: 'vendor/bower_components',
  web: 'public/resources'
};

elixir(function(mix) {
  mix.less('app.less', dir.web+'/css')
    .copy(dir.vendor+'/jquery/dist/jquery.min.js', dir.web+'/js/vendor/jquery.min.js')
    .copy(dir.vendor+'/jquery/dist/jquery.min.map', dir.web+'/js/vendor/jquery.min.map')
    .copy(dir.vendor+'/bootstrap/dist/css/bootstrap.css', dir.web+'/css/vendor/bootstrap.css')
    .copy(dir.vendor+'/bootstrap/dist/js/bootstrap.js', dir.web+'/js/vendor/bootstrap.js')
    .copy(dir.vendor+'/font-awesome/css/font-awesome.css', dir.web+'/css/vendor/font-awesome.css')
    .copy(dir.vendor+'/font-awesome/fonts', dir.web+'/css/fonts')
    .copy(dir.html+'/fonts', dir.web+'/css/fonts')
    .copy(dir.html+'/img', dir.web+'/img')
    .styles([
      'vendor/bootstrap.css',
      'app.css'
    ], dir.web+'/css/all.css', dir.web+'/css')
    .scripts([
      'vendor/jquery.min.js',
      'vendor/bootstrap.js'
    ], dir.web+'/js/all.js', dir.web+'/js')
    .version([dir.web+'/css/all.css', dir.web+'/js/all.js']);
});
