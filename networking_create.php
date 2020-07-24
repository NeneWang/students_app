<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<?php 

$query = "SELECT * FROM tags";
$select_all_tags = mysqli_query($connection,$query);
    



?>



<?php 
            

 if(isset($_POST['add_blog'])) {
     extract($_POST);
     //edit this latter
     $ded_courses_id="1";
     
     
     $query = "INSERT INTO interests (interest_title, interest_description) ";
    $array_tags = json_encode($interest_tags);

    $query .= "VALUES ('{$interest_title}', '{$interest_description}')";
 
    $interest_query = mysqli_query($connection, $query);

    if (!$interest_query) {
        die('QUERY FAILED To create interest' . mysqli_error($connection));


    }else{
        redirect('networking.php');
    }
     
 }


?>

<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>



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
<?php echo "<a href=\"javascript:history.go(-1)\">Go back</a>"; ?>
    <h1></h1>
    <h1 class="">
        Create new Interest List
    </h1>
    <form action="#" method="post" role="form">
        <!--Create a form-->
        <div class="form-group pad-top">
            <input class="form-control" placeholder="Title" name="interest_title">
        </div>


        <div class="form-group ">
            <textarea name="interest_description" placeholder="Description" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
        </div>
        <div class="form-group">
        


        <div class="pad-top">
            <button type="submit" name="add_blog" class="centered btn btn-effect-ripple btn-block btn-large ui primary button">

                Create Interest List</button>
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
<?php include "includes/footer.php";?>
