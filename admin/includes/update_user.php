<?php
    // display data user by id
    if (isset($_GET['us_id'])) {
        $id_display_data_user = $_GET['us_id'];
        $query = "SELECT * FROM users WHERE user_id = {$id_display_data_user} ";
        $display_user_by_id_query = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($display_user_by_id_query)) {
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $password = $row['password'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $user_image = $row['user_image'];
            $role = $row['role'];
        }
    

        if (isset($_POST['update_user'])) {
            $user_name = escape($_POST['user_name']);
            $password = escape($_POST['password']);
            $first_name = escape($_POST['first_name']);
            $last_name = escape($_POST['last_name']);
            $email = escape($_POST['email']);
            $user_image = escape($_FILES['user_image']['name']);
            $user_image_tmp = $_FILES['user_image']['tmp_name'];
            $role = escape($_POST['role']);
            move_uploaded_file($user_image_tmp, "../images/$user_image");


            //mã hóa mật khẩu update user
            // $query = "SELECT randSalt FROM users ";
            // $select_rand_salt_query = mysqli_query($connection, $query);
            // if (!$select_rand_salt_query) {
            //     die("Query Failed" . mysqli_error($connection));
            // }
            // $row = mysqli_fetch_array($select_rand_salt_query);
            // $salt = $row['randSalt'];
            // $hashed_password = crypt($password, $salt);


            //kiểm tra ảnh trống và truy vấn cập nhật users
            if (empty($user_image)) {
                $query = "SELECT * FROM users WHERE user_id = {$id_display_data_user}";
                $select_images = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_images)){
                    $user_image = $row['user_image'];
                }
            }

            if (empty($password)) {
                $query_password = "SELECT password FROM users WHERE user_id = $$id_display_data_user";
                $get_user_query = mysqli_query($connection, $query);
                confirmQuery($get_user_query);
                $row = mysqli_fetch_array($get_user_query);
                $db_user_password = $row['password'];
                
                $query = "UPDATE users SET user_name = '{$user_name}', password = '{$db_user_password}', first_name = '{$first_name}', ";
                $query .= "last_name = '{$last_name}', email = '{$email}', user_image = '{$user_image}', role = '{$role}' WHERE user_id = '{$user_id}' ";
                $update_user = mysqli_query($connection, $query);
                confirmQuery($update_user);
            }else {
                $hashed_password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));
                $query = "UPDATE users SET user_name = '{$user_name}', password = '{$hashed_password}', first_name = '{$first_name}', ";
                $query .= "last_name = '{$last_name}', email = '{$email}', user_image = '{$user_image}', role = '{$role}' WHERE user_id = '{$user_id}' ";
                $update_user = mysqli_query($connection, $query);
                confirmQuery($update_user);
            }

            echo "<h3 style='color: green;'>Users updated</h3><a href='users.php'>Views users</a>";
            echo "<br><a href='users.php'>Views all users</a>";
        }
    }else {
        header("Location: index.php");
    }
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name"  value="<?=$user_name;?>">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input autocomplete="off" type="password" class="form-control" name="password">
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
        <label for="user_image">User image</label>
        <img style="width: 100px;" src="../images/<?=$user_image?>" alt="">
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="role">role</label>
        <select name="role" id="">
            <option value="<?=$role?>"><?=$role?></option>
            <?php 
                if ($role == 'admin') {
                    echo "<option value='subscriber'>Subscriber</option>";
                } else {
                    echo "<option value='admin'>admin</option>";
                }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_user" value="update user">
    </div>
</form>