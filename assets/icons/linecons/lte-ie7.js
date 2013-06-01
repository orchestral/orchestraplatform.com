/* Load this script using conditional IE comments if you need to support IE 7 and IE 6. */

window.onload = function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon-1\'">' + entity + '</span>' + html;
	}
	var icons = {
			'icomoon-heart' : '&#xe000;',
			'icomoon-cloud' : '&#xe001;',
			'icomoon-star' : '&#xe002;',
			'icomoon-tv' : '&#xe003;',
			'icomoon-sound' : '&#xe004;',
			'icomoon-video' : '&#xe005;',
			'icomoon-trash' : '&#xe006;',
			'icomoon-user' : '&#xe007;',
			'icomoon-key' : '&#xe008;',
			'icomoon-search' : '&#xe009;',
			'icomoon-settings' : '&#xe00a;',
			'icomoon-camera' : '&#xe00b;',
			'icomoon-tag' : '&#xe00c;',
			'icomoon-lock' : '&#xe00d;',
			'icomoon-bulb' : '&#xe00e;',
			'icomoon-pen' : '&#xe00f;',
			'icomoon-diamond' : '&#xe010;',
			'icomoon-display' : '&#xe011;',
			'icomoon-location' : '&#xe012;',
			'icomoon-eye' : '&#xe013;',
			'icomoon-bubble' : '&#xe014;',
			'icomoon-stack' : '&#xe015;',
			'icomoon-cup' : '&#xe016;',
			'icomoon-phone' : '&#xe017;',
			'icomoon-news' : '&#xe018;',
			'icomoon-mail' : '&#xe019;',
			'icomoon-like' : '&#xe01a;',
			'icomoon-photo' : '&#xe01b;',
			'icomoon-note' : '&#xe01c;',
			'icomoon-clock' : '&#xe01d;',
			'icomoon-paperplane' : '&#xe01e;',
			'icomoon-params' : '&#xe01f;',
			'icomoon-banknote' : '&#xe020;',
			'icomoon-data' : '&#xe021;',
			'icomoon-music' : '&#xe022;',
			'icomoon-megaphone' : '&#xe023;',
			'icomoon-study' : '&#xe024;',
			'icomoon-lab' : '&#xe025;',
			'icomoon-food' : '&#xe026;',
			'icomoon-t-shirt' : '&#xe027;',
			'icomoon-fire' : '&#xe028;',
			'icomoon-clip' : '&#xe029;',
			'icomoon-shop' : '&#xe02a;',
			'icomoon-calendar' : '&#xe02b;',
			'icomoon-wallet' : '&#xe02c;',
			'icomoon-vynil' : '&#xe02d;',
			'icomoon-truck' : '&#xe02e;',
			'icomoon-world' : '&#xe02f;'
		},
		els = document.getElementsByTagName('*'),
		i, attr, html, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		attr = el.getAttribute('data-icon');
		if (attr) {
			addIcon(el, attr);
		}
		c = el.className;
		c = c.match(/icomoon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
};