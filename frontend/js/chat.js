/*
DOCUMENT
--------
This document creates the interface of all chats
*/

// template functions

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
        `<form id="sendmessage" method="POST" action="#"> <!-- send message form -->
            <select name="input-type" id="input-types">`;
    for (let type in types) {
        result +=
                `<option></option>`;
    }
    result +=
            `</select>
             <input id="input-message" placeholder="Daten eingeben">
             <input type="text" id="input-commment" placeholder="Kommentar anfügen">
             <input type="submit" value="send" style="font-family: Material Symbols Outlined">
         </form>`;
    return result;
};

// build chat
function renderChat() {
    site = "chat";

    document.getElementsByTagName("HEADER")[0].innerHTML = templateChatHeader("ME");
    document.getElementsByTagName("MAIN")[0].innerHTML = templateChatMessage("Me", "Nothing");
    document.getElementsByTagName("MAIN")[0].innerHTML += templateChatForm([]);
}
