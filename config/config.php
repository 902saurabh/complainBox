<?php
$filerootpath = '/var/complainbox_doc/';
ob_start();        // output buffer start 
session_start();  //session start

date_default_timezone_set('Asia/Kolkata');

$con = mysqli_connect("localhost", "root", "", "complainbox");

if (mysqli_connect_errno()) {
    echo "failed to connect" . mysqli_connect_errno;
}


?>