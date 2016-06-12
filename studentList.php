<?php
    require 'session.php'; 
	if (!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])) {
		header('Location: '.SERVER.'');
	}
	$cid          = $_GET['id'];
	$outputString = studentList($cid);
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
								<div class="text-center">
									<h3><ins><?= getCourseName($_GET['id']) ?></ins></h3>
								</div>
								<br />
								<?php if(!count($outputString)): ?>
									<h3>No Data Found.</h3>
								<?php else: ?>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No.</th>
											<th>ID</th>
											<th>Name</th>
											<th>CGPA</th>
											<th>Department</th>
											<th>Image</th>
											<th class="text-center">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; foreach($outputString as $value):?>
											<tr>
												<td><?= $i; ?></td>
												<td><?= $value['s_aiub_id']; ?></td>
												<td><?= $value['s_full_name']; ?></td>
												<td><?= $value['s_cgpa']; ?></td>
												<td><?= $value['s_dept']; ?></td>
												<td>
													<img src="<?= STUDENTPP, '/', $value['s_image']; ?>" alt="Profile Pic" class="img-circle zoom">
												</td>
												<td class='text-center'>
													<form action="<?= SERVER; ?>/controller/removeStudent?id1=<?= $_GET['id']; ?>&id2=<?= $value['s_id']; ?>" method="post" onsubmit="return confirmation();">
														<button type="submit" name="dltBtn" class="btn btn-danger" ><span class='glyphicon glyphicon-trash hidden-md hidden-sm'></span><span class="hidden-xs">  Delete</span></button>
													</form>
												</td>
											</tr>
											<?php $i++; endforeach; ?>
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
		<script>
			function confirmation()
			{
				var r = confirm("Are you sure ?\nNo data will be available of this student");
				return r ? true : false;
			}
		</script>
	</body>
</html>