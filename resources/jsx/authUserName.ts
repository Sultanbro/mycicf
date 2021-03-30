
export function authUserName(): string {
    let element = document.getElementById('auth-user-name');

    if (!element) {
        throw new Error('Cannot read name');
    }

    return element.innerText;
}
