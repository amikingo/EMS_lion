<?php
include "funcs.php";
start();
$user_data = get_user_info_by_id($_SESSION["user_id"]);

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="images/logo.png">
	<link href="lib/bootstrap5/css/bootstrap.css" rel="stylesheet">
	<link href="lib/mdb-ui-kit/css/mdb.min.css" rel="stylesheet">
	<link href="css/fontawesome6/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="lib/DataTables/DataTables-1.12.1/css/datatables.bootstrap4.min.css">
	<link href="lib/toastr/toastr.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<style type="text/css">.error{color: red;}</style>
	<title>Settings.</title>
</head>
<body>
	<?php include "header.php" ?>
	<br><br>
	
	<div class="container-fluid">
		<div class="row">

			<div class="col my-3">
				<div class="card shadow-6-strong">
					<div class="card-body">
						<div class="card-title"><h4><i class="fa fa-user-cog"></i> Account Setting</h4></div>
						<br><br>
						<div class="row">
							<div class="col-lg-12">
								<h5><i class="fa fa-user-secret"></i> Acount Information </h5>
								<br>
								<table class="table">
									<tr> <td>Full Name</td> <td><?= $user_data["Name"] ?></td> </tr>
									<tr> <td>Username</td> <td><?= $user_data["Username"] ?> </td> </tr>
									<tr> <td>Email</td> <td><?= $user_data["Email"] ?></td> </tr>
									<tr> <td>Campus</td> <td><?= $branch_name ?></td> </tr>
									<tr> <td>Department</td> <td><?= $depart_name ?></td> </tr>
								</table>
							</div>
							<div class="col-sm-5">
								<br><br>
								<h5><i class="fa fa-user-edit"></i> Change Password </h5>
								<br>

								<form id="change_pass">
									<div class="form-outline mb-1">
										<input type="password" class="form-control" id="o_pass" name="o_pass" required>
										<label class="form-label" for="o_pass">Current Password*</label>
									</div>
									<br>
									<div class="form-outline mb-1">
										<input type="password" class="form-control" id="n_pass" name="f_pass" required>
										<label class="form-label" for="n_pass">New Password*</label>
									</div>
									<br>
									<div class="form-outline mb-1">
										<input type="password" class="form-control" id="c_pass" name="f_cpass" required>
										<label class="form-label" for="c_pass">Confirm Password*</label>
									</div>
									<br><br>

									<button type="submit" class="submit sign-in-btn">
										<span class="shadow"></span>
										<span class="edge"></span>
										<span class="front text"> Change Password
										</span>
									</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php include "footer.php" ?>
	<script src="lib/jquery.min.js"></script>
	<script src="lib/jquery.validate.min.js"></script>
	<script src="lib/bootstrap5/js/bootstrap.min.js"></script>
	<script src="lib/mdb-ui-kit/js/mdb.min.js"></script>
	<script src="lib/toastr/toastr.min.js"></script>
	<script src="js/main.js"></script>

	<script type="text/javascript">
		toastr.options = {
			'positionClass': 'toast-top-center',
			'progressBar': true
		}
		$.validator.addMethod("my_equal_to", function(val, elem){
			return $("#c_pass").val() == $("#n_pass").val();
		});

		$("#change_pass").validate({
			errorElement: "span",
			rules:{
				o_pass: "required",
				f_pass:  {required: true, minlength: 8},
				f_cpass: {required: true, my_equal_to: true}
			},
			messages: {
				o_pass: "Please enter your current password",
				f_pass : {
					required:   "Please enter new password",
					minlength:  "Your password must be at least 8 characters long"
				},
				f_cpass : {
					required: "Please re-enter password",
					my_equal_to: "Password doesn't match"
				}
			},
			submitHandler: function(form){
				$.ajax({
					type: 'POST',
					url: "ajax_api/change_password.php",
					data: $("#change_pass").serialize(),
					success: function(e) {
						if(e.charAt(0) == '-') toastr.error(e.substr(1));
						else {
							$('#change_pass').trigger('reset');
							toastr.success(e);
						}
					}
				});
			}
		});

	</script>
</body>
</html>