import React from 'react';
import ReactDOM from 'react-dom';
import {MyCiCNews} from "./news";

var jsxAppElement = document.getElementById('jsx-app');
let playerElement = React.createElement(MyCiCNews, {param: 100});
ReactDOM.render(playerElement, jsxAppElement);
