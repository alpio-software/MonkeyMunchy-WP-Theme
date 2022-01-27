import $ from 'jquery';
import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const url = window.location.href;
const urlObj = new URL(url);
// const c = urlObj.searchParams.get('c');

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

if ('first-walk' === urlObj.searchParams.get('scene')) {
    const firstWalk = getVideo('first-walk');
    activeVideo('first-loop');
    once(document.documentElement, 'touchstart', function () {
        firstWalk.play();
        firstWalk.pause();
    });
    once(firstWalk, 'loadedmetadata', () => {
        gsap.timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('second-loop');
                },
                onScrubComplete: () => {},
                onEnterBack: () => {
                    activeVideo('first-walk');
                },
                onEnter: () => {
                    activeVideo('first-walk');
                },
                onLeaveBack: () => {
                    activeVideo('first-loop');
                },
            },
        }).fromTo(
            firstWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: firstWalk.duration,
            }
        );
    });
}

if ('second-walk' === urlObj.searchParams.get('scene')) {
    const secondWalk = getVideo('second-walk');
    activeVideo('second-loop');
    once(document.documentElement, 'touchstart', function () {
        secondWalk.play();
        secondWalk.pause();
    });
    once(secondWalk, 'loadedmetadata', () => {
        gsap.timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('third-loop');
                },
                onScrubComplete: () => {},
                onEnterBack: () => {
                    activeVideo('second-walk');
                },
                onEnter: () => {
                    activeVideo('second-walk');
                },
                onLeaveBack: () => {
                    activeVideo('second-loop');
                },
            },
        }).fromTo(
            secondWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: secondWalk.duration,
            }
        );
    });
}

if ('left-first-walk' === urlObj.searchParams.get('scene')) {
    const leftFirstWalk = getVideo('left-first-walk');
    activeVideo('left-first-loop');
    once(document.documentElement, 'touchstart', function () {
        leftFirstWalk.play();
        leftFirstWalk.pause();
    });
    once(leftFirstWalk, 'loadedmetadata', () => {
        gsap.timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('left-second-loop');
                },
                onScrubComplete: () => {},
                onEnterBack: () => {
                    activeVideo('left-first-walk');
                },
                onEnter: () => {
                    activeVideo('left-first-walk');
                },
                onLeaveBack: () => {
                    activeVideo('left-first-loop');
                },
            },
        }).fromTo(
            leftFirstWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: leftFirstWalk.duration,
            }
        );
    });
}

if ('left-second-walk' === urlObj.searchParams.get('scene')) {
    const leftSecondWalk = getVideo('left-second-walk');
    activeVideo('left-second-loop');
    once(document.documentElement, 'touchstart', function () {
        leftSecondWalk.play();
        leftSecondWalk.pause();
    });
    once(leftSecondWalk, 'loadedmetadata', () => {
        gsap.timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('left-third-loop');
                },
                onScrubComplete: () => {},
                onEnterBack: () => {
                    activeVideo('left-second-walk');
                },
                onEnter: () => {
                    activeVideo('left-second-walk');
                },
                onLeaveBack: () => {
                    activeVideo('left-second-loop');
                },
            },
        }).fromTo(
            leftSecondWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: leftSecondWalk.duration,
            }
        );
    });
}

if ('left-second-walk-return' === urlObj.searchParams.get('scene')) {
    const leftSecondWalkReturn = getVideo('left-second-walk-return');
    activeVideo('left-third-loop');
    once(document.documentElement, 'touchstart', function () {
        leftSecondWalkReturn.play();
        leftSecondWalkReturn.pause();
    });
    once(leftSecondWalkReturn, 'loadedmetadata', () => {
        gsap.timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('left-second-loop');
                },
                onScrubComplete: () => {},
                onEnterBack: () => {
                    activeVideo('left-second-walk-return');
                },
                onEnter: () => {
                    activeVideo('left-second-walk-return');
                },
                onLeaveBack: () => {
                    activeVideo('left-third-loop');
                },
            },
        }).fromTo(
            leftSecondWalkReturn,
            {
                currentTime: 0,
            },
            {
                currentTime: leftSecondWalkReturn.duration,
            }
        );
    });
}

$(document).on('click', '.video-scroll__wrapper button[data-name="left"]', function () {
    const turnLeftVideo = activeVideo('turn-left');
    turnLeftVideo.play();
    turnLeftVideo.onended = function () {
        activeVideo('left-first-loop');
    };
});
