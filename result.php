<?php
    require 'session.php';
	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])) {
		header('Location: '.SERVER.'');
	}
	$outputString = getStudentListExam($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en-US">
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
                            <div class="text-center">
                                <h3><ins><?= getCourseName($_GET['id']) ?></ins></h3>
                            </div><br />
                            <?php if(!count($outputString)): ?>
                                <h3>No Data Found.</h3>
                            <?php else: ?>
                            <table class="table table-bordered">
                                <thead>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th class="text-center">Mid</th>
                                    <th class="text-center">Final</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Action</th>
                                </thead>
                                <tbody>
                                    <?php $i=1; foreach($outputString as $value): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= htmlentities(stripslashes($value['s_aiub_id']), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td><?= htmlentities(stripslashes($value['s_full_name']), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="text-center"><?= htmlentities(stripslashes($value['mid_grade']), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="text-center"><?= htmlentities(stripslashes($value['final_grade']), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class="text-center"><?= htmlentities(stripslashes($value['grand_final_grade']), ENT_QUOTES, 'UTF-8'); ?></td>
                                            <td class='text-center'>
                                                <a class='btn btn-info' href='<?= SERVER;?>/course/<?= $_GET['id']; ?>/marks/<?= htmlentities(stripslashes($value['s_id']), ENT_QUOTES, 'UTF-8'); ?>' data-toggle="tooltip" data-placement="top" title="Mark Details"><span class='glyphicon glyphicon-info-sign font17 hidden-md hidden-sm'></span><span class="hidden-xs">  Details</span></a>
                                            </td>
                                        </tr>
                                    <?php $i++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
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