import { saveSiteState } from "./index.js";
export function renderStats() {
    if (site=='stats' && document.cookie('site')=='stats') {
        return(false);
    }
    var site = 'stats';
    saveSiteState('stats');
    let head = document.getElementById('header');
    let body = document.getElementById('main');
    body.innerHTML='<!DOCTYPE html>
<button id="return" style="font-family: Material Symbols Outlined">arrow_back</button>
<h1>Statistiken</h1>';
     document.getElementById('return').addEventListener("click", renderMain);
}

    fetch('colamator/api/user/', {
    method: 'GET',
    body: JSON.stringify({datatype: data})
  }).then(response => response.json()).then((datatype)=> { array.forEach(function(datatype) {
  button = document.createElement('button');
  button.id = datatype;
  button.innerHTML = 'Your Mom '+datatype;
  console.log(button);
  document.body.appendChild(button);
}););}

