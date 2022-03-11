
<?php 

    function redirect($location){
        header("Location:" . $location);
        exit;
    }

    function ifItIsMethod($method=null){
        if ($_SERVER['REQUEST_METHOD'] == strtoupper($method)) {
            return true;
        }
        return false;
    }

    function isLoggedIn(){
        if(isset($_SESSION['role'])){
            return true;
        }
        return false;
    }

    function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
        if (isLoggedIn()) {
            redirect($redirectLocation);
        }
    }


    function escape($string){
        global $connection;
        return mysqli_real_escape_string($connection, trim($string)); // Hàm strip_tags() sẽ loại bỏ các thẻ HTML và PHP ra khỏi chuỗi. Hàm sẽ trả về chuỗi đã loại bỏ hết các thẻ HTML và PHP.

    }



    function users_online(){
        if (isset($_GET['onlineusers'])) {
            global $connection;
            if (!$connection) {
                session_start();
                include "./../includes/db.php";
                $session = session_id();
                $time = time();
                $time_out_in_seconds = 30;
                $time_out = $time - $time_out_in_seconds;
                $query = "SELECT * FROM users_online WHERE session = '$session'";
                $send_query = mysqli_query($connection, $query);
                $count = mysqli_num_rows($send_query);
                if ($count == null) {
                    $sql = "INSERT INTO users_online(session, time) VALUES('$session', '$time')";
                    mysqli_query($connection, $sql);
                }else {
                    mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
                }
                $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
                echo $count_user = mysqli_num_rows($users_online_query);
            }
        }
    }

    users_online();
    
        
    function confirmQuery($result){
        global $connection;
        if (!$result) {
            die("QUERY FAILED" . mysqli_error($connection));
        }
    }


// CRUD CATEGORY

    function insert_cate(){
        global $connection;
        if (isset($_POST['submit'])) {
                                    
            $cate_title = escape($_POST['cate_title']);
            if (empty($cate_title)) {
                echo "<h3>this field should not be empty</h3>";
            }else {
                $query = "INSERT INTO categories (cate_title) VALUES ('$cate_title')";
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("QUERY FAILED" . mysqli_error($connection));
                }
            }
            
        }
    }

    function display_all_cate(){
        global $connection;
        $query = "SELECT * FROM categories ";
        $select_cate = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($select_cate)){
            $cate_id = $row['cate_id']; 
            $cate_title = $row['cate_title'];
            echo "<tr>";
            echo "<td>{$cate_id}</td>";
            echo "<td>{$cate_title}</td>";
            echo "<td><a class='btn btn-sm btn-danger' onClick=\"javascript: return confirm('Are you sure want to delete this post');\" href='categories.php?delete={$cate_id}'><i class='fas fa-trash'></i></a></td>";
            echo "<td><a class='btn btn-sm btn-info' href='categories.php?update={$cate_id}'><i class='fas fa-edit'></i></a></td>";
            echo "</tr>";
        }
    }

    function delete_cate(){
        global $connection;
        if (isset($_GET['delete'])) {
            $id_delete_cate = escape($_GET['delete']);
            $query = "DELETE FROM categories WHERE cate_id = {$id_delete_cate} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: categories.php");

        }
    }

    function update_cate(){
        // UPDATE QUERY
        global $connection;
        //if (isset($_GET['update'])) {
        if (isset($_POST['update_cate'])) {
            $id_update_cate = escape($_GET['update']);
            $cate_title = escape($_POST['cate_title']);
            $query = "UPDATE categories SET cate_title = '{$cate_title}' WHERE cate_id = {$id_update_cate} ";
            $update_query = mysqli_query($connection, $query);
            if (!$update_query) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
        }
        //}
    }

