
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
    require('admin-lte');
} catch (e) {}


let token = document.head.querySelector('meta[name="csrf-token"]');

$(".thd-alerts-messages").fadeTo(5500, 500).slideUp(500, function(){
    $(".thd-alerts-messages").slideUp(500);
});