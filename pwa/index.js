import { initializeApp } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-app.js";
import { getMessaging, getToken } from "https://www.gstatic.com/firebasejs/9.8.1/firebase-messaging.js";

  const firebaseConfig = {

    apiKey: "AIzaSyBmSZlaJaPmZ0WASilJZEkIk6S6vtFl8Pw",

    authDomain: "colamator.firebaseapp.com",

    projectId: "colamator",

    storageBucket: "colamator.appspot.com",

    messagingSenderId: "395109243028",

    appId: "1:395109243028:web:573f54b53f401a05b3fc81",

    measurementId: "G-26FVCWP30J"

  };


  // Initialize Firebase

  const app = initializeApp(firebaseConfig);

  const messaging = getMessaging(app);

  getToken(messaging, {vapidKey: "BBaraOZkS0WlZSbIy4DnxepARsJ3D3bAkf3khUQ9e1eeonRJysSGmitGZxrmkle_PjCXKEsPF4fcFVF4ikgwILk"})
  .then((currentToken) => {
    if (currentToken) {
      console.log("interact",currentToken);
      const token = currentToken;
    } else {
      console.log("nops");
    }
  }).catch((err) => {
    console.log("duck", err)
  });


const deviceType = () => {
    const ua = navigator.userAgent;
    if (/(tablet|ipad|playbook|silk)|(android(?!.*mobi))/i.test(ua)) {
        return "tablet";
    }
    else if (/Mobile|Android|iP(hone|od)|IEMobile|BlackBerry|Kindle|Silk-Accelerated|(hpw|web)OS|Opera M(obi|ini)/.test(ua)) {
        return "mobile";
    }
    return "desktop";
};

fetch('/api/users/', {
  method: 'GET'
  //body: JSON.stringify({color: 'deine', type: 'mutter'})
})
.then(response => response.json())
.then(json => {
  document.getElementById('aha').innerText=JSON.stringify(json);
});

window.addEventListener('appinstalled', (evt) => {
  getToken(messaging, {vapidKey: "BBaraOZkS0WlZSbIy4DnxepARsJ3D3bAkf3khUQ9e1eeonRJysSGmitGZxrmkle_PjCXKEsPF4fcFVF4ikgwILk"})
  .then((currentToken) => {
    if (currentToken) {
      console.log("interact",currentToken);
      const token = currentToken;
      fetch('/api/users/add_device_key', {
        method: 'POST',
        body: JSON.stringify({username:'lorenzo',device_key: token , device_name: deviceType()})
      })
      .then(response => response.text())
      .then(console.log);
    } else {
      console.log("nops");
    }
  }).catch((err) => {
    console.log("duck", err)
  });
});
