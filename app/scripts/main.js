function coffeeCounter(){function e(){i.trigger.addEventListener("click",t)}function t(){a||window.innerWidth<1160||(o(i.container,10),n(),a=1)}function n(){c!=r&&(i.cc.innerText=c+=1,setTimeout(n,s))}function o(e,t){var n=parseFloat(e.style.opacity);return n>=1||"NaN"==n?!1:(n+=.1,e.style.opacity=n,setTimeout(function(){o(e,t)},t),!0)}var i={container:document.getElementById("js-coffee-counter"),cc:document.getElementById("js-coffee-counter__value"),trigger:document.getElementById("js-coffee-counter__trigger")},c=0,r=28,s=50,a=0;e()}function emailInjection(){var e=this;e.inject=function(e,t){for(var n=t.join(""),o=document.getElementsByClassName(e),i=0,c=o.length;c>i;++i)o[i].href=n}}function smoothScroll(){function e(e){var n=this.href.split("#")[1];if(e.preventDefault(),""!==n&&"undefined"!=typeof n){var o=document.getElementById(n.replace("#",""));"undefined"!=typeof o&&t(o)}}function t(e){var t=e.offsetTop;n(t)}function n(e){if(window.clearTimeout(c.timer),!(window.scrollY>=e)){var t=window.scrollY;t+=10,c.timer=setTimeout(function(){return window.scrollTo(0,t),n(e)},3)}}var o=this,i=document.getElementsByClassName("js-scrollTo"),c={timer:null};o.init=function(){for(var t=0,n=i.length;n>t;++t)i[t].addEventListener("click",e)}}function detection(){var e=document.getElementsByTagName("body")[0];e.className+="ontouchstart"in window||navigator.MaxTouchPoints>0||navigator.msMaxTouchPoints>0?" js-touch":" js-not-touch",e.className=e.className.trim()}detection(),e=new emailInjection,e.inject("js-email-address",["mailTo:","t.0m","@","icloud",".","com"]),ss=new smoothScroll,ss.init(),new coffeeCounter;