<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>



<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>
<?php 

$interest_id=0;
$current_interest_title="";
$current_user_subscription_status="";
$current_interest_subscribers=[];
$current_userIsInterested = false;
$current_user_id = $_SESSION["user_id"];
$current_user_id_as_subscriberlistid = 0;

if(isset( $_GET['id'] ) ){
    extract($_GET);
    $interest_id = $id;


}


$query = "SELECT * FROM interests WHERE interest_id = {$interest_id}";
$query_interests = mysqli_query($connection,$query);
while($l_row = mysqli_fetch_assoc($query_interests)) {
  $current_interest_title=$l_row['interest_title'];
    //Attempt to read the subscribers xd
    $current_interest_subscribers=json_decode($l_row["networking_subscribers"]);
    // if( array_key_exists($current_user_id, $current_interest_subscribers ) ){
    //     $current_userIsInterested=true;
    // }
    foreach ($current_interest_subscribers as $subscriber_id_key=>$subscriber_id_value){
        if($subscriber_id_value == $current_user_id){
            $current_userIsInterested=true;
            $current_user_id_as_subscriberlistid = $subscriber_id_key;
        }

    }

  
}


function array_push_assoc($array, $key, $value){
    $array[$key] = $value;
    return $array;
 }

if(isset($_POST['TOGGLE_SUBSCRIBE'])) {
    if($current_userIsInterested==true){
        //pop from array
        
        
        if(isset($current_interest_subscribers[$current_user_id_as_subscriberlistid])) {
            // unset( $current_interest_subscribers[$current_user_id_as_subscriberlistid]);
            $current_interest_subscribers = array_diff($current_interest_subscribers, [$current_user_id]);

            $interested_subscribers_json=json_encode($current_interest_subscribers);

        }

    }else{
        
        // $current_user_id=5;
        // $new_array = array('sd'=>$current_user_id);
        // // array_push($current_interest_subscribers, $current_user_id);

        // $current_interest_subscribers_new=array_merge($current_interest_subscribers, $new_array);
        $formated_array="[";
        foreach( $current_interest_subscribers as $int_subscribers ){
            $formated_array.=$int_subscribers;
            $formated_array.=",";
        }
        // $formated_array=substr($formated_array, 0, -1);
        $formated_array.=$current_user_id;
        $formated_array.="]";
        // $formated_array="[0,6]";


        $interested_subscribers_json=$formated_array;


    }
    $current_userIsInterested=!$current_userIsInterested;
       
    $query = "UPDATE interests SET networking_subscribers = '{$interested_subscribers_json}' WHERE interest_id={$interest_id}";
    $user_query = mysqli_query($connection, $query);

    if (!$user_query) {
        die('QUERY FAILED To Update interests list' . mysqli_error($connection));
    } 


}



?>


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

<h1>Connect with other students</h1>

<div class="row">
<div class="panel panel-default col-md-8">
    <div class="panel-heading">
        Below are people who would love to talk with you about <?php echo $current_interest_title ?>
    </div>
    <div class="ui middle aligned animated list">

    <?php 


    foreach($current_interest_subscribers as $subscriber_id){
        ?>

        
    <div class="item">
        
        <img class="ui avatar image" src="images/avatars/pirate.svg">
        <?php
        $query = "SELECT * FROM users WHERE user_id = {$subscriber_id}";
        $query_users = mysqli_query($connection,$query);
        while($l_row = mysqli_fetch_assoc($query_users)) {
            extract($l_row);
            


        }

?>
        <div class="content">
            <a href="networking_detail.php?id=<?php echo $user_id?>"> 
            <div class="header"><?php echo $username ?></div>
            </a>    
         </div>
        
    </div>

<?php
    }

    ?>
  <br>
</div>
</div>

<div class="col-md-4">
    <div class="form-group">
        <a class="btn btn-effect-ripple btn-block btn-large ui primary button"" href="networking_create.php" >
            Create New Interest List
        </a>
    </div>
    <div>
        

        <li class="list-group-item list-group-item-secondary">Interest Lists: </li>
            
              <?php
            
                        $query = "SELECT * FROM interests";
                        $query_interests = mysqli_query($connection,$query);
                        while($l_row = mysqli_fetch_assoc($query_interests)) {
                             //extract($row);
                             //If the thing video says no then    
                             
                            // $icon = "fa fa-play-circle";
                            
                            $active="";
                            if($l_row["interest_id"]==$interest_id){
                                $active = "active";
                            }
                            
                            
                            ?>
                            <a href="networking.php?id=
                            <?php echo $l_row["interest_id"]  ?>" class="list-group-item  <?php echo $active ?> "
                            data-toggle="tooltip" data-placement="left" title='<?php echo $l_row["interest_description"] ?>'
                            >
                            
                              <i class="<?php echo $icon ?>" aria-hidden="true"></i>
                              
                                <?php echo $l_row["interest_title"] ?></a>
                            <?php
                            
                            }
            
            ?>

    </div>
    <br>
    <form action="#" method="POST" >
        <div class="form-group">
            <button name="TOGGLE_SUBSCRIBE" type="submit" class="btn btn-effect-ripple btn-block btn-large ui red button" >

                    <?php if($current_userIsInterested){
                        echo "Unsubscribe to";
                    }else{
                        echo "Subscribe to";
                    }
                    
                    ?>
                 <?php echo $current_interest_title ?> Interest List
            </button>
        </div>
    </form>
    
<br>
<br>
    <div class="form-group">
        <a class="btn btn-effect-ripple btn-block btn-large ui info button"" href="profile_update.php" >
            Update my profile
        </a>
    </div>
    

</div>

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

$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})

    $(function() {
        FormsComponents.init();
    });

</script>
<?php include "includes/footer.php";?>
