<?php require 'session.php';
	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud']) && !isset($_SESSION['authority'])) {
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
							<div class="col-sm-12">
								<div class="col-sm-2"></div>
								<div class="col-sm-8 form-block">
									<form action="<?php echo SERVER; ?>/controller/changePass" method="post">
										<div class="form-group col-sm-12 required">
                                            <div class="col-sm-4">
                                                <label>Old Password</label>
                                            </div>
											<div class="col-sm-8">
                                                <input type="password" name="oldPass" class="form-control" required="required" />
                                            </div>
										</div>
										<div class="form-group col-sm-12 required">
                                            <div class="col-sm-4">
                                                <label>New Password</label>
                                            </div>
											<div class="col-sm-8">
                                                <input type="password" name="newPass" class="form-control" required="required" id="newPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'The password must contain one or more uppercase characters, one or more lowercase characters, one or more numeric values, one or more special characters, and length must be greater than or equal to 4' : ''); if(this.checkValidity()) form.confirmNewPass.pattern = this.value;" />
                                            </div>
										</div>
										<div class="form-group col-sm-12 required">
                                            <div class="col-sm-4">
                                                <label>Confirm New Password</label>
                                            </div>
											<div class="col-sm-8">
                                                <input type="password" name="confirmNewPass" class="form-control" required="required" id="confirmNewPass" pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" />
                                            </div>
										</div>
                                        <input type="hidden" name="user" value="<?php echo $_GET['id']; ?>" />
                                        <div class="col-sm-12 form-group">
                                            <div class="col-sm-12">
                                                <div class="text-center">
                                                    <button type="submit" value="Confirm" name="changePassSubmit"class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span><span>  Confirm</span></button>
                                                </div>
                                            </div>
                                        </div>
									</form>
								</div>
								<div class="col-sm-2"></div>
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