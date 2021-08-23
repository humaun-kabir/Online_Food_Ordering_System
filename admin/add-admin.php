<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br><br>

        <?php
            if(isset($_SESSION['add']))//checking wheather the session is set or not
            {
                echo $_SESSION['add'];//display the session message if set
                unset($_SESSION['add']);//remove session message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" placeholder="Enter your name">
                    </td>
                </tr>

                <tr>
                    <td>Username :</td>
                    <td>
                        <input type="text" name="username" placeholder="Username">
                    </td>
                </tr>

                <tr>
                    <td>Pasword :</td>
                    <td>
                        <input type="password" name="password" placeholder="Password">
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>

<?php include('partials/footer.php'); ?>

<?php
    //process the value from form and save it in database
    //check wheather the button is clicked or not

    if(isset($_POST['submit'])){
        //button clicked 
        
        //1. get the data from from
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption with md5

        //2.sql query to save the data into database
        $sql = "INSERT INTO tbl_admin SET
                full_name = '$full_name',
                username = '$username',
                password = '$password'
        ";

        
        //3. executing query and saving data into database
        $res = mysqli_query($conn, $sql) or die(mysqli_error());
        
        //4. check wheather the (query is executed) data is inserted or not and display appropiate message
        if($res == TRUE){
            //data inserted
            //create a session variable
            $_SESSION['add'] = "AdminAdded Successfully";
            //Redirect page to manage admin
            header('location:'.SITEURL.'admin/manage-admin.php');
        }
        else
        {
            //failled to insert data
            //create a session variable
            $_SESSION['add'] = "failed to Add Admin";
            //Redirect page to add admin
            header('location:'.SITEURL.'admin/add-admin.php');
        }
    }
?>