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
		<script src="<?= SERVER; ?>/assets/js/jquery-ui.js"></script>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker({
                    showOnFocus: true,
                    showOtherMonths: true,
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "dd/mm/yy",
                    minDate: '01/01/1900',
                    maxDate: "+0D"
                });
				$( "#speed" )
                    .selectmenu()
                    .selectmenu( "menuWidget" )
                    .addClass( "overflow" );
            });
        </script>
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
                </div>
                <hr />
                <div class="container">
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4"></div>
                                <div class="col-md-4 form-block">
                                    <?php if($_GET['id'] == 1): ?>
                                        <h4 class="text-center"><i><b><ins>Teacher Registration</ins></b></i></h4><br/><br/>
                                        <form action="<?= SERVER; ?>/controller/addStudentTeacher" method="post" onsubmit="return confirmation();" enctype="multipart/form-data">
                                            <div class="form-group required">
                                                <label>Name</label>
                                                <input type="text" class="form-control onlyChars" required="required" placeholder="Full Name" name="tname" title="name">
                                            </div>
                                            <div class="form-group required">
                                                <label>Designation</label>
                                                <input type="text" class="form-control onlyChars" required="required" placeholder="Designation" name="desg" title="Designation">
                                            </div>
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="text" id="datepicker" placeholder="dd/mm/yyyy" name="dob" class="form-control">
                                            </div>
                                            <div class="form-group required">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email" required="required" name="temail" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i" title="Insert Email address Correctly">
                                            </div>
                                            <div class="form-group required">
                                                <label>Phone</label>
                                                <input type="text" class="form-control phnNum" required="required" placeholder="Phone" name="tphone" id="phone" title="Phone Number">
                                            </div>
                                            <div class="form-group required">
                                                <label>Assign an AIUB ID</label>
                                                <input type="text" class="form-control" required="required" placeholder="AIUB ID" name="aiubID">
                                            </div>
                                            <div class="form-group">
                                                <label style="padding-right: 30px;">Gender</label>
    
                                                <input type="radio" name="sex" id="male" value="Male" />
                                                <label for="male" class="css-label">Male</label>
    
                                                <input type="radio" name="sex" id="female" value="Female" />
                                                <label for="female" class="css-label">Female</label>
    
                                                <input type="radio" name="sex" id="other" value="Other" />
                                                <label for="other" class="css-label">Other</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload an Image</label>
                                                <input type="file" name="teacherpic" accept='image/*' id="input-file-now" class="dropify" data-default-file="<?php echo STUDENTPP, '/default-user.png'; ?>" />
                                            </div>
                                            <div class="form-group">
                                                    <button type="submit" name="addTeacher" class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;ADD</button>
                                            </div>
                                        </form>
                                    <?php elseif($_GET['id'] == 2): ?>
                                        <h4 class="text-center"><i><b><ins>Student Registration</ins></b></i></h4><br/><br/>
                                        <form action="<?= SERVER; ?>/controller/addStudentTeacher" method="post" onsubmit="return confirmation();" enctype="multipart/form-data">
                                            <div class="form-group required">
                                                <label>Name</label>
                                                <input type="text" class="onlyChars form-control" required="required" placeholder="Full Name" name="fullname" title="Name">
                                            </div>
                                            <div class="form-group required">
                                                <label>Departement</label>
                                                <select name="editDept" class="form-control" id="speed" required="required">
                                                    <option></option>
                                                    <?php foreach($department as $value): ?>
                                                        <option><?php echo $value['d_name']; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Date of Birth</label>
                                                <input type="text" id="datepicker" placeholder="dd/mm/yyyy" name="dob" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i" title="Insert Email address Correctly">
                                            </div>
                                            <div class="form-group required">
                                                <label>Phone</label>
                                                <input type="text" class="form-control phnNum" required="required" placeholder="Phone" name="phone" id="phone" title="Phone Number">
                                            </div>
                                            <div class="form-group required">
                                                <label>Assign an AIUB ID</label>
                                                <input type="text" class="form-control" required="required" placeholder="AIUB ID" name="aiubID" id="stuID">
                                            </div>
                                            <div class="form-group">
                                                <label>CGPA</label>
                                                <input type="number" step="0.01" min="0" max="4" class="form-control" placeholder="CGPA" name="cgpa">
                                            </div>
                                            <div class="form-group" style="padding-top: 10px;padding-bottom: 10px;">
                                                <label style="padding-right: 30px;">Gender</label>
    
                                                <input type="radio" name="sex" id="male" value="Male" />
                                                <label for="male" class="css-label">Male</label>
    
                                                <input type="radio" name="sex" id="female" value="Female" />
                                                <label for="female" class="css-label">Female</label>
    
                                                <input type="radio" name="sex" id="other" value="Other" />
                                                <label for="other" class="css-label">Other</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Upload an Image</label>
                                                <input type="file" name="stupic" accept='image/*' id="input-file-now" class="dropify" data-default-file="<?php echo STUDENTPP, '/default-user.png'; ?>" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="addStudent" class="btn btn-block btn-primary"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;ADD</button>
                                            </div>
                                        </form>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
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
        <script src="<?= SERVER; ?>/assets/js/dropify.js"></script>
        <script>
            //Dropify
            $(document).ready(function(){
                $('.dropify').dropify({
                    messages: {
                        'default': 'Drag and drop an image here or click',
                        'replace': 'Drag and drop or click to replace',
                        'remove':  '<span class="glyphicon glyphicon-trash"></span>',
                        'error':   'Sorry, this file is too large'
    
                    }
                });
                var drEvent = $('.dropify').dropify();
    
                drEvent.on('dropify.beforeClear', function(event, element){
                    return confirm("Do you really want to delete \"" + element.filename + "\" ?");
                });
    
                drEvent.on('dropify.afterClear', function(event, element){
                    alert('File deleted');
                });
            });
        </script>
        <script src="<?= SERVER; ?>/assets/js/jquery.maskedinput.min.js"></script>
        <script src="<?= SERVER; ?>/assets/js/custom.js"></script>
	</body>
</html>