import React from 'react';
import ReactDOM from 'react-dom';
import {MyCiCNews} from "./news";
import {UserMenu} from './components/usermenu';
import {Sandbox} from "./sandbox";

// https://github.com/websemantics/awesome-ant-design

function findElement<T extends HTMLElement = HTMLElement>(selector: string, cb: (el: T) => void) {
    let el = document.querySelector(selector) as T;
    if (el) {
        cb(el);
    }
}

function attachReactApp(selector: string, fn: any) {
    findElement(selector, (el) => {
        let reactAppElement = React.createElement(fn);
        ReactDOM.render(reactAppElement, el);
    });
}

let reactApps = {
    '#jsx-sandbox-app': Sandbox,
    '#usermenu': UserMenu,
};

setTimeout(() => {
    findElement('#jsx-app-news', (el) => {
        let reactAppElement = React.createElement(MyCiCNews);
        ReactDOM.render(reactAppElement, el);
    });

}, 500);

for (let [selector, app] of Object.entries(reactApps)) {
    attachReactApp(selector, app);
}
