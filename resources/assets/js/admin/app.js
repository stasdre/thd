
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    window.$ = window.jQuery = require('jquery');

    require('jquery-ui');
    require('bootstrap');
    require('admin-lte');
    require('select2');
    require('jquery-ui/ui/widgets/sortable');
    require('jquery-ui/ui/widgets/datepicker');
    require('jquery-ui/ui/widgets/autocomplete');
} catch (e) {}


let token = document.head.querySelector('meta[name="csrf-token"]');

$(".thd-alerts-messages").fadeTo(3000, 500).slideUp(500, function(){
    $(".thd-alerts-messages").slideUp(500);
});

$(function(){
    $(".delete-file").on('click', function(e){
        e.preventDefault();
        $(this).parent().parent().find(input[type="file"]).removeClass('hidden');
        $(this).parent().hide();
    });
});