<?php include "includes/header.php"?>
<?php include "includes/footer.php"?>
<?php include "includes/navigation.php"?>






    <div id="wrapper">

        <!-- Navigation -->

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome master
                            <?php echo $_SESSION['user_name'];?>
                        </h1>
                        <h3 class="text-center"style="color:green; font-weight: 700;"><?php if(isset($_POST['update_cate'])){echo "UPDATE SUCCESS CHECK THE LIST!";}?></h3>
                        <div class="col-xs-6">
                            <?php insert_cate(); ?>
                            
                            <form action="" method="post">
                                <label for="cate-title">Add Category</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cate_title" value="">
                                </div>

                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add category">
                                </div>
                                
                            </form>
                            <?php 
                            if (isset($_GET['update'])) {
                                $cate_id = escape($_GET['update']);
                                include "includes/update_category.php";
                            }
                            ?>

                        </div><!--add category-->
                        <div class="col-xs-6"> 
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>id</th>
                                        <th>cateTitle</th>
                                        <th colspan="2">operation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr >
                                        <?php display_all_cate(); //display all cate?>
                                        <?php delete_cate();; //delete all cate?>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
  

                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

