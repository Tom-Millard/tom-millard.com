function coffeeCounter(){function e(){c.trigger.addEventListener("click",t)}function t(){s||window.innerWidth<1160||(o(c.container,10),n(),s=1)}function n(){r!=a&&(c.cc.innerText=r+=1,setTimeout(n,u))}function o(e,t){var n=parseFloat(e.style.opacity);return n>=1||"NaN"==n?!1:(n+=.1,e.style.opacity=n,setTimeout(function(){o(e,t)},t),!0)}function i(){var e=864e5,t=new Date(2015,5,12),n=new Date;return diffDays=Math.round(Math.abs((t.getTime()-n.getTime())/e))}var c={container:document.getElementById("js-coffee-counter"),cc:document.getElementById("js-coffee-counter__value"),trigger:document.getElementById("js-coffee-counter__trigger")},r=0,a=3*i(),u=50,s=0;e()}function emailInjection(){var e=this;e.inject=function(e,t){for(var n=t.join(""),o=document.getElementsByClassName(e),i=0,c=o.length;c>i;++i)o[i].href=n}}function smoothScroll(){function e(e){var n=this.href.split("#")[1];if(e.preventDefault(),""!==n&&"undefined"!=typeof n){var o=document.getElementById(n.replace("#",""));"undefined"!=typeof o&&t(o)}}function t(e){var t=e.offsetTop;n(t)}function n(e){if(window.clearTimeout(c.timer),!(window.scrollY>=e)){var t=window.scrollY;t+=10,c.timer=setTimeout(function(){return window.scrollTo(0,t),n(e)},3)}}var o=this,i=document.getElementsByClassName("js-scrollTo"),c={timer:null};o.init=function(){for(var t=0,n=i.length;n>t;++t)i[t].addEventListener("click",e)}}function detection(){var e=document.getElementsByTagName("body")[0];e.className+="ontouchstart"in window||navigator.MaxTouchPoints>0||navigator.msMaxTouchPoints>0?" js-touch":" js-not-touch",e.className=e.className.trim()}detection(),e=new emailInjection,e.inject("js-email-address",["mailTo:","t.0m","@","icloud",".","com"]),new coffeeCounter;