
<?php 
    insert_post();
?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post category id</label>

        <select name="post_category_id" id="">
            <?php 
            $query = "SELECT * FROM categories";
            $update_query = mysqli_query($connection, $query);
            confirmQuery($update_query);
            while($row = mysqli_fetch_assoc($update_query)){
                $cate_id = $row['cate_id']; 
                $cate_title = $row['cate_title'];
                echo "<option value='{$cate_id}'>{$cate_title}</option>";
                
            }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post author</label>
        <input type="text" class="form-control" name="post_author">
    </div>
    <div class="form-group">
        <label for="post_image">Post image</label>
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea class="form-control" name="post_content" id="summernote" rows="10" cols="30"></textarea>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags">
    </div>
    <div class="form-group">
        <select name="post_status" id="">
            <option value="draff">Post status</option>
            <option value="publish">Publish</option>
            <option value="draff">Draff</option>

        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="Create post">
    </div>
</form>