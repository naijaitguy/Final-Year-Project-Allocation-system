<?php 
session_start();
session_unset("Email");
session_destroy();
header("location:?View=login")

?>