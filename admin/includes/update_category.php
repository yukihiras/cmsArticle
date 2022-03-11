<form action="" method="post">
        <label for="">Update Category</label>
        <?php // DISPLAY BY ID
        if (isset($_GET['update'])) {
            $id_update_cate = escape($_GET['update']);
            $query = "SELECT * FROM categories WHERE cate_id = {$id_update_cate} ";
            $update_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($update_query)){
                $cate_id = $row['cate_id']; 
                $cate_title = $row['cate_title'];
                ?>
                <div class="form-group" >
                    <input class="form-control" type="text" name="cate_title" value="<?php if(isset($cate_title)){echo $cate_title;} ?>">
                </div>
        <?php } 
            
        } ?>



        <?php 
            update_cate();
        ?>

        <div class="form-group">
            <input class="btn btn-primary" type="submit" name="update_cate" value="Update category">
        </div>
        
    </form>