<?php
    require 'session.php';
    $student = false;
    $teacher = false;
	if (!isset($_SESSION['stud']) && !isset($_SESSION['teacher'])) {
		header('Location: '.SERVER.'');
	} elseif (isset($_SESSION['stud'])) {
        $student = true;
        $sid     = $_SESSION['sid'];
        $row     = stuEditableBasicInfo($sid);
        $department = deptName();
	} elseif (isset($_SESSION['teacher'])) {
        $teacher = true;
        $tid     = $_SESSION['tid'];
        $row     = teacherEditableBasicInfo($tid);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php require_once 'head.php'; ?>
  <link href="<?= SERVER; ?>/assets/css/dropify.css" rel="stylesheet"/>
  <link href="<?= SERVER; ?>/assets/css/radio.css" rel="stylesheet"/>
  <link rel="stylesheet" href="<?= SERVER; ?>/assets/css/jquery-ui.css">
  <link rel="stylesheet" href="<?= SERVER; ?>/assets/css/jquery-ui.theme.css">
  <style>
    input[type=radio] + label.css-label,
    input[type=radio]:checked + label.css-label,
    input[type=radio]:hover + label.css-label{
      padding-top: 6px;
      padding-left: 39px;
      background-position: 17px 7px;
      height: 26px;
    }
    .overflow {
      height: 85px;
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
              <?php require_once 'header.php'; ?>
            </div>
          </div>
        </header>
        <hr />
        <section>
          <div class="row">
            <div class="col-sm-12">
              <div class="col-sm-offset-4 col-sm-4 form-block">
                <!-- ===========
                     Student
                ============ -->
                <?php if($student): ?>
                  <form action="<?= SERVER; ?>/controller/editStuInfo" method="post" enctype="multipart/form-data" >
                    <!-- Profile Image -->
                    <div class="form-group" style="vertical-align: middle">
                      <label>Profile Picture</label>
                      <input type="file"
                             name="profilepic"
                             accept='image/*'
                             id="input-file-now"
                             class="dropify"
                             data-default-file="<?= STUDENTPP, '/', htmlentities(stripslashes($row['s_image']), ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                    <!-- Full Name -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" title="Full Name"><i class="fa fa-user font17"></i></div>
                        <input type="text"
                               value="<?= htmlentities(stripslashes($row['s_full_name']), ENT_QUOTES, 'UTF-8'); ?>"
                               class="onlyChars form-control"
                               name="editFullName"
                               required="required"
                               title="Only letters, space, dot and comma allowed" />
                      </div>
                    </div>
                    <!-- Department -->
                    <div class="form-group">
                      <div class="input-group" style="line-height: 0.428571;">
                        <div class="input-group-addon" title="Department" style="padding: 6px 11px;">
                          <i class="fa fa-list-alt font17"></i>
                        </div>
                        <select name="editDept" class="form-control" id="speed">
                          <?php foreach($department as $value):
                            $selected = htmlentities(stripslashes($value['d_name']), ENT_QUOTES, 'UTF-8')
                            == htmlentities(stripslashes($row['s_dept']), ENT_QUOTES, 'UTF-8') ? 'selected' : ''; ?>
                            <option <?= $selected ?>><?= $value['d_name']; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <!-- Date of Birth -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" style="padding: 6px 9px;" title="Date of Birth">
                          <span class="KR-Baby-Love KR-Baby-Love-baby"></span>
                        </div>
                        <?php $DOB = strtotime(htmlentities(stripcslashes($row['s_dob']), ENT_QUOTES, 'UTF-8'));
                          $DOB = date("d M, Y", $DOB); ?>
                          <input type="text"
                                 id="datepicker"
                                 placeholder="dd Mmm, YYYY"
                                 name="dob"
                                 class="form-control"
                                 value="<?= $DOB; ?>">
                      </div>
                    </div>
                    <!-- Gender -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" title="Gender">
                          <i class="fa fa-venus-mars"></i>
                        </div>
                          <?php
                          if(array_key_exists('s_gender', $row))
                          {
                              $mal_gen = '';
                              $fem_gen = '';
                              $oth_gen = '';
                              switch(htmlentities(stripcslashes($row['s_gender']), ENT_QUOTES, 'UTF-8'))
                              {
                                  case 'Male':
                                      $mal_gen = 'checked';
                                      break;
                                  case 'Female':
                                      $fem_gen = 'checked';
                                      break;
                                  default:
                                      $oth_gen = 'checked';
                              }
                          }
                          ?>
                        <input type="radio"
                               name="sex"
                               id="male"
                               value="Male"
                               <?= $mal_gen; ?> />
                        <label for="male" class="css-label">Male</label>

                        <input type="radio"
                               name="sex"
                               id="female"
                               value="Female"
                               <?= $fem_gen ?> />
                        <label for="female" class="css-label">Female</label>

                        <input type="radio"
                               name="sex"
                               id="other"
                               value="Other"
                               <?= $oth_gen ?> />
                        <label for="other" class="css-label">Other</label>
                      </div>
                    </div>
                    <!-- Contact -->
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon" title="Contact No."><span class="glyphicon glyphicon-phone"></span></div>
                          <input type="tel"
                                 value="<?= htmlentities(stripslashes($row['s_phone']), ENT_QUOTES, 'UTF-8'); ?>"
                                 class="phnNum form-control"
                                 name="editPhone"
                                 id="phone" />
                        </div>
                      </div>

                      <!-- Email -->
                      <div class="form-group">
                        <div class="input-group">
                          <div class="input-group-addon" title="Email"><span class="glyphicon glyphicon-envelope"></span></div>
                          <input type="email" value="<?php echo htmlentities(stripslashes($row['s_email']), ENT_QUOTES, 'UTF-8'); ?>" name="editEmail" pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i" title="Insert Email address Correctly" class="form-control"/>
                        </div>
                      </div>
                      <!-- Submit -->
                      <div class="form-group">
                        <button type="submit" name="editBtn" class="btn btn-block btn-primary">
                          <i class="fa fa-wrench"></i>&nbsp;&nbsp;Update
                        </button>
                      </div>
                  </form>

                <!-- ===========
                     Teacher
                ============ -->
                <?php elseif($teacher): ?>
                  <form action="<?= SERVER; ?>/controller/editTeacherInfo" method="post" enctype="multipart/form-data" >
                    <!-- Image -->
                    <div class="form-group" style="vertical-align: middle">
                      <label>Profile Picture</label>
                      <input type="file"
                             name="profilepic"
                             accept='image/*'
                             id="input-file-now"
                             class="dropify"
                             data-default-file="<?= TEACHERPP, '/', htmlentities(stripslashes($row['t_image']), ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                    <!-- Full Name -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" title="Full Name"><i class="fa fa-user font17"></i></div>
                        <input type="text"
                               value="<?= htmlentities(stripslashes($row['t_name']), ENT_QUOTES, 'UTF-8'); ?>"
                               class="onlyChars form-control"
                               name="editFullName"
                               required="required"
                               title="Only letters, space, dot and comma allowed" />
                      </div>
                    </div>
                    <!-- Date of Birth -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" style="padding: 6px 9px;" title="Date of Birth">
                          <span class="KR-Baby-Love KR-Baby-Love-baby"></span>
                        </div>
                        <?php $DOB = strtotime(htmlentities(stripcslashes($row['t_dob']), ENT_QUOTES, 'UTF-8'));
                          $DOB = date("d M, Y", $DOB); ?>
                        <input type="text" id="datepicker"
                               placeholder="dd Mmm, YYYY"
                               name="dob"
                               class="form-control"
                               value="<?= $DOB; ?>">
                      </div>
                    </div>
                    <!-- Gender -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" title="Gender"><i class="fa fa-venus-mars"></i></div>
                          <?php
                          if(array_key_exists('t_gender', $row))
                          {
                              $mal_gen = '';
                              $fem_gen = '';
                              $oth_gen = '';
                              switch(htmlentities(stripcslashes($row['t_gender']), ENT_QUOTES, 'UTF-8'))
                              {
                                  case 'Male':
                                      $mal_gen = 'checked';
                                      break;
                                  case 'Female':
                                      $fem_gen = 'checked';
                                      break;
                                  default:
                                      $oth_gen = 'checked';
                              }
                          }
                          ?>
                        <input type="radio"
                               name="sex"
                               id="male"
                               value="Male"
                               <?= $mal_gen ?> />
                        <label for="male" class="css-label">Male</label>

                        <input type="radio"
                               name="sex"
                               id="female"
                               value="Female"
                               <?= $fem_gen ?> />
                        <label for="female" class="css-label">Female</label>

                        <input type="radio"
                               name="sex"
                               id="other"
                               value="Other"
                               <?= $oth_gen ?> />
                        <label for="other" class="css-label">Other</label>
                      </div>
                    </div>
                    <!-- Contact -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" title="Contact No."><span class="glyphicon glyphicon-phone"></span></div>
                        <input type="tel"
                               value="<?= htmlentities(stripslashes($row['t_phone']), ENT_QUOTES, 'UTF-8'); ?>"
                               class="phnNum form-control"
                               name="editPhone"
                               id="phone" />
                      </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                      <div class="input-group">
                        <div class="input-group-addon" title="Email"><span class="glyphicon glyphicon-envelope"></span></div>
                        <input type="email"
                               value="<?= htmlentities(stripslashes($row['t_email']), ENT_QUOTES, 'UTF-8'); ?>"
                               name="editEmail"
                               pattern="[([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)]i"
                               title="Insert Email address Correctly"
                               class="form-control"/>
                      </div>
                    </div>
                    <!-- Submit -->
                    <div class="form-group">
                      <button type="submit" name="editBtn" class="btn btn-block btn-primary">
                        <i class="fa fa-wrench"></i>&nbsp;&nbsp;Update
                      </button>
                    </div>
                  </form>
                <?php endif; ?>
              </div><!-- /.col-sm-4 -->
            </div><!-- /.col-sm-12 -->
          </div><!-- /.row -->
        </section>
      </div>
    </main>
  </div><!-- /#wrap -->
  <?php $dropify = true; $mask = true; $jui=true; require_once 'footer.php'; ?>
</body>
</html>