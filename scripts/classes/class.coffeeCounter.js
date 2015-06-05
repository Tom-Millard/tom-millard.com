function coffeeCounter(){
	var _node = {
		container 	: document.getElementById("js-coffee-counter"),
		cc 			: document.getElementById("js-coffee-counter__value"),
		trigger 	: document.getElementById("js-coffee-counter__trigger")
	}
	, 	_coffee = 0
	,	_coffeeTotal = 28
	,	_delay = 50
	, 	_fired = 0
	;

	function init(){
		_node.trigger.addEventListener("click", displayCoffeeCounter);
	}

	function displayCoffeeCounter(){
		if(_fired || window.innerWidth < 1160) return;

		fadeIn(_node.container, 10);
		incrementCoffeeCounter();
		_fired = 1;
	}

	function incrementCoffeeCounter(){
		if(_coffee == _coffeeTotal) return;

		_node.cc.innerText = _coffee = _coffee + 1;
		setTimeout(incrementCoffeeCounter, _delay);

		return;
	}

	function fadeIn(node, speed){
		var currentOpacity = parseFloat(node.style.opacity); console.log(currentOpacity);

		if(currentOpacity >= 1 || currentOpacity == "NaN"){
			return false;
		}

		currentOpacity += 0.1;
		node.style.opacity = currentOpacity;

		setTimeout(function(){
			fadeIn(node, speed);
		}, speed);

		return true;
	}

	init();
}