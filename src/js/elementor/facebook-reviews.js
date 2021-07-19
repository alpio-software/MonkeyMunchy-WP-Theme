import $ from 'jquery';
import Flickity from 'flickity';
import 'jquery-match-height';

if ($('.wp-facebook-review').length) {
    $('.wp-facebook-review').matchHeight();

    let tickerSpeed = 2;
    let flickity = null;
    let isPaused = false;
    const slideshowEl = document.querySelector('.wp-facebook-reviews');

    const update = () => {
        if (isPaused) return;
        if (flickity.slides) {
            flickity.x = (flickity.x - tickerSpeed) % flickity.slideableWidth;
            flickity.selectedIndex = flickity.dragEndRestingSelect();
            flickity.updateSelectedSlide();
            flickity.settle(flickity.x);
        }
        window.requestAnimationFrame(update);
    };

    const pause = () => {
        isPaused = true;
    };

    const play = () => {
        if (isPaused) {
            isPaused = false;
            window.requestAnimationFrame(update);
        }
    };

    flickity = new Flickity(slideshowEl, {
        autoPlay: false,
        prevNextButtons: false,
        pageDots: false,
        draggable: true,
        wrapAround: true,
        selectedAttraction: 0.015,
        friction: 0.15,
        freeScroll: true,
        cellAlign: 'left',
    });

    flickity.x = 0;

    slideshowEl.addEventListener('mouseenter', pause, false);
    slideshowEl.addEventListener('focusin', pause, false);
    slideshowEl.addEventListener('mouseleave', play, false);
    slideshowEl.addEventListener('focusout', play, false);

    flickity.on('dragStart', () => {
        isPaused = true;
    });

    update();
}
