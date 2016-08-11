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
        <link rel="stylesheet" media='all' href="<?= SERVER; ?>/assets/css/search.css" />
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
                                    <h3><ins><?= getCourseName($_GET['id']) ?></ins></h3><br />
                                    <form action="<?= SERVER; ?>/controller/addStudent" method="post">
                                        <div class="form-inline">
                                            <strong>AIUB ID: </strong>
                                            <div class="form-group">
                                                <div id="bloodhound">
                                                    <input class="typeahead" type="text" maxlength="10" pattern="^\d{2}-\d{5}-\d{1}$" placeholder="XX-XXXXX-X" title="Please put a valid ID" id="stuid" name="studId" required="required" />
                                                </div>
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
        <?php $mask = true; $search = true; require_once 'footer.php'; ?>
	</body>
</html>