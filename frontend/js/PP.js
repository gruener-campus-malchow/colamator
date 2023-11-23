export function renderPP() {
    if (site=='PP' && document.cookie('site')=='PP') {
        return(false);
    }
    var site = 'PP';
    document.cookie = 'site=PP';
    let head = document.getElementById('header');
    let body = document.getElementById('main');
    // Provisorisches PP, bevor wir echte PBs vond er API bekommen
    let profilePicture = '<img src="kartoffelpc.png" style="width:4vw;height:4vw;">';
    // Provisorischer UN
    let username = 'Macher Max'
    head.innerHTML = '<button onclick="renderPP">'+profilePicture+'</button>'+username+'<button onclick="renderStats"><span class="material-symbols-outlined">bar_chart</span></button><a href="settings.html"><span class="material-symbols-outlined">settings</span></a>';
}
