<?php include "includes/header.php"?>
<?php include "includes/footer.php"?>
<?php include "includes/navigation.php"?>

<?php 
    if (isset($_SESSION['user_name'])) {
        $username = $_SESSION['user_name'];
        $query = "SELECT * FROM users WHERE user_name = '{$username}'";
        $select_user_profile_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_array($select_user_profile_query)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            
        }
    }

    if (isset($_POST['update_user'])) {
        $user_name = escape($_POST['user_name']);
        $first_name = escape($_POST['first_name']);
        $last_name = escape($_POST['last_name']);
        $email = escape($_POST['email']);

        $query = "UPDATE users SET user_name = '{$user_name}', first_name = '{$first_name}', ";
        $query .= "last_name = '{$last_name}', email = '{$email}' WHERE user_name = '{$username}' ";
        $update_user = mysqli_query($connection, $query);
        confirmQuery($update_user);
    }


?>
    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header" style="text-align: center">
                            Welcome master
                            <?php echo $_SESSION['user_name'];?>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_name">Username</label>
                                <input type="text" class="form-control" name="user_name"  value="<?=$user_name;?>">
                            </div>
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-control" name="first_name"  value="<?=$first_name;?>">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-control" name="last_name"  value="<?=$last_name;?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email"  value="<?=$email;?>">
                            </div>
                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update_user" value="update profile">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

