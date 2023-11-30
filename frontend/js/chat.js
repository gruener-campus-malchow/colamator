/*
DOCUMENT
--------
This document creates the interface of all chats
*/

// template functions

import { renderMain } from "./main.js";

var templateChatHeader = (chatname) =>
    `<button id="return" style="font-family: Material Symbols Outlined">arrow_back</button>
     <h1 id="chatname">${chatname}</h1>`;

var templateChatMessage = (user, content, comment = "") => {
    let result =
        `<div> <!-- (row) -->
            <div class="message"> <!-- (message box), can be placed left or right -->
                <p class="message-user">${user}</p>
                <p class="message-content">${content}</p>`;
    if (comment != "") {
        result +=
                `<p class="message-comment">${comment}</p>`;
    }
    result +=
             `</div>
         </div>`;
    return result;
};

var templateChatForm = (types) => {
    let result = 
        `<form name="sendmessage" id="sendmessage" method="POST" action="#"> <!-- send message form -->
            <select name="input-type" id="input-types">`;
    for (let type in types) {
        result +=
                `<option value="${types[type]}">${types[type]}</option>`;
    }
    result +=
            `</select>
             <input name="input-message" id="input-message" placeholder="Daten eingeben">
             <input name="input-comment" id="input-comment" placeholder="Kommentar anfügen">
             <input type="submit" value="send" style="font-family: Material Symbols Outlined">
         </form>`;
    return result;
};

// utility functions

function rendertypeOf(datatype) {
    if (datatype == "nil") {
        return "number";    
    } else {
        return "text";
    }
}

// build chat
export function renderChat() {
    if (document.cookie["site"]=="chat") {
        return(false);
    }
    document.cookie = 'site=chat';

    // build page
    var header = document.getElementById("header");
    header.innerHTML = templateChatHeader("Selbstgespräch");

    var messages = document.createElement("DIV");
    messages.innerHTML = templateChatMessage("Ich", "Nichts");

    var main = document.getElementById("main");
    main.appendChild(messages);
    main.innerHTML += templateChatForm(["null", "none", "nil"]);
    document.getElementById("return").addEventListener("click", renderMain);

    // match input type of message with datatype
    let rendertype = rendertypeOf(document.forms["sendmessage"]["input-type"].value);
    document.getElementById("input-message").type = rendertype;

    document.getElementById("input-types").addEventListener("change", () => {
        let rendertype = rendertypeOf(document.forms["sendmessage"]["input-type"].value);
        document.getElementById("input-message").type = rendertype;
    });

    // send data to API
    document.getElementById("sendmessage").addEventListener("submit", (event) => {
        event.preventDefault();
        let form = event.target;
        /* fetch('#', {
            method: 'POST',
            body: JSON.stringify({
                datatype: form["input-type"].value,
                data: form["input-message"].value,
                comment: form["input-comment"].value == "" ? null : form["input-comment"].value
            })
        })
            .then(response => response.json())
            .then(json => {
                messages.innerHTML += templateChatMessage( ... );
            }); */
    });
}
