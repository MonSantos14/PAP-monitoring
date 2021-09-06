/*!
 * Start Bootstrap - Simple Sidebar v6.0.2 (https://startbootstrap.com/template/simple-sidebar)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
//
// Scripts
//

window.addEventListener("DOMContentLoaded", (event) => {
    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector("#sidebarToggle");
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener("click", (event) => {
            event.preventDefault();
            document.body.classList.toggle("sb-sidenav-toggled");
            localStorage.setItem(
                "sb|sidebar-toggle",
                document.body.classList.contains("sb-sidenav-toggled")
            );
        });
    }
});

jQuery(document).ready(function ($) {
    /*clickable rows in table*/
    $(".clickable-row").click(function () {
        window.location = $(this).data("href");
    });

    //input file

    $(".inputFile").on("change", function () {
        var dataId = "#" + $(this).attr("name");
        $(dataId).html(this.files[0].name);

        if (dataId == "#fileInputPic") {
            $(".file-upload").addClass("picexist");
            $("#facultyPic").attr(
                "src",
                URL.createObjectURL(event.target.files[0])
            );
        }

        if (this.files[0].name != "") {
            $("#submitBtn").attr("aria-disabled", "false");
        }
    });
});

// Password Hide and Unhide Value
$(document).ready(function () {
    $("#InputConfirmPassword a").on("click", function (event) {
        event.preventDefault();
        if ($("#InputConfirmPassword input").attr("type") == "text") {
            $("#InputConfirmPassword input").attr("type", "password");
            $("#InputConfirmPassword i").addClass("fa-eye-slash");
            $("#InputConfirmPassword i").removeClass("fa-eye");
        } else if (
            $("#InputConfirmPassword input").attr("type") == "password"
        ) {
            $("#InputConfirmPassword input").attr("type", "text");
            $("#InputConfirmPassword i").removeClass("fa-eye-slash");
            $("#InputConfirmPassword i").addClass("fa-eye");
        }
    });

    $("#InputNewPassword a").on("click", function (event) {
        event.preventDefault();
        if ($("#InputNewPassword input").attr("type") == "text") {
            $("#InputNewPassword input").attr("type", "password");
            $("#InputNewPassword i").addClass("fa-eye-slash");
            $("#InputNewPassword i").removeClass("fa-eye");
        } else if ($("#InputNewPassword input").attr("type") == "password") {
            $("#InputNewPassword input").attr("type", "text");
            $("#InputNewPassword i").removeClass("fa-eye-slash");
            $("#InputNewPassword i").addClass("fa-eye");
        }
    });

    $("#InputCurrentPassword a").on("click", function (event) {
        event.preventDefault();
        if ($("#InputCurrentPassword input").attr("type") == "text") {
            $("#InputCurrentPassword input").attr("type", "password");
            $("#InputCurrentPassword i").addClass("fa-eye-slash");
            $("#InputCurrentPassword i").removeClass("fa-eye");
        } else if (
            $("#InputCurrentPassword input").attr("type") == "password"
        ) {
            $("#InputCurrentPassword input").attr("type", "text");
            $("#InputCurrentPassword i").removeClass("fa-eye-slash");
            $("#InputCurrentPassword i").addClass("fa-eye");
        }
    });
});

//Popover
$(function () {
    $('[data-toggle="popover"]')
        .popover({ trigger: "manual", html: true, animation: false })

        .on("mouseenter", function () {
            var _this = this;
            $(this).popover("show");
            $(".popover").on("mouseleave", function () {
                $(_this).popover("hide");
            });
        })
        .on("mouseleave", function () {
            var _this = this;
            setTimeout(function () {
                if (!$(".popover:hover").length) {
                    $(_this).popover("hide");
                }
            }, 300);
        });
});

function injectJS() {
    var frame = $("iframe");
    var contents = frame.contents();
    var body = contents.find("body").attr("oncontextmenu", "return false");
    document.addEventListener("contextmenu", (event) => event.preventDefault());
}
