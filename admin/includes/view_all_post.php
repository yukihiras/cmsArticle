<?php 
    if(isset($_POST['checkboxArray'])){
        foreach ($_POST['checkboxArray'] as $postValueId ) {
            $bulk_option = $_POST['bulk_option'];
            switch ($bulk_option) {

                case 'publish':
                    $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = {$postValueId} ";
                    $update_to_publish = mysqli_query($connection, $query);
                    break;

                case 'draff':
                    $query = "UPDATE posts SET post_status = '{$bulk_option}' WHERE post_id = {$postValueId} ";
                    $update_to_draff = mysqli_query($connection, $query);
                    break;

                case 'delete':
                    $query = "DELETE FROM posts WHERE post_id = {$postValueId} ";
                    $delete_post = mysqli_query($connection, $query);
                    break;           

                case 'clone':
                    $query = "SELECT * FROM posts WHERE post_id = {$postValueId} ";
                    $select_post_query = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_array($select_post_query)) {
                        $post_title = $row['post_title'];
                        $post_category_id = $row['post_category_id'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tags = $row['post_tags'];
                        $post_status = $row['post_status'];
                    }
                    $query = " INSERT INTO posts (post_title, post_category_id, post_author, post_date, post_image, post_content, post_tags, post_status) ";
                    $query .= "VALUES ('{$post_title}', {$post_category_id}, '{$post_author}', now(), '{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}') ";
                    $copy_post = mysqli_query($connection, $query);
                    if (!$copy_post) {
                        die("QUERY FAILED" . mysqli_error($connection));
                    }
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

?>
<form action="" method='post'>
<table class="table table-bordered table-hover">


    <div style="padding: 0px 0px 10px 0px;" id="bulkOptionsContainer" class="col-xs-4">     
        <select class="form-control" name="bulk_option" id="">
            <option value="">Select Options</option>
            <option value="publish">Publish</option>
            <option value="draff">Draff</option>
            <option value="delete">Delete</option>
            <option value="clone">Clone</option>

        </select>
    </div>
    <div class="col-xs-4">
        <input type="submit" name="submit" value="Apply" class="btn btn-success">
        <a href="posts.php?source=add_post" class="btn btn-primary">Add New</a>
    </div>

    <thead>
        <tr>
            <th><input id="selectAllBoxes" type="checkbox"></th>
            <th>Id</th>
            <th>Category</th>
            <th>Title</th>
            <th>Author</th>
            <th>Date</th>
            <th>Images</th>
            <th>Post content</th>
            <th>Tags</th>
            <th>Comment count</th>
            <th>status</th>
            <th>post detail</th>
            <th>post views</th>
            <th>reset views</th>
            <th colspan="2">operation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php display_all_post(); ?>
            <?php delete_post();?> 
            <?php reset_post();?>
        </tr>
        
    </tbody>
</table>
</form>

