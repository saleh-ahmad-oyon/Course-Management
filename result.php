<?php
    require 'session.php';
	if (!isset($_SESSION['teacher'])) {
		header('Location: '.SERVER.'');
	}
	$outputString = getStudentListExam($_GET['id']);
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
            <div class="col-md-12">

              <!-- =====================
                   Student Result
              ====================== -->
              <h3 class="text-center">
                <ins>
                  <a href="<?= SERVER; ?>/teacher/course/<?= htmlentities(stripcslashes($_GET['id']), ENT_QUOTES, 'UTF-8'); ?>">
                    <?= getCourseName($_GET['id']) ?>
                  </a>
                </ins>
              </h3>
              <br />
              <?php if(!count($outputString)): ?>
                <h3>No Data Found.</h3>
              <?php else: ?>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>ID</th>
                      <th>Name</th>
                      <th class="text-center">Mid</th>
                      <th class="text-center">Final</th>
                      <th class="text-center">Total</th>
                      <th class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach($outputString as $i => $value): ?>
                      <tr>
                        <td><?= $i+1; ?></td>
                        <td><?= htmlentities(stripslashes($value['s_aiub_id']), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?= htmlentities(stripslashes($value['s_full_name']), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="text-center"><?= htmlentities(stripslashes($value['mid_grade']), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="text-center"><?= htmlentities(stripslashes($value['final_grade']), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class="text-center"><?= htmlentities(stripslashes($value['grand_final_grade']), ENT_QUOTES, 'UTF-8'); ?></td>
                        <td class='text-center'>
                          <a class='btn btn-info' href='<?= SERVER;?>/course/<?= $_GET['id']; ?>/marks/<?= htmlentities(stripslashes($value['s_id']), ENT_QUOTES, 'UTF-8'); ?>' data-toggle="tooltip" data-placement="top" title="Mark Details">
                            <span class='glyphicon glyphicon-info-sign font17 hidden-md hidden-sm'></span><span class="hidden-xs">  Details</span>
                          </a>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
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