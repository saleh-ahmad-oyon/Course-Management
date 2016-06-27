<?php
    require 'session.php';
    $student = false;
    $teacher = false;
	if (!isset($_SESSION['stud']) && !isset($_SESSION['teacher'])) {
		header('Location: '.SERVER.'');
	} elseif (isset($_SESSION['stud'])) {
        $student    = true;
        $sid        = $_SESSION['sid'];
        $row        = stuEditableBasicInfo($sid);
        $department = deptName();
	} elseif (isset($_SESSION['teacher'])) {
        $teacher = true;
        $tid     = $_SESSION['tid'];
        $row     = teacherEditableBasicInfo($tid);
    }
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
			input[type=radio] + label.css-label,
			input[type=radio]:checked + label.css-label,
			input[type=radio]:hover + label.css-label{
				padding-top: 6px;
				padding-left: 39px;
				background-position: 17px 7px;
				height: 26px;
			}
			.overflow {
				height: 85px;
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
                                    <?php if($student): ?>
                                    <form action="<?= SERVER; ?>/controller/editStuInfo" method="post" enctype="multipart/form-data" >
                                        <div class="form-group" style="vertical-align: middle">
                                            <label>Profile Picture</label>
                                            <input type="file" name="profilepic" accept='image/*' id="input-file-now" class="dropify" data-default-file="<?= STUDENTPP, '/', htmlentities(stripslashes($row['s_image']), ENT_QUOTES, 'UTF-8'); ?>" />
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon" title="Full Name"><i class="fa fa-user font17"></i></div>
                                                <input type="text" value="<?= htmlentities(stripslashes($row['s_full_name']), ENT_QUOTES, 'UTF-8'); ?>" class="onlyChars form-control" name="editFullName" required="required" title="Only letters, space, dot and comma allowed" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group" style="line-height: 0.428571;">
                                                <div class="input-group-addon" title="Department" style="padding: 6px 11px;"><i class="fa fa-list-alt font17"></i></div>
                                                <select name="editDept" class="form-control" id="speed">
                                                    <?php foreach($department as $value): ?>
                                                        <option
                                                            <?php if(htmlentities(stripslashes($value['d_name']), ENT_QUOTES, 'UTF-8') == htmlentities(stripslashes($row['s_dept']), ENT_QUOTES, 'UTF-8')): ?>
                                                                selected="selected"
                                                            <?php endif; ?>
                                                        ><?php echo $value['d_name']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon" style="padding: 6px 9px;" title="Date of Birth"><span class="KR-Baby-Love KR-Baby-Love-baby"></span></div>
                                                <?php
                                                $DOB = strtotime(htmlentities(stripcslashes($row['s_dob']), ENT_QUOTES, 'UTF-8'));
                                                $DOB = date("d M, Y", $DOB);
                                                ?>
                                                <input type="text" id="datepicker" placeholder="dd Mmm, YYYY" name="dob" class="form-control" value="<?= $DOB; ?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon" title="Gender"><i class="fa fa-venus-mars"></i></div>
                                                <input type="radio" name="sex" id="male" value="Male"<?php if(isset($row['s_gender']) && htmlentities(stripcslashes($row['s_gender']), ENT_QUOTES, 'UTF-8') == 'Male'): ?> checked="checked" <?php endif; ?> />
                                                <label for="male" class="css-label">Male</label>

                                                <input type="radio" name="sex" id="female" value="Female"<?php if(isset($row['s_gender']) && htmlentities(stripcslashes($row['s_gender']), ENT_QUOTES, 'UTF-8') == 'Female'): ?> checked="checked" <?php endif; ?> />
                                                <label for="female" class="css-label">Female</label>

                                                <input type="radio" name="sex" id="other" value="Other"<?php if(isset($row['s_gender']) && htmlentities(stripcslashes($row['s_gender']), ENT_QUOTES, 'UTF-8') == 'Other'): ?> checked="checked" <?php endif; ?> />
                                                <label for="other" class="css-label">Other</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon" title="Contact No."><span class="glyphicon glyphicon-phone"></span></div>
                                                <input type="tel" value="<?php echo htmlentities(stripslashes($row['s_phone']), ENT_QUOTES, 'UTF-8'); ?>" class="phnNum form-control" name="editPhone" id="phone" />
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-addon" title="Email"><span class="glyphicon glyphicon-envelope"></span></div>
                                                <input type="email" value="<?php echo htmlentities(stripslashes($row['s_email']), ENT_QUOTES, 'UTF-8'); ?>" name="editEmail" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i" title="Insert Email address Correctly" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="editBtn" class="btn btn-block btn-primary"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Update</button>
                                        </div>
                                    </form>
                                    <?php elseif($teacher): ?>
                                        <form action="<?= SERVER; ?>/controller/editTeacherInfo" method="post" enctype="multipart/form-data" >
                                            <div class="form-group" style="vertical-align: middle">
                                                <label>Profile Picture</label>
                                                <input type="file" name="profilepic" accept='image/*' id="input-file-now" class="dropify" data-default-file="<?= TEACHERPP, '/', htmlentities(stripslashes($row['t_image']), ENT_QUOTES, 'UTF-8'); ?>" />
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon" title="Full Name"><i class="fa fa-user font17"></i></div>
                                                    <input type="text" value="<?= htmlentities(stripslashes($row['t_name']), ENT_QUOTES, 'UTF-8'); ?>" class="onlyChars form-control" name="editFullName" required="required" title="Only letters, space, dot and comma allowed" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon" style="padding: 6px 9px;" title="Date of Birth"><span class="KR-Baby-Love KR-Baby-Love-baby"></span></div>
                                                    <?php
                                                    $DOB = strtotime(htmlentities(stripcslashes($row['t_dob']), ENT_QUOTES, 'UTF-8'));
                                                    $DOB = date("d M, Y", $DOB);
                                                    ?>
                                                    <input type="text" id="datepicker" placeholder="dd Mmm, YYYY" name="dob" class="form-control" value="<?= $DOB; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon" title="Gender"><i class="fa fa-venus-mars"></i></div>
                                                    <input type="radio" name="sex" id="male" value="Male"<?php if(isset($row['t_gender']) && htmlentities(stripcslashes($row['t_gender']), ENT_QUOTES, 'UTF-8') == 'Male'): ?> checked="checked" <?php endif; ?> />
                                                    <label for="male" class="css-label">Male</label>

                                                    <input type="radio" name="sex" id="female" value="Female"<?php if(isset($row['t_gender']) && htmlentities(stripcslashes($row['t_gender']), ENT_QUOTES, 'UTF-8') == 'Female'): ?> checked="checked" <?php endif; ?> />
                                                    <label for="female" class="css-label">Female</label>

                                                    <input type="radio" name="sex" id="other" value="Other"<?php if(isset($row['t_gender']) && htmlentities(stripcslashes($row['t_gender']), ENT_QUOTES, 'UTF-8') == 'Other'): ?> checked="checked" <?php endif; ?> />
                                                    <label for="other" class="css-label">Other</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon" title="Contact No."><span class="glyphicon glyphicon-phone"></span></div>
                                                    <input type="tel" value="<?= htmlentities(stripslashes($row['t_phone']), ENT_QUOTES, 'UTF-8'); ?>" class="phnNum form-control" name="editPhone" id="phone" />
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon" title="Email"><span class="glyphicon glyphicon-envelope"></span></div>
                                                    <input type="email" value="<?= htmlentities(stripslashes($row['t_email']), ENT_QUOTES, 'UTF-8'); ?>" name="editEmail" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i" title="Insert Email address Correctly" class="form-control"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="editBtn" class="btn btn-block btn-primary"><i class="fa fa-wrench"></i>&nbsp;&nbsp;Update</button>
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
        <?php $dropify = true; $mask = true; $jui=true; require_once 'footer.php'; ?>
        <script>
            $(function() {
                $( "#datepicker" ).datepicker({
                    showOnFocus: true,
                    showOtherMonths: true,
                    changeMonth: true,
                    changeYear: true,
                    dateFormat: "d M, yy",
                    maxDate: "+0D"
                });
                $( "#speed" )
                    .selectmenu()
                    .selectmenu( "menuWidget" )
                    .addClass( "overflow" );
            });
        </script>
	</body>
</html>