<?php
    require 'session.php'; 
	if (!isset($_SESSION['teacher'])) {
		header('Location: '.SERVER.'');
	}
	$cid          = $_GET['id'];
	$outputString = studentList($cid);
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
		<hr />
		<section>
		  <div class="row">
			<div class="col-md-12">
			  <h3 class="text-center"><ins><?= getCourseName($_GET['id']) ?></ins></h3>
			  <br />

			  <!-- =================
			       Student List
			  ================== -->
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
					<?php foreach($outputString as $i => $value):?>
					  <tr>
						<td><?= $i+1; ?></td>
						<td><?= htmlentities(stripcslashes($value['s_aiub_id']), ENT_QUOTES, 'UTF-8'); ?></td>
						<td><?= htmlentities(stripcslashes($value['s_full_name']), ENT_QUOTES, 'UTF-8'); ?></td>
						<td><?= htmlentities(stripcslashes(number_format((float)$value['s_cgpa'], 2, '.', '')), ENT_QUOTES, 'UTF-8'); ?></td>
						<td><?= htmlentities(stripcslashes($value['s_dept']), ENT_QUOTES, 'UTF-8'); ?></td>
						<td>
						  <img src="<?= STUDENTPP, '/', htmlentities(stripcslashes($value['s_image']), ENT_QUOTES, 'UTF-8'); ?>"
							   alt="Profile Pic"
							   class="img-circle zoom">
						</td>
						<td class='text-center'>
						  <form action="<?= SERVER; ?>/controller/removeStudent?id1=<?= $_GET['id']; ?>&id2=<?= htmlentities(stripcslashes($value['s_id']), ENT_QUOTES, 'UTF-8'); ?>"
								method="post"
								onsubmit="return confirmation();">
							<button type="submit" name="dltBtn" class="btn btn-danger">
								<span class='glyphicon glyphicon-trash hidden-md hidden-sm'></span><span class="hidden-xs">  Delete</span>
							</button>
						  </form>
						</td>
					  </tr>
					<?php endforeach; ?>
				  </tbody>
				</table>
			  <?php endif; ?>
			</div><!-- /.col-md-12 -->
		  </div><!-- /.row -->
		</section>
	  </div><!-- /.container -->
	</main>
  </div><!-- /#wrap -->
  <?php require_once 'footer.php' ?>
  <script>
	  function confirmation() {
		  var r = confirm("Are you sure ?\nNo data will be available of this student");
		  return r ? true : false;
	  }
  </script>
</body>
</html>