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
let firstWalkScrub,
    secondWalkScrub,
    leftFirstWalkScrub,
    leftSecondWalkScrub,
    leftSecondWalkReturnScrub,
    leftFirstWalkReturnScrub,
    secondWalkReturnScrub,
    firstWalkReturnScrub,
    rightFirstWalkScrub,
    rightSecondWalkScrub,
    rightSecondWalkReturnScrub,
    rightFirstWalkReturnScrub;

$(window).on('load', function () {
    $('body.page-template-page-video-scroll').css('overflow', 'inherit');
    $('.video-scroll__loader').remove();
});

if ($('.video-scroll').length) {
    activeVideo('first-loop');
    const firstWalk = getVideo('first-walk');
    const createFirstWalkScrub = () => {
        once(document.documentElement, 'touchstart', function () {
            firstWalk.play();
            firstWalk.pause();
        });
        firstWalkScrub = gsap
            .timeline({
                defaults: { duration: 1 },
                scrollTrigger: {
                    scrub: true,
                    onLeave: () => {
                        activeVideo('second-loop');
                        firstWalkScrub.kill();
                        setTimeout(() => {
                            window.scrollTo({ top: 0 });
                            createSecondWalkScrub();
                        }, delay);
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

const createSecondWalkScrub = () => {
    const secondWalk = getVideo('second-walk');
    once(document.documentElement, 'touchstart', function () {
        secondWalk.play();
        secondWalk.pause();
    });
    secondWalkScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('third-loop');
                    secondWalkScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                    }, delay);
                },
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
        })
        .fromTo(
            secondWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: secondWalk.duration,
            }
        );
};

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

const createLeftSecondWalkScrub = () => {
    const leftSecondWalk = getVideo('left-second-walk');
    once(document.documentElement, 'touchstart', function () {
        leftSecondWalk.play();
        leftSecondWalk.pause();
    });
    leftSecondWalkScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('left-third-loop');
                    leftSecondWalkScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createLeftSecondWalkReturnScrub();
                    }, delay);
                },
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
        })
        .fromTo(
            leftSecondWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: leftSecondWalk.duration,
            }
        );
};

const createLeftSecondWalkReturnScrub = () => {
    const leftSecondWalkReturn = getVideo('left-second-walk-return');
    once(document.documentElement, 'touchstart', function () {
        leftSecondWalkReturn.play();
        leftSecondWalkReturn.pause();
    });
    leftSecondWalkReturnScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('left-second-loop-return');
                    leftSecondWalkReturnScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createLeftFirstWalkReturnScrub();
                    }, delay);
                },
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
        })
        .fromTo(
            leftSecondWalkReturn,
            {
                currentTime: 0,
            },
            {
                currentTime: leftSecondWalkReturn.duration,
            }
        );
};

const createLeftFirstWalkReturnScrub = () => {
    const leftFirstWalkReturn = getVideo('left-first-walk-return');
    once(document.documentElement, 'touchstart', function () {
        leftFirstWalkReturn.play();
        leftFirstWalkReturn.pause();
    });
    leftFirstWalkReturnScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    const turnLeftReturnVideo = activeVideo('turn-left-return');
                    turnLeftReturnVideo.play();
                    leftFirstWalkReturnScrub.kill();
                    turnLeftReturnVideo.onended = function () {
                        activeVideo('third-loop-return');
                        setTimeout(() => {
                            window.scrollTo({ top: 0 });
                            createSecondWalkReturnScrub();
                        }, 1000);
                    };
                },
                onEnterBack: () => {
                    activeVideo('left-first-walk-return');
                },
                onEnter: () => {
                    activeVideo('left-first-walk-return');
                },
                onLeaveBack: () => {
                    activeVideo('left-second-loop-return');
                },
            },
        })
        .fromTo(
            leftFirstWalkReturn,
            {
                currentTime: 0,
            },
            {
                currentTime: leftFirstWalkReturn.duration,
            }
        );
};

