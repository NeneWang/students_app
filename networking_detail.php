<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>






<!-- Navigation -->

<?php include "includes/navigation.php"; ?>



<?php
$video_dir = "NO";
if (isset($_GET["id"])) {
    //idea goes that you can get the course_id
    //do all the logic from grabbing title etc
    extract($_GET);
    $query = "SELECT * FROM users WHERE user_id = {$id}";
    $user_query = mysqli_query($connection, $query);

    while ($row_room = mysqli_fetch_assoc($user_query)) {
        extract($row_room);
    }
}

if (isset($_POST['add_comment'])) {
    extract($_POST);
    //edit this latter
    $comment_author = "Nelson";
    $comment_virtualroom = $lecture_id;

    $query = "INSERT INTO comments_room (comment_author,comment_content, comment_virtualroom)";

    $query .= "VALUES ('{$_SESSION['username']}', '{$comment_content}', {$id})";

    $create_comment_query = mysqli_query($connection, $query);

    if (!$create_comment_query) {
        die('QUERY FAILED To Submit the stock request' . mysqli_error($connection));
    }
}

//$stmt1 = mysqli_prepare($connection, "SELECT * WHERE commentvideoid = 1");
$query = "SELECT * FROM comments_room WHERE comment_virtualroom = {$id}";
$select_all_posts_query = mysqli_query($connection, $query);

//query for sidebar
$query = "SELECT * FROM lectures WHERE course_id = 1";
$query_courselist = mysqli_query($connection, $query);


?>



<!-- Page Content -->
<div class="container">
    <!--sidebar-->
    <?php echo "<a href=\"javascript:history.go(-1)\">Go back</a>"; ?>

    <!--Get It from the canvas?-->
    <div class="row">


        <div class="col-md-9">


            <?php
            if ($video_dir == "NO") {
                //Make it disappear
            } else {

            ?>




        </div>

        <div class="col-md-3 pad-top ">


            <li class="list-group-item list-group-item-secondary">Other rooms: </li>

            <?php


                while ($l_row = mysqli_fetch_assoc($query_courselist)) {
                    //extract($row);
                    //If the thing video says no then    

                    $icon = "fa fa-play-circle";

                    if ($l_row["video_dir"] == "NO") {
                        $icon = "fa fa-file-text-o";
                    }
                    $active = "";
                    if ($l_row["lecture_id"] == $lecture_id) {
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


        <h1> <?php echo $username ?> </h1>


        <b>Profile:</b>
        <p><?php echo $user_description ?> </p>
        <b>Other contact info:</b>
        <p><?php echo $user_extracontact ?> </p>

        <a href="<?php echo $user_link ?> "><?php echo $user_link ?> </a>
        

    </div>

    </div>

    <?php
    if ($video_dir == "NO") {
        //Make it disappear


    ?>

        <!--         
        <div class="col-md-3 pad-top ">
         
           
            <li class="list-group-item list-group-item-secondary">Lectures: </li>
            
              <?php


                while ($l_row = mysqli_fetch_assoc($query_courselist)) {
                    //extract($row);
                    //If the thing video says no then    

                    $icon = "fa fa-play-circle";

                    if ($l_row["video_dir"] == "NO") {
                        $icon = "fa fa-file-text-o";
                    }
                    $active = "";
                    if ($l_row["lecture_id"] == $lecture_id) {
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

<?php include "includes/footer.php"; ?>

</div> <!-- /.container -->