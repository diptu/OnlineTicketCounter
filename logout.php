<?php
session_start();
session_unset();
$_SESSION['uid']=null;
$_SESSION['usn']=null;
header('Location:admin');
?>