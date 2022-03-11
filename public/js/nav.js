/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/nav.js ***!
  \*****************************/
$(document).ready(function () {
  $(".nav-right-toggler").click(function () {
    var navRight = $(".nav-right");
    $(navRight).toggleClass("show");
    $(".nav-right-toggler .customMenu").toggleClass("opened");
    $('.nav-right .btns').toggleClass("show");
    $('.nav-right .btns a.loginBtn').toggleClass("show");
    $('.nav-right .btns a.registerBtn').toggleClass("show");
  });
});
/******/ })()
;