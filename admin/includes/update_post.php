<?php
    // display data post by id
    if (isset($_GET['p_id'])) {
        $id_display_post = $_GET['p_id'];
        $query = "SELECT * FROM posts WHERE post_id = {$id_display_post} ";
        $display_post_by_id = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($display_post_by_id)) {
            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            $post_category_id = $row['post_category_id'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comment_count = $row['post_comment_count'];
            $post_status = $row['post_status'];
        }
    }


    
    if (isset($_POST['updatePost'])) {
        $post_title = escape($_POST['post_title']);
        $post_category_id = escape($_POST['post_category_id']);
        $post_author = escape($_POST['post_author']);
        $post_image = escape($_FILES['post_image']['name']);
        $post_image_tmp = $_FILES['post_image']['tmp_name'];
        $post_content = escape($_POST['post_content']);
        $post_tags = escape($_POST['post_tags']);
        $post_status = escape($_POST['post_status']);

        move_uploaded_file($post_image_tmp, "../images/$post_image");

        if (empty($post_image)) {
            $query = "SELECT * FROM posts WHERE post_id = {$id_display_post} ";
            $select_images = mysqli_query($connection, $query);
            while ($row = mysqli_fetch_assoc($select_images)) {
               $post_image = $row['post_image'];
            }
        }

        $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', post_author = '{$post_author}', ";
        $query .= "post_date = now(), post_image = '{$post_image}', post_content = '{$post_content}', post_tags = '{$post_tags}', ";
        $query .= " post_comment_count = '{$post_comment_count}', post_status = '{$post_status}' WHERE post_id = '{$post_id}' ";
        $update_post = mysqli_query($connection, $query);
        confirmQuery($update_post);
        echo "<h3 style='color: green;'>Post updated</h3><a href='../post.php?p_id={$id_display_post}'>Views posts</a> or <a href='posts.php'>edit more post</a>";
    }
?>



<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" value="<?=$post_title;?>">
    </div>
    <div class="form-group">
        <label for="post_category_id">Post category id</label>

        <select name="post_category_id" id="post_category">
            <?php 
            $query = "SELECT * FROM categories";
            $update_query = mysqli_query($connection, $query);
            confirmQuery($update_query);
            while($row = mysqli_fetch_assoc($update_query)){
                $cate_id = $row['cate_id']; 
                $cate_title = $row['cate_title'];
                if ($cate_id == $post_category_id) {
                    echo "<option selected value='{$cate_id}'>{$cate_title}</option>";
                }else {
                    
                    echo "<option value='{$cate_id}'>{$cate_title}</option>";
    
                }
            }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <label for="post_author">Post author</label>
        <input type="text" class="form-control" name="post_author" value="<?=$post_author;?>">
    </div>
    <div class="form-group">
        <label for="post_image">Post image</label>
        <img style="width: 100px;" src="../images/<?=$post_image?>" alt="">
        <input type="file" name="post_image">
    </div>
    <div class="form-group">
        <label for="post_content">Post content</label>
        <textarea class="form-control" name="post_content" id="summernote" rows="10" cols="30" ><?=$post_content;?></textarea>
    </div>
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" class="form-control" name="post_tags" value="<?=$post_tags;?>">
    </div>
    <div class="form-group">
        <label for="post_status">Post_status</label>
        <select name="post_status" id="post_status">
            <option value="<?=$post_status?>"><?=$post_status?></option>
            <?php 
                if ($post_status == 'publish') {
                    echo "<option value='draff'>Draff</option>";
                } else {
                    echo "<option value='publish'>Publish</option>";
                }
            
            ?>
        </select>
    </div>
    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="updatePost" value="Update post">
    </div>
</form>