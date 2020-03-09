/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

try {
    window.$ = window.jQuery = require("jquery");

    require("jquery-ui");
    require("bootstrap");
    require("admin-lte");
    require("select2");
    require("jquery-ui/ui/widgets/sortable");
    require("jquery-ui/ui/widgets/datepicker");
    require("jquery-ui/ui/widgets/autocomplete");
} catch (e) { }

const token = document.head.querySelector('meta[name="csrf-token"]');

$(".thd-alerts-messages")
    .fadeTo(3000, 500)
    .slideUp(500, function () {
        $(".thd-alerts-messages").slideUp(500);
    });

$(function () {
    $(".delete-file").on("click", function (e) {
        e.preventDefault();
        $(this)
            .parent()
            .parent()
            .find("input[type='file']")
            .removeClass("hidden");
        $(this)
            .parent()
            .hide();
    });
});

const infoBlock = document.createElement("div");
infoBlock.classList.add("doka-info");

const doka = Doka.create();
doka.setOptions({ cropShowSize: true });

document.querySelector("body").addEventListener("click", e => {
    if (e.target.classList.contains("edit-img")) {
        e.preventDefault();

        const elem = e.target;
        const img = elem.querySelector("img");
        const imgUrl = img.getAttribute("src");
        const originUrl = $(img).data("origin");
        if (originUrl.length) {
            doka.edit(originUrl).then(output => {
                let formData = new FormData();
                formData.append("image", output.file);
                formData.append("src", imgUrl);
                $.ajax({
                    method: 'POST',
                    url: `/admin-dwhp/upload-image`,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    data: formData,
                }).done(function (data) {
                    if (data.success == "ok") {
                        img.setAttribute("src", imgUrl + "?rnd=" + Math.random());
                    }
                }).fail(function () {
                    alert('Something went wrong!');
                });
            });
        }
    }
});

function setInfo(info) {
    infoBlock.innerText =
        "Size: " +
        Number(info.width.toFixed(2)) +
        "px x " +
        Number(info.height.toFixed(2)) +
        "px";
}