// CRUD POST
    function display_all_post(){
        global $connection;
        $query = "SELECT * FROM posts ORDER BY post_id DESC";
        $display_post = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($display_post)) {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
            $post_views_count = $row['post_views_count'];
            echo "<tr>";
            ?>
            <td><input class='checkBoxes' type='checkbox' name='checkboxArray[]' value='<?=$post_id?>'></td>
            <?php
            echo "<td>{$post_id}</td>";

            $query = "SELECT * FROM categories WHERE cate_id = {$post_category_id} ";
            $update_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($update_query)){
                $cate_id = $row['cate_id']; 
                $cate_title = $row['cate_title'];
                if (empty($cate_title)) {
                    $cate_title = "no cate";
                }
            }
           
            echo "<td>{$cate_title}</td>";
            echo "<td>{$post_title}</td>";
            echo "<td>{$post_author}</td>";
            echo "<td>{$post_date}</td>";
            echo "<td><img style='width: 100px' src='../images/$post_image' alt='image'></td>";
            echo "<td>{$post_content}</td>";
            echo "<td>{$post_tags}</td>";
            echo "<td>{$post_comment_count}</td>";
            echo "<td>{$post_status}</td>";
            echo "<td><a href='../post.php?p_id=$post_id'>view post</a></td>";
            echo "<td>{$post_views_count}</td>";
            echo "<td><a href='posts.php?reset={$post_id}'>reset views</a></td>";
            echo "<td><a class='btn btn-sm btn-danger' onClick=\"javascript: return confirm('Are you sure want to delete this post');\" href='posts.php?delete={$post_id}'><i class='fas fa-trash'></i></a></td>";
            echo "<td><a class='btn btn-sm btn-info'  href='posts.php?source=update_post&p_id={$post_id}'><i class='fas fa-edit'></i></a></td>";
            echo "</tr>";

        }

    }

    function insert_post(){
        global $connection;
        if (isset($_POST['create_post'])) {
            $post_title = escape($_POST['post_title']);
            $post_cate_id = escape($_POST['post_category_id']);
            $post_author = escape($_POST['post_author']);
            $post_image = escape($_FILES['post_image']['name']);
            $post_image_temp = $_FILES['post_image']['tmp_name'];
            $post_content = escape($_POST['post_content']);
            $post_tags = escape($_POST['post_tags']);
            $post_status = escape($_POST['post_status']);
            $post_date = date('d-m-y');
            // $post_comment_count = 4;
            move_uploaded_file($post_image_temp, "../images/$post_image");
    
            $query = " INSERT INTO posts (post_title, post_category_id, post_author, post_date, post_image, post_content, post_tags, post_status) ";
            $query .= "VALUES ('{$post_title}', {$post_cate_id}, '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
            $create_post = mysqli_query($connection, $query);
            if (!$create_post) {
                die("QUERY FAILED" . mysqli_error($connection));
            }
            echo "<h3 style='color: green;'>Post created</h3><a href='posts.php'>Views all posts</a>";
        }
        
    }

    function delete_post(){
        global $connection;
        if (isset($_GET['delete'])) {
            $id_delete_post = escape($_GET['delete']);
            $query = "DELETE FROM posts WHERE post_id = {$id_delete_post} ";
            $delete_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
    }

    function reset_post(){
        global $connection;
        if (isset($_GET['reset'])) {
            $id_reset_post = escape($_GET['reset']);
            $query = "UPDATE posts SET post_views_count = 0 WHERE post_id = {$id_reset_post} ";
            $reset_query = mysqli_query($connection, $query);
            header("Location: posts.php");
        }
    }



// CRUD COMMENT
    function display_all_comment(){
        global $connection;
        $query = "SELECT * FROM comments ORDER BY comment_id DESC";
        $display_comments_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($display_comments_query)){
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_date = $row['comment_date'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            
            echo "<tr>";
            echo "<td>{$comment_id}</td>";
            echo "<td>{$comment_post_id}</td>";
            echo "<td>{$comment_date}</td>";
            echo "<td>{$comment_author}</td>";
            echo "<td>{$comment_email}</td>";
            echo "<td>{$comment_content}</td>";
            echo "<td>{$comment_status}</td>";
            
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
            $select_post_by_id = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_post_by_id)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                echo "<td><a href='../post.php?p_id=$post_id'>{$post_title}</a></td>";
            }
            
            echo "<td><a href='comment.php?approve={$comment_id}'>Approve</a></td>";
            echo "<td><a href='comment.php?unapprove={$comment_id}'>Unapprove</a></td>";
            echo "<td><a class='btn btn-sm btn-danger' onClick=\"javascript: return confirm('Are you sure want to delete this post');\" href='comment.php?delete={$comment_id}'><i class='fas fa-trash'></i></a></td>";
            echo "</tr>";
        }
    }

    function delete_comment(){
        global $connection;
        if (isset($_GET['delete'])) {
            $id_delete_comment = escape($_GET['delete']);
            $query = "DELETE FROM comments WHERE comment_id = {$id_delete_comment} ";
            $delete_comment_query = mysqli_query($connection, $query);
            header("Location: comment.php");
            confirmQuery($delete_comment_query);
        }
    }
    
    function upaprrove_comment(){
        global $connection;
        if (isset($_GET['unapprove'])) {
            $id_unapprove_comment = escape($_GET['unapprove']);
            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = {$id_unapprove_comment} ";
            $unapprove_comment_query = mysqli_query($connection, $query);
            header("Location: comment.php");
            confirmQuery($unapprove_comment_query);
        }
    }

    function approve_comment(){
        global $connection;
        if (isset($_GET['approve'])) {
            $id_approve_comment = escape($_GET['approve']);
            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = {$id_approve_comment}";
            $approve_comment_query = mysqli_query($connection, $query);
            header("Location: comment.php");
            confirmQuery($approve_comment_query);
        }
    }



