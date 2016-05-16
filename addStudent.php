<?php require 'session.php'; 
	if(!isset($_SESSION['teacher'])){
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
                                <div class="text-center">
                                    <h3><ins><?php echo getCourseName($_GET['id']) ?></ins></h3><br />
                                    <form action="<?php echo SERVER; ?>/controller/addStudent" method="post">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label>AIUB ID</label>
                                                <input type="text" class="form-control" maxlength="10" placeholder="XX-XXXXX-X" id="stuid" name="studId" required="required" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="addStud"><i class="fa fa-user-plus"></i></button>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="courseId"/>
                                    </form>
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
<script src="<?php echo SERVER; ?>/assets/js/custom.js"></script>