<?php
require ("aha.php");
if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $passw = $_POST["password"];
    $stmt = $conn->prepare("SELECT * FROM users WHERE user=:username;");
    $stmt->bindParam(":username", $username);
    $stmt->execute();
    $userExists = $stmt->fetchAll();
    if (count($userExists)==0) {
        echo("User doesnt exist");
        header("Location: login.php");
    }
    $passw = hash('sha256',$passw);
    $passwfdb = $userExists[0]["password"];
    if($passw==$passwfdb) {
        session_start();
        $_SESSION["username"] = $userExists[0]["user"];
        header("Location: ../index.php");
    } else {
        echo("Ja ne ist halt falsch ne");
    }
}
?>