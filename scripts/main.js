function detection(){
	var bodyClass = document.getElementsByTagName("body")[0];
	bodyClass.className += (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0)) ? " js-touch" : " js-not-touch";
	bodyClass.className = bodyClass.className.trim();
}

detection();

e = new emailInjection();
e.inject("js-email-address", ["mailTo:", "t.0m", "@", "icloud", ".", "com"]);

ss = new smoothScroll();
ss.init();

new coffeeCounter();