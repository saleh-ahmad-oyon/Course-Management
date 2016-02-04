<?php
require 'session.php';
if(!isset($_SESSION['authority'])){
    header('Location: '.SERVER.'');
}
$teacher = false;
$student = false;
if($_GET['id'] == 1){
    $teacher = true;
}elseif($_GET['id'] == 2){
    $student = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php'; ?>
    <link rel="stylesheet" href="<?php echo SERVER; ?>/assets/css/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo SERVER; ?>/assets/css/jquery-ui.theme.css">
    <script src="<?php echo SERVER; ?>/assets/js/jquery-ui.js"></script>
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
    <style>
        .overflow {
            height: 142px;
        }
    </style>
</head>
<body>
    <div id="wrap">
        <div id="main">
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
                            <h3>Assign Teacher in a Course</h3>
                            <br/><br/>
                            <div class="col-md-1"></div>
                            <form action="<?php echo SERVER; ?>/controller/addCourseTeacher" method="post" onsubmit="return confirmation();">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Choose Teacher</label>
                                        <select name="teacher" class="form-control" id="speed">
                                            <option></option>
                                            <?php $teacher = getTeacher();
                                            foreach($teacher as $t):?>
                                                <option><?php echo $t['t_aiub_id'], " ","|"," ", $t['t_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Choose Course</label>
                                        <select name="subject" class="form-control" id="speed1">
                                            <option></option>
                                            <?php $course = getSubject();
                                            foreach($course as $c): ?>
                                                <option><?php echo $c['c_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id2">
                                    <button type="submit" name="addCot" class="btn btn-success" style="margin-top: 25px;">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row">
                        <div class="col-md-12">
                            <h3>Teacher with Course</h3>
                            <br/><br/>
                            <div class="col-md-1"></div>
                            <div class="col-md-10">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Teacher ID</th>
                                        <th>Teacher Name</th>
                                        <th>Course Name</th>
                                        <th></th>
                                    </tr>
                                    <?php $teacherCourse = getTeacherSubject();
                                    foreach($teacherCourse as $tc): ?>
                                        <tr>
                                            <td><?php echo $tc['t_aiub_id']; ?></td>
                                            <td><?php echo $tc['t_name']; ?></td>
                                            <td><?php echo $tc['c_name']; ?></td>
                                            <td>
                                                <div class="text-center">
                                                    <form action="<?php echo SERVER; ?>/controller/removeTeacherFromCourse" method="post" onsubmit="return confirmation();">
                                                        <input type="hidden" value="<?php echo $tc['c_id']; ?>" name="id">
                                                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id2">
                                                        <button type="submit" name="dltTeacher" class="btn btn-danger"><span class='glyphicon glyphicon-trash'></span>&nbsp;&nbsp;Delete</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <footer>
        <hr />
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php require_once 'footer.php' ?>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
<script src="<?php echo SERVER; ?>/assets/js/custom.js"></script>