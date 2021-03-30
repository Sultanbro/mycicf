import React from 'react';
import ReactDOM from 'react-dom';
import {MyCiCNews} from "./news";
import {Birthdays} from "./components/birthdays/birthdays";
import {Me} from './components/me/me';

let wrapper = document.getElementById('jsx-app');
if (wrapper) {
    let reactAppElement = React.createElement(MyCiCNews);
    ReactDOM.render(reactAppElement, wrapper);
}


let wrapper2 = document.getElementById('sandbox-app');
if (wrapper2) {
    let reactAppElement2 = React.createElement(Birthdays);
    ReactDOM.render(reactAppElement2, wrapper2);
}
/*

let wrapper3 = document.getElementById('simple-info');
if (wrapper3) {
    let reactAppElement3 = React.createElement(Me);
    ReactDOM.render(reactAppElement3, wrapper3);
}
*/
