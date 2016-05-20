<?php require 'session.php';
	if(!isset($_SESSION['teacher']) && !isset($_SESSION['stud'])){
		header('Location: '.SERVER.'');
	}
	$cid = $_GET['id1'];
	$sid = $_GET['id2'];
	$stuInfo = getStuIdNameAttendence($cid, $sid);
?>
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
					<hr />
					<section>
						<div class="row">
							<div class="col-md-12">
								<div class="text-center">
									<label class="text-danger">
										<?php
											if(isset($_GET['err']) && $_GET['err'] == 1){
												echo '**You cannot enter this mark Twice !!';
											}
										?>
									</label>
									<h3><ins><?php echo getCourseName($_GET['id1']) ?></ins></h3><br />
									<h4>
										<?php $value = explode('|', $stuInfo); ?>
										ID: <span class="text-primary"><?php echo $value[0]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Name: <span class="text-primary"><?php echo $value[1]; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;Attendence: <span class="text-primary"><?php echo $value[2]; ?></span>
									</h4>
									<br/><br/>
									<h1><i><ins>Mid Term</ins></i></h1><br/><br/>
								</div>
								<div class="col-md-12">
                                    <!-- Quiz 1 -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Quiz 1 marks"><b><i>Quiz 1:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $q1 ='quiz1'; echo showMarks($_GET['id1'], $_GET['id2'], $q1); ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=quiz1" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="20" name="mark" class="onlyFloat form-control" placeholder="Quiz 1" required="required" />
														<button type="submit" name="addMarks" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
														</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q1 ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo SERVER; ?>/deletemarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q1 ?>"><span class="glyphicon glyphicon-trash"></span></a>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Quiz 1 -->

									<hr />

                                    <!-- Quiz 2 -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Quiz 2 marks"><b><i>Quiz 2:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $q2 = 'quiz2'; echo showMarks($_GET['id1'], $_GET['id2'], $q2); ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=quiz2" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="20" name="mark" class="onlyFloat form-control" placeholder="Quiz 2" required="required"/>
														<button type="submit" name="addMarks" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q2 ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo SERVER; ?>/deletemarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q2 ?>"><span class="glyphicon glyphicon-trash"></span></a>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Quiz 2 -->

									<hr />

                                    <!-- Quiz 3 -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Quiz 3 marks"><b><i>Quiz 3:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $q3 = 'quiz3'; echo showMarks($_GET['id1'], $_GET['id2'], $q3); ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=quiz3" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="20" name="mark" class="onlyFloat form-control" placeholder="Quiz 3" required="required" />
														<button type="submit" name="addMarks" data-toggle="tooltip" data-placement="top" title="Add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q3 ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo SERVER; ?>/deletemarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q3 ?>"><span class="glyphicon glyphicon-trash"></span></a>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Quiz 3 -->

									<hr />

									<!-- Mid term best two Quizes -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Suggested Sum of best 2 quizes">Suggested Best Two: <b><?php echo getBestTwoQuizesMarks($q1, $q2, $q3, $_GET['id1'], $_GET['id2']) ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $givenMidQuizesMark = showMidBestTwo($_GET['id1'], $_GET['id2']); echo $givenMidQuizesMark; ?></b></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/addMarks" method="post">
													<div class="form-inline">
														<input type="number" step="0.01" min="0" max="40" name="mark" id='bestTwoMid' class="onlyFloat form-control" placeholder="Best Two" required="required"/>
														<button type="submit" name="addMidBestTwo" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Mid term best two Quizes -->

									<hr />

									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Mid Term marks"><b><i>Mid Term:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $mid = 'mid'; $midMarks = showMarks($_GET['id1'], $_GET['id2'], $mid); echo $midMarks; ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=mid" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="40" name="mark" class="onlyFloat form-control" placeholder="Mid Term" required="required" />
														<button type="submit" name="addMarks" data-toggle="tooltip" data-placement="top" title="Add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $mid ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>
											</div>
										</div>
									</div>

									<hr />

									<!-- Mid Term Total -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Suggested Mid Term Total">Suggested Mid Term Total:
												<b><?php $SuggestedMidMark = calculateTermTotal($q1, $q2, $q3, $mid, $_GET['id1'], $_GET['id2']); echo $SuggestedMidMark; ?></b></span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
												<b><?php $newSuggestedMidMark = newSuggestedMid($givenMidQuizesMark, $midMarks); echo $newSuggestedMidMark; ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $midTotalMarks = showMidTotal($_GET['id1'], $_GET['id2']); echo $midTotalMarks; ?></b></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/addMarks" method="post">
													<div class="form-inline">
														<input type="number" step="0.01" min="0" max="100" name="mark" class="onlyFloat form-control" placeholder="Total" required="required" />
														<button type="submit" name="addMidTotal" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>
											</div>
										</div>
									</div>
                                    <!-- Mid Term Total -->

									<hr />

									<!-- Mid Term Grade -->
									<div class="text-center">
										<div class="row">
											<div class="col-sm-12">
												<span title="Suggested Mid Term Grade">Suggested Mid Term Grade: <b><?php echo suggestedGrade($SuggestedMidMark); ?></b></span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
												<b><?php echo suggestedGrade($newSuggestedMidMark); ?></b></span>(new)&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $midTermGrade = suggestedGrade($midTotalMarks); echo $midTermGrade; ?></b></span>
												<?php addMidTermGrade($midTermGrade, $_GET['id1'], $_GET['id2']); ?>
											</div>
										</div>
									</div>
                                    <!-- /Mid Term Grade -->

									<br /><br />
									<div class="text-center"><h1><i><ins>Final Term</ins></i></h1></div>
									<br/><br/>

                                    <!-- Quiz 4 -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Quiz 4 marks"><b><i>Quiz 4:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $q4 = 'quiz4'; echo showMarks($_GET['id1'], $_GET['id2'], $q4); ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=quiz4" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="20" name="mark" class="onlyFloat form-control" placeholder="Quiz 4" required="required" />
														<button type="submit" name="addMarks" data-toggle="tooltip" data-placement="top" title="Add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q4 ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo SERVER; ?>/deletemarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q4 ?>"><span class="glyphicon glyphicon-trash"></span></a>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Quiz 4 -->

									<hr />

                                    <!-- Quiz 5 -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Quiz 5 marks"><b><i>Quiz 5:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $q5 = 'quiz5'; echo showMarks($_GET['id1'], $_GET['id2'], $q5); ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=quiz5" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="20" name="mark" class="onlyFloat form-control" placeholder="Quiz 5" required="required" />
														<button type="submit" name="addMarks" data-toggle="tooltip" data-placement="top" title="Add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q5 ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo SERVER; ?>/deletemarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q5 ?>"><span class="glyphicon glyphicon-trash"></span></a>
												</form>
											</div>
										</div>
									</div>
                                    <!-- Quiz 5 -->

									<hr />

                                    <!-- Quiz 6 -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Quiz 6 marks"><b><i>Quiz 6:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $q6 = 'quiz6'; echo showMarks($_GET['id1'], $_GET['id2'], $q6); ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=quiz6" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="20" name="mark" class="onlyFloat form-control" placeholder="Quiz 6" required="required" />
														<button type="submit" name="addMarks" data-toggle="tooltip" data-placement="top" title="Add" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q6 ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Delete" href="<?php echo SERVER; ?>/deletemarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $q6 ?>"><span class="glyphicon glyphicon-trash"></span></a>
												</form>
											</div>
										</div>
									</div>
                                    <!-- Quiz 6 -->

									<hr />

									<!-- Final Best Two -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Sum of best 2 quizes of Final">Best Two: <b><?php echo getBestTwoQuizesMarks($q4, $q5, $q6, $_GET['id1'], $_GET['id2']) ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $givenFinalBestTwo = showFinalBestTwo($_GET['id1'], $_GET['id2']); echo $givenFinalBestTwo; ?></b></span>
											</div>
											<div class="col-sm-5 col-xs-5 inline-form">
												<form action="<?php echo SERVER; ?>/controller/addMarks" method="post">
													<div class="form-inline">
														<input type="number" step="0.01" min="0" max="40" name="mark" class="onlyFloat form-control" placeholder="Best Two" required="required" />
														<button type="submit" name="addFinalBestTwo" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Final Best Two -->

									<hr />

                                    <!-- Final Term -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Final Term marks"><b><i>Final Term:&nbsp;&nbsp;&nbsp;&nbsp;</i></b><?php $final = 'final'; $showFinalMarks = showMarks($_GET['id1'], $_GET['id2'], $final); echo $showFinalMarks; ?></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/markConfirm?name=final" method="post">
													<div class="form-inline">
														<input type="number" step="0.50" min="0" max="40" name="mark" class="onlyFloat form-control" placeholder="Final Term" required="required" />
														<button type="submit" name="addMarks" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Add"><span class="glyphicon glyphicon-plus"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>&nbsp;&nbsp;
												<form>
													<a class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit" href="<?php echo SERVER; ?>/editmarks?id1=<?php echo $_GET['id1'] ?>&id2=<?php echo $_GET['id2'] ?>&id3=<?php echo $final ?>"><span class="glyphicon glyphicon-edit"></span></a>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Final Term -->

									<hr />

									<!-- Final Term Total -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Suggested Final Term Total">Suggested Final Term Total: <b>
												<?php
												$SuggestedFinalMark = calculateTermTotal($q4, $q5, $q6, $final, $_GET['id1'], $_GET['id2']); echo $SuggestedFinalMark; ?></b></span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
												<b><?php $newSuggestedMidMark = newSuggestedMid($givenFinalBestTwo, $showFinalMarks); echo $newSuggestedMidMark; ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $finalTotalMarks = showFinalTotal($_GET['id1'], $_GET['id2']); echo $finalTotalMarks; ?></b></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/addMarks" method="post">
													<div class="form-inline">
														<input type="number" step="0.01" min="0" max="100" name="mark" class="onlyFloat form-control" placeholder="Total" required="required" />
														<button type="submit" name="addFinalTotal" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Final Term Total -->

									<hr />

									<!-- Final Term Grade -->
									<div class="text-center">
										<div class="row">
											<div class="col-sm-12">
												<span title="Suggested Final Term Grade">Suggested Final Term Grade: <b><?php echo suggestedGrade($SuggestedFinalMark); ?></b></span>(old)&nbsp;&nbsp;&nbsp;&nbsp;
												<b><?php echo suggestedGrade($newSuggestedMidMark); ?></b></span>(new)&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $finalTermGrade = suggestedGrade($finalTotalMarks); echo $finalTermGrade; ?></b></span>
												<?php addGradeFinal($finalTermGrade, $_GET['id1'], $_GET['id2']); ?>
											</div>
										</div>
									</div>
                                    <!-- /Final Term Grade -->

									<br /><br />

									<div class="text-center"><h1><i><ins>Grand Total</ins></i></h1></div>
									<br/><br/>

									<!-- Grand Total -->
									<div class="row">
										<div class="col-sm-12 col-xs-12">
											<div class="col-sm-7 col-xs-6">
												<span title="Grand Total Marks">Suggested Grand Total: <b><?php $grandTotalMark = getTotalMark($q1, $q2, $q3, $mid, $q4, $q5, $q6, $final, $_GET['id1'], $_GET['id2']); echo $grandTotalMark; ?></b>(old)</span>&nbsp;&nbsp;&nbsp;&nbsp;<b><?php $newGrandTotalMark = newSuggestedGrandTotal($midTotalMarks, $finalTotalMarks); echo $newGrandTotalMark; ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $grandTotalMarksByTeacher = showGrandTotal($_GET['id1'], $_GET['id2']); echo $grandTotalMarksByTeacher; ?></b></span>
											</div>
											<div class="col-sm-5 col-xs-6 inline-form">
												<form action="<?php echo SERVER; ?>/controller/addMarks" method="post">
													<div class="form-inline">
														<input type="number" step="0.01" min="0" max="100" name="mark" class="onlyFloat form-control" placeholder="Grand Total" required="required" style="width: 120px;" />
														<button type="submit" name="addGrandTotal"  class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span></button>
														<input type="hidden" name="cid" value="<?php echo $_GET['id1']; ?>"/>
														<input type="hidden" name="sid" value="<?php echo $_GET['id2']; ?>"/>
														<?php
															date_default_timezone_set("Asia/Dhaka");
															$date = date('Y/m/d h:i:sa');
														?>
														<input type="hidden" name="date" value="<?php echo $date; ?>"/>
													</div>
												</form>
											</div>
										</div>
									</div>
                                    <!-- /Grand Total -->

									<hr />
									<!-- Grand Total Grade -->
									<div class="text-center">
										<div class="row">
											<div class="col-sm-12">
												<span title="Suggested Grand Final Grade">Suggested Grand Total Grade: <b><?php echo suggestedGrade($grandTotalMark); ?></b></span>(old)&nbsp;&nbsp;&nbsp;&nbsp;<b><?php echo suggestedGrade($newGrandTotalMark); ?></b>(new)&nbsp;&nbsp;&nbsp;&nbsp;
												<span title="">You've Given: <b><?php $grandTotalGrade = suggestedGrade($grandTotalMarksByTeacher); echo $grandTotalGrade ?></b></span>
												<?php addGradeGrandTotal($grandTotalGrade, $_GET['id1'], $_GET['id2']); ?>
											</div>
										</div>
									</div>
                                    <!-- /Grand Total Grade -->

								</div>
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