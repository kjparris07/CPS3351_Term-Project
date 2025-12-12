<?php
include('header.php');

if (isset($_COOKIE["user"])) {
    $zone = $_GET['zone'];
    $space = $_GET['space'];

    if (isset($_COOKIE["parking_session"])) {
        $old_cookie_data = json_decode($_COOKIE["parking_session"]);
        $old_zone = $old_cookie_data->zone;
        $old_space = $old_cookie_data->spaceNum;
        if (($old_zone == $zone) & ($old_space == $space)) {
            $parking_expiry = $old_cookie_data->expiry;
            $parking_expiry += (int)$_GET['time']*3600;
            $parking_cookie_data = json_encode([
                'value' => $parking_expiry,
                'zone' => $old_zone,
                'spaceNum' => $old_space,
                'expiry' => $parking_expiry
            ]);
        } else {
            $parking_expiry = time() + (int)$_GET['time']*3600;
            $parking_cookie_data = json_encode([
                'value' => $parking_expiry,
                'zone' => $zone,
                'spaceNum' => $space,
                'expiry' => $parking_expiry
            ]);
        }

    }
    setcookie("parking_session", $parking_cookie_data, $parking_expiry);
    

}

include('payment.html');
include('footer.html');
?>