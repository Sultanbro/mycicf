
export function authUserIsn(): string {
    let element = document.getElementById('auth-user-isn');

    if (!element) {
        return '5565'; // TODO
        throw new Error('Cannot read ISN');
    }

    return element.innerText;
}
