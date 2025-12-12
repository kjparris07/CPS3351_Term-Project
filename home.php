<?php
include('header.php');
if (isset($_COOKIE["user"])) {
    include('checkInfo.html');
} else {
    include('loginRequest.html');
}
include('footer.html');
?>