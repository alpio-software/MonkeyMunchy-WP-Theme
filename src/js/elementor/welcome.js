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

    lottie.loadAnimation({
        container: current[0],
        renderer: 'svg',
        loop: true,
        autoplay: !current.is('[data-paused]'),
        path: current.data('json'),
    });
});
