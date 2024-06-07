;(function() {
	document.addEventListener('DOMContentLoaded', function() {
		const ua = window.navigator.userAgent
		const isSamsung = /samsung|sec-|sm-/i.test(ua);
		const isIOS = /iphone|ipad/i.test(ua);
		const isAndroid = /android/i.test(ua);

		let device;

		if(isSamsung) {
			device = 'samsung-device';
		}
		else if(isIOS) {
			device = 'ios-device';
		}
		else if(isAndroid) {
			device = 'android-device';
		}
		else {
			device = 'desktop-device';
		}

		document.body.classList.add(device);
	})
})();
