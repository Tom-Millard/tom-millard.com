function smoothScroll(){
	var t = this
	, 	element = document.getElementsByClassName("js-scrollTo")
	,	options = { timer : null };

	t.init = function(){
		for(var x = 0, xl = element.length; x<xl; ++x){
			element[x].addEventListener("click", actionHandler);
		}
	}

	function actionHandler(evt){
		var href = this.href.split("#")[1];
		evt.preventDefault();

		if('' === href || typeof href == "undefined") return;

		var node = document.getElementById(href.replace("#", ""));
		if(typeof node != "undefined"){
			scrollToNode(node);
		}

		return;
	}

	function scrollToNode(node){
		var nodeOffset = node.offsetTop;
		action(nodeOffset);
		return;
	}

	function action(offset){
		window.clearTimeout( options.timer );
		if(window.scrollY >= offset) return;

		var x = window.scrollY;
		x = x + 10;

		options.timer = setTimeout(function(){
			window.scrollTo(0, x);
			return action(offset);
		}, 3);

		return;
	}
}