<footer>
<hr />
<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div class="col-sm-4">
        <p><span>Designed by <strong>Saleh Ahmad</strong></span></p>
        <p><cite>Noob Lonely</cite> &copy; <?php echo date("Y") ?></p>
      </div>
      <div class="col-sm-3">
        <p><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;<a href="mailto:oyon@nooblonely.com?cc=nissongo102@gmail.com&amp;subject=Feedback&amp;body=Dear%20Buddy%2C%0A" target="_top">oyon@nooblonely.com</a></p>
        <p><span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;+880-1626785569</p>
        <p><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;10/181, 12/B, Mirpur, Dhaka-1216</p>
      </div>
      <div class="col-sm-5">

        <!-- ===============
             ABOUT MODAL
        ================ -->
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle"></i>&nbsp;
          About
        </button>

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Course Management</h4>
              </div>
              <div class="modal-body" style="font-family: 'Arial';">
                <p>This is a course project. I used PHP, HTML5, CSS3, Bootstrap, Raw JavaScript, Jquery, MySql in this project.</p>
                <p>It is an application that can be used to manage a course according to AIUB(American International University-Bangladesh) regulation. The main features of this application is uploading the marks of multiple quizzes and term exams, uploading the attendance and modifying the uploaded information where applicable.</p>

                <!-- ==============
                     Authority
                =============== -->
                <p>Authority is the heighest privileged user of this system. The functionalities of an Authority are as follows:</p>
                <ul class="fa-ul">
                  <?php $authorPrivilege = getPrivilege(1);
                    foreach($authorPrivilege as $ap):?>
                      <li>
                        <i class="fa-li fa fa-cog fa-spin"></i>
                        <?= htmlentities(stripcslashes($ap['info_list']), ENT_QUOTES, 'UTF-8'); ?>
                      </li>
                  <?php endforeach; ?>
                </ul>

                <!-- ======================
                    Faculty Member
                ======================= -->
                <p>Faculty is the second highest privileged user of this system. The functionalities of a faculty are as follows:</p>
                <ul class="fa-ul">
                  <?php $teacherPrivilege = getPrivilege(2);
                    foreach($teacherPrivilege as $tp):?>
                      <li>
                        <i class="fa-li fa fa-cog fa-spin"></i>
                        <?= htmlentities(stripcslashes($tp['info_list']), ENT_QUOTES, 'UTF-8'); ?></li>
                  <?php endforeach; ?>
                </ul>

                <!-- =============
                     Student
                ============== -->
                <p>Student is the lower privileged user of the system. The functionalities of a student is as follows:</p>
                <ul class="fa-ul">
                  <?php $studentPrivilege = getPrivilege(3);
                    foreach($studentPrivilege as $sp):?>
                      <li>
                        <i class="fa-li fa fa-cog fa-spin"></i>
                        <?= htmlentities(stripcslashes($sp['info_list']), ENT_QUOTES, 'UTF-8'); ?>
                      </li>
                  <?php endforeach; ?>
                </ul>
              </div>
              <div class="modal-footer">
                <div class="pull-left text-left">
                  <p>Designed by Saleh Ahmad</p>
                  <p>Course Management &copy;2015-2016</p>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- ========================
             How to Login Modal
        ========================= -->
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal2"><i class="fa fa-info-circle"></i>&nbsp;
          How to login
        </button>

        <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-12">
                    <p>Here you can login with three types of users. You can login as student or teacher or authority. Their AIUB ID and passwords are following.</p>
                    <div class="col-md-6">

                      <!-- ==================
                           Student Table
                      =================== -->
                      <table class="table table bordered">
                        <caption><h4>Student</h4></caption>
                        <thead>
                          <tr>
                            <th>AIUB ID</th>
                            <th>Password</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $stuIDPass = getStuIDPass();
                            foreach($stuIDPass as $sip): ?>
                              <tr>
                                <td><?= htmlentities(stripcslashes($sip['s_aiub_id']), ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlentities(stripcslashes($sip['s_pass']), ENT_QUOTES, 'UTF-8'); ?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table><!-- /.table -->
                    </div>
                    <div class="col-md-6">

                      <!-- =====================
                           Authority Table
                      ====================== -->
                      <table class="table table bordered">
                        <caption><h4>Autority</h4></caption>
                        <thead>
                          <tr>
                            <th>AIUB ID</th>
                            <th>Password</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $authorityIDPass = getAuthorityIDPass();
                            foreach($authorityIDPass as $aip): ?>
                              <tr>
                                <td><?= htmlentities(stripcslashes($aip['a_aiub_id']), ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlentities(stripcslashes($aip['a_pass']), ENT_QUOTES, 'UTF-8'); ?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>

                      <!-- =================
                           Teacher Table
                      ================== -->
                      <table class="table table bordered">
                        <caption><h4>Teacher</h4></caption>
                        <thead>
                          <tr>
                            <th>AIUB ID</th>
                            <th>Password</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php $teacherIDPass = getteacherIDPass();
                            foreach($teacherIDPass as $tip): ?>
                              <tr>
                                <td><?= htmlentities(stripcslashes($tip['t_aiub_id']), ENT_QUOTES, 'UTF-8'); ?></td>
                                <td><?= htmlentities(stripcslashes($tip['t_pass']), ENT_QUOTES, 'UTF-8'); ?></td>
                              </tr>
                          <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div><!-- /.col-md-6 -->
                  </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
              </div><!-- /.modal-body -->
              <div class="modal-footer">
                <div class="pull-left text-left">
                  <p>Designed by Saleh Ahmad</p>
                  <p>Course Management &copy; 2015</p>
                </div>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div><!-- /.modal-footer -->
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <?php include_once 'share.php'; ?>
      </div>
    </div><!-- /.col-sm-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->
</footer>

<!--  ==================
      JS FILES
==================== -->
<script src="<?= SERVER; ?>/assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= SERVER; ?>/assets/css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script src="<?= SERVER; ?>/assets/js/custom.js"></script>

<?php if(isset($dropify)): ?>
    <script src="<?= SERVER; ?>/assets/js/dropify.js"></script>
    <script src="<?= SERVER; ?>/assets/js/mydropify.js"></script>
<?php endif; ?>

<?php if(isset($jui)): ?>
    <script src="<?= SERVER; ?>/assets/js/jquery-ui.js"></script>
<?php endif; ?>

<?php if(isset($mask)): ?>
    <script src="<?= SERVER; ?>/assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?= SERVER; ?>/assets/js/mymask.js"></script>
<?php endif; ?>
<?php if(isset($search)): ?>
    <script src="<?= SERVER; ?>/assets/js/typeahead.bundle.min.js"></script>
    <script src="<?= SERVER; ?>/assets/js/search.js"></script>
<?php endif; ?>

<?php if(isset($fileupload)): ?>
<!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
<script src="<?= SERVER; ?>/assets/js/vendor/jquery.ui.widget.js"></script>
<!-- The Templates plugin is included to render the upload/download listings -->
<script src="//blueimp.github.io/JavaScript-Templates/js/tmpl.min.js"></script>
<!-- The Load Image plugin is included for the preview images and image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Load-Image/js/load-image.all.min.js"></script>
<!-- The Canvas to Blob plugin is included for image resizing functionality -->
<script src="//blueimp.github.io/JavaScript-Canvas-to-Blob/js/canvas-to-blob.min.js"></script>
<!-- blueimp Gallery script -->
<script src="//blueimp.github.io/Gallery/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?= SERVER; ?>/assets/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?= SERVER; ?>/assets/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?= SERVER; ?>/assets/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?= SERVER; ?>/assets/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?= SERVER; ?>/assets/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?= SERVER; ?>/assets/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?= SERVER; ?>/assets/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?= SERVER; ?>/assets/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?= SERVER; ?>/assets/js/main.js"></script>
<!-- The XDomainRequest Transport is included for cross-domain file deletion for IE 8 and IE 9 -->
<!--[if (gte IE 8)&(lt IE 10)]>
<script src="<?= SERVER; ?>/assets/js/cors/jquery.xdr-transport.js"></script>
<![endif]-->
<?php endif; ?>