<?php require 'session.php';
	if(!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])){
		header('Location: '.SERVER.'');
	}
	$cid = $_GET['id1'];
	$sid = $_GET['id2'];
	$stuInfo = getStuIdNameAttendence($cid, $sid);
	
	$outputString = getXmMarksForDelete($_GET['id1'],$_GET['id2'],$_GET['id3']);
	if(strpos($_GET['id3'],'quiz')!== false){
		$name = str_replace('quiz', 'Quiz ', $_GET['id3']);
	}
	elseif(strpos($_GET['id3'],'mid')!== false){
		$name = str_replace('mid', 'Mid Term', $_GET['id3']);
	}
	elseif(strpos($_GET['id3'],'final')!== false){
		$name = str_replace('final', 'Final Term', $_GET['id3']);
	}	
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
                                    <h2><ins><?php echo getCourseName($_GET['id1']) ?></ins></h2>
                                    <br />
                                    <h4>
                                        <?php $value = explode('|', $stuInfo); ?>
                                        ID: <span class="text-primary"><?php echo $value[0]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Name: <span class="text-primary"><?php echo $value[1]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Attendence: <span class="text-primary"><?php echo $value[2]; ?></span>
                                    </h4>
                                    <br/>
                                    <h5><ins><?php echo $name; ?></h5></ins>
                                </div>
                                <br/><br/>
                                <?php if(!count($outputString)): ?>
                                    <h3>No Data Found.</h3>
                                <?php else: ?>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <form action="<?php echo SERVER; ?>/controller/stuMarksDeleteSubmit?id1=<?php echo $_GET['id1']; ?>&id2=<?php echo $_GET['id2']; ?>" method="post" onsubmit="return confirmation();">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Date</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $i=1;foreach($outputString as $value): ?>
                                                        <tr>
                                                            <td><input type="checkbox" id="del<?php echo $i; ?>" name="check_dlt[]" value="<?php echo $value['e_id']; ?>" /><label for="del<?php echo $i; ?>"></label></td>
                                                            <td><label name="date<?php echo $i; ?>"><?php echo $value['e_date']; ?></label></td>
                                                            <td><label><?php echo $value['e_marks']; ?></label></td>
                                                        </tr>
                                                    <?php $i++; ?>
                                                <?php endforeach; ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3">
                                                    <div class="text-center">
                                                        <button type="submit" name="dltMarks" class="btn btn-danger"><span class='glyphicon glyphicon-trash'></span></button>
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