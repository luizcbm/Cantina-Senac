<?php
session_start();
session_destroy();
header('location:login.php');
include "head.php";
?>

<?php

include "paginas/logout.php"

?>

<?php
include "footer.php"
?>