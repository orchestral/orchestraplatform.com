(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
'use strict';

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

var _utilBootstrapEs6 = require('./util/Bootstrap.es6');

var _utilBootstrapEs62 = _interopRequireDefault(_utilBootstrapEs6);

new _utilBootstrapEs62['default']();

},{"./util/Bootstrap.es6":2}],2:[function(require,module,exports){
'use strict';

Object.defineProperty(exports, '__esModule', {
  value: true
});

var _createClass = (function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ('value' in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; })();

function _interopRequireDefault(obj) { return obj && obj.__esModule ? obj : { 'default': obj }; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError('Cannot call a class as a function'); } }

var _vendorJquery = require('../vendor/jquery');

var _vendorJquery2 = _interopRequireDefault(_vendorJquery);

var _vendorUnderscore = require('../vendor/underscore');

var _vendorUnderscore2 = _interopRequireDefault(_vendorUnderscore);

var Bootstrap = (function () {
  function Bootstrap() {
    var _this = this;

    _classCallCheck(this, Bootstrap);

    (0, _vendorJquery2['default'])(function () {
      return _this.onDocumentReady();
    });
    (0, _vendorJquery2['default'])(window).ready(function () {
      return _this.onWindowReady();
    });
  }

  _createClass(Bootstrap, [{
    key: 'onDocumentReady',
    value: function onDocumentReady() {
      (0, _vendorJquery2['default'])(function () {
        (0, _vendorJquery2['default'])('pre').addClass('prettyprint');
        (0, _vendorJquery2['default'])('table', '#documentation, #posts, #post').addClass('table table-striped');
      });
    }
  }, {
    key: 'onWindowReady',
    value: function onWindowReady() {
      (0, _vendorJquery2['default'])('h2, h3, h4, h5', '.page-content').each(function (key, el) {
        var object = (0, _vendorJquery2['default'])(el);

        object.on('click', function (e) {
          e.preventDefault();

          var current = (0, _vendorJquery2['default'])(this);
          var name = current.attr('id');

          if (_vendorUnderscore2['default'].isUndefined(name)) {
            name = current.prev().children().eq(0).attr('name');
          }

          if (!_vendorUnderscore2['default'].isUndefined(name)) {
            window.location.hash = name;
          }
        });
      });
    }
  }]);

  return Bootstrap;
})();

exports['default'] = Bootstrap;
module.exports = exports['default'];

},{"../vendor/jquery":3,"../vendor/underscore":4}],3:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = jQuery;
module.exports = exports["default"];

},{}],4:[function(require,module,exports){
"use strict";

Object.defineProperty(exports, "__esModule", {
  value: true
});
exports["default"] = _;
module.exports = exports["default"];

},{}]},{},[1]);
