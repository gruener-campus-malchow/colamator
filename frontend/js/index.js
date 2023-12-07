import * as main from './main.js';
import * as stats from './statistics.js';

// from different page
document.addEventListener("DOMContentLoaded", fill);

function fill () {
    console.log('Executing fill');
    if (typeof site == 'undefined' && !document.cookie['site']) {
        console.log('Rendering Main...');
        main.renderMain();
    }
}

// from same page (from any site in SPA) through history (https://developer.mozilla.org/en-US/docs/Web/API/Window/history)
window.addEventListener("popstate", loadSiteState);

export function saveSiteState(siteName, properties = {}) {
    // properties: object { statePropertyName: statePropertyValue, ... }
    document.cookie = 'site=' + siteName;
    // guarantee that there is no copy of current state
    var saveState = true;
    if (window.history.state != null) {
        if (window.history.state['site'] == siteName) {
            saveState = false;
        }
    }
    if (saveState) {
        // save state to History
        let state = { 'site': siteName }
        for (let [name, val] in Object.entries(properties)) {
            state[name] = val;
        }
        window.history.pushState(state, '', null);
    }
}

function loadSiteState() {
    if (window.history.state != null) {
        let siteName = window.history.state['site'];
        document.cookie = 'site=' + siteName;
        switch (siteName) {
            case 'main':
                main.renderMain()
                break
            case 'chat':
                chat.renderChat()
                break
        }
    }
}
