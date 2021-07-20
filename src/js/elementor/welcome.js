import $ from 'jquery';
import lottie from 'lottie-web';

$('.mm-clouds').each(function () {
    const current = $(this);

    lottie.loadAnimation({
        container: current[0],
        renderer: 'svg',
        loop: true,
        autoplay: !current.is('[data-paused]'),
        path: current.data('json'),
    });
});

$('.mm-town').each(function () {
    const current = $(this);

    const currentLottie = lottie.loadAnimation({
        container: current[0],
        renderer: 'svg',
        loop: true,
        autoplay: !current.is('[data-paused]'),
        path: current.data('json'),
    });

    currentLottie.addEventListener('DOMLoaded', () => {
        console.log('Loaded');
    });
});

// Video clicks.
$(document).on('click', '#monkeyturns', function () {
    console.log('Yes!');
});
