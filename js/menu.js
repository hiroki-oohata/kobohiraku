$(function() {
  'use strict';
    $('.navToggle').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('.menu').addClass('active');
        } else {
            $('.menu').removeClass('active');
        }
    });
});
