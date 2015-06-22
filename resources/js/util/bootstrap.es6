import $ from '../vendor/jquery'
import _ from '../vendor/underscore'

class Bootstrap {
  constructor() {
    $(() => this.onDocumentReady());
    $(window).ready(() => this.onWindowReady());
  }

  onDocumentReady() {
    $(function () {
      $('pre').addClass('prettyprint');
      $('table', '#documentation, #posts, #post').addClass('table table-striped');
    });
  }

  onWindowReady() {
    $('h2, h3, h4, h5', '.page-content').each((key, el) => {
      let object = $(el);

      object.on('click', function (e) {
          e.preventDefault();

          let current = $(this);
          let name = current.attr('id');

          if (_.isUndefined(name)) {
              name = current.prev().children().eq(0).attr('name');
          }

          if (! _.isUndefined(name)) {
              window.location.hash = name;
          }
      });
    });
  }
}

export default Bootstrap
