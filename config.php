<?php
    session_start();
    $con = mysqli_connect('localhost', 'root', '', 'honeypot');
    if (!$con) {
        die();
    }
?>