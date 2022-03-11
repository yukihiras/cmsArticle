<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>comment post id</th>
            <th>date</th>
            <th>author</th>
            <th>email</th>
            <th>content</th>
            <th>status</th>
            <th>in response to</th>
            <th>approve</th>
            <th>unapprove</th>
            <th>delete</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <?php display_all_comment(); ?>
            <?php upaprrove_comment(); ?>
            <?php approve_comment();?>
            <?php delete_comment();?>
        </tr>
        
    </tbody>
</table>