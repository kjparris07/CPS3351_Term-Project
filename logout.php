<?php
include("header.php");
if (isset($_COOKIE["user"])) {
    setcookie("user", "", time() - 60);
    echo "<html><body><div class='main'><p>You are now logged out.</p></div></body></html>";
} else {
    echo "<html><body><div class='main'><p>You are not currently logged in. Log in <a href='index.html'>here</a></p></div></body></html>";
}
?>