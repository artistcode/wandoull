Fengs.add("common/utils",function(e,r,t){{var n=this;n.document}e.jsonToStr||(e.jsonToStr=function(e){var r=[],t=arguments.callee,a=function(e){return"object"==typeof e&&null!=e?t(e):/^(string)$/.test(typeof e)?'"'+e+'"':e};if("[object Array]"===n.Object.prototype.toString.call(e)){for(var o in e)r.push(a(e[o]));return"["+r.join(",")+"]"}for(var o in e)r.push('"'+o+'":'+a(e[o]));return"{"+r.join(",")+"}"},e.parseUri=function(e,r){e=e?e:n.location.href,r=r||"?";var t="?"===r?"#":"?",a={};if(r=e.indexOf(r),t=e.indexOf(t),r>=0){r++,e=e.substr(r,t>r?t-r:e.length),e=e.split("&");for(var o=0;o<e.length;o++){var c=e[o].match(/^([\S]*)\=([\S]*)$/);null!==c&&(a[c[1]]=c[2])}}return a},e.moveDrop=function(e,t){var a,o,c,i,s=n.top.document,u=t||r(s),l=this,f=l.width(),p=function(e){return e.pageX||e.pageY?{x:e.pageX,y:e.pageY}:{x:e.clientX+s.body.scrollLeft-s.body.clientLeft,y:e.clientY+s.body.scrollTop-s.body.clientTop}},d=function(e){e=e||event;var r=p(e),t=s.body.clientWidth,n=c+r.x-a,u=i+r.y-o;u=u>600?600:u,u=0>u?0:u,n=n>t-f?t-f:n,n=0>n?0:n,l.css({left:n,top:u}),e.stopPropagation()};u.on("mouseup",function(){u.off("mousemove",d),l.css("opacity",1)}),r(e,l).on("mousedown",function(e){e=e||event;var r=p(e);return a=r.x,o=r.y,c=n.parseInt(l.css("left")),i=n.parseInt(l.css("top")),u.on("mousemove",d),l.css("opacity",.8),!1})},e.test=function(e,r){if(null==e||""==e||null==r||""==r)return!1;var t;switch(r){case"decimal":t=/^-?\d+(\.\d+)?$/g;break;case"int":t=/^[-+]?\d*$/;break;case"email":t=/[A-Za-z0-9_-]+[@](\S*)([A-Za-z0-9_-])(\S*)/g;break;case"mobile":t=/^1([3,5,8]\d|4[5,7])\d{8}$/g;break;case"areacode":t=/^0(10|2\d|[3-9]\d{2})$/g;break;case"phone":t=/^0(10\d{8}|2\d{9}|[3-9]\d{9,10})$/g;break;case"qq":t=/^\d{5,10}$/;break;case"ip":t=/^(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])$/;break;case"url":t=/[http(s)?:\/\/]([\w-]+\.)+[\w-]+(\/[\w- .\/?%&=]*)?/;break;case"domain":t=/^(https?:\/\/)?([a-z0-9\-]([a-z0-9\-]*[\.])+([a-z]{2,6}|aero|arpa|biz|com|coop|edu|gov|info|int|jobs|mil|museum|name|nato|net|org|pro|travel)|(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]))(\/)?$/;break;case"number":t=/^[-+]?\d*$/;break;case"letter":t=/^[a-zA-Z]\w*$/;break;case"alphanumeric":t=/\w/;break;case"username":t=/^[a-z][a-zA-Z0-9\_]+$/;break;case"chinese":t=/[\u4E00-\u9FFF]/;break;default:return!0}return null==e.match(t)?!1:!0},e.refreshPage=function(){n.location.href=n.location.href.replace(/\#([\s\S]+)?$/gi,"")},e.forEach=function(e,r){if(r&&"function"==typeof r)for(var t=0,n=e.length;n>t;t++)r(e[t],t)},e.inArray=function(e,r){for(var t=0,n=r.length;n>t;t++)if(r[t]==e)return t;return-1},e.clone=function(e){var r,a=function(e){return null===e?"Null":e===t?"Undefined":n.Object.prototype.toString.call(e).slice(8,-1)},o=arguments.callee,c=a(e);"Object"===c?r={}:"Array"===c&&(r=[]);for(key in e){var i=e[key],c=a(i);r[key]="Object"===c?o(i):"Array"===c?o(i):i}return r},e.trim=function(e){return"string"!=typeof e?e:e.replace(/(^[\s]+)|([\s]+)$/gi,"")},e.json=function(e){var r={};if("string"==typeof e)try{r=n.JSON?n.JSON.parse(e):n.eval.apply("("+e+")")}catch(t){}else try{for(var a=0,o=e.length;o>a;a+=2)r[e[a]]=e[a+1]}catch(t){}return r})});