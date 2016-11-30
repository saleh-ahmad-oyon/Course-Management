<?php
    require 'session.php';
	if (!isset($_SESSION['teacher'])) {
		header('Location: '.SERVER.'');
	}
	$id = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="en-US">
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
        <hr />
        <section>
          <div class="row">
            <div class="col-md-12 text-center">
              <h3>
                <ins>
                  <a href="<?= SERVER; ?>/teacher/course/<?= htmlentities(stripcslashes($_GET['id']), ENT_QUOTES, 'UTF-8'); ?>">
                    <?= getCourseName($_GET['id']) ?>
                  </a>
                </ins>
              </h3>
              <br />
              <a class="btn btn-primary hover-focus margin-top-10" href="<?= SERVER; ?>/course/<?= $id; ?>/students">Student List</a>&nbsp;&nbsp;
              <a class="btn btn-info hover-focus margin-top-10" href="<?= SERVER; ?>/course/<?= $id; ?>/addstudent">
                <i class="fa fa-user-plus"></i> Student
              </a>&nbsp;&nbsp;
              <a class="btn btn-primary hover-focus margin-top-10" href="<?= SERVER; ?>/course/<?= $id; ?>/result">Students Result</a>&nbsp;&nbsp;
              <a class="btn btn-info hover-focus margin-top-10" href="<?= SERVER; ?>/course/<?= $id; ?>/attendance">Students Attendance</a>&nbsp;&nbsp;
              <a class="btn btn-primary hover-focus margin-top-10" href="<?= SERVER; ?>/course/<?= $id; ?>/notes">Notes</a>
            </div>
          </div>
        </section>
      </div>
    </main>
  </div>
  <?php require_once 'templates/default/footer.php' ?>
</body>
</html>