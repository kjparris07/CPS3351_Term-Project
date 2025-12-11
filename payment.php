<?php
include('header.html');

$zone = $_GET['zone'];
$space = $_GET['space'];
session_start();
$_SESSION["zone"] = $zone;
$_SESSION["spaceNum"] = $space;

include('payment.html');
include('footer.html');
?>