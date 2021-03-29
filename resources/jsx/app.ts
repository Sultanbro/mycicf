import React from 'react';
import ReactDOM from 'react-dom';
import {MyCiCNews} from "./news";
import {Birthdays} from "./components/birthdays/birthdays";

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
