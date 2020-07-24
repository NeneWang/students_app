<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<?php 

$query = "SELECT * FROM tags";
$select_all_tags = mysqli_query($connection,$query);
    



?>



<?php 
            

 if(isset($_POST['add_room'])) {
     extract($_POST);
     //edit this latter
     
     
     
     $query = "INSERT INTO rooms (room_title, room_description, room_maxpeople, room_category, room_link) ";
    $array_tags = json_encode($room_tags);

    $query .= "VALUES ('{$room_title}', '{$room_description}','{$room_maxpeople}', '{$room_category}', '{$room_link}')";
 
    $create_room_query = mysqli_query($connection, $query);

    if (!$create_room_query) {
        die('QUERY FAILED To create rooms' . mysqli_error($connection));


    }else{
        redirect('virtualrooms.php');
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

    <h1></h1>
    <h1 class="">
        Create Room
    </h1>
    <form action="#" method="post" role="form">
        <!--Create a form-->
        <div class="form-group pad-top">
            <input class="form-control" placeholder="Title" name="room_title">
        </div>


        <div class="form-group ">
            <textarea name="room_description" placeholder="Description" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        
        <div class="form-group ">
            <input class="form-control" placeholder="Room Link" name="room_link">
        </div>

        <h5>Max amount of poeple allowed:</h5>
        <div class="form-group p">
            <input type="number" class="form-control" value="16" name="room_maxpeople">
        </div>

        <div class="form-group">
        
        <h5>Category</h5>
        
       
        <div class="form-group">

       
            <select id="example-chosen-multiple" name="room_category" class="select-chosen" data-placeholder="Choose a tag" style="width: 250px;" multiple>

            <option value="SERIOUS">Serious study room</option>
            <option value="COFFEE" selected="selected"> Coffee Room </option>    
            <option value="BREAK">Break room</option>
                
          

            </select>
        </div>


        <div class="pad-top">
            <button type="submit" name="add_room" class="centered btn btn-effect-ripple btn-block btn-large ui primary button">

                Create</button>
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
