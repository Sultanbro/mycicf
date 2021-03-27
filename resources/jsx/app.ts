import React from 'react';
import ReactDOM from 'react-dom';
import {MyCiCNews} from "./news";

let wrapper = document.getElementById('jsx-app');
let reactAppElement = React.createElement(MyCiCNews);
ReactDOM.render(reactAppElement, wrapper);
