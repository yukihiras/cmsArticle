<?php include "header.php";?>
<?php 
    if (isset($_POST['login'])) {
        $username = escape($_POST['username']);
        $password = escape($_POST['password']);

        $query = "SELECT * FROM users WHERE user_name = '{$username}'";
        $select_user_query = mysqli_query($connection, $query);
        confirmQuery($select_user_query);

        while ($row = mysqli_fetch_array($select_user_query)) {

            $db_user_id = $row['user_id'];
            $db_user_name = $row['user_name'];
            $db_user_password = $row['password'];
            $db_user_firstname = $row['first_name'];
            $db_user_lastname = $row['last_name'];
            $db_user_role = $row['role'];
   
   
            if (password_verify($password,$db_user_password)) {
   
                $_SESSION['user_name'] = $db_user_name;
                $_SESSION['first_name'] = $db_user_firstname;
                $_SESSION['last_name'] = $db_user_lastname;
                $_SESSION['role'] = $db_user_role;
                
                header("Location: ../index.php");
            } else {
   
                header("Location: ../index.php");
            }
   
   
   
        }
    }


?>