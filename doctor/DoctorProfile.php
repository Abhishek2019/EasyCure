<?php
session_start();
echo "Welcome ".$_SESSION["user"];
session_unset();
session_destroy();
?>
