<?php 
    require 'session.php'; 
	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])) {
		header('Location: '.SERVER.'');
	}
	$outputString = studentsAttendence($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'head.php'; ?>
		<link href="<?= SERVER; ?>/assets/css/checkbox.css" rel="stylesheet"/>
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
                                    <h3><ins><?php echo getCourseName($_GET['id']) ?></ins></h3>
                                </div><br />
                                <?php if(!count($outputString)): ?>
                                    <h3>No Data Found.</h3>
                                <?php else: ?>
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th></th>
                                                <th>No.</th>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Total Attendence</th>
                                            </tr>
                                            <form action="<?= SERVER; ?>/controller/confirmAttendence?id=<?= $_GET['id']; ?>" method="post" onsubmit="return confirmation();">
                                                <?php $i=1; foreach($outputString as $value):?>
                                                    <tr>
                                                        <td><input type='checkbox' id='del<?= $i ?>' name='check_att[]' checked='checked' value='<?= $value['s_id']; ?>' /><label for='del<?= $i; ?>'></label></td>
                                                        <td><?= $i; ?></td>
                                                        <td><?= $value['s_aiub_id']; ?></td>
                                                        <td><?= $value['s_full_name'] ?></td>
                                                        <td class='text-success'><?= $value['att_total']; ?></td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <div class="text-center">
                                                            <input type="submit" name="attend" value="Submit" class="btn btn-primary" />
                                                        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                            </thead>
                                        </table>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-1"></div>
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
        <script src="<?= SERVER; ?>/assets/js/custom.js"></script>
	</body>
</html>