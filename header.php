<div class="col-lg-2 col-md-3 padding20">
	<img src="<?php echo SERVER; ?>/assets/img/aiub.png" alt="aiub logo" class="center-block" />
</div>
<div class="col-lg-8 col-md-6 text-center">
	<h2>American International University-Bangladesh</h2>
</div>
<div class="col-lg-2 col-md-3 padding20">
	<?php if(isset($_SESSION['teacher']) || isset($_SESSION['stud']) || isset($_SESSION['authority'])): ?>
	<div class="pull-right">
		<div class="btn-group">
			<a class="btn btn-primary">
				<?php if(isset($_SESSION['teacher'])){
            echo '<img src="'.TEACHERPP.'/'.returnTeacherPic($_SESSION['tid']).'" alt="propic"style="height: 18px;width: 17px;border-radius: 2px;" />', '<span>   '.$_SESSION['teacher'].'</span>';
				}

				elseif(isset($_SESSION['stud'])){
					echo '<img src="'.STUDENTPP.'/'.returnStdentPic($_SESSION['sid']).'" alt="propic"style="height: 18px;width: 17px;border-radius: 2px;" />', '<span>   '.$_SESSION['stud'].'</span>';
				}
				elseif(isset($_SESSION['authority'])){
					echo '<i class="fa fa-user"></i>', '<span>   '.$_SESSION['authority'].'</span>';
				} ?>
			</a>
			<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
				<span class="fa fa-caret-down"></span></a>
			<ul class="dropdown-menu">
				<?php if(isset($_SESSION['authority'])): ?>
					<li><a href="<?php echo SERVER; ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
					<li><a href="<?php echo SERVER; ?>/changepassword?id=00"><i class="fa fa-lock"></i>&nbsp;&nbsp;Change Password</a></li>
				<?php endif; ?>
				<?php if(isset($_SESSION['teacher'])): ?>
					<li><a href="<?php echo SERVER; ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
					<li><a href="<?php echo SERVER; ?>/profile"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Profile</a></li>
					<li><a href="<?php echo SERVER; ?>/changepassword?id=11"><i class="fa fa-lock"></i>&nbsp;&nbsp;Change Password</a></li>
				<?php endif; ?>
				<?php if(isset($_SESSION['stud'])): ?>
					<li><a href="<?php echo SERVER; ?>"><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
					<li><a href="<?php echo SERVER; ?>/profile"><i class="fa fa-briefcase"></i>&nbsp;&nbsp;Profile</a></li>
					<li><a href="<?php echo SERVER; ?>/changepassword?id=22"><i class="fa fa-lock"></i>&nbsp;&nbsp;Change Password</a></li>
				<?php endif; ?>
				<li class="divider"></li>
				<li><a href="<?php echo SERVER; ?>/controller/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Logout</a></li>
			</ul>
		</div>
	</div>
	<?php endif; ?>
</div>