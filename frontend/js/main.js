import { renderStats } from "./statistics.js";
import { renderPP } from "./PP.js";
import { saveSiteState } from "./index.js";

export function renderMain() {
    if (site=='main') {
        return(false);
    }
    var site = 'main';
    saveSiteState('main');
    let head = document.getElementById('header');
    let body = document.getElementById('main');
    // Provisorisches PP, bevor wir echte PBs vond er API bekommen
    let profilePicture = '<img src="kartoffelpc.png" style="width:4vw;height:4vw;">';
    // Provisorischer UN
    let username = 'Macher Max';
    head.innerHTML = '<button id="renderPP">'+profilePicture+'</button>'+username+'<button id="renderStats"><span class="material-symbols-outlined">bar_chart</span></button><a href="settings.html"><span class="material-symbols-outlined">settings</span></a>';
    document.getElementById('renderStats').addEventListener("click", renderStats);
    document.getElementById('renderPP').addEventListener("click", renderPP);
}
