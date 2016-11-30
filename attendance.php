<?php 
    require 'session.php'; 
	if (!isset($_SESSION['teacher'])) {
		header('Location: '.SERVER.'');
	}
	$outputString = studentsAttendence($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'templates/default/head.php'; ?>
  <link href="<?= SERVER; ?>/assets/css/checkbox.css" rel="stylesheet"/>
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
            <div class="col-md-12">
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

                <!-- ======================
                     Student Attendance
                ======================= -->
                <div class="col-md-offset-1 col-md-10">
                  <form action="<?= SERVER; ?>/controller/confirmAttendence?id=<?= htmlentities(stripcslashes($_GET['id']), ENT_QUOTES, 'UTF-8'); ?>"
                        method="post"
                        onsubmit="return confirmation();">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th></th>
                          <th>No.</th>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Total Attendence</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach($outputString as $i => $value):?>
                          <tr>
                            <td>
                              <input type='checkbox'
                                     id='del<?= $i + 1 ?>'
                                     name='check_att[]'
                                     checked='checked'
                                     value='<?= htmlentities(stripcslashes($value['s_id']), ENT_QUOTES, 'UTF-8'); ?>' />
                              <label for='del<?= $i + 1; ?>'></label>
                            </td>
                            <td><?= $i + 1; ?></td>
                            <td><?= htmlentities(stripcslashes($value['s_aiub_id']), ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?= htmlentities(stripcslashes($value['s_full_name']), ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class='text-primary'><?= htmlentities(stripcslashes($value['att_total']), ENT_QUOTES, 'UTF-8'); ?></td>
                          </tr>
                        <?php endforeach; ?>
                        <tr>
                          <td colspan="5" class="text-center">
                            <input type="submit" name="attend" value="Submit" class="btn btn-primary" />
                          </td>
                        </tr>
                      </tbody>
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