!function(t){var o={};function r(e){var n;return(o[e]||(n=o[e]={i:e,l:!1,exports:{}},t[e].call(n.exports,n,n.exports,r),n.l=!0,n)).exports}r.m=t,r.c=o,r.d=function(e,n,t){r.o(e,n)||Object.defineProperty(e,n,{enumerable:!0,get:t})},r.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},r.t=function(n,e){if(1&e&&(n=r(n)),8&e)return n;if(4&e&&"object"==typeof n&&n&&n.__esModule)return n;var t=Object.create(null);if(r.r(t),Object.defineProperty(t,"default",{enumerable:!0,value:n}),2&e&&"string"!=typeof n)for(var o in n)r.d(t,o,function(e){return n[e]}.bind(null,o));return t},r.n=function(e){var n=e&&e.__esModule?function(){return e.default}:function(){return e};return r.d(n,"a",n),n},r.o=function(e,n){return Object.prototype.hasOwnProperty.call(e,n)},r.p="",r(r.s=2)}([,,function(e,n,t){"use strict";t.r(n);t(3);jQuery(document).ready(function(){function e(){var r=i(".devnet_fsl-free-shipping").not(".notice-bar"),c=r.hasClass("qualified-message"),e=i("body").hasClass("woocommerce-cart");i("body").hasClass("woocommerce-checkout"),r.parents(".widget_shopping_cart").length,e&&0!==r.parents(".cart-content-wrapper").length||i.ajax({type:"get",url:n.ajaxurl,data:{action:"fsl_update_progress_bar"},beforeSend:function(){},success:function(e){e=e||'<div class="devnet_fsl-free-shipping fsl-flat"></div>';var n=(new DOMParser).parseFromString(e,"text/html"),t=i(n).find(".qualified-message").length;if(t||c&&!t)return r.replaceWith(e),!1;var t=i(n).find(".fsl-title").html(),o=i(n).find(".fsl-notice").html(),n=i(n).find(".fsl-progress-amount").attr("style");r.find(".fsl-title").html(t),r.find(".fsl-notice").html(o),r.find(".fsl-progress-amount").attr("style",n),r.replaceWith(e)}})}var i=jQuery,n=devnet_fsl_ajax,t={showing:!1};

i(document).on("fsl",".fsl",function(e){})})},function(e,n,t){}]);