fetch('/api/items/', {
  method: 'GET',
  //body: JSON.stringify({color: 'deine', type: 'mutter'})
})
.then(response => response.json())
.then(json => {
  document.getElementById('aha').innerText=json;
});
