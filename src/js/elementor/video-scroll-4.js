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

const delay = 1000;
let firstWalkAllScrub, leftWalkScrub, rightWalkScrub, firstWalkReturnScrub;

$(window).on('load', function () {
    $('body.page-template-page-video-scroll').css('overflow', 'inherit');
    $('.video-scroll__loader').remove();
});

if ($('.video-scroll').length) {
    activeVideo('first-loop');
    const firstWalk = getVideo('first-walk-all');
    const createFirstWalkScrub = () => {
        once(document.documentElement, 'touchstart', function () {
            firstWalk.play();
            firstWalk.pause();
        });
        firstWalkAllScrub = gsap
            .timeline({
                defaults: { duration: 1 },
                scrollTrigger: {
                    scrub: true,
                    onLeave: () => {
                        activeVideo('third-loop');
                        setTimeout(() => {
                            window.scrollTo({ top: 0 });
                        }, delay);
                    },
                    onScrubComplete: () => {},
                    onEnterBack: () => {
                        activeVideo('first-walk-all');
                    },
                    onEnter: () => {
                        activeVideo('first-walk-all');
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

const createLeftFirstWalkScrub = () => {
    const leftFirstWalk = getVideo('left-first-walk');
    once(document.documentElement, 'touchstart', function () {
        leftFirstWalk.play();
        leftFirstWalk.pause();
    });
    leftFirstWalkScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('left-second-loop');
                    leftFirstWalkScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createLeftSecondWalkScrub();
                    }, delay);
                },
                onEnterBack: () => {
                    activeVideo('left-second-walk');
                },
                onEnter: () => {
                    activeVideo('left-first-walk');
                },
                onLeaveBack: () => {
                    activeVideo('left-first-loop');
                },
            },
        })
        .fromTo(
            leftFirstWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: leftFirstWalk.duration,
            }
        );
};

const createFirstWalkReturnScrub = () => {
    const firstWalkReturn = getVideo('first-walk-return');
    once(document.documentElement, 'touchstart', function () {
        firstWalkReturn.play();
        firstWalkReturn.pause();
    });
    firstWalkReturnScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('first-loop-return');
                    firstWalkReturnScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createFirstWalkScrub();
                    }, delay);
                },
                onEnterBack: () => {
                    activeVideo('first-walk-return');
                },
                onEnter: () => {
                    activeVideo('first-walk-return');
                },
                onLeaveBack: () => {
                    activeVideo('second-loop-return');
                },
            },
        })
        .fromTo(
            firstWalkReturn,
            {
                currentTime: 0,
            },
            {
                currentTime: firstWalkReturn.duration,
            }
        );
};

const createRightFirstWalkScrub = () => {
    const rightFirstWalk = getVideo('right-first-walk');
    once(document.documentElement, 'touchstart', function () {
        rightFirstWalk.play();
        rightFirstWalk.pause();
    });
    rightFirstWalkScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('right-second-loop');
                    rightFirstWalkScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createRightSecondWalkScrub();
                    }, delay);
                },
                onEnterBack: () => {
                    activeVideo('right-first-walk');
                },
                onEnter: () => {
                    activeVideo('right-first-walk');
                },
                onLeaveBack: () => {
                    activeVideo('right-first-loop');
                },
            },
        })
        .fromTo(
            rightFirstWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: rightFirstWalk.duration,
            }
        );
};

$(document).on('click', '.video-scroll__wrapper[data-name="third-loop"] button[data-name="left"], .video-scroll__wrapper[data-name="third-loop-return"] button[data-name="left"]', function () {
    const turnLeftVideo = activeVideo('turn-left');
    firstWalkAllScrub.kill();
    turnLeftVideo.play();
    turnLeftVideo.onended = function () {
        activeVideo('left-walk-all');
        window.scrollTo({ top: 0 });
        createLeftWalkAllScrub();
    };
});

$(document).on('click', '.video-scroll__wrapper[data-name="third-loop"] button[data-name="right"], .video-scroll__wrapper[data-name="third-loop-return"] button[data-name="right"]', function () {
    const turnRightVideo = activeVideo('turn-right');
    secondWalkScrub.kill();
    turnRightVideo.play();
    turnRightVideo.onended = function () {
        activeVideo('right-first-loop');
        setTimeout(() => {
            window.scrollTo({ top: 0 });
            createRightFirstWalkScrub();
        }, 1000);
    };
});
