<?php
	session_start();
	if (count($_SESSION) != 0) {
		$achne = $_SESSION["username"];
	} else {
		$achne = "Login";
	}
  require ("login/aha.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#1ac6ff">
    <title >Trainings-Planer</title>
    <link rel="stylesheet" href="webappstyle.css">
    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="defeat.png">
  </head>
  <body>
    <script type="text/javascript">
      if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('sw.js', {
        scope: '.' // <--- THIS BIT IS REQUIRED
      }).then(function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope);
      }, function(err) {
        // registration failed :(
        console.log('ServiceWorker registration failed: ', err);
      });
      }
    </script>
    <?php
						echo($achne);
		?>
  </body>
</html>