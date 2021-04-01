import {ISN} from './types';

let userIsn: string;

export function authUserIsn(): ISN {
    if (userIsn) {
        return userIsn;
    }

    let element = document.getElementById('auth-user-isn');

    if (!element) {
        throw new Error('Cannot read ISN');
    }

    return userIsn = element.innerText;
}
