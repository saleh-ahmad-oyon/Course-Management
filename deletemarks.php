<?php
    require 'session.php';
	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])) {
		header('Location: '.SERVER.'');
	}
	$cid          = $_GET['id1'];
	$sid          = $_GET['id2'];
	$stuInfo      = getStuIdNameAttendence($cid, $sid);
	$outputString = getXmMarksForDelete($_GET['id1'],$_GET['id2'],$_GET['id3']);

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
      </div><!-- /.container -->
      <hr />
      <div class="container">
        <section>
          <div class="row">
            <div class="col-md-12">
              <div class="text-center">
                <h2><ins><?= getCourseName($_GET['id1']) ?></ins></h2>
                <br />
                <h4>
                  <?php $value = explode('|', $stuInfo); ?>
                  ID: <span class="text-primary"><?= htmlentities(stripslashes($value[0]), ENT_QUOTES, 'UTF-8'); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Name: <span class="text-primary"><?= htmlentities(stripslashes($value[1]), ENT_QUOTES, 'UTF-8'); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Attendence: <span class="text-primary"><?= htmlentities(stripslashes($value[2]), ENT_QUOTES, 'UTF-8'); ?></span>
                </h4>
                <br/>
                <h5><ins><?= $name; ?></h5></ins>
              </div>
              <br/><br/>
              <?php if(!count($outputString)): ?>
                <h3>No Data Found.</h3>
              <?php else: ?>
                <div class="col-md-offset-4 col-md-4">
                  <form action="<?= SERVER; ?>/controller/stuMarksDelete?id1=<?= $_GET['id1']; ?>&id2=<?= $_GET['id2']; ?>"
                        method="post"
                        onsubmit="return confirmation();">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Date</th>
                          <th>Marks</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($outputString as $i => $value): ?>
                          <tr>
                            <td><input type="checkbox" id="del<?= $i+1; ?>" name="check_dlt[]" value="<?= htmlentities(stripslashes($value['e_id']), ENT_QUOTES, 'UTF-8'); ?>" /><label for="del<?= $i + 1; ?>"></label></td>
                            <td><label name="date<?= $i + 1; ?>"><?= htmlentities(stripslashes($value['e_date']), ENT_QUOTES, 'UTF-8'); ?></label></td>
                            <td><label><?= $value['e_marks']; ?></label></td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="3">
                            <div class="text-center">
                              <button type="submit" name="dltMarks" class="btn btn-danger"><span class='glyphicon glyphicon-trash hidden-md hidden-sm'></span><span class="hidden-xs">  Delete</span></button>
                            </div>
                          </td>
                        </tr>
                      </tfoot>
                    </table>
                  </form>
                </div>
              <?php endif; ?>
            </div><!-- /.col-md-12 -->
          </div><!-- /.row -->
        </section>
      </div><!-- /.container -->
    </main>
  </div><!-- /#wrap -->
  <?php require_once 'footer.php' ?>
</body>
</html>