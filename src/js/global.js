import $ from 'jquery';
import Cookies from 'js-cookie';

$(document).on('click', '.hamburger, .menu-overlay', function () {
    $('body').toggleClass('menu-active');
    $('.hamburger').toggleClass('is-active');
});

$('.night-mode-switcher input').on('change', function () {
    const checkbox = $(this);
    const checked = checkbox.prop('checked');
    const cookeVal = checked === true ? 1 : 0;

    Cookies.set('mm-night-mode', cookeVal);

    /**
     * Trigger global night mode change event.
     * @param bool nightMode Is night mode active or passive.
     */
    $(document).trigger('mmNightModeChange', [{ nightMode: checked }]);

    if (checked) {
        $('body').addClass('mm-night-mode');
    } else {
        $('body').removeClass('mm-night-mode');
    }
});
