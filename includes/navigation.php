   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container">


           <!-- Brand and toggle get grouped for better mobile display -->
           <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                   <span class="sr-only">Toggle navigation</span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
                   <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="index.php"><strong>Student</strong> App</a>
           </div>


           <!-- Collect the nav links, forms, and other content for toggling -->
           <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">

                   <!-- Categories LOL
                   <?php 

    $query = "SELECT * FROM categories LIMIT 3";
    $select_all_categories_query = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_categories_query)) {
       $cat_title = $row['cat_title'];
       $cat_id = $row['cat_id'];
        
        echo "<li><a href='/category/{$cat_id}'>{$cat_title}</a></li>";
    }
                    
    ?>
-->
                   <?php if(isLoggedIn()){ ?>



                   <li>
                       <a href="blogs.php">Student Blogs</a>
                   </li>

                   <li>
                       <a href="/student_app/educationtools.php">Education Tools </a>
                   </li>

                   <li>
                       <a href="/student_app/networking.php">Networking</a>
                   </li>

                   <li>
                       <a href="/student_app/virtualroom.php">Study Rooms</a>
                   </li>
                   

<!--
                   <li>
                       <a href="/student_app/default_assist.php">Grades</a>
                   </li>
-->


<!--                   Something-->
                   
                   
                   
                   <?php }else{ ?>


                   <li>
                       <a href="/student_app/login.php">Login</a>
                   </li>

                   <li>
                       <a href="/student_app/registration">Registration</a>
                   </li>


                   <?php }?>








                   <?php 

    if(isset($_SESSION['user_role'])) {
    
        if(isset($_GET['p_id'])) {
            
          $the_post_id = $_GET['p_id'];
        
        echo "<li><a href='/student_app/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit Post</a></li>";
        
        }
    
    
    
    }
    
    ?>


               </ul>

               <ul class="nav navbar-nav navbar-right">
                   <?php if(isLoggedIn()): ?>


                   <?php if(($_SESSION['user_role'])=="subscriber" or 
                            ($_SESSION['user_role'])=="student"): ?>

                   <li class="pull-right"> <a href="#">
                          
                           
                           <?php echo $_SESSION['username']; ?>
                       </a></li>

<?php else: ?>
                  <li class="pull-right"> <a href="#">
                           <span class="fa fa-user"></span>
                           Professor:
                           <?php echo $_SESSION['username']; ?>
                       </a></li>
                   <?php endif; ?>

                   <li>

                       <a href="/student_app/includes/logout.php">Logout</a>
                   </li>
                   <?php endif; ?>

               </ul>


           </div>
           <!-- /.navbar-collapse -->
       </div>
       <!-- /.container -->
   </nav>
    <?php if(($_SESSION['user_role'])=="subscriber" or 
                            ($_SESSION['user_role'])=="student"){ ?>
   <div class="pad-top"></div>
   
   <!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="103767891279470"
  theme_color="#0084ff"
  logged_in_greeting="Hi! How can we help you?"
  logged_out_greeting="Hi! How can we help you?">
      </div>
      
      <?php }else{
    
    echo "   <h1></h1><h1></h1>";
} ?>
      
      
      
      
  
