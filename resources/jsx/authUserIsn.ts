import { ISN } from "./types";

export function authUserIsn(): ISN {
    let element = document.getElementById("auth-user-isn");

    if (!element) {
        throw new Error("Cannot read ISN");
    }

    return element.innerText;
}