const createSecondWalkReturnScrub = () => {
    const secondWalkReturn = getVideo('second-walk-return');
    once(document.documentElement, 'touchstart', function () {
        secondWalkReturn.play();
        secondWalkReturn.pause();
    });
    secondWalkReturnScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('second-loop-return');
                    secondWalkReturnScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createFirstWalkReturnScrub();
                    }, delay);
                },
                onEnterBack: () => {
                    activeVideo('second-walk-return');
                },
                onEnter: () => {
                    activeVideo('second-walk-return');
                },
                onLeaveBack: () => {
                    activeVideo('third-loop-return');
                },
            },
        })
        .fromTo(
            secondWalkReturn,
            {
                currentTime: 0,
            },
            {
                currentTime: secondWalkReturn.duration,
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

const createRightSecondWalkScrub = () => {
    const rightSecondWalk = getVideo('right-second-walk');
    once(document.documentElement, 'touchstart', function () {
        rightSecondWalk.play();
        rightSecondWalk.pause();
    });
    rightSecondWalkScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('right-third-loop');
                    rightSecondWalkScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createRightSecondWalkReturnScrub();
                    }, delay);
                },
                onEnterBack: () => {
                    activeVideo('right-second-walk');
                },
                onEnter: () => {
                    activeVideo('right-second-walk');
                },
                onLeaveBack: () => {
                    activeVideo('right-second-loop');
                },
            },
        })
        .fromTo(
            rightSecondWalk,
            {
                currentTime: 0,
            },
            {
                currentTime: rightSecondWalk.duration,
            }
        );
};

const createRightSecondWalkReturnScrub = () => {
    const rightSecondWalkReturn = getVideo('right-second-walk-return');
    once(document.documentElement, 'touchstart', function () {
        rightSecondWalkReturn.play();
        rightSecondWalkReturn.pause();
    });
    rightSecondWalkReturnScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    activeVideo('right-second-loop-return');
                    rightSecondWalkReturnScrub.kill();
                    setTimeout(() => {
                        window.scrollTo({ top: 0 });
                        createRightFirstWalkReturnScrub();
                    }, delay);
                },
                onEnterBack: () => {
                    activeVideo('right-second-walk-return');
                },
                onEnter: () => {
                    activeVideo('right-second-walk-return');
                },
                onLeaveBack: () => {
                    activeVideo('right-third-loop');
                },
            },
        })
        .fromTo(
            rightSecondWalkReturn,
            {
                currentTime: 0,
            },
            {
                currentTime: rightSecondWalkReturn.duration,
            }
        );
};

const createRightFirstWalkReturnScrub = () => {
    const rightFirstWalkReturn = getVideo('right-first-walk-return');
    once(document.documentElement, 'touchstart', function () {
        rightFirstWalkReturn.play();
        rightFirstWalkReturn.pause();
    });
    rightFirstWalkReturnScrub = gsap
        .timeline({
            defaults: { duration: 1 },
            scrollTrigger: {
                scrub: true,
                onLeave: () => {
                    const turnRightReturnVideo = activeVideo('turn-right-return');
                    turnRightReturnVideo.play();
                    rightFirstWalkReturnScrub.kill();
                    turnRightReturnVideo.onended = function () {
                        activeVideo('third-loop-return');
                        setTimeout(() => {
                            window.scrollTo({ top: 0 });
                            createSecondWalkReturnScrub();
                        }, 1000);
                    };
                },
                onEnterBack: () => {
                    activeVideo('right-first-walk-return');
                },
                onEnter: () => {
                    activeVideo('right-first-walk-return');
                },
                onLeaveBack: () => {
                    activeVideo('right-second-loop-return');
                },
            },
        })
        .fromTo(
            rightFirstWalkReturn,
            {
                currentTime: 0,
            },
            {
                currentTime: rightFirstWalkReturn.duration,
            }
        );
};

$(document).on('click', '.video-scroll__wrapper[data-name="third-loop"] button[data-name="left"], .video-scroll__wrapper[data-name="third-loop-return"] button[data-name="left"]', function () {
    const turnLeftVideo = activeVideo('turn-left');
    secondWalkScrub.kill();
    turnLeftVideo.play();
    turnLeftVideo.onended = function () {
        activeVideo('left-first-loop');
        setTimeout(() => {
            window.scrollTo({ top: 0 });
            createLeftFirstWalkScrub();
        }, 1000);
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
