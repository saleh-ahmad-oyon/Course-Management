<?php require 'session.php'; 
	if(!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])){
		header('Location: '.SERVER.'');
	}
	$id = $_GET['id'];
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
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h3><ins><?php echo getCourseName($_GET['id']) ?></ins></h3><br />
                                        <a class="btn btn-primary hover-focus margin-top-10" href="<?php echo SERVER; ?>/course/<?php echo $id; ?>/students">Student List</a>&nbsp;&nbsp;
                                        <a class="btn btn-info hover-focus margin-top-10" href="<?php echo SERVER; ?>/course/<?php echo $id; ?>/addstudent"><i class="fa fa-user-plus"></i> Student</a>&nbsp;&nbsp;
                                        <a class="btn btn-primary hover-focus margin-top-10" href="<?php echo SERVER; ?>/course/<?php echo $id; ?>/result">Students Marks</a>&nbsp;&nbsp;
                                        <a class="btn btn-info hover-focus margin-top-10" href="<?php echo SERVER; ?>/course/<?php echo $id; ?>/attendance">Students Attendance</a>
                                    </div>
                                </div>
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