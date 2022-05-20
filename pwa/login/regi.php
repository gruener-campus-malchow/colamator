<?php
require ("aha.php");
if (isset($_POST["submit"])) {
    var_dump($_POST);
    $username = $_POST["username"];
    $passw = $_POST["password"];
    $permitlvl = 1;
    $passw = hash('sha256', $passw);
    $stmt = $conn->prepare("SELECT * FROM users WHERE user=:username");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $userexists = $stmt->fetchColumn();
    if (!$userexists) {
        registerUser($username, $passw,$permitlvl);
    }
    else {
        echo('gibtsschondiggi');
    }
}
function registerUser($username,$passw,$permitlvl){
    global $conn;
    $stmt = $conn->prepare("INSERT INTO users(user,password,permitlvl) VALUES(:username, :passw,:permitlvl)");
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":passw", $passw);
    $stmt->bindParam(":permitlvl", $permitlvl);
    $stmt->execute();
    echo("Registriert mit Permit-Level: $permitlvl Username: $username und Passwort: $passw");
    header("Location: ../index.php");
}
?>