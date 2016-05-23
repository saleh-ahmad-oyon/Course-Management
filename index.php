<?php require 'session.php'; ?>
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
            <div class="container">
                <section>
                    <div class="row">
                        <div class="col-sm-12">
                            <?php if(isset($_SESSION['authority'])): ?>
                                <div class="text-center">
                                    <a class="btn btn-primary hover-focus" href="<?php echo SERVER; ?>/manage/teacher">Manage Teacher</a><br/><br/>
                                    <a class="btn btn-success hover-focus" href="<?php echo SERVER; ?>/manage/student">Manage Student</a>
                                </div>
                                <?php elseif(isset($_SESSION['teacher'])):
                                    $tid = $_SESSION['tid'];
                                    $outputString = teacherCourse($tid); ?>
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th class="text-center">Course Title</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;foreach($outputString as $value):?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><a href="<?php echo SERVER; ?>/teacher/course/<?php echo $value['c_id']; ?>"><?php echo $value['c_name']; ?></a></td>
                                            </tr>
                                            <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-3"></div>
                                <?php elseif(isset($_SESSION['stud'])):
                                    $sid = $_SESSION['sid'];
                                    $outputString = studentCourse($sid);?>
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th class="text-center">Course Title</th>
                                            <th class="text-center">Course Instructor</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $i=1; foreach($outputString as $value):?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <a href="<?php echo SERVER; ?>/course/student/<?php echo $value['c_id']; ?>"><?php echo $value['c_name']; ?></a>
                                                </td>
                                                <td>
                                                    <?php echo $value['t_name']; ?>
                                                </td>
                                            </tr>
                                        <?php $i++; endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-2"></div>
                                <?php else: ?>
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4 form-block">
                                        <form action="<?php echo SERVER; ?>/session" method="post">
                                            <p class="text-primary">Sign in with your organizational id number.</p>
                                            <div class="input-group" style="padding-top: 25px;">
                                                <div class="input-group-addon" title="AIUB ID"><i class="fa fa-user font17"></i></div>
                                                <input type="text" placeholder="AIUB ID" class="onlyId form-control" name="user" required="required" pattern="^\d{2}\-\d{5}\-\d{1}$|^\d{4}\-\d{4}\-\d{1}$" title="Format should be XX-XXXXX-X or XXXX-XXXX-X"/>
                                            </div>
                                            <div class="input-group padding20">
                                                <div class="input-group-addon" title="Password"><i class="fa fa-key"></i></div>
                                                <input type="password" name="pass" placeholder="Password" required="required" class="form-control"/>
                                            </div>
                                            <div class="text-center padding20">
                                                <button type="submit" name="loginbtn" class="btn btn-primary btn-block"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</button>
                                            </div>
                                        </form>
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
                                    <div class="col-sm-4"></div>
                                <?php endif; ?>
                        </div>
                    </div>
                </section>
            </div>
        </main>
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