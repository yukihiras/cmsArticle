<?php include "includes/db.php";?>
<?php include "includes/header.php";?>
<?php include "includes/navigation.php"; ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <h1 class="text-center" style="font-weight: 600;" >Article Archive Website System </h1>
                <?php 
                if (isset($_GET['p_id'])) {
                    $the_post_id = $_GET['p_id'];
                    
                    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                        $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE  post_id = $the_post_id";
                        $send_query = mysqli_query($connection, $view_query);
                    }

                    $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                    $select_all_post = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_all_post)){
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                    ?>

                        <!-- First Blog Post -->
                        <h2>
                            <a style="font-weight: 550; text-transform: uppercase;" href="#"><?php echo $post_title ?></a>
                        </h2>
                        <p class="lead">
                            by <a href="index.php"><?php echo $post_author ?></a>
                        </p>
                        <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                        <hr>
                        <img class="img-responsive" src="images/<?php echo $post_image?>" alt="">
                        <hr>
                        <p><?php echo $post_content ?></p>

                        <hr>
               <?php } 
            
            
            }else {
                header("Location: index.php");
            }?>
                <!-- Blog Comments -->

                <!-- Comments Form -->
                <?php 
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        if (isset($_POST['submit_comment'])) {
                            $the_post_id = escape($_GET['p_id']);
                            $comment_author = escape($_POST['comment_author']);
                            $comment_email = escape($_POST['comment_email']);
                            $comment_content = escape($_POST['comment_content']);

                            if (empty($comment_author) && empty($comment_email) && empty($comment_content)) {
                                $error = "All the field should not be empty";
                            }else {
                                $query = "INSERT INTO comments (comment_post_id, comment_date, comment_author, comment_email, comment_content, comment_status) ";
                                $query .= "VALUES('$the_post_id', now(), '$comment_author', '$comment_email', '$comment_content', 'approved')";
                                $insert_comment_query = mysqli_query($connection, $query);
                                if (!$insert_comment_query) {
                                    die("QUERY FAILED" . mysqli_error($connection));
                                }

                                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                                $query .= "WHERE post_id = $the_post_id ";
                                $update_post_comment_count = mysqli_query($connection, $query);
                            }
                            
                        }

                        // function redirect($location){
                        //     return header(header:"Location:" . $location);
                        // }

                        // redirect(location:"/cms/post.php?p_id=$the_post_id");
                    }
                ?>
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <h4 style="color:red;"><?php if(isset($error)) {echo $error;}?></h4>
                    <form role="form" action="" method="POST">
                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input class="form-control" name="comment_author" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control" name="comment_email" value="">
                        </div>
                        <div class="form-group">
                        <label for="content">Content</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="submit_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->
                <?php 
                    $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
                    $query .= "AND comment_status = 'approved' ORDER BY comment_id DESC";
                    $select_comment_by_status = mysqli_query($connection, $query);
                    if (!$select_comment_by_status) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    while ($row = mysqli_fetch_assoc($select_comment_by_status)) {
                        $comment_date = $row['comment_date'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_content = $row['comment_content'];
                ?>
                    <!-- Comment -->
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object" src="http://placehold.it/64x64" alt="">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading"><?=$comment_author?>
                                <small><?=$comment_date;?></small>
                            </h4>
                            <?=$comment_content;?>
                        </div>
                    </div>
                    
                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            

        </div>
        <!-- /.row -->

        <hr>
<?php 
include "includes/footer.php";


?>
