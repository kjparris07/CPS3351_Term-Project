<?php
include("header.html");
$formEmail = $_POST["email"];
$formPass = $_POST["pass"];

$host = 'localhost';
$db = 'cps3351';
$user = 'parrisk';
$pass = '';
$attr = "mysql:host=$host;dbname=$db";
$opts = 
[
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$sql = "select * from users where email='" . $formEmail . "'";
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

if (count($result) > 0) {
    echo "<div class='main'><p>This email already has an account. Please login instead.</p><p><a href='index.php' id='backToLogin'>Back to Login</a></p></div>";
} else {
    $sql = "insert into users values ('" . $formEmail . "', SHA1('" . $formPass . "'))";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);
    
    $cookie_name = "user";
    setcookie($cookie_name, $formEmail, time() + 3600);
    echo "<div class='main'><p>Account created successfully!</p><p><a href='home.php' id='proceedHome'>Pay for parking.</a></p></div>";
}

include("footer.html");
?>
