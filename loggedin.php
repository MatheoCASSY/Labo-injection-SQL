<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<style> 
    body {
        background: lightgreen; 
        color: red; 
        font-family: Papyrus; 
        text-align: center; 
        margin-top: 100px;
    }
    footer {
        position: fixed; 
        bottom: 0; 
        left: 0; 
        right: 0; 
        text-align: center; 
        background-color: red; 
        color: white; 
        padding: 10px;
    }
</style>

<html>
<head>
    <title>Bienvenue</title>
</head>
<body>
    <h1>Bienvenue, <?=$username?> !</h1>
    <p>Tu es connecté(e).</p>

    <a href="logout.php">Se déconnecter</a>
</body>

<footer>
    <p>C’est moche mais ça marche!™</p>
</footer>

</html>
