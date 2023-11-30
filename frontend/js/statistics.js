import { renderMain } from "./main.js";
export function renderStats() {
    if (site=='stats' && document.cookie('site')=='stats') {
        return(false);
    }
    var site = 'stats';
    document.cookie = 'site=stats';
    let head = document.getElementById('header');
    let body = document.getElementById('main');
    body.innerHTML='<!DOCTYPE html>
<button id="return" style="font-family: Material Symbols Outlined">arrow_back</button>
<h1>Statistiken</h1>';
     document.getElementById('return').addEventListener("click", renderMain);
}

    fetch('/api/succ.php', {
    method: 'GET',
    body: JSON.stringify({datatype: data})
  }).then(response => response.json()).then(console.log);
 function btngen() {
	var btn = document.createElement("BUTTON");
	var text = document.createTextNode(datatype);
	btn.appendChild(text);
	var newbutton = document.getElementById("button");
  	document.body.insertBefore(btn,newbutton);
}
