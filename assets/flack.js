jQuery(function ($) {
    'use strict';
    $(document).ajaxComplete(function () {
        $('.posts-data-table .layout-button').each(function () {
            var anchorTag = $(this).find('a');
            // Get the href attribute of the anchor tag
            var link = anchorTag.attr('href');

            // Define the SVG icon as a string
            var svgIcon = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor"><path d="M5 20h14v-2H5v2zm7-18v10.59l4.29-4.3L18 10.41l-6 6-6-6 1.41-1.41L11 12.59V2h2z"/></svg>';

            // Set the inner HTML of the anchor tag to the SVG icon
            anchorTag.html(svgIcon);

            // Add the download attribute to the anchor tag
            anchorTag.attr('download', '');

            // Ensure the href attribute is correctly set (redundant if already set)
            anchorTag.attr('href', link);
        });

        $(".posts-data-table .image-source").each(function(){
            $(this).hide();
            var first =  $(this).first().find("img").attr("data-src");
            $(".image-hover-wrapper img").attr('src', first);
            $('.posts-data-table tr').hover(function(){
                var imgSrc = $(this).find("img").attr("data-src");
                $(".image-hover-wrapper img").attr('src', imgSrc);
                // console.log(imgSrc);
            });
        });
        $(".posts-data-table tr").each(function(){
            var hiddenTd = $(this).find('.dtr-hidden');
            var hiddenTd = $(this).find('.dtr-hidden');
            var hiddenCtr = $(this).find('.col-title');
            var hiddentd2 = $(this).find('td');
            var hiddentdimg = $(this).find('td.image-source');
            hiddenCtr.removeClass('dtr-control');
            hiddenTd.show();
            hiddentd2.show();
            hiddentdimg.hide();
            hiddenTd.removeClass('dtr-hidden');
        });
        console.log("flack js");

    });
});