// CRUD USERS
    function display_all_user(){
        global $connection;
        $query = "SELECT * FROM users ORDER BY user_id DESC";
        $display_user_query = mysqli_query($connection, $query);
        while($row = mysqli_fetch_assoc($display_user_query)){
            $user_id = $row['user_id'];
            $user_name = $row['user_name'];
            $first_name = $row['first_name'];
            $last_name = $row['last_name'];
            $email = $row['email'];
            $user_image = $row['user_image'];
            $role = $row['role'];
            echo "<tr>";
            echo "<td>{$user_id}</td>";
            echo "<td>{$user_name}</td>";
            echo "<td>{$first_name}</td>";
            echo "<td>{$last_name}</td>";
            echo "<td>{$email}</td>";
            echo "<td><img style='width: 100px' src='../images/$user_image' alt='image'></td>";
            echo "<td>{$role}</td>";
            echo "<td><a href='users.php?change_to_admin={$user_id}'>Admin</a></td>";
            echo "<td><a href='users.php?change_to_subscriber={$user_id}'>Subscriber</a></td>";
            echo "<td><a class='btn btn-sm btn-danger' onClick=\"javascript: return confirm('Are you sure want to delete this post');\" href='users.php?delete={$user_id}'><i class='fas fa-trash'></i></a></td>";
            echo "<td><a <a class='btn btn-sm btn-info' href='users.php?source=update_user&us_id={$user_id}'><i class='fas fa-edit'></i></a></td>";
            echo "</tr>";
        }

    }

    function change_to_admin(){
        global $connection;
        if (isset($_GET['change_to_admin'])) {
            $id_change_to_admin = escape($_GET['change_to_admin']);
            $query = "UPDATE users SET role = 'admin' WHERE user_id = {$id_change_to_admin} ";
            $change_to_admin_query = mysqli_query($connection, $query);
            header("Location: users.php");
            confirmQuery($change_to_admin_query);
        }
    }

    function change_to_subscriber(){
        global $connection;
        if (isset($_GET['change_to_subscriber'])) {
            $id_change_to_subscriber = escape($_GET['change_to_subscriber']);
            $query = "UPDATE users SET role = 'subscriber' WHERE user_id = {$id_change_to_subscriber} ";
            $change_to_subscriber_query = mysqli_query($connection, $query);
            header("Location: users.php");
            confirmQuery($change_to_subscriber_query);
        }
    }

    function insert_user(){
        global $connection;
        if (isset($_POST['created_user'])) {
            $user_name = escape($_POST['user_name']);
            $password = escape($_POST['password']);
            $first_name = escape($_POST['first_name']);
            $last_name = escape($_POST['last_name']);
            $email = escape($_POST['email']);
            $user_image = escape($_FILES['user_image']['name']);
            $user_image_temp = $_FILES['user_image']['tmp_name'];
            $role = escape($_POST['role']);

            $password = password_hash($password, PASSWORD_DEFAULT, array('cost' => 10));
            move_uploaded_file($user_image_temp, "../images/$user_image");
            
            

            $query = " INSERT INTO users (user_name, password, first_name, last_name, email, user_image, role) ";
            $query .= "VALUES ('{$user_name}', '{$password}', '{$first_name}', '{$last_name}', '{$email}', '{$user_image}', '{$role}') ";
            $create_user = mysqli_query($connection, $query);
            if (!$create_user) {
                die("QUERY FAILED" . mysqli_error($connection));
            }

            echo "<h3 style='color: green;'>Users created</h3><a href='users.php'>Views all users</a>";
        }
    }
    
    function delete_user(){
        global $connection;
        if (isset($_GET['delete'])) {
            if (isset($_SESSION['role'])) {
                if ($_SESSION['role'] == 'admin') {
                    $id_delete_user = escape($_GET['delete']);
                    $query = "DELETE FROM users WHERE user_id = {$id_delete_user} ";
                    $delete_query = mysqli_query($connection, $query);
                    header("Location: users.php");
                }
            }
        }
    }
?>
