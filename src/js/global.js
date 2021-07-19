import $ from 'jquery';

$(document).on('click', '.hamburger, .menu-overlay', function () {
    $('body').toggleClass('menu-active');
    $('.hamburger').toggleClass('is-active');
});
