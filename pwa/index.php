<?php
	session_start();
	if (count($_SESSION) != 0) {
		$achne = $_SESSION["username"];
	} else {
		$achne = "Login";
	}
?>
<head>
    <link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta charset="UTF-8" />
	<title> The Hub </title>
 </head>
<body>
	<script type="module" src="./main.js"></script>
    <header>
        <div class="topnav">
	    	<div class="kartoffel"><img src="kartoffelpc.png" style="width:4vw;height:4vw;" /></div>
            	<a class="active" href="index.php">Home</a>
            	<a href="projects.html">Projects</a>
            	<a href="info.html">Info</a>
				<a href="sources.html">Sources</a>
				<a href="webapp.php">Trainingsplaner</a>
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
</body>
