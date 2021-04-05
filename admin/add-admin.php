<?php include('partials/menu.php'); ?>

<div class = "main_content">
    <div class="wrapper">
        <h1>Add Admin </h1>

        <br/>
        <?php
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add']; // Displaying session msg
                unset($_SESSION['add']); // Removing session msg
            }
        ?>
        <form action = "" method = "POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td><input type = "text" name = "full_name" placeholder = "Enter your name"> </td>
                </tr>
                <tr>
                    <td>Username Name: </td>
                    <td><input type = "text" name = "username" placeholder = "Your username"> </td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type = "password" name = "password" placeholder = "Your password"> </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name = "submit" value = "Add Admin" class = "btn-secondary">
                    </td>
                </tr>
            </table>
    </div>
</div>


<?php include('partials/footer.php'); ?>

<?php
    //Process the value from the form and save it in database
    //check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        //button clicked
        //echo "Button Clicked";


        //get the data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);


        //SQL query to save the data into Database
        $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$username',
        password = '$password'
        ";
        
        //Executing query and save data to database 
        $res = mysqli_query($conn,$sql) or die(mysqli_error());

        //Check whether the data is inserted or not

        if($res == TRUE)
        {
            $_SESSION['add'] = "Admin added successfully";
            //Redirect page
            header("location:" .SITEURL.'admin/manage-admin.php');
        }else{
            $_SESSION['add'] = "Failed to add admin";
            header("location:" .SITEURL.'admin/add-admin.php');
        }

    }
?>    
