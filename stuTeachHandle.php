<?php
    require 'session.php';
    if (!isset($_SESSION['authority'])) {
        header('Location: '.SERVER.'');
    }
    $teacher = false;
    $student = false;
    if ($_GET['id'] == 1) {
        $teacher = true;
    } elseif($_GET['id'] == 2) {
        $student = true;
    }
?>
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
            <hr />
            <div class="container">
                <section>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <div class="text-center">
                                    <?php if($teacher): ?>
                                    <a class="btn btn-primary btn-block hover-focus" href="<?= SERVER; ?>/add/teacher"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add Teacher</a><br/>
                                    <a class="btn btn-primary btn-block hover-focus" href="<?= SERVER; ?>/teacher/subject"><i class="fa fa-book"></i>&nbsp;&nbsp;Manage Subject</a>
                                        <?php elseif($student): ?>
                                        <a class="btn btn-success btn-block hover-focus" href="<?= SERVER; ?>/add/student"><i class="fa fa-user-plus"></i>&nbsp;&nbsp;Add Student</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
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
<script src="<?= SERVER; ?>/assets/js/custom.js"></script>