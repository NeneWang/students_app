<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>


<?php

		checkIfUserIsLoggedInAndRedirect('/student_app/admin');


		if(ifItIsMethod('post')){

			if(isset($_POST['username']) && isset($_POST['password'])){

				login_user($_POST['username'], $_POST['password']);


			}else {


				redirect('/student_app/login.php');
			}

		}






?>



<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>

<h1></h1>
<!-- Page Content -->
<div class="container">

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">


							<h2 class="text-center">Login</h2>
							<div class="panel-body">


								<form id="login-form" role="form" autocomplete="off" class="form" method="post">

									<div class="form-group">
									<input name="username" type="text" class="form-control" placeholder="Enter Username">
									</div>

									<div class="form-group">
										<input name="password" type="password" class="form-control" placeholder="Enter Password">
									</div>

									<div class="form-group">

										<input name="login" class="btn btn-custom btn-lg btn-block" value="Login" type="submit">
									</div>


								</form>

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<hr>

	<?php include "includes/footer.php";?>

</div> <!-- /.container -->
