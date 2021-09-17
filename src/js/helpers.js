import Cookies from 'js-cookie';

export const isNight = () => {
    const hours = new Date().getHours();
    return !(hours >= 6 && hours < 18);
};

export const isNightMode = () => {
    const cookie = Cookies.get('mm-night-mode');

    return cookie === '1';
};

export const isDayMode = () => {
    const cookie = Cookies.get('mm-night-mode');

    return cookie === '0';
};
