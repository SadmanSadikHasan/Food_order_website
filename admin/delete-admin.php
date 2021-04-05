<?php

// Include constants.php file here
include('../config/constants.php');
// Get the id of admin to be deleted
$id = $_GET['id'];

// create sql query to delete admin
$sql = "DELETE FROM tbl_admin WHERE id=$id";

//Execute the query
$res = mysqli_query($conn, $sql);

//check whether the query executed successfully or not
if($res == true)
{
    // Query executed successfully and admin deleted
    //echo "admin deleted";
    // create session variable to display msg
    $_SESSION['delete'] = "<div class='success'>Admin deleted successfully</div>";

    // Redirect to manage admin page
    header('location:'.SITEURL.'admin/manage-admin.php');
}else{
    // failed to delete admin
    //echo "failed to delete admin";
    $_SESSION['delete'] = "<div class='error'>failed to delete admin try again later.</div>";
    header('location:'.SITEURL.'admin/manage-admin.php');
}
//Redirect to manage admin page with msg



?>