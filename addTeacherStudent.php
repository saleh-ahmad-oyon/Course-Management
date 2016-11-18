<?php
    require 'session.php';
	if (!isset($_SESSION['authority'])) {
		header('Location: '.SERVER.'');
	}
	$department = deptName();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php'; ?>
    <link href="<?= SERVER; ?>/assets/css/dropify.css" rel="stylesheet"/>
    <link href="<?= SERVER; ?>/assets/css/radio.css" rel="stylesheet"/>
    <link rel="stylesheet" href="<?= SERVER; ?>/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?= SERVER; ?>/assets/css/jquery-ui.theme.css">
    <style>
        .overflow {
            height: 85px;
        }
        .form-group label {
            padding-top: 0;
        }
    </style>
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
            <div class="col-md-12">
              <div class="col-md-offset-4 col-md-4 form-block">

                <!-- =============================
                     Teacher Registration
                ============================== -->
                <?php if($_GET['id'] == 1): ?>
                  <h4 class="text-center">
                    <i><b><ins>Teacher Registration</ins></b></i>
                  </h4><br/><br/>
                  <form action="<?= SERVER; ?>/controller/addStudentTeacher"
                        method="post"
                        onsubmit="return confirmation();"
                        enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="form-group required">
                      <label>Name</label>
                      <input type="text"
                             class="form-control onlyChars"
                             required="required"
                             placeholder="Full Name"
                             name="tname"
                             title="Teacher's Name">
                    </div>
                    <!-- Designation -->
                    <div class="form-group required">
                      <label>Designation</label>
                      <input type="text"
                             class="form-control onlyChars"
                             required="required"
                             placeholder="Designation"
                             name="desg"
                             title="Teacher's Designation">
                    </div>
                    <!-- Date Of Birth -->
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="text"
                             id="datepicker"
                             placeholder="dd/mm/yyyy"
                             name="dob"
                             class="form-control"
                             title="Teacher's Date of Birth">
                    </div>
                    <!-- Email -->
                    <div class="form-group required">
                      <label>Email</label>
                      <input type="email"
                             class="form-control"
                             placeholder="Email"
                             required="required"
                             name="temail"
                             pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i"
                             title="Insert Teacher's Email Correctly">
                    </div>
                    <!-- Phone -->
                    <div class="form-group required">
                      <label>Phone</label>
                      <input type="text" class="form-control phnNum" required="required" placeholder="Phone" name="tphone" id="phone" title="Phone Number">
                    </div>
                    <!-- AIUB ID -->
                    <div class="form-group required">
                      <label>Assign an AIUB ID</label>
                      <input type="text"
                             class="form-control"
                             required="required"
                             placeholder="AIUB ID"
                             name="aiubID"
                             title="Teacher's AIUB ID">
                    </div>
                    <!-- Gender -->
                    <div class="form-group">
                      <label style="padding-right: 30px;">Gender</label>

                      <input type="radio" name="sex" id="male" value="Male" />
                      <label for="male" class="css-label">Male</label>

                      <input type="radio" name="sex" id="female" value="Female" />
                      <label for="female" class="css-label">Female</label>

                      <input type="radio" name="sex" id="other" value="Other" />
                      <label for="other" class="css-label">Other</label>
                    </div>
                    <!-- Teacher's Image -->
                    <div class="form-group">
                      <label>Upload an Image</label>
                      <input type="file"
                             name="teacherpic"
                             accept='image/*'
                             id="input-file-now"
                             class="dropify"
                             data-default-file="<?= STUDENTPP, '/default-user.png'; ?>" />
                    </div>
                    <!-- Submit Form -->
                    <div class="form-group">
                      <button type="submit" name="addTeacher" class="btn btn-block btn-primary">
                        <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;ADD
                      </button>
                    </div>
                  </form>

                <!-- ========================
                     Student Registration
                ========================= -->
                <?php elseif($_GET['id'] == 2): ?>
                  <h4 class="text-center"><i><b><ins>Student Registration</ins></b></i></h4><br/><br/>
                  <form action="<?= SERVER; ?>/controller/addStudentTeacher"
                        method="post"
                        onsubmit="return confirmation();"
                        enctype="multipart/form-data">
                    <!-- Name -->
                    <div class="form-group required">
                      <label>Name</label>
                      <input type="text"
                             class="onlyChars form-control"
                             required="required"
                             placeholder="Full Name"
                             name="fullname"
                             title="Student's Name">
                    </div>
                    <!-- Department -->
                    <div class="form-group required">
                      <label>Departement</label>
                      <select name="editDept" class="form-control" id="speed" required="required">
                        <option></option>
                        <?php foreach($department as $value): ?>
                          <option><?php echo $value['d_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                    <!-- Date of Birth -->
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="text"
                             id="datepicker"
                             placeholder="dd/mm/yyyy"
                             name="dob"
                             class="form-control"
                             title="Student's Date of Birth">
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email"
                             class="form-control"
                             placeholder="Email"
                             name="email"
                             pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i"
                             title="Insert Email address Correctly">
                    </div>
                    <!-- Phone -->
                    <div class="form-group required">
                      <label>Phone</label>
                      <input type="text"
                             class="form-control phnNum"
                             required="required"
                             placeholder="Phone"
                             name="phone"
                             id="phone"
                             title="Student's Phone Number">
                    </div>
                    <!-- AIUB ID -->
                    <div class="form-group required">
                      <label>Assign an AIUB ID</label>
                      <input type="text"
                             class="form-control"
                             required="required"
                             placeholder="AIUB ID"
                             name="aiubID"
                             id="stuID"
                             title="Student's AIUB ID">
                    </div>
                    <!-- CGPA -->
                    <div class="form-group">
                      <label>CGPA</label>
                      <input type="number"
                             step="0.01"
                             min="0"
                             max="4"
                             class="form-control"
                             placeholder="CGPA"
                             name="cgpa">
                    </div>
                    <!-- Gender -->
                    <div class="form-group" style="padding-top: 10px;padding-bottom: 10px;">
                      <label style="padding-right: 30px;">Gender</label>

                      <input type="radio" name="sex" id="male" value="Male" />
                      <label for="male" class="css-label">Male</label>

                      <input type="radio" name="sex" id="female" value="Female" />
                      <label for="female" class="css-label">Female</label>

                      <input type="radio" name="sex" id="other" value="Other" />
                      <label for="other" class="css-label">Other</label>
                    </div>
                    <!-- Student's Image -->
                    <div class="form-group">
                      <label>Upload an Image</label>
                      <input type="file"
                             name="stupic"
                             accept='image/*'
                             id="input-file-now"
                             class="dropify"
                             data-default-file="<?= STUDENTPP, '/default-user.png'; ?>" />
                    </div>
                    <!-- Submit Form -->
                    <div class="form-group">
                      <button type="submit" name="addStudent" class="btn btn-block btn-primary">
                        <i class="fa fa-plus-circle"></i>&nbsp;&nbsp;ADD
                      </button>
                    </div>
                  </form>
                <?php endif; ?>
              </div><!-- /.col-md-4 -->
            </div><!-- /.col-md-12 -->
          </div><!-- /.row -->
        </section>
      </div><!-- /.container -->
    </main>
  </div><!-- /#wrap -->
  <?php $jui = true; $dropify = true; $mask = true; require_once 'footer.php'; ?>
</body>
</html>