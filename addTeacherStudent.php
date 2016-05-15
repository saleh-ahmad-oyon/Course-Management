<?php require 'session.php';
	if(!isset($_SESSION['authority'])){
		header('Location: '.SERVER.'');
	}
	$department = deptName();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'head.php'; ?>
		<link href="<?php echo SERVER; ?>/assets/css/dropify.css" rel="stylesheet"/>
		<link href="<?php echo SERVER; ?>/assets/css/radio.css" rel="stylesheet"/>
		<link rel="stylesheet" href="<?php echo SERVER; ?>/assets/css/jquery-ui.css">
		<link rel="stylesheet" href="<?php echo SERVER; ?>/assets/css/jquery-ui.theme.css">
		<script src="<?php echo SERVER; ?>/assets/js/jquery-ui.js"></script>
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
        </style>
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
                                <?php if($_GET['id'] == 1): ?>
                                    <h3 class="text-center"><i><b><ins>Teacher Registration</ins></b></i></h3><br/><br/>
                                    <form action="<?php echo SERVER; ?>/controller/addStudentTeacherSuccess" method="post" onsubmit="return confirmation();" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control onlyChars" placeholder="Full Name" name="tname" title="name">
                                        </div>
                                        <div class="form-group">
                                            <label>Designation</label>
                                            <input type="text" class="form-control onlyChars" placeholder="Designation" name="desg" title="Designation">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="temail" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i" title="Insert Email address Correctly">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control phnNum" placeholder="Phone" name="tphone" id="phone" title="Phone Number">
                                        </div>
                                        <div class="form-group" style="padding-top: 10px;padding-bottom: 10px;">
                                            <label style="padding-right: 30px;">Gender</label>

                                            <input type="radio" name="sex" id="male" value="male" />
                                            <label for="male" class="css-label">Male</label>

                                            <input type="radio" name="sex" id="female" value="female" />
                                            <label for="female" class="css-label">Female</label>

                                            <input type="radio" name="sex" id="other" value="other" />
                                            <label for="other" class="css-label">Other</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" id="datepicker" placeholder="dd/mm/yyyy" name="dob" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Assign an AIUB ID</label>
                                            <input type="text" class="form-control" placeholder="AIUB ID" name="aiubID" id="aiubID">
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
                                    <h3 class="text-center"><i><b><ins>Student Registration</ins></b></i></h3><br/><br/>
                                    <form action="<?php echo SERVER; ?>/controller/addStudentTeacherSuccess" method="post" onsubmit="return confirmation();" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="onlyChars form-control" placeholder="Full Name" name="fullname" title="Name">
                                        </div>
                                        <div class="form-group">
                                            <label>Departement</label>
                                            <select name="editDept" class="form-control" id="speed">
                                                <option></option>
                                                <?php foreach($department as $value): ?>
                                                    <option><?php echo $value['d_name']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" class="form-control" placeholder="Email" name="email" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i" title="Insert Email address Correctly">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" class="form-control phnNum" placeholder="Phone" name="phone" id="phone" title="Phone Number">
                                        </div>
                                        <div class="form-group" style="padding-top: 10px;padding-bottom: 10px;">
                                            <label style="padding-right: 30px;">Gender</label>

                                            <input type="radio" name="sex" id="male" value="male" />
                                            <label for="male" class="css-label">Male</label>

                                            <input type="radio" name="sex" id="female" value="female" />
                                            <label for="female" class="css-label">Female</label>

                                            <input type="radio" name="sex" id="other" value="other" />
                                            <label for="other" class="css-label">Other</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input type="text" id="datepicker" placeholder="dd/mm/yyyy" name="dob" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Assign an AIUB ID</label>
                                            <input type="text" class="form-control" placeholder="AIUB ID" name="aiubID" id="stuID">
                                        </div>
                                        <div class="form-group">
                                            <label>CGPA</label>
                                            <input type="number" step="0.01" min="0" max="4" class="form-control" placeholder="CGPA" name="cgpa">
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
<script src="<?php echo SERVER; ?>/assets/js/dropify.js"></script>
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
<script src="<?php echo SERVER; ?>/assets/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo SERVER; ?>/assets/js/custom.js"></script>