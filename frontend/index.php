<?php
	session_start();
	if ($_SESSION) {
		$username = $_SESSION["username"];
	} else {
		$username = "Unknown";
	}
?>
<!DOCTYPE html>
<head>
	<link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="UTF-8" />
	<meta name="theme-color" content="#1ac6ff">
	<title>Trainings-Planer</title>
	<link rel="apple-touch-icon" href="defeat.png">
	<script language="javascript" type="module" src="index.js"></script>
	<script language="javascript" type="module" src="upload.js"></script>
</head>
<body>
	<script type="module">
		if ('serviceWorker' in navigator) {
			try {
				navigator.serviceWorker.register('./pwa/sw.js');
			} catch (error) {
				console.error(`Registration failed with ${error}`);
			}
		}
	</script>
    <header>
        <div class="topnav">
	    	<a href="kartoffelpc.png"><img src="kartoffelpc.png" style="width:4vw;height:4vw;"></a>
        	<a href="./login/login.php">
				<?php
					echo($username);
				?>
			</a>
        	<a href="statistics.html"><span class="material-symbols-outlined">bar_chart</span></a>
		    <a href="settings.html"><span class="material-symbols-outlined">settings</span></a>
		</div>
    </header>
</body>
