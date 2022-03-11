<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <?php if (isset($_SESSION['role'])) {?>
        <h4 style="text-transform: uppercase;">LOGGED IN AS <?php echo $_SESSION['user_name']?></h4>
        <a href="includes/logout.php" class="btn btn-primary">Logout</a>
    <?php }else {?>
        <h4>LOGIN</h4>
        <form action="includes/login.php" method="POST">
            <div class="form-group">
                <input name="username" type="text" class="form-control" placeholder="Enter username">
            </div>
            
            <div class="input-group">
                <input name="password" type="password" class="form-control"  placeholder="Enter password">
                <span class="input-group-btn">
                    <button class="btn btn-primary" name="login" type="submit">Login</button>
                </span>
            </div>
        </form>
    <?php }?>

    <!-- /.input-group -->
</div>

<!-- Blog Search Well -->
<div class="well">
    <h4 >BLOG SEARCH</h4>
    <form action="search.php" method="POST">
        <div class="input-group">
            <input name="search" type="text" class="form-control">
            <span class="input-group-btn">
                <button name="submit" class="btn btn-default" type="submit">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->
<div class="well">
    <?php 
        $query = "SELECT * FROM categories ";
        $select_cate_sidebar = mysqli_query($connection, $query);
    
    ?>

    <h4>BLOG CATEGORIES</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class= "list-unstyled">
                <?php 
                    while($row = mysqli_fetch_assoc($select_cate_sidebar)){
                        $cate_title = $row['cate_title'];
                        $cate_id = $row['cate_id'];
                        echo "<li><a href='category.php?category=$cate_id'>{$cate_title}</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include_once "widget.php"?>

</div>