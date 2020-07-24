<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php
$query = "SELECT * FROM blogs";
$select_all_blogs = mysqli_query($connection,$query);



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
<div class="container">


<h2>Blogs:  
<span class="pull-right" ><a class="ui primary button" href="blog_create.php" >
  Create Blog
</a>
</span>
</h2>

<style>
.pad-bottom{
    padding-bottom: 25px;
}
</style>


<h1></h1>

<div class="row">
<?php
 while
 ($row = mysqli_fetch_assoc($select_all_blogs)) {
  extract($row);
  $tags_decoded = json_decode($blog_tags, true);

 ?>


    <div class='col-md-3 pad-bottom'>
    <a href="blog_detail.php?id=<?php echo $blog_id ?>">
            <div class="ui link card"  >
        <div class="content">
            <div class="header"><?php echo $blog_title ?></div>
            <div class="meta">
            <span class="category"><?php 
                    foreach($tags_decoded as $tag){
                        $query = "SELECT * FROM tags WHERE tag_id = $tag";
                        $select_tag = mysqli_query($connection,$query);
                        while($tag_row = mysqli_fetch_assoc($select_tag)) {
                            extract($tag_row);
                            echo $tag_title."\t";
                        }
                        
                    }
                    ?></span>
            </div>
            <div class="description">
            <p><?php echo substr($blog_description, 0, 50) ?>...</p>
            </div>
        </div>
        <div class="extra content">
            <div class="right floated author">
            <img class="ui avatar image" src="images/pirate-avatar.svg">
            By <?php
            $query = "SELECT * FROM users WHERE user_id = $blog_userid";
            $select_user = mysqli_query($connection,$query);
            while($user_row = mysqli_fetch_assoc($select_user)) {
                extract($user_row);
                echo $username."\t";
            }
            
            ?>
            </div>
        </div>
        </div>
        </a>
    </div>


 <?php
 }


?>

</div>






</div> <!-- /.container -->


<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

<script src="js/vendor/jquery-2.2.4.min.js"></script>
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
