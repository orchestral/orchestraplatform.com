var dir, elixir = require('laravel-elixir');

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

dir = {
  asset: {
    css: 'public/css',
    img: 'public/img',
    js: 'public/js',
    font: 'public/fonts'
  },
  resources: 'resources/assets',
  vendor: 'vendor/bower_components'
};

elixir(function (mix) {
  mix.sass('app.scss', dir.resources+'/css', {
    includePaths: [dir.vendor+'/']
  });


  mix.coffee('app.coffee', dir.resources+'/js');

  mix.copy(dir.vendor+'/jquery/dist/jquery.min.js', dir.resources+'/js/vendor/jquery.js')
    .copy(dir.vendor+'/underscore/underscore-min.js', dir.resources+'/js/vendor/underscore.js')
    .copy(dir.vendor+'/javie/dist/javie.min.js', dir.resources+'/js/vendor/javie.js')
    .copy(dir.vendor+'/vue/dist/vue.min.js', dir.resources+'/js/vendor/vue.js')
    .copy(dir.vendor+'/bootstrap-sass/assets/javascripts/bootstrap.min.js',  dir.resources+'/js/vendor/bootstrap.js')
    .copy(dir.vendor+'/bootstrap-sass/assets/fonts/bootstrap', dir.asset.font)
    .copy(dir.vendor+'/font-awesome/fonts', dir.asset.font)
    .copy(dir.resources+'/img', dir.asset.img);

  mix.styles([
    'app.css',
    'vendor/prettify.css'
  ]);

  mix.scripts([
    'vendor/vue.js',
    'vendor/jquery.js',
    'vendor/underscore.js',
    'vendor/javie.js',
    'vendor/bootstrap.js',
    'vendor/prettify.js',
    'app.js'
  ]);

  mix.version([dir.asset.css+'/all.css', dir.asset.js+'/all.js']);
});
