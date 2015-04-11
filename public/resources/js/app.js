(function() {
  var $;

  $ = this.jQuery;

  $(function() {
    $('pre').addClass('prettyprint');
    return $('table', '#documentation, #posts, #single-post').addClass('table table-striped');
  });

}).call(this);

//# sourceMappingURL=app.js.map