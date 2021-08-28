<?php
    //include connstant.php file here
    include('../config/constants.php');

    //1. get the ID of admin to be deleted
    $id = $_GET['id'];

    //Create SQl query to delete admin
    $sql = "DELETE FROM tbl_admin WHERE id=$id";

    //execute the query
    $res = mysqli_query($conn,$sql);

    //check whether the query executed successfully or not
    if($res==TRUE)
    {
         //query executed successfully and admin deleted
         //create session variable to display message
         $_SESSION['delete'] = "<div class='success'>Admin deleted successfully.</div>";
         //Redirect to manage admin page
         header('location:'.SITEURL.'admin/manage-admin.php');
         
    }
    else
    {
         //failed to delete admin

         $_SESSION['delete'] = "<div class='error'>Failed to delete admin.</div>";
         //Redirect to manage admin page
         header('location:'.SITEURL.'admin/manage-admin.php');
         
    }

    //3. Redirect to manage admin page with message(success/error)

?>