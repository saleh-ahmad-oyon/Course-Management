<?php 
    require 'session.php';
	if (!isset($_SESSION['stud'])) {
		header('Location: '.SERVER.'');
	}
	$cid             = $_GET['id'];
	$studid          = $_SESSION['sid'];
    $totalAttendance = file_get_contents(SERVER.'/default.php?controller=student&action=totalAttendance&param1='.$cid.'&param2='.$studid);
?>
<!DOCTYPE html>
<html lang="en-US">
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
        <hr />
        <section>
          <div class="row">
            <div class="col-sm-offset-3 col-sm-6">
              <div class="text-center">
                <h3>
                  <ins>
                    <a href="<?= SERVER; ?>/course/student/<?= htmlentities(stripcslashes($_GET['id']), ENT_QUOTES, 'UTF-8'); ?>">
                      <?= getCourseName($_GET['id']) ?>
                    </a>
                  </ins>
                </h3>
                <br/>
                <a href="<?= SERVER ?>/course/<?= $cid ?>/allnotes" class="btn btn-primary">All Notes</a>
                <h5>Total Attendence: <?= $totalAttendance; ?> day[s]</h5>
              </div>
              <br/><br/>
              <table class="table table-bordered">

                <!-- ============
                     MID Term
                ============= -->
                <thead>
                  <tr class="info">
                    <th>Mid</th>
                    <th>Marks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span>Quiz 1</span></td>
                    <td><?= returnMarks($cid, $studid, 'quiz1'); ?></td>
                  </tr>
                  <tr>
                    <td><span>Quiz 2</span></td>
                    <td><?= returnMarks($cid, $studid, 'quiz2'); ?></td>
                  </tr>
                  <tr>
                    <td><span>Quiz 3</span></td>
                    <td><?= returnMarks($cid, $studid, 'quiz3'); ?></td>
                  </tr>
                  <tr>
                    <td><span>Best Two Quiz Marks</span></td>
                    <td><?= returnMidBestTwoQuizMarks($cid, $studid); ?></td>
                  </tr>
                  <tr>
                    <td><span>Mid Term</span></td>
                    <td><?= returnMarks($cid, $studid, 'mid'); ?></td>
                  </tr>
                  <tr>
                    <td>Mid Term Total</td>
                    <td><?= returnMidTotal($cid, $studid); ?></td>
                  </tr>
                  <tr>
                    <td>Mid Term Grade</td>
                    <td><?= returnMidGrade($cid, $studid); ?></td>
                  </tr>
                </tbody>

                <!-- ==============
                     Final Term
                =============== -->
                <thead>
                  <tr class="info">
                    <th>Final</th>
                    <th>Marks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span>Quiz 4</span></td>
                    <td><?= returnMarks($cid, $studid, 'quiz4'); ?></td>
                  </tr>
                  <tr>
                    <td><span>Quiz 5</span></td>
                    <td><?= returnMarks($cid, $studid, 'quiz5'); ?></td>
                  </tr>
                  <tr>
                    <td><span>Quiz 6</span></td>
                    <td><?= returnMarks($cid, $studid, 'quiz6'); ?></td>
                  </tr>
                  <tr>
                    <td><span>Best Two Quiz Marks</span></td>
                    <td><?= returnFinalBestTwoQuizMarks($cid, $studid); ?></td>
                  </tr>
                  <tr>
                    <td><span>Final Term</span></td>
                    <td><?= returnMarks($cid, $studid, 'final'); ?></td>
                  </tr>
                  <tr>
                    <td><span>Final Term Total</span></td>
                    <td><?= returnFinalTotal($cid, $studid); ?></td>
                  </tr>
                  <tr>
                    <td><span>Final Term Grade</span></td>
                    <td><?= returnFinalGrade($cid, $studid); ?></td>
                  </tr>
                </tbody>

                <!-- ===============
                     Grand Total
                ================ -->
                <thead>
                  <tr class="info">
                    <th>Grand Total</th>
                    <th>Marks</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><span>Grand Total Marks</span></td>
                    <td><?= returntotalMark($cid, $studid); ?></td>
                  </tr>
                  <tr>
                    <td><span>Final Grade</span></td>
                    <td><?= returnGrandFinalGrade($cid, $studid); ?></td>
                  </tr>
                </tbody>
              </table>
            </div><!-- /.col-sm-6 -->
          </div><!-- /.row -->
        </section>
      </div><!-- /.container -->
    </main>
  </div>
    <?php require_once 'footer.php' ?>
</body>
</html>