<?php
$q = intval($_GET['q']);

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

$sql = 'select space_number from parking_spaces where zone ="' . $q . '"';
$stmt = $pdo->query($sql);
$result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0);

foreach($result as $row) {
    echo '<option value=' . $row . '>' . $row . '</option>';
}
?>
