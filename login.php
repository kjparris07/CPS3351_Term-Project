<?php
include("header.php");
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

$sql = "select * from users where email='" . $formEmail . "' and pass=SHA1('" . $formPass . "')";
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

if (count($result) == 0 ) {
    echo "<div class='main'><p>Invalid Credentials.</p><p>Please login or create an account <a href='index.php' class='backToLogin'>here</a></p></div>";
} else {
    $cookie_name = "user";
    $expireTime = time() + 3600;

    $cookie_data = json_encode([
        'value' => $formEmail,
        'expiry' => $expireTime
    ]);

    setcookie($cookie_name, $cookie_data, $expireTime);
    
    echo "<div class='main'><p>Login successful!</p><p><a href='home.php' id='proceedHome'>Pay for parking.</a></p></div>";
}

include("footer.html");
?>
