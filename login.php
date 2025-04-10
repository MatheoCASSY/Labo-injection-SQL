<?php
session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'test_db';

try {
    $db = new PDO("mysql:host=$host", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $db->query("SHOW DATABASES LIKE '$dbname'");
    if (!$stmt->fetch()) {
        include 'setup.php';
        exit();
    }

    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$msg = "";
$u = "";
$p = "";

if ($_POST) {
    $u = $_POST["username"];
    $p = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username = '$u' AND password = '$p'";
    $stmt = $db->query($sql);
    
    /*exemple injection sql ' OR '1'  #égal# '1 */
    
    if ($stmt->fetch()) {
        $_SESSION['username'] = $u; 
        header('Location: loggedin.php');
        exit();
    } else {
        $msg = "Nom d'utilisateur ou mot de passe incorrect.";
    }
}
?>

<style> 
    body {
        background: rgb(233, 180, 180); 
        color: blue; 
        font-family: Arial, Helvetica, sans-serif; 
        text-align: center; 
        margin-top: 100px;
    }
    footer {
        position: fixed; 
        bottom: 0; 
        left: 0; 
        right: 0; 
        text-align: center; 
        background-color: rgb(53, 49, 49); 
        color: white; 
        padding: 10px;
    }
</style>

<html>
<head>
    <title>Connexion</title>
</head>
<body>
    <h1>Page de connexion</h1>

    <form method="POST">
        <input name="username" placeholder="Nom d'utilisateur"><br><br>
        <input name="password" placeholder="Mot de passe" type="password"><br><br>
        <button>Se connecter</button>
    </form>

    <p><?=$msg?></p>    
</body>

<footer>
    <p>C’est moche mais ça marche!™</p>
</footer>

</html>
