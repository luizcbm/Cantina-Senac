<?php
session_start();
session_destroy();
header('location:login.php');
include "head.php";
?>

<?php

include "logout.php";

?>

<?php
include "footer.php";
?>