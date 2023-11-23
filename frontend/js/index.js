import * as main from './main.js';
import * as stats from './statistics.js';

document.addEventListener("DOMContentLoaded", fill);

function fill () {
    console.log('Executing fill');
    if (typeof site == 'undefined' && !document.cookie['site']) {
        console.log('Rendering Main...');
        main.renderMain();
    }
}
