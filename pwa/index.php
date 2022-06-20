<?php
	session_start();
	if ($_SESSION) {
		$achne = $_SESSION["username"];
	} else {
		$achne = "Unknown";
	}
?>
<!DOCTYPE html>
<head>
	<link rel="manifest" href="manifest.json">
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="UTF-8" />
	<meta name="theme-color" content="#1ac6ff">
	<title >Trainings-Planer</title>
	<link rel="apple-touch-icon" href="defeat.png">
	<script language="javascript" type="module" src="index.js"></script>
	<script language="javascript" type="module" src="upload.js"></script>
 </head>
<body>
	<script type="module">
	if ('serviceWorker' in navigator) {
	try {
		navigator.serviceWorker.register('./sw.js');
	} catch (error) {
		console.error(`Registration failed with ${error}`);
	}
	}
	</script>
    <header>
        <div class="topnav">
	    	<div class="kartoffel"><img src="kartoffelpc.png" style="width:4vw;height:4vw;" /></div>
        	<a href="./login/login.php">
				<?php
					echo($achne);
				?>
			</a>
        	<a href="projects.html"><img src="statistics.png" style="width:4vw;height:4vw;"></a>
			<a href="settings.html"><img src="settings.png" style="width:4vw;height:4vw;"></a>
		</div>
		<div class="topnav2">
 	 		<a href="basicidea.html">Basic Idea</a>
  			<a href="news.html">News</a>
  			<a href="contact.html">Contact</a>
  			<a href="#about">About</a>
		</div>
    </header>
		<div id="aha">aha</div>
		<form>
			<label for="data">Data</label><br>
  		<input type="text" id="data" name="data">
			<input type="submit" value="submit" id="upload">
		</form>
</body>
