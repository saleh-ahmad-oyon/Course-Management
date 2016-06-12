<?php
    require 'session.php';

    /**
     * @var bool $student     Student
     * @var bool $teacher     Teacher
     */
    $student = false;
    $teacher = false;

	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])) {
		header('Location: '.SERVER.'');
	} elseif (isset($_SESSION['stud'])) {
        $student = true;
        $sid     = $_SESSION['sid'];
        $row     = stubasicInfo($sid);
    } elseif (isset($_SESSION['teacher'])) {
        $teacher = true;
        $tid     = $_SESSION['tid'];
        $row     = teacherBasicInfo($tid);
    }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'head.php'; ?>
		<style>
			#img-circle {
				border: 3px solid #00b8e6;
			    border-radius: 50%;
			    background: #fff;
			    width: 380px;
			    height: 380px;
			    background-position: center;
                <?php if($student): ?>
				background-image: url(<?php echo STUDENTPP, '/', htmlentities(stripslashes($row['s_image'])); ?>);
                <?php elseif($teacher): ?>
				background-image: url(<?php echo TEACHERPP, '/', htmlentities(stripslashes($row['t_image'])); ?>);
                <?php endif; ?>
				background-size: 100% auto;
				background-repeat: no-repeat;
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
                            <?php if($student): ?>
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div id="img-circle" class="center-block"></div>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4 padding20">
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>ID</td>
                                            <td><?= htmlentities(stripslashes($row['s_aiub_id'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Full Name</td>
                                            <td><?= htmlentities(stripslashes($row['s_full_name'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Department</td>
                                            <td><?= htmlentities(stripslashes($row['s_dept'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>CGPA</td>
                                            <td><?= htmlentities(stripslashes($row['s_cgpa'])); ?></td>
                                        </tr>

                                        <tr>
                                            <td>Gender</td>
                                            <td><?= htmlentities(stripcslashes($row['s_gender'])); ?></td>
                                        </tr>

                                        <tr>
                                            <td>Date of Birth</td>
                                            <?php
                                            $DOB = strtotime(htmlentities(stripcslashes($row['s_dob'])));
                                            $DOB = date("d M, Y", $DOB);
                                            ?>
                                            <td><?= $DOB; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td><?= htmlentities(stripslashes($row['s_phone'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td><?= htmlentities(stripslashes($row['s_email'])); ?></td>
                                        </tr>
                                    </table>
                                    <br />
                                    <div class="text-center">
                                        <a class="btn btn-primary" href="<?= SERVER; ?>/editinfo"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Update</a>
                                    </div>
                                </div>

                            </div>
                            <?php elseif($teacher): ?>
                                <div class="col-md-12">
                                    <div class="col-md-4">
                                        <div id="img-circle" class="center-block"></div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4 padding20">
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>ID</td>
                                                <td><?= htmlentities(stripslashes($row['t_aiub_id'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Full Name</td>
                                                <td><?= htmlentities(stripslashes($row['t_name'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Designation</td>
                                                <td><?= htmlentities(stripslashes($row['t_designation'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Gender</td>
                                                <td><?= htmlentities(stripcslashes($row['t_gender'])); ?></td>
                                            </tr>

                                            <tr>
                                                <td>Date of Birth</td>
                                                <?php
                                                $DOB = strtotime(htmlentities(stripcslashes($row['t_dob'])));
                                                $DOB = date("d M, Y", $DOB);
                                                ?>
                                                <td><?= $DOB; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Phone</td>
                                                <td><?= htmlentities(stripslashes($row['t_phone'])); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td><?= htmlentities(stripslashes($row['t_email'])); ?></td>
                                            </tr>
                                        </table>
                                        <br />
                                        <div class="text-center">
                                            <a class="btn btn-primary" href="<?= SERVER; ?>/editinfo"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Update</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </section>
                </div>
            </main>
        </div>
        <?php require_once 'footer.php' ?>
	</body>
</html>