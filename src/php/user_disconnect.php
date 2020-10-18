<?php
session_start();
$_SESSION['USER_ID'] = '';
$_SESSION['REGISTRATION_ID'] = '';
session_write_close();

header('Location: ./../../index.php');
