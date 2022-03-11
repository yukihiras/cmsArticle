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
                    $per_page = 5;
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                }else {
                    $page = "";
                }

                if ($page == "" || $page == 1) {
                    $page_1 = 0;
                }else {
                    $page_1 = ($page * $per_page) - $per_page;
                }


                
                $post_query_count = "SELECT * FROM posts";
                $find_count = mysqli_query($connection, $post_query_count);
                $count = mysqli_num_rows($find_count);
                $count = ceil($count / $per_page);


                $query = "SELECT * FROM posts WHERE post_status = 'publish' LIMIT $page_1, $per_page";
                $select_all_post = mysqli_query($connection, $query);
                while($row = mysqli_fetch_assoc($select_all_post)){
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,150);
                    $post_status = $row['post_status'];
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
                    <p><?php echo $post_content ?>.......</p>
                    <a class="btn btn-primary" href="post.php?p_id=<?=$post_id;?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                    <hr>
                    
                    
                <?php } ?>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"; ?>
            

        </div>
        <!-- /.row -->

        <hr>
        <ul class="pager">
            <?php 
            for ($i = 1; $i <= $count ; $i++) { 
                if($i == $page){
                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";
                }
                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
            }
            
            ?>
        </ul>
<?php 
include "includes/footer.php";


?>
