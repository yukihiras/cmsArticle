<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>
 
<?php 
    // // the message
    // $msg = "First line of text\nSecond line of text";

    // // use wordwrap() if lines are longer than 70 characters
    // $msg = wordwrap($msg,70);

    // // send email
    // mail("thanhdo12a10@gmail.com","My subject",$msg);

    if (isset($_POST['submit'])) {

        $to = "thanhdo12a10@gmail.com";
        $subject = wordwrap(escape($_POST['subject']), 70);
        $content = escape($_POST['content']);
        $header = "From: " . escape($_POST['email']);
       
        mail($to, $content, $subject, $header);
    }



?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                    
                    <form role="form" action="contact.php" method="post" id="contact-form" autocomplete="off">
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                        <div class="form-group">
                            <label for="subject" class="sr-only">Subject</label>
                            <input type="subject" name="subject" id="email" class="form-control" placeholder="Enter your subject">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="content"  rows="10" cols="10" placeholder="Enter your content"></textarea>
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
