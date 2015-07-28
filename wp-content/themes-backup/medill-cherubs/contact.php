<?php

$to = "r-boye@northwestern.edu";
$subject = "Message from the Medill Cherubs Website";
$message = $_POST["message"] . "\n" .  $_POST["sendersname"] . "\n" . $_POST["sendersemail"];

mail($to, $subject, $message);
?>
<?php
header("Location: http://medillcherubs.org/2013/?page_id=445");
//other code
?>