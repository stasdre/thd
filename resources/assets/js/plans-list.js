const Handlebars = require("handlebars");
import { number_format } from "./helpers.js";

Handlebars.registerHelper("numberFormat", function (options) {
    return number_format(options.fn(this));
})

const source = document.getElementById("quickView-tpl").innerHTML;
const template = Handlebars.compile(source);

$(document).ready(function () {
    $("body").on('click', '.dwhp-like-plan', function (e) {
        e.preventDefault();
        const thisObj = $(this);
        const heartIcon = thisObj.find("i.fa-heart");
        const planId = thisObj.data('plan-id');
        $.ajax({
            method: 'POST',
            url: `/save-plan/${planId}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json"
        }).done(function (data) {
            if (data.status == "add") {
                heartIcon.removeClass('far');
                heartIcon.addClass('fa');
                heartIcon.addClass('dw-saved-plan');
            } else if (data.status == "del") {
                heartIcon.removeClass('dw-saved-plan');
                heartIcon.removeClass('fa');
                heartIcon.addClass('far');
            }
        }).fail(function (data) {
            if (data.status === 401) {
                window.location.href = "/register";
            }
        })
    });

    $(".dwhp-quick-view-plan").on('click', function (e) {
        e.preventDefault();
        const planId = $(this).data('plan-id');
        $.ajax({
            method: 'GET',
            url: `/get-plan-data/${planId}`,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        }).done(data => {
            const html = template(data);
            $("#quickView .modal-content").html(html);
            $("#quickView").modal("show");
        })
    })

});