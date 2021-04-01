
let userName: string;

export function authUserName(): string {
    if (userName) {
        return userName;
    }

    let element = document.getElementById('auth-user-name');

    if (!element) {
        throw new Error('Cannot read name');
    }

    return userName = element.innerText;
}
