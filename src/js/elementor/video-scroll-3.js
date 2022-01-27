import $ from 'jquery';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const activeVideo = (name) => {
    const allVideos = $('.video-scroll__wrapper');
    const current = $(`.video-scroll__wrapper[data-name="${name}"]`);
    allVideos.removeClass('video-scroll__wrapper--active');
    current.addClass('video-scroll__wrapper--active');
    const video = current.find('video')[0];

    return video;
};

const getVideo = (name) => {
    const video = $(`.video-scroll__wrapper[data-name="${name}"]`).find('video');
    return !video.length ? false : video[0];
};

const once = (el, event, fn, opts) => {
    const onceFn = function () {
        el.removeEventListener(event, onceFn);
        fn.apply(this, arguments);
    };
    el.addEventListener(event, onceFn, opts);
    return onceFn;
};

let allScrub;

$(window).on('load', function () {
    $('body.page-template-page-video-scroll').css('overflow', 'inherit');
    $('.video-scroll__loader').remove();
});

if ($('.video-scroll').length) {
    activeVideo('first-loop');
    const firstWalk = getVideo('all');
    const createFirstWalkScrub = () => {
        once(document.documentElement, 'touchstart', function () {
            firstWalk.play();
            firstWalk.pause();
        });
        allScrub = gsap
            .timeline({
                defaults: { duration: 1 },
                scrollTrigger: {
                    scrub: true,
                    onLeave: () => {
                        activeVideo('first-loop-return');
                    },
                    onScrubComplete: () => {},
                    onEnterBack: () => {
                        activeVideo('all');
                    },
                    onEnter: () => {
                        activeVideo('all');
                    },
                    onLeaveBack: () => {
                        activeVideo('first-loop');
                    },
                },
            })
            .fromTo(
                firstWalk,
                {
                    currentTime: 0,
                },
                {
                    currentTime: firstWalk.duration,
                }
            );
    };
    once(firstWalk, 'loadedmetadata', () => {
        createFirstWalkScrub();
    });
}
