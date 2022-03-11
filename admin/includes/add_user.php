<?php insert_user(); ?>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="user_name">Username</label>
        <input type="text" class="form-control" name="user_name">
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="first_name">First name</label>
        <input type="text" class="form-control" name="first_name">
    </div>
    <div class="form-group">
        <label for="last_name">Last name</label>
        <input type="text" class="form-control" name="last_name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label for="user_image">User image</label>
        <input type="file"  name="user_image">
    </div>

    <div class="form-group">
        <label for="role">role</label>

        <select name="role" id="">
            <option value="subscriber">select option</option>
            <option value="admin">admin</option>
            <option value="subscriber">subscriber</option>
        </select>
    </div>

    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="created_user" value="create user">
    </div>
</form>