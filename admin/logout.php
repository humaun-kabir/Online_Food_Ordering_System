<?php
    //include constants.php for SITEURL
    include('../config/constants.php');

    //1. Destroy the session 
    session_destroy();//unset $session['user']

    //2. redirect to login page
    header('location:'.SITEURL.'admin/login.php');


?>