<?php
include("header.php");
if (isset($_COOKIE["zone"]) & isset($_COOKIE["spaceNum"])) {
    echo '<html>
        <body>
            <div class="main">
                <div id="confirmation">
                    <h2>Payment Confirmation</h2>
                    <div id="locationContainer">
                        <div id="left">
                            <p>Zone:</p>
                            <p>Space:</p>
                        </div>
                        <div id="right">
                            <p><?php echo $_COOKIE["zone"] ?></p>
                            <p><?php echo $_COOKIE["spaceNum"] ?></p>
                        </div>
                    </div>
                    
                    <p>Your parking session will end at: <span id="endTime">
                    <?php echo json_decode($_COOKIE["user"])["expiry"]; ?>
                    </span></p>
                    <button id="addTime" class="submit">Add More Time</button>  
                </div>
                
            </div>
        </body>
    </html>';
} else {
    include("loginRequest.html");
}
include("footer.html");
?>