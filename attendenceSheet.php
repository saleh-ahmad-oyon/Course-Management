<?php require 'session.php'; 
	if(!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])){
		header('Location: '.SERVER.'');
	}
	$outputString = studentsAttendence($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'head.php'; ?>
		<link href="<?php echo SERVER; ?>/assets/css/checkbox.css" rel="stylesheet"/>
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
                                    <h3><ins><?php echo getCourseName($_GET['id']) ?></ins></h3>
                                </div><br />
                                <?php if(!count($outputString)): ?>
                                    <h3>No Data Found.</h3>
                                <?php else: ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>No.</th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Total Attendence</th>
                                        </tr>
                                        <form action="<?php echo SERVER; ?>/controller/confirmAttendence?id=<?php echo $_GET['id']; ?>" method="post" onsubmit="return confirmation();">
                                            <?php $i=1; foreach($outputString as $value):?>
                                            <tr>
                                                <td><input type='checkbox' id='del<?php echo $i ?>' name='check_att[]' checked='checked' value='<?php echo $value['s_id']; ?>' /><label for='del<?php echo $i; ?>'></label></td>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $value['s_aiub_id']; ?></td>
                                                <td><?php echo $value['s_full_name'] ?></td>
                                                <td class='text-success'><?php echo $value['att_total']; ?></td>
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