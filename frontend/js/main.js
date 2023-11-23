export function renderMain() {
    if (site=='main') {
        return(false);
    }
    var site = 'main';
    document.cookie = 'site=main';
    document.getElementById('header').innerhtml = ('<a href="kartoffelpc.png"><img src="kartoffelpc.png" style="width:4vw;height:4vw;"></a><a href="./login/login.php">You</a><a href="statistics.html"><span class="material-symbols-outlined">bar_chart</span></a><a href="settings.html"><span class="material-symbols-outlined">settings</span></a>');
}
