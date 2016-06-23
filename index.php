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
                <div class="container">
                    <section>
                        <div class="row">
                            <div class="col-sm-12">
                                <?php if(isset($_SESSION['authority'])): ?>
                                    <div class="text-center">
                                        <a class="btn btn-primary hover-focus" href="<?= SERVER; ?>/manage/teacher">Manage Teacher</a><br/><br/>
                                        <a class="btn btn-success hover-focus" href="<?= SERVER; ?>/manage/student">Manage Student</a>
                                    </div>
                                    <?php elseif(isset($_SESSION['teacher'])):
                                        $tid = $_SESSION['tid'];
                                        $outputString = teacherCourse($tid);
                                        if(!count($outputString)): ?>
                                            <h3>No Course has been assigned.</h3>
                                            <?php else: ?>
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
                                                    <td><a href="<?= SERVER; ?>/teacher/course/<?= htmlentities(stripcslashes($value['c_id']), ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities(stripcslashes($value['c_name']), ENT_QUOTES, 'UTF-8'); ?></a></td>
                                                </tr>
                                                <?php $i++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-3"></div>
                                        <?php endif;
                                        elseif(isset($_SESSION['stud'])):
                                        $sid = $_SESSION['sid'];
                                        $outputString = studentCourse($sid);
                                        if(!count($outputString)): ?>
                                            <h3>No Course.</h3>
                                            <?php else: ?>
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
                                                        <a href="<?= SERVER; ?>/course/student/<?= htmlentities(stripcslashes($value['c_id']), ENT_QUOTES, 'UTF-8'); ?>"><?= htmlentities(stripcslashes($value['c_name']), ENT_QUOTES, 'UTF-8'); ?></a>
                                                    </td>
                                                    <td>
                                                        <?= $value['t_name']; ?>
                                                    </td>
                                                </tr>
                                            <?php $i++; endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-2"></div>
                                        <?php endif; ?>
                                    <?php else: ?>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4 form-block">
                                            <form action="<?= SERVER; ?>/session" method="post">
                                                <p class="text-primary">Sign in with your organizational id number.</p>
                                                <div class="input-group" style="padding-top: 25px;">
                                                    <div class="input-group-addon" title="AIUB ID"><i class="fa fa-user font17"></i></div>
                                                    <input type="text" placeholder="AIUB ID" class="onlyId form-control" name="user" required="required" pattern="^\d{2}\-\d{5}\-\d{1}$|^\d{4}\-\d{3,4}\-\d{1}$" title="Please put a valid ID"/>
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
                                                        echo '<br/>* Username and Password do not match !!';
                                                    }
                                                    elseif($_GET['err'] == 2){
                                                        echo '<br/>* Username pattern do not correct !!';
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
        <?php require_once 'footer.php' ?>
	</body>
</html>