<?php
	session_start();
	if ($_SESSION) {
		$achne = $_SESSION["username"];
	} else {
		$achne = "Login";
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
        <a class="active" href="index.php">Home</a>
        <a href="projects.html">Diagramme</a>
				<a href="./login/login.php">
					<?php
						echo($achne);
					?>
				</a>
			</div>
		<div class="topnav2">
 	 		<a href="basicidea.html">Basic Idea</a>
  			<a href="news.html">News</a>
  			<a href="contact.html">Contact</a>
  			<a href="#about">About</a>
		</div>
    </header>
		<div id="aha">aha</div>
		<form action="submit">
			<label for="data">Data</label><br>
  		<input type="text" id="data" name="data">
		</form>
</body>
