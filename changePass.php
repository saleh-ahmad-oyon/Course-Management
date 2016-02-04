<?php require 'session.php'; 
	if(!isset($_SESSION['teacher']) && !isset($_SESSION['stud']) && !isset($_SESSION['authority'])){
		header('Location: '.SERVER.'');
	}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'head.php'; ?>
	</head>
	<body>
		<div id="wrap">
			<div id="main">
				<div class="container">
					<header>
						<div class="row">
							<div class="col-md-12">
								<?php require_once 'header.php'; ?>
							</div>
						</div>
					</header>
					<hr />
					<section>
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4"></div>
								<div class="col-md-4">
									<form action="<?php echo SERVER; ?>/controller/changePassSuccess" method="post">
										<table class="table table-bordered">
											<tr>
												<td><input type="password" name="oldPass" placeholder="Old Password" class="form-control" required="required" /></td>
											</tr>
											<tr>
												<td><input type="password" name="newPass" placeholder="New Password" class="form-control" required="required" id="newPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'The password must contain one or more uppercase characters, one or more lowercase characters, one or more numeric values, one or more special characters, and length must be greater than or equal to 4' : ''); if(this.checkValidity()) form.confirmNewPass.pattern = this.value;" /></td>
											</tr>
											<tr>
												<td><input type="password" name="confirmNewPass" placeholder="Confirm New Password" class="form-control" required="required" id="confirmNewPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" /></td>
											</tr>
											<input type="hidden" name="user" value="<?php echo $_GET['id']; ?>" />
											<tr>
												<td>
                                                    <div class="text-center">
                                                        <input type="submit" value="Confirm" name="changePassSubmit"class="btn btn-primary btn-block" />
                                                    </div>
                                                </td>
											</tr>
										</table>
									</form>
								</div>
								<div class="col-md-4"></div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
		<footer>
			<hr />
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php require_once 'footer.php' ?>
					</div>
				</div>
			</div>
		</footer>
	</body>
</html>