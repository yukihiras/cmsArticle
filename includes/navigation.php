    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">

            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Home</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php 
                    $query = "SELECT * FROM categories LIMIT 3";
                    $select_all_cate = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_all_cate)){
                    $cate_title = $row['cate_title'];
                    $cate_id = $row['cate_id'];

                    $category_class = '';
                    $registration_class = '';
                    $contact_class = '';
                    $login_class = '';
                    $registration = 'registration.php';
                    $contact = 'contact.php';
                    $login = 'login.php';
                    $pageName = basename($_SERVER['PHP_SELF']);

                    if (isset($_GET['category']) && $_GET['category'] == $cate_id) {
                        $category_class = 'active';
                    }elseif ($pageName == $registration) {
                        $registration_class = 'active';
                    }elseif ($pageName == $contact) {
                        $contact_class = 'active';
                    }elseif ($pageName == $login) {
                        $login_class = 'active';
                    }
                    echo "<li class='$category_class'><a href='category.php?category=$cate_id'>{$cate_title}</a></li>";
                    }
                    
                    ?>
                    <li>
                        <a href="admin">Admin</a>
                    </li>
                    <?php 
                        if (isset($_SESSION['role'])) {
                            if (isset($_GET['p_id'])) {
                                $the_post_id = $_GET['p_id'];
                                echo "<li><a href='admin/posts.php?source=update_post&p_id={$the_post_id}'>Edit Post</a></li>";
                            }
                        }
                    
                    ?>
                    <li class='<?php echo $registration_class?>'>
                        <a href="registration.php">Registration</a>
                    </li>
                    <li class='<?php echo $contact_class?>'>
                        <a href="contact.php">Contact</a>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
