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
  mix.less('app.less', dir.web+'/css');
  mix.coffee('app.coffee', dir.web+'/js');

  mix.copy(dir.vendor+'/jquery/dist/jquery.min.js', dir.web+'/js/vendor/jquery.min.js')
    .copy(dir.vendor+'/jquery/dist/jquery.min.map', dir.web+'/js/vendor/jquery.min.map')
    .copy(dir.vendor+'/bootstrap/dist/css/bootstrap.css', dir.web+'/css/vendor/bootstrap.css')
    .copy(dir.vendor+'/bootstrap/dist/js/bootstrap.js', dir.web+'/js/vendor/bootstrap.js')
    .copy(dir.vendor+'/font-awesome/css/font-awesome.css', dir.web+'/css/vendor/font-awesome.css')
    .copy(dir.vendor+'/font-awesome/fonts', dir.web+'/css/fonts')
    .copy(dir.html+'/fonts', dir.web+'/css/fonts')
    .copy(dir.html+'/img', dir.web+'/img');

  mix.styles([
      'vendor/bootstrap.css',
      'app.css'
    ], dir.web+'/css/all.css', dir.web+'/css');

  mix.scripts([
      'vendor/jquery.min.js',
      'vendor/bootstrap.js',
      'app.js'
    ], dir.web+'/js/all.js', dir.web+'/js');

  mix.version([dir.web+'/css/all.css', dir.web+'/js/all.js']);
});
