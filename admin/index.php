<?php include "includes/header.php"?>
<?php include "includes/footer.php"?>
<?php include "includes/navigation.php"?>



    <div id="wrapper">
        <?php 

        
        ?>

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

                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>
                                    <?php
                                        $query = "SELECT * FROM posts ";
                                        $select_all_post = mysqli_query($connection, $query);
                                        $post_count = mysqli_num_rows($select_all_post);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?=$post_count?></div>
                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <?php
                                        $query = "SELECT * FROM comments ";
                                        $select_all_comment = mysqli_query($connection, $query);
                                        $comment_count = mysqli_num_rows($select_all_comment);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?=$comment_count?></div>
                                        <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comment.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <?php
                                        $query = "SELECT * FROM users ";
                                        $select_all_users = mysqli_query($connection, $query);
                                        $user_count = mysqli_num_rows($select_all_users);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                    <div class='huge'><?=$user_count?></div>
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <?php
                                        $query = "SELECT * FROM categories ";
                                        $select_all_categories = mysqli_query($connection, $query);
                                        $categories_count = mysqli_num_rows($select_all_categories);
                                    ?>
                                    <div class="col-xs-9 text-right">
                                        <div class='huge'><?=$categories_count?></div>
                                        <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <?php 
                    // count draft post
                    $query = "SELECT * FROM posts WHERE post_status = 'draff' ";
                    $select_all_draff_post = mysqli_query($connection, $query);
                    $post_draff_count = mysqli_num_rows($select_all_draff_post);
                    // count publish post
                    $query = "SELECT * FROM posts WHERE post_status = 'publish' ";
                    $select_all_publish_post = mysqli_query($connection, $query);
                    $post_publish_count = mysqli_num_rows($select_all_publish_post);
                    // count unapproved comment
                    $query = "SELECT * FROM comments WHERE comment_status = 'unapproved' ";
                    $select_all_unapproved_comments = mysqli_query($connection, $query);
                    $unapproved_comments_count = mysqli_num_rows($select_all_unapproved_comments);
                    // count approved comment
                    $query = "SELECT * FROM comments WHERE comment_status = 'approved' ";
                    $select_all_approved_comments = mysqli_query($connection, $query);
                    $approved_comments_count = mysqli_num_rows($select_all_approved_comments);
                    // count subscriber user
                    $query = "SELECT * FROM users WHERE role = 'subscriber' ";
                    $select_all_subscriber = mysqli_query($connection, $query);
                    $subscriber_count = mysqli_num_rows($select_all_subscriber);
                    // count admin user
                    $query = "SELECT * FROM users WHERE role = 'admin' ";
                    $select_all_admin = mysqli_query($connection, $query);
                    $admin_count = mysqli_num_rows($select_all_admin);
                ?>
                <div class="row">
                    <script type="text/javascript">
                        google.charts.load('current', {'packages':['bar']});
                        google.charts.setOnLoadCallback(drawChart);
                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                            ['Data', 'Count'],
                            <?php
                                $element_text = ['Active Post', 'Draff Post','Unapproved Comments', 'Approved Comments', 'Admin User', 'Subscriber User', 'Categories'];
                                $element_count = [$post_publish_count, $post_draff_count, $unapproved_comments_count, $approved_comments_count, $admin_count, $subscriber_count, $categories_count];
                                
                                for ($i=0; $i < 7 ; $i++) { 
                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                                }
                            
                            ?>


                            // ['posts', 1000],
                            ]);

                            var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                            };

                            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                            chart.draw(data, google.charts.Bar.convertOptions(options));
                        }
                    </script>
                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
