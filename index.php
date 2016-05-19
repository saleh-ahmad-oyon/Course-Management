<?php require 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php require_once 'head.php'; ?>
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
                <hr/>
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <?php if(isset($_SESSION['authority'])): ?>
                                    <a class="btn btn-primary hover-focus" href="<?php echo SERVER; ?>/stuTeachHandle?id=1">Manage Teacher</a><br/><br/>
                                    <a class="btn btn-success hover-focus" href="<?php echo SERVER; ?>/stuTeachHandle?id=2">Manage Student</a><br/><br/>
                                <?php elseif(isset($_SESSION['teacher'])):
                                    $tid = $_SESSION['tid'];
                                    $outputString = teacherCourse($tid);
                                    foreach($outputString as $value):?>
                                    <a class="btn btn-default hover-focus" href="<?php echo SERVER; ?>/teacher/course/<?php echo $value['c_id']; ?>"><?php echo $value['c_name']; ?></a><br /><br />
                                    <?php endforeach; ?>
                                <?php elseif(isset($_SESSION['stud'])):
                                    $sid = $_SESSION['sid'];
                                    $outputString = studentCourse($sid);?>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <thead>
                                        <th class="text-center">Subject</th>
                                        <th class="text-center">Course Instructor</th>
                                        </thead>
                                        <tbody>
                                        <?php foreach($outputString as $value):?>
                                            <tr>
                                                <td>
                                                    <a href="<?php echo SERVER; ?>/studentCourse?id=<?php echo $value['c_id']; ?>"><?php echo $value['c_name']; ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $value['t_name']; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                                <?php else: ?>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <table class="table table-bordered">
                                        <form action="<?php echo SERVER; ?>/session" method="post">
                                            <caption class="text-primary">Please login to view your profile</caption>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-addon" title="AIUB ID"><i class="fa fa-user font17"></i></div>
                                                            <input type="text" placeholder="AIUB ID" class="onlyId form-control" name="user" required="required" pattern="^\d{2}\-\d{5}\-\d{1}$|^\d{4}\-\d{4}\-\d{1}$" title="Format should be XX-XXXXX-X or XXXX-XXXX-X"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-addon" title="Password"><i class="fa fa-key"></i></div>
                                                            <input type="password" name="pass" placeholder="Password" required="required" class="form-control"/>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td>
                                                    <div class="text-center">
                                                        <button type="submit" name="loginbtn" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</button>
                                                    </div>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </form>
                                    </table>
                                    <label class="text-danger">
                                        <?php
                                            if(isset($_GET['err'])){
                                                if($_GET['err'] == 1){
                                                    echo '*Username and Password do not match !!';
                                                }
                                                elseif($_GET['err'] == 2){
                                                    echo '*Username pattern do not correct !!';
                                                }
                                            }
                                        ?>
                                    </label>
                                    </div>
                                    <div class="col-md-4"></div>
                                <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <footer>
        <hr/>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php require_once 'footer.php' ?>
                </div>
            </div>
            <div>
    </footer>
	</body>
</html>
<script src="<?php echo SERVER; ?>/assets/js/custom.js"></script>