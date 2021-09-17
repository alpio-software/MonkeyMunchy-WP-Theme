import $ from 'jquery';
import Cookies from 'js-cookie';
import { isNight, isDayMode } from './helpers';

$(document).on('click', '.hamburger, .menu-overlay', function () {
    $('body').toggleClass('menu-active');
    $('.hamburger').toggleClass('is-active');
});

$('.night-mode-switcher input').on('change', function () {
    const checkbox = $(this);
    const checked = checkbox.prop('checked');
    const cookeVal = checked === true ? 1 : 0;

    // Set 1 day night mode cookie.
    Cookies.set('mm-night-mode', cookeVal, { expires: 1 });

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

if (isNight() && !isDayMode()) {
    $('.night-mode-switcher input').prop('checked', true).trigger('change');
}
