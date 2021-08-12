import Cookies from 'js-cookie';

export const isNight = () => {
    return Cookies.get('mm-night-mode') === '1';
};
