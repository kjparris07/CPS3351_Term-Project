<?php
include('header.php');

if (isset($_COOKIE["user"])) {
    $zone = $_GET['zone'];
    $space = $_GET['space'];

    $user_cookie_data = json_decode($_COOKIE["user"]);
    $user_expire_time = $user_cookie_data['expiry'];

    $zone_cookie_data = json_encode([
        'value' => $zone,
        'expiry' => $user_expire_time
    ]);
    $space_cookie_data = json_encode([
        'value' => $space,
        'expiry' => $user_expire_time
    ]);

    setcookie("zone", $zone_cookie_data, $expireTime);
    setcookie("spaceNum", $space_cookie_data, $expireTime);
}

include('payment.html');
include('footer.html');
?>