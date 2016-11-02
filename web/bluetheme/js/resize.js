//для IE <= 8
!window.addEventListener && (function (WindowPrototype, DocumentPrototype, ElementPrototype, addEventListener, removeEventListener, dispatchEvent, registry) {
	WindowPrototype[addEventListener] = DocumentPrototype[addEventListener] = ElementPrototype[addEventListener] = function (type, listener) {
		var target = this;

		registry.unshift([target, type, listener, function (event) {
			event.currentTarget = target;
			event.preventDefault = function () { event.returnValue = false };
			event.stopPropagation = function () { event.cancelBubble = true };
			event.target = event.srcElement || target;

			listener.call(target, event);
		}]);

		this.attachEvent("on" + type, registry[0][3]);
	};

	WindowPrototype[removeEventListener] = DocumentPrototype[removeEventListener] = ElementPrototype[removeEventListener] = function (type, listener) {
		for (var index = 0, register; register = registry[index]; ++index) {
			if (register[0] == this && register[1] == type && register[2] == listener) {
				return this.detachEvent("on" + type, registry.splice(index, 1)[0][3]);
			}
		}
	};

	WindowPrototype[dispatchEvent] = DocumentPrototype[dispatchEvent] = ElementPrototype[dispatchEvent] = function (eventObject) {
		return this.fireEvent("on" + eventObject.type, eventObject);
	};
})(Window.prototype, HTMLDocument.prototype, Element.prototype, "addEventListener", "removeEventListener", "dispatchEvent", []);



window.addEventListener('resize', windowResized);

function windowResized(event) {
    event.preventDefault();
    event.stopPropagation();

	if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {

		var mobile = 320;
		var pad = 768;

		var deviceWidth = (document.body.clientWidth < window.screen.width) ? document.body.clientWidth : window.screen.width;
		var deviceHeight = (document.body.clientHeight < window.screen.height) ? document.body.clientHeight : window.screen.height;

		var orientation = (deviceWidth > deviceHeight) ? 'landscape' : 'portrait';
		var dpt =  window.devicePixelRatio || Math.round(window.screen.availWidth / document.documentElement.clientWidth);
		if (dpt > 2) dpt = 1.5;

		var widthDPI = window.screen.width * dpt;
		//var heightDPI = window.screen.height * dpt;

		if (orientation == 'landscape') {
			document.getElementById('viewport').setAttribute('content', 'width=' + pad + ',  user-scalable=no');
		} else {
			if (widthDPI >= pad) {
				document.getElementById('viewport').setAttribute('content', 'width=' + pad + ',  user-scalable=no');
			} else {
				document.getElementById('viewport').setAttribute('content', 'width=' + mobile);
			}
		}

	}
}

window.dispatchEvent( new Event('resize') );
