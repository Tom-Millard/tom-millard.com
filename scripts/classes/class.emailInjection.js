function emailInjection(){
	var t = this;

	t.inject = function(className, href){
		var h = href.join("")
		, 	e = document.getElementsByClassName(className)
		;

		for(var x = 0, xl = e.length; x<xl; ++x){
			e[x].href = h;
		}

		return;
	}
}