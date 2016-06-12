<?php
    require 'session.php';
	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])) {
		header('Location: '.SERVER.'');
	}
	$cid          = $_GET['id1'];
	$sid          = $_GET['id2'];
	$stuInfo      = getStuIdNameAttendence($cid, $sid);
	$outputString = getXmMarks($_GET['id1'],$_GET['id2'],$_GET['id3']);

	if (strpos($_GET['id3'],'quiz') !== false) {
		$name = str_replace('quiz', 'Quiz ', $_GET['id3']);
	} elseif (strpos($_GET['id3'],'mid') !== false) {
		$name = str_replace('mid', 'Mid Term', $_GET['id3']);
	} elseif (strpos($_GET['id3'],'final') !== false) {
		$name = str_replace('final', 'Final Term', $_GET['id3']);
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
                                    <h2><ins><?= getCourseName($_GET['id1']) ?></ins></h2><br />
                                    <h4>
                                        <?php $value = explode('|', $stuInfo); ?>
                                        ID: <span class="text-primary"><?= $value[0]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Name: <span class="text-primary"><?= $value[1]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Attendence: <span class="text-primary"><?= $value[2]; ?></span>
                                    </h4>
                                    <br/>
                                    <h5><ins><?= $name; ?></h5></ins>
                                </div>
                                <br/><br/>
                                <?php if(!count($outputString)): ?>
                                    <h3>No Data Found.</h3>
                                <?php else: ?>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <form action="<?= SERVER; ?>/controller/stuMarksEdit?id1=<?= $_GET['id1']; ?>&id2=<?= $_GET['id2']; ?>" method="post" onsubmit="return confirmation();">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($outputString as $value): ?>
                                                    <tr>
                                                        <td><label><?= $value['e_date']; ?></label></td>
                                                        <?php if($_GET['id3'] == 'mid' || $_GET['id3'] == 'final'): ?>
                                                                <td><input type="number" step="0.50" min="0" max="40" value="<?= $value['e_marks']; ?>" name="marks[]" class="onlyFloat form-control" /></td>
                                                        <?php else: ?>
                                                                <td><input type="number" step="0.50" min="0" max="20" value="<?= $value['e_marks']; ?>" name="marks[]" class="onlyFloat form-control" /></td>
                                                        <?php endif; ?>
                                                        <input type="hidden" value="<?= $value['e_id']; ?>" name="id[]" />
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2">
                                                        <div class="text-center">
                                                            <button type="submit" name="editMarks" class="btn btn-success"><span class='glyphicon glyphicon-refresh hidden-md hidden-sm'></span><span class="hidden-xs">  Update</span></button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </form>
                                </div>
                                <div class="col-md-4"></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </section>
                </div>
            </main>
        </div>
        <?php require_once 'footer.php' ?>
	</body>
</html>