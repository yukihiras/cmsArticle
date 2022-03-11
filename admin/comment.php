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
                        <h1 class="page-header" style="text-align: center">
                            Welcome master
                            <?php echo $_SESSION['user_name'];?>
                        </h1>
                        <?php 
                            if (isset($_GET['source'])) {
                                $source = escape($_GET['source']);
                            }else {
                                $source = '';
                            }
                            switch ($source) {
  
                                default:
                                    include "includes/view_all_comment.php";
                                    break;
                            }
                        
                        ?>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

