import { saveSiteState } from "./index.js";
import { renderMain } from './main.js';

export function renderStats() {
    if (site=='stats' && document.cookie('site')=='stats') {
        return(false);
    }
    var site = 'stats';
    saveSiteState('stats');
    let head = document.getElementById('header');
    let body = document.getElementById('main');
    head.innerHTML = '';
    body.innerHTML = '';    
    body.innerHTML='<button id="return" style="font-family: Material Symbols Outlined">arrow_back</button><h1>Statistiken</h1>';
     document.getElementById('return').addEventListener("click", renderMain);

    fetch('../api/user/', {
    method: 'GET',
    body: JSON.stringify()
  }).then(response => response.json()).then((user)=> { user.forEach(function(username) {
  let button = document.createElement('button');
  button.id = username['username'];
  button.innerHTML = 'Your Mom '+username['username'];
  console.log(button);
  document.body.appendChild(button);
});});
}
