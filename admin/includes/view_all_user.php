<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>first name</th>
            <th>last name</th>
            <th>email</th>
            <th>image</th>
            <th>role</th>
            <th colspan="2">censorship</th>
            <th colspan="2">operation</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php display_all_user();?>
            <?php delete_user(); ?>
            <?php change_to_admin();?>
            <?php change_to_subscriber();?>
        </tr>
    </tbody>
</table>