(function() {
  var $;

  $ = this.jQuery;

  $(function() {
    $('pre').addClass('prettyprint');
    return $('table', '#documentation, #posts, #post').addClass('table table-striped');
  });

}).call(this);
