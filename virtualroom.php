<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>


<?php





?>

<style>
  .pad-bottom {
    padding-bottom: 25px;
  }
</style>

<!-- Navigation -->

<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">


  <h1>Study Rooms &nbsp; &nbsp;<i class="fa fa-book  text-dark"></i>
  <span class="pull-right" ><a class="ui primary button" href="virtualroom_create.php" >
  Create Room
</a>
</span>

</h1>

<div class="modal fade modal-open-cell-ai" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-body">
									<div class="modal-content">
										<div class="modal-header">
											<h4 class="modal-title" id="myModalLabel">Open Cell AI</h4>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<div class="modal-body">
										
											<p>A Web app that helps doctors screen for cancer by rapidly detecting leukemia cells in a blood smear using AI. </p>
											<p>This was developed in two days for the Health AI Hackathon at Cornell 2020, in which we won the “Best Diagnosis App” award.</p>
											<p></p>
										    <a target="_blank" href="https://youtu.be/AJBRe8uVMSY">Open Cell AI live demo presentation (youtube) </a>	<br/>
										    <a target="_blank" href="http://www.brooklyn.cuny.edu/web/academics/schools/naturalsciences/departments/computers/news/200207.php">Brooklyn College News Feature</a>
										</div>
									</div>
								</div>
							</div>
						</div>


  <p>Join one of ours virtal rooms!</p>


  <hr>

  <b>📖 &nbsp; &nbsp;Serious study rooms </b>



  <p>For people wanting to peer pressure study with a muted audio.</p>
  <p>Rules:</p>
  <ul>
    <li> Camera must be on.</li>
    <li>Audio must be muted, except when presenting yourself. (optional) </li>
  </ul>


  <row>

  <br>
  <?php

  $query = "SELECT * FROM rooms WHERE room_category = 'SERIOUS' ";
  $select_all_rooms = mysqli_query($connection,$query);

  while
  ($row = mysqli_fetch_assoc($select_all_rooms)) {
    extract($row);
    // $tags_decoded = json_decode($blog_tags, true);

 ?>


      <div class='col-md-3 pad-bottom'>
      <a href="virtualroom_detail.php?id=<?php echo $room_id ?>">
              <div class="ui link card"  >
                <div class="content">
                    <div class="header"><?php echo $room_title ?></div>
                    <div class="meta">
                    
                    </div>
                    <div class="description">
                    <p><?php echo $room_description ?></p>
                    </div>
                </div>
                <div class="extra content">
                    <div class="right floated author">
                    MAX: <?php echo $room_maxpeople ?> <i class="invisible-block"></i> <i class=" fa fa-user-o"></i>
                    
                
                </div>
                </div>
          </div>
          </a>
      </div>

  <?php
  }
  ?>

<br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
</row>

  <hr>
  <!-- <i class="fa fa-coffee  text-dark"> -->
  <b>☕️&nbsp; &nbsp;Cafe rooms </b>

  <p>For people wanting to study while connecting with people every so often.</p>
  <p>Rules:</p>
  <ul>
    <li> Please present yourself when joining the room. (Name and what will you be working on) </li>
  </ul>


  <row>

  <br>
  <?php

  $query = "SELECT * FROM rooms WHERE room_category = 'COFFEE' ";
  $select_all_rooms = mysqli_query($connection,$query);

  while
  ($row = mysqli_fetch_assoc($select_all_rooms)) {
    extract($row);
    // $tags_decoded = json_decode($blog_tags, true);

 ?>


      <div class='col-md-3 pad-bottom'>
      <a href="virtualroom_detail.php?id=<?php echo $room_id ?>">
              <div class="ui link card"  >
                <div class="content">
                    <div class="header"><?php echo $room_title ?></div>
                    <div class="meta">
                    
                    </div>
                    <div class="description">
                    <p><?php echo $room_description ?></p>
                    </div>
                </div>
                <div class="extra content">
                    <div class="right floated author">
                    MAX: <?php echo $room_maxpeople ?> <i class="invisible-block"></i> <i class=" fa fa-user-o"></i>
                    
                
                </div>
                </div>
          </div>
          </a>
      </div>

  <?php
  }
  ?>

<br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
</row>


  <hr>

  <b><i class="fa fa-gamepad  text-dark"></i>&nbsp; &nbsp;Break room </b>

  <p>Meet others students taking a virtual break!</p>
  <p>Rules:</p>
  <ul>
    <li> No work allowed :P </li>
  </ul>

  <row>

  <br>
  <?php

  $query = "SELECT * FROM rooms WHERE room_category = 'BREAK' ";
  $select_all_rooms = mysqli_query($connection,$query);

  while
  ($row = mysqli_fetch_assoc($select_all_rooms)) {
    extract($row);
    // $tags_decoded = json_decode($blog_tags, true);

 ?>


      <div class='col-md-3 pad-bottom'>
      <a href="virtualroom_detail.php?id=<?php echo $room_id ?>">
              <div class="ui link card"  >
                <div class="content">
                    <div class="header"><?php echo $room_title ?></div>
                    <div class="meta">
                    
                    </div>
                    <div class="description">
                    <p><?php echo $room_description ?></p>
                    </div>
                </div>
                <div class="extra content">
                    <div class="right floated author">
                    MAX: <?php echo $room_maxpeople ?> <i class="invisible-block"></i> <i class=" fa fa-user-o"></i>
                    
                
                </div>
                </div>
          </div>
          </a>
      </div>

  <?php
  }
  ?>

<br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
</row>




  <hr>
<script>
  $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>

  <?php include "includes/footer.php"; ?>

</div> <!-- /.container -->