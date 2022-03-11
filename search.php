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
                    if (isset($_POST['submit'])) {
                        $search = escape($_POST['search']);
                        $query = "SELECT * FROM posts WHERE post_tags  LIKE '%$search%' ";
                        $search_query = mysqli_query($connection, $query);
                        if (!$search_query) {
                            die("QUERY FAILED" . mysqli_error($connection));
                        }
                        
                        $count = mysqli_num_rows($search_query);
                        if ($count == 0) {
                            echo "<h1> NO RESULT </h1>";
                        }else {

                            while($row = mysqli_fetch_assoc($search_query)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = substr($row['post_content'],0,150);
                            ?>
                
            
                                <!-- First Blog Post -->
                                <h2>
                                    <a style="font-weight: 550; text-transform: uppercase;" href="post.php?p_id=<?=$post_id;?>"><?php echo $post_title ?></a>
                                </h2>
                                <p class="lead">
                                    by <a href="author_post.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php echo $post_author ?></a>
                                </p>
                                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                                <hr>
                                <a href="post.php?p_id=<?=$post_id;?>"><img class="img-responsive" src="images/<?php echo $post_image?>" alt=""></a>
                                <hr>
                                <p><?php echo $post_content ?></p>
                                <a class="btn btn-primary" href="post.php?p_id=<?=$post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            
                                <hr>
            
                            <?php } 
                        }
                    }
                ?>   
            
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            

        </div>
        <!-- /.row -->

        <hr>

<?php 
include "includes/footer.php";


?>
