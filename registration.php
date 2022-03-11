<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
<?php 
    if (isset($_POST['submit'])) {
        //lấy dữ liệu từ trường
        $username = escape($_POST['username']);
        $email = escape($_POST['email']);
        $password = escape($_POST['password']);
        $first_name = escape($_POST['first_name']);
        $last_name = escape($_POST['last_name']);
        //validation
        if (!empty($username) && !empty($email) && !empty($password) && !empty($first_name) && !empty($last_name)) {

            $username = mysqli_real_escape_string($connection, $username);
            $email = mysqli_real_escape_string($connection, $email);
            $password = mysqli_real_escape_string($connection, $password);
            $first_name = mysqli_real_escape_string($connection, $first_name);
            $last_name = mysqli_real_escape_string($connection, $last_name);
            // mã hóa mật khẩu cách 1: 
            //query
            // $query = "SELECT randSalt FROM users ";
            // $select_rand_salt_query = mysqli_query($connection, $query);
            // if (!$select_rand_salt_query) {
            //     die("Query Failed" . mysqli_error($connection));
            // }
            
            // $row = mysqli_fetch_array($select_rand_salt_query);
            // $salt = $row['randSalt'];
            // $password = crypt($password, $salt); //lỗi tài khoản đầu tiên ko mã hóa được mật khẩu

            // mã hóa mật khẩu cách 2: 
            $password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));


            $query = " INSERT INTO users (user_name, password, email, first_name, last_name, role) ";
            $query .= "VALUES ('{$username}', '{$password}', '{$email}', '{$first_name}', '{$last_name}', 'subscriber') "; // và khi mã hóa câu lệnh truy vấn phải để biến password nằm trong ''
            $register_user = mysqli_query($connection, $query);
            if (!$register_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            $message = "Your register is success";
        }else{
            $error = "all fields cannot be empty";
        }
       
    }



?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h4 class="text-center"style="color:red;"><?php if(isset($error)){echo $error;}?></h4>
                        <h4 class="text-center"style="color:green;"><?php if(isset($message)){echo $message;}?></h4>
                        <div class="form-group">
                            <label for="username" class="sr-only">User name</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="sr-only">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Your First Name">
                        </div>
                        <div class="form-group">
                            <label for="last_name" class="sr-only">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Your Last Name">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
