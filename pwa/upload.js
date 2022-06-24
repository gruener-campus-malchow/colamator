document.addEventListener("submit", uploady);

function uploady() {
  data = document.getElementById('data');
  var datatype;
  if (typeof data == "number" & data > 30 & data < 200) {
    datatype = "Gewicht";
  } else if (typeof data == "number" & data > 100) {
    datatype = "Kilokalorien";
  } else if (typeof data == "number" & data < 6) {
    datatype = "Flüssigkeitszufuhr";
  } else {
    datatype = "Kraft";
  }
  fetch('/api/succ.php', {
    method: 'POST',
    body: JSON.stringify({datatype: data})
  }).then(response => response.text()).then(console.log);
}
