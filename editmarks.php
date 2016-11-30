<?php
    require 'session.php';
	if (!isset($_SESSION['teacher'])) {
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
    <?php require_once 'templates/default/head.php'; ?>
</head>
<body>
  <div id="wrap">
    <main>
      <div class="container">
        <header>
          <div class="row">
            <div class="col-md-12">
              <?php require_once 'templates/default/header.php'; ?>
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
                <h3>
                  <ins>
                    <a href="<?= SERVER; ?>/teacher/course/<?= htmlentities(stripcslashes($_GET['id1']), ENT_QUOTES, 'UTF-8'); ?>">
                      <?= getCourseName($_GET['id1']) ?>
                    </a>
                  </ins>
                </h3>
                <br />
                <h4>
                  <?php $value = explode('|', $stuInfo); ?>
                  ID: <span class="text-primary"><?= htmlentities(stripcslashes($value[0]), ENT_QUOTES, 'UTF-8'); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Name: <span class="text-primary"><?= htmlentities(stripcslashes($value[1]), ENT_QUOTES, 'UTF-8'); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Attendence: <span class="text-primary"><?= htmlentities(stripcslashes($value[2]), ENT_QUOTES, 'UTF-8'); ?></span>
                </h4>
                <br/>
                <h5><ins><?= $name; ?></ins></h5>
              </div>
              <br/><br/>
              <?php if(!count($outputString)): ?>
                <h3>No Data Found.</h3>
              <?php else: ?>
                <div class="col-md-offset-4 col-md-4">

                  <!-- ==================
                       Edit Mark Form
                  =================== -->
                  <form action="<?= SERVER; ?>/controller/stuMarksEdit?id1=<?= $_GET['id1']; ?>&id2=<?= $_GET['id2']; ?>"
                        method="post"
                        onsubmit="return confirmation();">
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
                            <td><label><?= htmlentities(stripcslashes($value['e_date']), ENT_QUOTES, 'UTF-8'); ?></label></td>
                            <?php if($_GET['id3'] == 'mid' || $_GET['id3'] == 'final'): ?>
                              <td>
                                <input type="number"
                                       step="0.50"
                                       min="0"
                                       max="40"
                                       value="<?= htmlentities(stripcslashes($value['e_marks']), ENT_QUOTES, 'UTF-8'); ?>"
                                       name="marks[]"
                                       class="onlyFloat form-control" />
                              </td>
                            <?php else: ?>
                              <td>
                                <input type="number"
                                       step="0.50"
                                       min="0"
                                       max="20"
                                       value="<?= htmlentities(stripcslashes($value['e_marks']), ENT_QUOTES, 'UTF-8'); ?>"
                                       name="marks[]"
                                       class="onlyFloat form-control" />
                              </td>
                            <?php endif; ?>
                            <input type="hidden"
                                   value="<?= htmlentities(stripcslashes($value['e_id']), ENT_QUOTES, 'UTF-8'); ?>"
                                   name="id[]" />
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <td colspan="2">
                            <div class="text-center">
                              <button type="submit" name="editMarks" class="btn btn-success">
                                <span class='glyphicon glyphicon-refresh hidden-md hidden-sm'></span><span class="hidden-xs">  Update</span>
                              </button>
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
  <?php require_once 'templates/default/footer.php' ?>
</body>
</html>