import $ from 'jquery';
import lottie from 'lottie-web';

$(window).on('elementor/frontend/init', function () {
    // eslint-disable-next-line no-undef
    elementorFrontend.hooks.addAction(
        'frontend/element_ready/mm-clouds-widget.default',
        function ($scope, $) {
            $('.mm-clouds').each(function () {
                const current = $(this);

                const clouds = lottie.loadAnimation({
                    container: current[0],
                    renderer: 'svg',
                    loop: true,
                    autoplay: !current.is('[data-paused]'),
                    path: current.data('json'),
                });

                clouds.setSpeed(current.data('speed'));
            });
        }
    );
});

const initTown = () => {
    const townDom = $('.mm-town');

    if (townDom.length) {
        const townConf = JSON.parse(townDom.attr('data-config'));

        const town = lottie.loadAnimation({
            container: townDom[0],
            renderer: 'svg',
            loop: townConf.loop,
            autoplay: townConf.autoPlay,
            path: townConf.animation,
        });

        town.setSpeed(townConf.speed);

        return town;
    }

    return null;
};

$(window).on('elementor/frontend/init', function () {
    // eslint-disable-next-line no-undef
    elementorFrontend.hooks.addAction(
        'frontend/element_ready/mm-town-widget.default',
        function ($scope, $) {
            let town = initTown($);

            if (town) {
                town.addEventListener('data_ready', function () {
                    $('.mm-town-wrapper').find('.mm-loader').remove();
                });

                $(document).on('mmNightModeChange', function () {
                    //town.play();
                });
            }
        }
    );
});

const townConf = $('.mm-town').length
    ? JSON.parse($('.mm-town').attr('data-config'))
    : '';

// Animation clicks.
$(document).on('click', '#monkey', function () {
    if (townConf.monkeyUrl && typeof townConf.monkeyUrl !== 'undefined') {
        window.location.href = townConf.monkeyUrl;
    }
});

$(document).on('click', '#store', function () {
    if (townConf.storeUrl && typeof townConf.storeUrl !== 'undefined') {
        window.location.href = townConf.storeUrl;
    }
});

$(document).on('click', '#student', function () {
    if (townConf.studentUrl && typeof townConf.studentUrl !== 'undefined') {
        window.location.href = townConf.studentUrl;
    }
});

$(document).on('click', '#cafe', function () {
    if (townConf.cafeUrl && typeof townConf.cafeUrl !== 'undefined') {
        window.location.href = townConf.cafeUrl;
    }
});
