<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>






<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>



<?php 


$video_dir="NO";
if(isset($_GET["id"] ) ){
    //idea goes that you can get the course_id
    //do all the logic from grabbing title etc
    extract($_GET);
     $query = "SELECT * FROM blogs WHERE blog_id = {$id}";
  $blog_query = mysqli_query($connection,$query);

    while($row_lecture = mysqli_fetch_assoc($blog_query)) {
        extract($row_lecture);
        
    }
    
        
    
    
}

 if(isset($_POST['add_comment'])) {
     extract($_POST);
     //edit this latter
     $comment_author = "Nelson";
     $comment_videoid=$lecture_id;
     
     $query = "INSERT INTO comments_video (comment_author,comment_content, comment_videoid)";

    $query .= "VALUES ('{$_SESSION['username']}', '{$comment_content}', {$id})";

    $create_comment_query = mysqli_query($connection, $query);

    if (!$create_comment_query) {
        die('QUERY FAILED To Submit the stock request' . mysqli_error($connection));
        

    }
     
 }

//$stmt1 = mysqli_prepare($connection, "SELECT * WHERE commentvideoid = 1");
 $query = "SELECT * FROM comments_video WHERE comment_videoid = {$id}";
  $select_all_posts_query = mysqli_query($connection,$query);

//query for sidebar
 $query = "SELECT * FROM lectures WHERE course_id = 1";
  $query_courselist = mysqli_query($connection,$query);


?>



<style>
    .main-image{
        max-width: 100%;
    }
    .text-centered{
        text-align: center;
    }
</style>

<!-- Page Content -->
<div class="container">
    <!--sidebar-->
    <a href="blogs.php" class="pull-left" >Go back to blogs</a>
    
    <!--Get It from the canvas?-->
    <div class="row">
    
    
    <div class="col-md-9">

    
<?php
    if($video_dir=="NO"){
                               //Make it disappear
                            }else{
    
    ?>

    
      
      
       </div>
        
        <div class="col-md-3 pad-top ">
         
           
            <li class="list-group-item list-group-item-secondary">Other blogs: </li>
            
              <?php
            
            
                        while($l_row = mysqli_fetch_assoc($query_courselist)) {
                             //extract($row);
                             //If the thing video says no then    
                             
                            $icon = "fa fa-play-circle";
                            
                            if($l_row["video_dir"]=="NO"){
                                $icon = "fa fa-file-text-o";
                            }
                            $active="";
                            if($l_row["lecture_id"]==$lecture_id){
                                $active = "active";
                            }
                            
                            
                            ?>
                            <a href="course_view.php?lecture_id=
                            <?php echo $l_row["lecture_id"]  ?>" class="list-group-item <?php echo $active ?> ">
                            
                              <i class="<?php echo $icon ?>" aria-hidden="true"></i>
                              
                                <?php echo $l_row["title"] ?></a>
                            <?php
                            
                            }
            
            ?>
            
            
        </div>
        
        <?php } ?>
        
        
            


        <div class="col-md-9 pad-top">
            
            
            <h1 class="text-centered" > <?php echo $blog_title ?> </h1>
                
            <img class="main-image"  src="<?php echo $blog_image?>" alt="">

            <p><?php echo $blog_description ?> </p>
            
            
            <h1></h1>
            
            <form action="#" method="post" role="form">
            <p>Write comment as <?php echo $_SESSION['username'] ?></p>
            <textarea class="form-control" rows="2" placeholder="Write your comment.." name="comment_content" ></textarea>
            <h5></h5>
                <button type="submit" name="add_comment" class="pull-left btn btn-effect-ripple btn-sm btn-primary ">Publish</button>

                            

            
            
            </form>
            <br>
            <br>
            

            <!--            COmments-->
            <div class="themed-background-muted pad-top">
                <ul class="media-list push">
                    
                        <?php
                        while($row = mysqli_fetch_assoc($select_all_posts_query)) {
                             extract($row);
                                
                             
                            ?>
                        <li class="media">
                                <div class="media-body">
                            <a href="javascript:void(0)"><strong><?php echo $comment_author ?> </strong></a>
                            <span class="text-muted"><small></small></span>
                            <p><?php echo $comment_content ?></p>
                        </div>
                    </li>
                            
                            <?php
                            
                            }
                        ?>
                        
                   
                    
                </ul>
            </div>

        </div>
        
          </div>
        
        <?php
    if($video_dir=="NO"){
                               //Make it disappear
                           
    
    ?>
       
<!--         
        <div class="col-md-3 pad-top ">
         
           
            <li class="list-group-item list-group-item-secondary">Lectures: </li>
            
              <?php
            
            
                        while($l_row = mysqli_fetch_assoc($query_courselist)) {
                             //extract($row);
                             //If the thing video says no then    
                             
                            $icon = "fa fa-play-circle";
                            
                            if($l_row["video_dir"]=="NO"){
                                $icon = "fa fa-file-text-o";
                            }
                            $active="";
                            if($l_row["lecture_id"]==$lecture_id){
                                $active = "active";
                            }
                            
                            
                            ?>
                            <a href="course_view.php?lecture_id=
                            <?php echo $l_row["lecture_id"]  ?>" class="list-group-item <?php echo $active ?> ">
                            
                              <i class="<?php echo $icon ?>" aria-hidden="true"></i>
                              
                                <?php echo $l_row["title"] ?></a>
                            <?php
                            
                            }
            
            ?>
            
            
        </div> -->
        
        <?php 
     }
    ?>

    </div>

    <!--    Display options videos-->

    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->
