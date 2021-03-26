import React from 'react';
import ReactDOM from 'react-dom';
import {MyCiCNews} from "./news";

var wrapper = document.getElementById('jsx-app');
let reactAppElement = React.createElement(MyCiCNews, {param: 100});
ReactDOM.render(reactAppElement, wrapper);
