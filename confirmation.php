<?php
include("header.php");
session_start();
?>
<html>
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
                        <p><?php echo $_SESSION["zone"] ?></p>
                        <p><?php echo $_SESSION["spaceNum"] ?></p>
                    </div>
                </div>
                
                <p>Your parking session will end at: <span id="endTime">3:31 PM</span></p>
                <button id="addTime" class="submit">Add More Time</button>  
            </div>
            
        </div>
    </body>
</html>
<?php
include("footer.html");
?>