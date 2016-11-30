<div class="col-lg-2 col-md-3 padding20">
  <a href="<?= SERVER ?>">
	<img src="<?= SERVER; ?>/assets/img/aiub.png" alt="aiub logo" class="center-block" />
  </a>
</div>
<div class="col-lg-8 col-md-6 text-center">
  <h2>American International University-Bangladesh</h2>
</div>
<div class="col-lg-2 col-md-3 padding20">
  <?php if(isset($_SESSION['teacher']) || isset($_SESSION['stud']) || isset($_SESSION['authority'])): ?>
	<div class="pull-right">
	  <div class="btn-group">
		<a class="btn btn-primary" style="padding-left: 5px;">
		  <?php if (isset($_SESSION['teacher'])): ?>
			<img src="<?= TEACHERPPICO ?>/<?= returnTeacherPic($_SESSION['tid']) ?>" alt="" style="border-radius: 2px;" />
			<span>&nbsp;&nbsp;<?= $_SESSION['teacher'] ?></span>
		  <?php elseif (isset($_SESSION['stud'])): ?>
			<img src="<?= STUDENTPPICO ?>/<?= returnStdentPic($_SESSION['sid']) ?>" alt="" style="border-radius: 2px;" />
			<span>&nbsp;&nbsp;<?= $_SESSION['stud'] ?></span>
		  <?php elseif(isset($_SESSION['authority'])): ?>
			<img src="<?= SERVER ?>/assets/img/authority/hasansir.jpg" alt="authority propic" style="border-radius: 2px;width: 17px;height: 18px;" />
			<span>&nbsp;&nbsp;<?= $_SESSION['authority'] ?></span>
		  <?php endif; ?>
		</a>
		<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
		  <span class="fa fa-caret-down"></span></a>
		  <?php
		  $passid = '';
		  if(array_key_exists('authority', $_SESSION)){
			  $passid = '00';
		  } elseif (array_key_exists('teacher', $_SESSION)) {
			  $passid = '11';
		  } elseif (array_key_exists('stud', $_SESSION)) {
			  $passid = '22';
		  }
		  ?>
			<ul class="dropdown-menu">
			  <li><a href="<?= SERVER; ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
			  <?php if (isset($_SESSION['teacher']) || isset($_SESSION['stud'])): ?>
				<li><a href="<?= SERVER; ?>/profile"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Profile</a></li>
			  <?php endif; ?>
				<li><a href="<?= SERVER; ?>/changepassword?id=<?= $passid; ?>"><i class="fa fa-lock"></i>&nbsp;&nbsp;Change Password</a></li>
				<li class="divider"></li>
				<li><a href="<?= SERVER; ?>/controller/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
			</ul>
		</div>
	</div>
	<?php endif; ?>
</div>