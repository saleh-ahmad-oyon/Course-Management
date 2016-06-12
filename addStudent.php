<?php
    require 'session.php'; 
	if (!isset($_SESSION['teacher'])) {
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
                                <div class="text-center">
                                    <h3><ins><?php echo getCourseName($_GET['id']) ?></ins></h3><br />
                                    <form action="<?= SERVER; ?>/controller/addStudent" method="post">
                                        <div class="form-inline">
                                            <div class="form-group">
                                                <label>AIUB ID</label>
                                                <input type="text" class="form-control" maxlength="10" placeholder="XX-XXXXX-X" id="stuid" name="studId" required="required" />
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary" name="addStud"><i class="fa fa-user-plus"></i></button>
                                            </div>
                                        </div>
                                        <input type="hidden" value="<?= $_GET['id']; ?>" name="courseId"/>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
        <?php $mask = true; require_once 'footer.php'; ?>        
	</body>
</html>