<?php require_once 'session.php'; ?>
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
        <hr/>

        <!-- .container -->
        <div class="container">
          <section>
            <div class="row">
              <div class="col-sm-12">
                <?php if(isset($_SESSION['authority'])): ?>

                <!-- ============================
                     Authority Home Page
                ============================= -->
                  <div class="text-center">
                    <a class="btn btn-primary hover-focus" href="<?= SERVER; ?>/manage/teacher">Manage Teacher</a>
                    <br/><br/>
                    <a class="btn btn-success hover-focus" href="<?= SERVER; ?>/manage/student">Manage Student</a>
                  </div>
                <?php elseif(isset($_SESSION['teacher'])): ?>

                <!-- ============================
                     Teacher Home Page
                ============================= -->
                <?php $tid = $_SESSION['tid'];
                  $outputString = teacherCourse($tid);
                  if(!count($outputString)): ?>
                    <h3>No Course has been assigned.</h3>
                  <?php else: ?>
                    <div class="col-md-offset-3 col-md-6">
                      <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th class="text-center">Course Title</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach($outputString as $i => $value):?>
                            <tr>
                              <td><?= $i+1; ?></td>
                              <td>
                                <a href="<?= SERVER; ?>/teacher/course/<?= htmlentities(stripcslashes($value['c_id']), ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities(stripcslashes($value['c_name']), ENT_QUOTES, 'UTF-8'); ?></a>
                              </td>
                            </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  <?php endif; ?>
                <?php elseif(isset($_SESSION['stud'])): ?>

                  <!-- ============================
                       Student Home Page
                  ============================= -->
                  <?php $sid = $_SESSION['sid'];
                    $outputString = studentCourse($sid);
                    if(!count($outputString)): ?>
                      <h3>No Course.</h3>
                    <?php else: ?>
                      <div class="col-md-offset-2 col-md-8">

                        <!-- .table -->
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th class="text-center">Course Title</th>
                              <th class="text-center">Course Instructor</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($outputString as $i => $value):?>
                              <tr>
                                <td><?= $i + 1; ?></td>
                                <td>
                                  <a href="<?= SERVER; ?>/course/student/<?= htmlentities(stripcslashes($value['c_id']), ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities(stripcslashes($value['c_name']), ENT_QUOTES, 'UTF-8'); ?></a>
                                </td>
                                <td><?= $value['t_name']; ?></td>
                              </tr>
                            <?php endforeach; ?>
                          </tbody>
                        </table><!-- /.table -->
                      </div>
                    <?php endif; ?>
                  <?php else: ?>

                    <!-- ============================
                         Login Page
                    ============================= -->
                    <div class="col-sm-offset-3 col-sm-6 col-md-offset-4 col-md-4 form-block">
                      <form action="<?= SERVER; ?>/session" method="post">
                        <p class="text-primary">Sign in with your organizational id number.</p>
                        <div class="input-group" style="padding-top: 25px;">
                          <div class="input-group-addon" title="AIUB ID"><i class="fa fa-user font17"></i></div>
                          <input type="text" placeholder="AIUB ID" class="onlyId form-control" name="user" required="required" pattern="^\d{2}-\d{5}-\d{1}$|^\d{4}-\d{3,4}-\d{1}$" title="Please put a valid ID"/>
                        </div>
                        <div class="input-group padding20">
                          <div class="input-group-addon" title="Password"><i class="fa fa-key"></i></div>
                          <input type="password" name="pass" placeholder="Password" required="required" class="form-control"/>
                        </div>
                        <div class="text-center padding20">
                          <button type="submit" name="loginbtn" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</button>
                        </div>
                      </form>

                      <!-- ====================
                           Error Message
                      ===================== -->
                      <?php if(isset($_GET['err'])): ?>
                        <label class="text-danger">
                          <?php if($_GET['err'] == 1): ?>
                            <br />* Username and Password do not match!
                          <?php elseif($_GET['err'] == 2): ?>
                            <br />* Username pattern do not correct!
                          <?php endif; ?>
                        </label>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
              </div><!-- /.col-sm-12 -->
            </div><!-- /.row -->
          </section>
        </div><!-- /.container -->
      </main>
    </div>
    <?php require_once 'footer.php' ?>

    <!-- =====================
         Google Analytics
    ====================== -->
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-79832312-1', 'auto');
        ga('send', 'pageview');
    </script>
  </body>
</html>