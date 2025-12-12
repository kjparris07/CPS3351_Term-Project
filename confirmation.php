<?php
date_default_timezone_set('America/New_York');
include("header.php");
if (isset($_COOKIE["parking_session"])) {
    $cookie_data = json_decode($_COOKIE["parking_session"]);
    $zone = $cookie_data->zone;
    $spaceNum = $cookie_data->spaceNum;
    $expiry = $cookie_data->expiry;
    echo '<html>
        <body>
            <div class="main">
                <div id="confirmation">
                    <h2>Payment Confirmation</h2>
                    <div id="locationContainer">
                        <div id="left">
                            <p>Zone: ' . $zone . '</p>
                            <p>Space: ' . $spaceNum . '</p>
                        </div>
                        <div id="right">
                            <p><?php echo $_COOKIE["zone"] ?></p>
                            <p><?php echo $_COOKIE["spaceNum"] ?></p>
                        </div>
                    </div>
                    
                    <p>Your parking session will end at: <span id="endTime">' 
                    .  date('m/d/Y H:i', (int)$expiry) . 
                    '</span></p>
                    <a href="home.php"><button id="addTime" class="submit" >Add More Time</button></a>  
                </div>
                
            </div>
        </body>
    </html>';
} else {
    include("loginRequest.html");
}
include("footer.html");
?>