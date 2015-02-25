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
  asset: 'resources/assets',
  build: 'public/build/resources',
  html: 'resources/html',
  vendor: 'vendor/bower_components',
  web: 'public/resources'
};

elixir(function(mix) {
  mix.sass('app.scss', dir.web+'/css');
  mix.coffee('app.coffee', dir.web+'/js');

  mix.copy(dir.vendor+'/jquery/dist/jquery.min.js', dir.web+'/js/vendor/jquery.min.js')
    .copy(dir.vendor+'/jquery/dist/jquery.min.map', dir.web+'/js/vendor/jquery.min.map')
    .copy(dir.vendor+'/bootstrap-sass-official/assets/javascripts/bootstrap.js', dir.web+'/js/vendor/bootstrap.js')
    .copy(dir.vendor+'/font-awesome/fonts', dir.web+'/fonts')
    .copy(dir.html+'/fonts', dir.web+'/fonts')
    .copy(dir.html+'/img', dir.web+'/img')
    .copy(dir.asset+'/js/prettify.js', dir.web+'/js/vendor/prettify.js')
    .copy(dir.asset+'/css/prettify/gloom-contrast.css', dir.web+'/css/vendor/prettify.css');

  mix.styles([
      'app.css',
      'vendor/prettify.css'
    ], dir.web+'/css/all.css', dir.web+'/css');

  mix.scripts([
      'vendor/jquery.min.js',
      'vendor/bootstrap.js',
      'vendor/prettify.js',
      'app.js'
    ], dir.web+'/js/all.js', dir.web+'/js');

  mix.version([dir.web+'/css/all.css', dir.web+'/js/all.js']);
});
