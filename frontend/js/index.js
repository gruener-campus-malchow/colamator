import * as main from './main.js';

window.addEventListener('DOMContentLoaded', fill);

function fill () {
    if (typeof site == 'undefined' && !document.cookie['site']) {
        main.renderMain();
    }
}
