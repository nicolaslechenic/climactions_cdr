<?php
$db_host = 'localhost';
$db_username = 'root';
$db_password = '';
$db_name = 'projet_cdr';
$DB = mysqli_connect($db_host, $db_username, $db_password, $db_name)
    or die('pas co a la bd'); 


// $test = $db("SELECT * FROM document WHERE genre")
