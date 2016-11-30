<?php
require 'session.php';
if (!isset($_SESSION['authority'])) {
    header('Location: '.SERVER.'');
}

$teacher       = getTeacher();
$course        = getSubject();
$teacherCourse = getTeacherSubject();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
  <?php require_once 'templates/default/head.php'; ?>
  <link rel="stylesheet" href="<?= SERVER; ?>/assets/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= SERVER; ?>/assets/css/jquery-ui.theme.css">
  <style>
    .overflow {
      height: 142px;
    }
  </style>
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

          <!-- ========================
               Assign a Teacher
          ========================= -->
          <div class="row">
            <div class="col-sm-12">
              <h3>Assign Teacher in a Course</h3>
              <br/><br/>
              <form action="<?= SERVER; ?>/controller/addCourseTeacher" method="post" onsubmit="return confirmation();">
                <div class="col-sm-offset-1 col-sm-4">
                  <div class="form-group">
                    <label>Choose Teacher</label>
                    <select name="teacher" class="form-control" id="speed">
                      <option></option>
                      <?php foreach($teacher as $t):?>
                        <option><?= $t['t_aiub_id'], " ","|"," ", $t['t_name']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div><!-- /.form-group -->
                </div><!-- /.col-sm-4 -->
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label>Choose Course</label>
                      <select name="subject" class="form-control" id="speed1">
                        <option></option>
                        <?php foreach($course as $c): ?>
                          <option><?php echo $c['c_name']; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div><!-- /.col-sm-4 -->
                  <div class="col-sm-3" style="padding-top: 32px;">
                    <button type="submit" name="addCot" class="btn btn-success">Add</button>
                  </div><!-- /.col-sm-3 -->
              </form>
            </div><!-- /.col-sm-12 -->
          </div><!-- /.row -->
          <br/><br/>

          <!-- =====================================
               List of Teachers with courses
          ====================================== -->
          <div class="row">
            <div class="col-sm-12">
              <h3>Teacher with Course</h3>
              <br/><br/>
              <div class="col-sm-offset-1 col-sm-10">
                <table class="table table-bordered">
                  <tr>
                    <th>Teacher ID</th>
                    <th>Teacher Name</th>
                    <th>Course Name</th>
                    <th class="text-center">Action</th>
                  </tr>
                  <?php foreach($teacherCourse as $tc): ?>
                    <tr>
                      <td><?= $tc['t_aiub_id']; ?></td>
                        <td><?= $tc['t_name']; ?></td>
                        <td><?= $tc['c_name']; ?></td>
                        <td class="text-center">
                          <form action="<?= SERVER; ?>/controller/dltTeacherCourse" method="post" onsubmit="return confirmation();">
                            <input type="hidden" value="<?= $tc['c_id']; ?>" name="id">
                            <button type="submit" name="dltTeacher" class="btn btn-danger"><span class='glyphicon glyphicon-trash hidden-md hidden-sm'></span><span class="hidden-xs">  Delete</span></button>
                          </form>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </table>
              </div><!-- /.col-sm-10 -->
            </div><!-- /.col-sm-12 -->
          </div><!-- /.row -->
        </section>
      </div><!-- /.container -->
    </main>
  </div><!-- /#wrap -->
  <?php $jui = true; require_once 'templates/default/footer.php'; ?>
</body>
</html>