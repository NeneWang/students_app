<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<?php

$query = "SELECT * FROM tags";
$select_all_tags = mysqli_query($connection, $query);




?>



<?php


$actual_user_id = $_SESSION['user_id'];

$query = "SELECT * FROM users WHERE user_id = {$actual_user_id} ";
$user_query = mysqli_query($connection, $query);

while ($row_user = mysqli_fetch_assoc($user_query)) {
    extract($row_user);
}




if (isset($_POST['add_blog'])) {
    extract($_POST);
    //edit this latter



    $query = "UPDATE users SET username = '{$username}', user_description = '{$user_description}' , user_extracontact = '{$user_extracontact}' WHERE user_id={$actual_user_id}";
    $user_query = mysqli_query($connection, $query);

    if (!$user_query) {
        die('QUERY FAILED To Update Profile' . mysqli_error($connection));
    } else {
        // redirect('blogs.php');
        if (isset($_SERVER["HTTP_REFERER"])) {
            header("Location: " . $_SERVER["HTTP_REFERER"]);
        }
    }
}


?>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>



<!-- Stylesheets -->
<!-- Bootstrap is included in its original form, unaltered -->
<!--    <link rel="stylesheet" href="css/bootstrap.min.css">-->

<!-- Related styles of various icon packs and plugins -->
<link rel="stylesheet" href="css/plugins.css">

<link rel="stylesheet" href="css/themes.css">

<!-- Modernizr (browser feature detection library) -->
<script src="js/vendor/modernizr-3.3.1.min.js"></script>
<!-- END Stylesheets -->

<!-- Modernizr (browser feature detection library) -->

<!-- Page Content -->
<div class="container ">

    <h1></h1>
    <?php echo "<a href=\"javascript:history.go(-1)\">GO BACK</a>"; ?>
    <h1 class="">
        Update Profile
    </h1>
    <form action="#" method="post" role="form">
        <!--Create a form-->
        <div class="form-group pad-top">
            <input class="form-control" placeholder="Name" name="username" value="<?php echo $username ?>">
        </div>


        <div class="form-group ">
            <textarea name="user_description" placeholder="Tell me about you..." class="form-control" id="exampleFormControlTextarea1" rows="7"><?php echo $user_description ?></textarea>
        </div>
        <div class="form-group ">
            <textarea name="user_extracontact" placeholder="Extra contact information you would like to add? Like Facebook page link, Instagram.. etc." class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $user_extracontact ?></textarea>
        </div>



        <div class="pad-top">
            <button type="submit" name="add_blog" class="centered btn btn-effect-ripple btn-block btn-large ui primary button">

                Update Profile</button>
        </div>
    </form>




</div> <!-- /.container -->

<h1></h1>

<script>
    $(function() {
        FormsComponents.init();
    });
</script>
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="js/plugins.js"></script>
<script src="js/app.js"></script>

<script src="js/plugins/ckeditor/ckeditor.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="js/pages/formsComponents.js"></script>

<script>
    $(function() {
        FormsComponents.init();
    });
</script>
<?php include "includes/footer.php"; ?>