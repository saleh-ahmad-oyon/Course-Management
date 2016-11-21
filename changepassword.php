<?php
    require 'session.php';
	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud']) && !isset($_SESSION['authority'])) {
		header('Location: '.SERVER.'');
	}
	if (isset($_SESSION['teacher']) && $_GET['id'] != '11') {
        header('Location: '.SERVER.'/changepassword?id=11');
    } else if (isset($_SESSION['stud']) && $_GET['id'] != '22') {
        header('Location: '.SERVER.'/changepassword?id=22');
    } else if (isset($_SESSION['authority']) && $_GET['id'] != '00') {
        header('Location: '.SERVER.'/changepassword?id=00');
    }
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <?php require_once 'head.php'; ?>
</head>
<body>
  <div id="wrap">
    <main>
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
              <div class="col-sm-offset-2 col-sm-8 form-block">
				<form action="<?= SERVER; ?>/controller/changePassword" method="post">
                  <div class="form-group col-sm-12 required">
                    <div class="col-sm-4">
                      <label>Old Password</label>
                    </div><!-- /.col-sm-4 -->
                    <div class="col-sm-8">
                      <input type="password" name="oldPass" class="form-control" required="required" />
                    </div><!-- /.col-sm-8 -->
                  </div><!-- /.col-sm-12 -->
                  <div class="form-group col-sm-12 required">
					<div class="col-sm-4">
                      <label>New Password</label>
                    </div><!-- /.col-sm-4 -->
					<div class="col-sm-8">
                      <input type="password"
                             name="newPass"
                             class="form-control"
                             required="required"
                             id="newPass"
                             pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                             onchange="this.setCustomValidity(this.validity.patternMismatch ? 'The password must contain one or more uppercase characters, one or more lowercase characters, one or more numeric values, one or more special characters, and length must be greater than or equal to 4' : ''); if(this.checkValidity()) form.confirmNewPass.pattern = this.value;" />
					</div><!-- /.col-sm-8 -->
                  </div><!-- /.col-sm-12 -->
                  <div class="form-group col-sm-12 required">
					<div class="col-sm-4">
					  <label>Confirm New Password</label>
                    </div><!-- /.col-sm-4 -->
					<div class="col-sm-8">
                      <input type="password"
                             name="confirmNewPass"
                             class="form-control"
                             required="required"
                             id="confirmNewPass"
                             pattern="(?=^.{4,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$"
                             onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '');" />
					</div><!-- /.col-sm-8 -->
                  </div><!-- /.col-sm-12 -->
                  <input type="hidden" name="user" value="<?= $_GET['id']; ?>" />
					<div class="col-sm-12 form-group text-center">
					  <button type="submit" value="Confirm" name="changePassword" class="btn btn-primary">
                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span><span>  Confirm</span>
                      </button>
                    </div><!-- /.col-sm-12 -->
				</form>
              </div><!-- /.col-sm-8 -->
            </div><!-- /.col-sm-12 -->
          </div><!-- /.row -->
		</section>
      </div><!-- /.container -->
	</main>
  </div><!-- /#wrap -->
  <?php require_once 'footer.php' ?>
</body>
</html>