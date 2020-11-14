/*Side menu
===================================*/
$(document).ready(function () {
    "use strict";
    $(".icon-bar").click(function () {
        $(".menu-links").toggleClass("in");
    });
});

/* Toggle Icon
==============================*/
$(document).ready(function () {
     "use strict";
     $(".toggle-icon").click(function () {
         $(".side-menu").toggleClass("side-menu-move");
         $(".page-content").toggleClass("page-content-move");
     });
});

/* Animation
==============================*/
$(window).on("load", function () {
    $('.login-register').addClass(' animated fadeInDown');
    $('.side-menu').addClass(' animated fadeInLeft');
    $('.top-header').addClass(' animated fadeInDown');
    $('.content').addClass(' animated fadeInUp');
});

/* DataTable
==============================*/
 $(document).ready(function () {
     "use strict";
     $('#datatable').DataTable();
     $('#datatableX').DataTable({
         "scrollX": true
     });
 });

/* Timer Counter
===============================*/
var v_count = '0';
$(document).ready(function () {
    'use strict';
    $('.timer').each(function () {
        var imagePos = $(this).offset().top,
            topOfWindow = $(window).scrollTop();
        if (imagePos < topOfWindow + 500 && v_count === '0') {
            $(function ($) {
                function count(options) {
                    v_count = '1';
                    options = $.extend({}, options || {}, $(this).data('countToOptions') || {});
                    $(this).countTo(options);
                }
                // start all the timers
                $('.timer').each(count);
            });
        }
    });
});

/* Editor
===============================*/
$(document).ready(function () {
    tinymce.init({
        selector: '.tiny-editor',
        height: 350,
        theme: 'modern',
        menubar: 'tools',
        plugins: ['advlist autolink lists link image charmap print preview anchor',
                    'searchreplace visualblocks code fullscreen',
                    'insertdatetime media table contextmenu paste code',
                    'code'
                 ],
        fontsize_formats: "8pt 10pt 12pt 14pt 18pt 24pt 36pt",
        toolbar: 'undo redo | code | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image |sizeselect | bold italic | fontselect |  fontsizeselect',
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        content_css: '//www.tinymce.com/css/codepen.min.css'
    });
});
    