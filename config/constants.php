<?php
    //start session
    session_start();

    //create constant to store non repeating values
    define('SITEURL', 'http://localhost/Online_Food_Ordering_System/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME','food-order');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //database connection
    $db_select = mysqli_select_db($conn,'food-order') or die(mysqli_error()); //selecting databse
?>