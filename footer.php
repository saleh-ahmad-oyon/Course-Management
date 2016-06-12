<footer>
<hr />
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <p><span>Designed by <strong>Saleh Ahmad</strong></span></p>
                <p><cite>Noob Lonely</cite> &copy; <?php echo date("Y") ?></p>
            </div>
            <div class="col-md-4">
                <p><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;<a href="mailto:oyon@nooblonely.com?cc=nissongo102@gmail.com&amp;subject=Feedback&amp;body=Dear%20Buddy%2C%0A" target="_top">oyon@nooblonely.com</a></p>
                <p><span class="glyphicon glyphicon-earphone"></span>&nbsp;&nbsp;+880-1626785569</p>
                <p><span class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;10/181, 12/B, Mirpur, Dhaka-1216</p>
            </div>
            <div class="col-md-4">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal"><i class="fa fa-info-circle"></i>&nbsp;
                    About
                </button>
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Course Management</h4>
                            </div>
                            <div class="modal-body" style="font-family: 'Arial';">
                                <p>This is a course project. I used PHP, HTML5, CSS3, Bootstrap, JavaScript, Jquery, MySql in this project.</p>
                                <p>It is an application that can be used to manage a course according to AIUB(American International University-Bangladesh) regulation. The main features of this application is uploading the marks of multiple quizzes and term exams, uploading the attendance and modifying the uploaded information where applicable.
                                </p>
                                <p>Authority is the heighest privileged user of this system. The functionalities of an Authority are as follows:
                                    <ul class="fa-ul">
                                        <?php $authorPrivilege = getPrivilege(1);
                                        foreach($authorPrivilege as $ap):?>
                                            <li><i class="fa-li fa fa-cog fa-spin"></i><?php echo $ap['info_list']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </p>
                                <p>Faculty is the second highest privileged user of this system. The functionalities of a faculty are as follows:
                                    <ul class="fa-ul">
                                        <?php $teacherPrivilege = getPrivilege(2);
                                        foreach($teacherPrivilege as $tp):?>
                                            <li><i class="fa-li fa fa-cog fa-spin"></i><?php echo $tp['info_list']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </p>
                                <p>Student is the lower privileged user of the system. The functionalities of a student is as follows:</p>
                                <p>
                                    <ul class="fa-ul">
                                    <?php $studentPrivilege = getPrivilege(3);
                                    foreach($studentPrivilege as $sp):?>
                                        <li><i class="fa-li fa fa-cog fa-spin"></i><?php echo $sp['info_list']; ?></li>
                                    <?php endforeach; ?>
                                    </ul>
                                </p>
                            </div>
                            <div class="modal-footer">
                                <div class="pull-left text-left">
                                    <p>Designed by Saleh Ahmad</p>
                                    <p>Course Management &copy;2015-2016</p>
                                </div>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-link" data-toggle="modal" data-target="#myModal2"><i class="fa fa-info-circle"></i>&nbsp;
                    How to login
                </button>
                <!-- Modal -->
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
                                            <table class="table table bordered">
                                                <caption><h4>Student</h4></caption>
                                                <tr>
                                                    <th>AIUB ID</th>
                                                    <th>Password</th>
                                                </tr>
                                                <?php $stuIDPass = getStuIDPass();
                                                foreach($stuIDPass as $sip): ?>
                                                <tr>
                                                    <td><?= $sip['s_aiub_id']; ?></td>
                                                    <td><?= $sip['s_pass']; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table bordered">
                                                <caption><h4>Autority</h4></caption>
                                                <tr>
                                                    <th>AIUB ID</th>
                                                    <th>Password</th>
                                                </tr>
                                                <?php $authorityIDPass = getAuthorityIDPass();
                                                foreach($authorityIDPass as $aip): ?>
                                                <tr>
                                                    <td><?= $aip['a_aiub_id']; ?></td>
                                                    <td><?= $aip['a_pass']; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                            <table class="table table bordered">
                                                <caption><h4>Teacher</h4></caption>
                                                <tr>
                                                    <th>AIUB ID</th>
                                                    <th>Password</th>
                                                </tr>
                                                <?php $teacherIDPass = getteacherIDPass();
                                                foreach($teacherIDPass as $tip): ?>
                                                <tr>
                                                    <td><?= $tip['t_aiub_id']; ?></td>
                                                    <td><?= $tip['t_pass']; ?></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="pull-left text-left">
                                    <p>Designed by Saleh Ahmad</p>
                                    <p>Course Management &copy; <?php echo date("Y") ?></p></p>
                                </div>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<script src="<?= SERVER; ?>/assets/js/jquery-2.1.4.min.js"></script>
<script src="<?= SERVER; ?>/assets/css/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
<script src="<?= SERVER; ?>/assets/js/custom.js"></script>

<?php if(isset($jui)): ?>
    <script src="<?= SERVER; ?>/assets/js/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#speed" )
                .selectmenu()
                .selectmenu( "menuWidget" )
                .addClass( "overflow" );
            $( "#speed1" )
                .selectmenu()
                .selectmenu( "menuWidget" )
                .addClass( "overflow" );
        });
    </script>
<?php endif; ?>
<?php if(isset($dropify)): ?>
    <script src="<?= SERVER; ?>/assets/js/dropify.js"></script>
    <script src="<?= SERVER; ?>/assets/js/mydropify.js"></script>
<?php endif; ?>
<?php if(isset($mask)): ?>
    <script src="<?= SERVER; ?>/assets/js/jquery.maskedinput.min.js"></script>
    <script src="<?= SERVER; ?>/assets/js/mymask.js"></script>
<?php endif; ?>
