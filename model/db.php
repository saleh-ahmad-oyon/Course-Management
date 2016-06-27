<?php

require_once 'db_conn.php';

function check_stud_login($user, $pass)
{
	$conn = db_conn();

	$sql = "SELECT COUNT(*) as `num` FROM `student` 
WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $user)."' 
AND `s_pass` = '".mysqli_real_escape_string($conn, $pass)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] ? true : false ;
}

function check_teacher_login($user, $pass)
{
	$conn = db_conn();

	$sql = "SELECT COUNT(*) as `num` FROM `teacher` 
WHERE `t_aiub_id` = '".mysqli_real_escape_string($conn, $user)."' 
AND `t_pass` = '".mysqli_real_escape_string($conn, $pass)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] ? true : false ;
}

function check_authority_login($user, $pass)
{
	$conn = db_conn();

	$sql = "SELECT COUNT(*) as `num` FROM `authority` 
WHERE `a_aiub_id` = '".mysqli_real_escape_string($conn, $user)."' 
AND `a_pass` = '".mysqli_real_escape_string($conn, $pass)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] ? true : false ;
}

function teacher_id($user)
{
	$conn = db_conn();

	$sql = "SELECT `t_id` FROM `teacher` 
WHERE `t_aiub_id` = '".mysqli_real_escape_string($conn, $user)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$tid = $row['t_id'];

	return $tid;
}

function authority_id($user)
{
	$conn = db_conn();

	$sql = "SELECT `a_id` FROM `authority` 
WHERE `a_aiub_id` = '".mysqli_real_escape_string($conn, $user)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$tid = $row['a_id'];

	return $tid;
}

function student_id($user)
{
	$conn = db_conn();

	$sql = "SELECT `s_id` FROM `student` 
WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $user)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$sid = $row['s_id'];

	return $sid;
}

function checkTeacherOldPass($tid, $oldPass)
{
	$conn = db_conn();

	$sql = "SELECT `t_pass` FROM `teacher` 
WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return strcmp($oldPass, $row['t_pass']) == 0 ? true : false;
}

function checkAuthorOldPass($aid, $oldPass)
{
	$conn = db_conn();

	$sql = "SELECT `a_pass` FROM `authority` 
WHERE `a_id` = ".mysqli_real_escape_string($conn, $aid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return strcmp($oldPass, $row['a_pass']) == 0 ? true : false;
}

function checkStudentOldPass($sid, $oldPass)
{
	$conn = db_conn();

	$sql = "SELECT `s_pass` FROM `student` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return strcmp(mysqli_real_escape_string($conn, $oldPass), $row['s_pass']) == 0 ? true : false;
}
	
function updateStudentPass($sid, $newpass)
{
	$conn = db_conn();

	$sql = "UPDATE `student` 
SET `s_pass`= '".mysqli_real_escape_string($conn, $newpass)."' 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function updateTeacherPass($tid, $newpass)
{
	$conn = db_conn();

	$sql = "UPDATE `teacher` 
SET `t_pass`= '".mysqli_real_escape_string($conn, $newpass)."' 
WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function updateAuthorityPass($aid, $newpass)
{
	$conn = db_conn();

	$sql = "UPDATE `authority` 
SET `a_pass`= '".mysqli_real_escape_string($conn, $newpass)."' 
WHERE `a_id` = ".mysqli_real_escape_string($conn, $aid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function teacherCourse($tid)
{
	$conn = db_conn();

	$sql = "SELECT `c_id`, `c_name` FROM `course` 
WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i = 0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getCourseName($cid)
{
	$conn = db_conn();

	$sql = "SELECT `c_name` FROM `course` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['c_name'];
}

function studentCourse($sid)
{
	$conn = db_conn();

	$sql = "SELECT course.c_id, `c_name`, teacher.t_name FROM `course` 
INNER JOIN `teacher_student_course` ON course.c_id = teacher_student_course.c_id 
INNER JOIN teacher ON course.t_id = teacher.t_id 
where teacher_student_course.s_id = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0;$i < mysqli_num_rows($result) ;$i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}

	return $row;
}

function stubasicInfo($sid)
{
	$conn = db_conn();

	$sql = "SELECT `s_aiub_id`, `s_full_name`, `s_cgpa`, `s_gender`, `s_phone`, `s_email`, `s_dept`, `s_image`, `s_dob` 
FROM `student` WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	return $row;
}

function stuEditableBasicInfo($sid)
{
	$conn = db_conn();

	$sql = "SELECT `s_full_name`, `s_phone`, `s_email`, `s_dept`, `s_image`, `s_gender`, `s_dob` 
FROM `student` WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	return $row;
}

function deptName()
{
	$conn = db_conn();

	$sql = "SELECT `d_name` FROM `department`";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i < mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function editBasicInfo($fullName, $dept, $phone, $email, $sid, $pic, $gender, $date, $newIco, $fileContents)
{
	$conn = db_conn();

	$sql = "UPDATE `student` 
SET `s_full_name`= '".mysqli_real_escape_string($conn, $fullName)."', 
`s_phone`= '".mysqli_real_escape_string($conn, $phone)."', 
`s_email`='".mysqli_real_escape_string($conn, $email)."', 
`s_dept`= '".mysqli_real_escape_string($conn, $dept)."', 
`s_image`= '".mysqli_real_escape_string($conn, $pic)."', 
`s_gender`='".mysqli_real_escape_string($conn, $gender)."', 
`s_dob`='".mysqli_real_escape_string($conn, $date)."',
`s_small_image`='".mysqli_real_escape_string($conn, $newIco)."',
`img_contents`='".mysqli_real_escape_string($conn, $fileContents)."' 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function editBasicInfoWithoutPic($fullName, $dept, $phone, $email, $sid, $gender, $date)
{
	$conn = db_conn();

	$sql = "UPDATE `student` 
SET `s_full_name`= '".mysqli_real_escape_string($conn, $fullName)."', 
`s_phone`= '".mysqli_real_escape_string($conn, $phone)."',
`s_email`='".mysqli_real_escape_string($conn, $email)."', 
`s_dept`= '".mysqli_real_escape_string($conn, $dept)."', 
`s_gender`='".mysqli_real_escape_string($conn, $gender)."', 
`s_dob`='".mysqli_real_escape_string($conn, $date)."' 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function checkStudentId($stuId)
{
	$conn = db_conn();

	$sql ="SELECT COUNT(*) as `num` FROM `student` 
WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $stuId)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] == 1 ? true : false;
}

function checkUniqueId($tid, $stuId, $cid)
{
	$conn = db_conn();

	$sql = "SELECT COUNT(*) as `num` 
FROM `teacher_student_course` 
WHERE `s_id` = (SELECT `s_id` FROM `student` 
WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $stuId)."') 
AND `t_id` = ".mysqli_real_escape_string($conn, $tid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] == 0 ? true : false;
}

function checkFourtyStud($cid)
{
	$conn = db_conn();

	$sql="SELECT COUNT(*) as `num` 
FROM `teacher_student_course` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] < 40 ? true : false;
}

function addStudent($tid, $stuId, $cid)
{
	$conn = db_conn();

	$sql="INSERT INTO `teacher_student_course`(`s_id`, `t_id`, `c_id`) VALUES (
(SELECT `s_id` FROM `student` 
WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $stuId)."'), 
".mysqli_real_escape_string($conn, $tid).", 
".mysqli_real_escape_string($conn, $cid).")";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function studentList($cid)
{
	$conn = db_conn();

	$sql = "SELECT student.s_id, `s_aiub_id`, `s_full_name`, `s_cgpa`, `s_dept`, `s_image` 
FROM `student` 
INNER JOIN `teacher_student_course` ON student.s_id = teacher_student_course.s_id 
WHERE teacher_student_course.c_id = ".mysqli_real_escape_string($conn, $cid)." 
ORDER BY student.s_full_name";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i< mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function stuDeleteInfo($sid)
{
	$conn = db_conn();

	$sql ="SELECT `s_aiub_id`, `s_full_name`, `s_cgpa`, `s_dept` 
FROM `student` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	return $row;
}

function deleteStudent($cid, $sid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `teacher_student_course` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` =" .mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function deleteStudentAttendence($cid, $sid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `attendinfo` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function removeStudentExam($cid, $sid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function removeStudentQuizTerm($cid, $sid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `exam` WHERE 
`s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}
	
function attendence($stuId, $cid)
{
	$conn = db_conn();

	$sql = "INSERT INTO `attendInfo`(`s_id`, `c_id`) VALUES (
(SELECT `s_id` FROM `student` 
WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $stuId)."'),
".mysqli_real_escape_string($conn, $cid).")";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function addMarks($stuId, $cid)
{
	$conn = db_conn();

	$sql = "INSERT INTO `course_student_marks`(`c_id`, `s_id`) VALUES (
".mysqli_real_escape_string($conn, $cid).", 
(SELECT `s_id` FROM `student` WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $stuId)."'))";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function studentsAttendence($cid)
{
	$conn = db_conn();

	$sql = "SELECT student.s_id, `s_aiub_id`, `s_full_name`, attendinfo.att_total FROM `student` 
INNER JOIN `attendinfo` ON student.s_id = attendinfo.s_id 
WHERE attendinfo.c_id = ".mysqli_real_escape_string($conn, $cid)." 
ORDER BY student.s_full_name";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function insertAttendence($sid, $cid)
{
	$conn = db_conn();

	$sql = "UPDATE `attendinfo` SET `att_total`=`att_total`+1 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function returnTotalAttendence($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `att_total` FROM `attendinfo` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $studid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$totalAttendence = $row['att_total'];
	return $totalAttendence;
}

function getStudentListExam($cid)
{
	$conn = db_conn();

	$sql = "SELECT student.s_id, `s_aiub_id`, `s_full_name`, course_student_marks.mid_grade, course_student_marks.final_grade, course_student_marks.grand_final_grade 
FROM `student`
INNER JOIN `course_student_marks` ON student.s_id = course_student_marks.s_id
WHERE course_student_marks.c_id = ".mysqli_real_escape_string($conn, $cid)." 
ORDER BY student.s_full_name";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getStuIdNameAttendence($cid, $sid)
{
	$conn = db_conn();

	$sql = "SELECT `s_aiub_id`, `s_full_name`, attendinfo.att_total 
FROM `student` 
LEFT JOIN attendinfo ON student.s_id = attendinfo.s_id 
WHERE student.s_id = ".mysqli_real_escape_string($conn, $sid)." 
AND attendinfo.c_id = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$outputString='';
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$outputString.=$row['s_aiub_id'].'|'.$row['s_full_name'].'|'.$row['att_total'];
	return $outputString;
}

function addQuiz1Marks($sid, $cid, $quiz1Marks, $dateTime, $name)
{
	$conn = db_conn();

	$sql = "INSERT INTO `exam`(`e_name`, `e_date`, `e_marks`, `s_id`, `c_id`) 
VALUES (
'".mysqli_real_escape_string($conn, $name)."',
'".mysqli_real_escape_string($conn, $dateTime)."',
".mysqli_real_escape_string($conn, $quiz1Marks).", 
".mysqli_real_escape_string($conn, $sid).", 
".mysqli_real_escape_string($conn, $cid).")";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function showMarks($cid, $sid, $q)
{
	$conn = db_conn();

	$sql = "SELECT `e_marks` FROM `exam` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `e_name` = '".mysqli_real_escape_string($conn, $q)."' 
ORDER BY `e_date` ASC";

	$result = mysqli_query($conn, $sql);
	$outputString='';
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$outputString.=$row['e_marks']."&nbsp;&nbsp;";
	}

	return $outputString;
}

function checkMid($name, $sid, $cid)
{
	$conn = db_conn();

	$sql = "SELECT COUNT(`e_name`) AS `num` 
FROM `exam` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `e_name` = '".mysqli_real_escape_string($conn, $name)."' 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] == 1 ? true : false;
}

function getBestTwoQuizesMarks($q1, $q2, $q3, $cid, $sid)
{
	$conn = db_conn();

	$sql1 = "SELECT `e_marks` FROM `exam` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `e_name` = '".mysqli_real_escape_string($conn, $q1)."' 
ORDER BY `e_marks` DESC limit 0,1";

	$sql2 = "SELECT `e_marks` FROM `exam` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `e_name` = '".mysqli_real_escape_string($conn, $q2)."' 
ORDER BY `e_marks` DESC limit 0,1";

	$sql3 = "SELECT `e_marks` FROM `exam` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `e_name` = '".mysqli_real_escape_string($conn, $q3)."' 
ORDER BY `e_marks` DESC limit 0,1";

	$a = $b = $c =0;

	$result1 = mysqli_query($conn, $sql1);
	$row1    = mysqli_fetch_array($result1, MYSQLI_ASSOC);
	$a       = $row1['e_marks'];

	$result2 = mysqli_query($conn, $sql2);
	$row2    = mysqli_fetch_array($result2, MYSQLI_ASSOC);
	$b       = $row2['e_marks'];

	$result3 = mysqli_query($conn, $sql3);
	$row3    = mysqli_fetch_array($result3, MYSQLI_ASSOC);
	$c       = $row3['e_marks'];

	$bestTwo = [$a, $b, $c];
	rsort($bestTwo);

	$sum = $bestTwo[0] + $bestTwo[1];

	return $sum;
}

function getTermMarks($term, $sid, $cid)
{
	$conn = db_conn();

	$sql ="SELECT `e_marks` 
FROM `exam` 
WHERE `e_name` = '".mysqli_real_escape_string($conn, $term)."' 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['e_marks'];

	return $mark;
}

function returnMarks($cid, $sid, $name)
{
	$conn = db_conn();

	$sql ="SELECT `e_marks` FROM `exam` 
WHERE `e_name` = '".mysqli_real_escape_string($conn, $name)."' 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$outputString='';
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		$outputString.=$row['e_marks']."&nbsp&nbsp";
	}
	return $outputString;
}

function getTotalMark($q1, $q2, $q3, $mid, $q4, $q5, $q6, $final, $cid, $sid)
{
	$total = 0.0;
	$midQuizes = getBestTwoQuizesMarks($q1, $q2, $q3, $cid, $sid);
	$finalQuizes = getBestTwoQuizesMarks($q4, $q5, $q6, $cid, $sid);
	$midMarks = getTermMarks($mid, $sid, $cid);
	$midTotal = $midQuizes + $midMarks;

	$total = $midTotal * 0.50;

	$finalMarks = getTermMarks($final, $sid, $cid);
	$finalTotal = $finalQuizes + $finalMarks;

	$total += ($finalTotal * 0.75);

	return $total;
}

function getXmMarks($cid, $sid, $name)
{
	$conn = db_conn();

	$sql = "SELECT `e_id`, `e_date`, `e_marks` 
FROM `exam` 
WHERE `e_name` = '$name' 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0;$i < mysqli_num_rows($result);$i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getXmMarksForDelete($cid, $sid, $name)
{
	$conn = db_conn();

	$sql = "SELECT `e_id`, `e_date`, `e_marks` FROM `exam` 
WHERE `e_name` = '".mysqli_real_escape_string($conn, $name)."' 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function deleteExamMarks($eid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `exam` 
WHERE `e_id` = ".mysqli_real_escape_string($conn, $eid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function updateMarks($id, $mark)
{
	$conn = db_conn();

	$sql = "UPDATE `exam` 
SET `e_marks`= ".mysqli_real_escape_string($conn, $mark)." 
WHERE `e_id` = ".mysqli_real_escape_string($conn, $id);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

// For Best two Quizes of Midterm

function addMidBestTwo($cid, $sid, $mark)
{
	$conn = db_conn();

	$sql3 = "UPDATE `course_student_marks` 
SET `mid_best_two`= ".mysqli_real_escape_string($conn, $mark)." 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql3);
	mysqli_close($conn);
}

function showMidBestTwo($cid, $sid)
{
	$conn = db_conn();

	$sql = "SELECT `mid_best_two` 
FROM `course_student_marks` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$marks = $row['mid_best_two'];

	return $marks;
}

// For Best two quizes of Final Term
function addFinalBestTwo($cid, $sid, $mark)
{
	$conn = db_conn();

	$sql3 = "UPDATE `course_student_marks` 
SET `final_best_two`= ".mysqli_real_escape_string($conn, $mark)." 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql3);
	mysqli_close($conn);
}

function showFinalBestTwo($cid, $sid)
{
	$conn = db_conn();

	$sql = "SELECT `final_best_two` 
FROM `course_student_marks` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$marks = $row['final_best_two'];

	return $marks;
}

function suggestedGrade($total)
{
	if($total >= 94)
		return 'A+';
	elseif($total >= 90 && $total < 94)
		return 'A';
	elseif($total >= 86 && $total < 90)
		return 'A-';
	elseif($total >=82 && $total < 86)
		return 'B+';
	elseif($total >=78 && $total < 82)
		return 'B';
	elseif($total >=74 && $total < 78)
		return 'B-';
	elseif($total >=70 && $total < 74)
		return 'C+';
	elseif($total >=66 && $total < 70)
		return 'C';
	elseif($total >=62 && $total < 66)
		return 'C-';
	elseif($total >=58 && $total < 62)
		return 'D+';
	elseif($total >=54 && $total < 58)
		return 'D';
	elseif($total >=50 && $total < 54)
		return 'D-';
	elseif($total <50)
		return 'FAIL';
	else
		return null;
}

function calculateTermTotal($q1, $q2, $q3, $mid, $cid, $sid)
{
	$total = 0.0;
	$midQuizes = getBestTwoQuizesMarks($q1, $q2, $q3, $cid, $sid);
	$midMarks = getTermMarks($mid, $sid, $cid);
	$midTotal = $midQuizes + $midMarks;

	$total = $midTotal * 1.25;

	return $total;
}

//Mid Term Marks
function addMidTotal($cid, $sid, $mark)
{
	$conn = db_conn();

	$sql3 = "UPDATE `course_student_marks` 
SET `mid_total`= ".mysqli_real_escape_string($conn, $mark)." 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql3);
	mysqli_close($conn);
}

function showMidTotal($cid, $sid)
{
	$conn = db_conn();

	$sql = "SELECT `mid_total` 
FROM `course_student_marks` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$marks = $row['mid_total'];
	return $marks;
}

//Final Term Marks
function addFinalTotal($cid, $sid, $mark)
{
	$conn = db_conn();

	$sql3 = "UPDATE `course_student_marks` 
SET `final_total`= ".mysqli_real_escape_string($conn, $mark)." 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql3);
	mysqli_close($conn);
}

function showFinalTotal($cid, $sid)
{
	$conn = db_conn();

	$sql = "SELECT `final_total` 
FROM `course_student_marks` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$marks = $row['final_total'];

	return $marks;
}

//Grand Total marks
function addGrandTotal($cid, $sid, $mark)
{
	$conn = db_conn();

	$sql3 = "UPDATE `course_student_marks` 
SET `grand_final_total`= $mark 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql3);
	mysqli_close($conn);
}

function showGrandTotal($cid, $sid)
{
	$conn = db_conn();

	$sql = "SELECT `grand_final_total` 
FROM `course_student_marks` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$marks = $row['grand_final_total'];

	return $marks;
}

function newSuggestedGrandTotal($mid, $final)
{
	$grand = ($mid*0.4) + ($final*0.6);
	return $grand;
}

function addMidTermGrade($midTermGrade, $cid, $sid)
{
	$conn = db_conn();

	$sql2 = "UPDATE `course_student_marks` 
SET `mid_grade`= '".mysqli_real_escape_string($conn, $midTermGrade)."' 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql2);
	mysqli_close($conn);
}

function addGradeFinal($finalTermGrade, $cid, $sid)
{
	$conn = db_conn();

	$sql2 = "UPDATE `course_student_marks` 
SET `final_grade`= '".mysqli_real_escape_string($conn, $finalTermGrade)."' 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql2);
	mysqli_close($conn);
}

function addGradeGrandTotal($grandTotalGrand, $cid, $sid)
{
	$conn = db_conn();

	$sql2 = "UPDATE `course_student_marks` 
SET `grand_final_grade`= '".mysqli_real_escape_string($conn, $grandTotalGrand)."' 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid)." 
AND `s_id` = ".mysqli_real_escape_string($conn, $sid);

	mysqli_query($conn, $sql2);
	mysqli_close($conn);
}
	
function newSuggestedMid($givenMidQuizesMark, $mid){
	$total = ($givenMidQuizesMark + $mid) * 1.25;
	return $total;
}

function returntotalMark($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `grand_final_total` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['grand_final_total'];

	return $mark;
}
function returnMidBestTwoQuizMarks($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `mid_best_two` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['mid_best_two'];

	return $mark;
}
function returnMidTotal($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `mid_total` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['mid_total'];

	return $mark;
}
function returnMidGrade($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `mid_grade` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['mid_grade'];

	return $mark;
}

function returnFinalBestTwoQuizMarks($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `final_best_two` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);
	$result = mysqli_query($conn, $sql);

	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['final_best_two'];

	return $mark;
}

function returnFinalTotal($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `final_total` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['final_total'];

	return $mark;
}

function returnFinalGrade($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `final_grade` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['final_grade'];

	return $mark;
}

function returnGrandFinalGrade($cid, $studid)
{
	$conn = db_conn();

	$sql = "SELECT `grand_final_grade` FROM `course_student_marks` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $studid)." 
AND `c_id` = ".mysqli_real_escape_string($conn, $cid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$mark = $row['grand_final_grade'];

	return $mark;
}

function returnStdentPic($sid)
{
	$conn = db_conn();

	$sql = "SELECT `s_small_image` FROM `student` 
WHERE `s_id` = ".mysqli_real_escape_string($conn, $sid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$stuImage = $row['s_small_image'];
	return $stuImage;
}

function insertStudent($ID, $name, $cgpa, $phone, $email, $dept, $pic, $gender, $dob)
{
	$conn = db_conn();

	$sql = "INSERT INTO 
`student`(`s_aiub_id`, `s_full_name`, `s_cgpa`, `s_phone`, `s_email`, `s_dept`, `s_image`, `s_gender`, `s_dob`) VALUES (
'".mysqli_real_escape_string($conn, $ID)."', 
'".mysqli_real_escape_string($conn, $name)."', 
".mysqli_real_escape_string($conn, $cgpa).", 
'".mysqli_real_escape_string($conn, $phone)."', 
'".mysqli_real_escape_string($conn, $email)."', 
'".mysqli_real_escape_string($conn, $dept)."', 
'".mysqli_real_escape_string($conn, $pic)."', 
'".mysqli_real_escape_string($conn, $gender)."', 
'".mysqli_real_escape_string($conn, $dob)."')";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function returnStuAiubID($ID)
{
	$conn = db_conn();

	$sql ="SELECT COUNT(*) as `num` 
FROM `student` 
WHERE `s_aiub_id` = '".mysqli_real_escape_string($conn, $ID)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row['num'] == 0 ? true : false;
}

function returnTeacherAiubID($ID)
{
	$conn = db_conn();

	$sql ="SELECT COUNT(*) as `num` 
FROM `teacher` 
WHERE `t_aiub_id` = '".mysqli_real_escape_string($conn, $ID)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return ($row['num'] == 0) ? true : false;
}

function insertTeacher($ID, $name, $phone, $email, $pic, $gender, $date, $designation)
{
	$conn = db_conn();

	$sql = "INSERT INTO `teacher`(`t_aiub_id`, `t_name`, `t_email`, `t_phone`, `t_gender`, `t_dob`, `t_image`, `t_designation`) VALUES (
'".mysqli_real_escape_string($conn, $ID)."', 
'".mysqli_real_escape_string($conn, $name)."', 
'".mysqli_real_escape_string($conn, $email)."', 
'".mysqli_real_escape_string($conn, $phone)."', 
'".mysqli_real_escape_string($conn, $gender)."', 
'".mysqli_real_escape_string($conn, $date)."', 
'".mysqli_real_escape_string($conn, $pic)."', 
'".mysqli_real_escape_string($conn, $designation)."')";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function teacherBasicInfo($tid)
{
	$conn = db_conn();

	$sql = "SELECT `t_aiub_id`, `t_name`, `t_email`, `t_phone`, `t_gender`, `t_dob`, `t_image`, `t_designation` 
FROM `teacher` WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row;
}

function teacherEditableBasicInfo($tid)
{
	$conn = db_conn();

	$sql = "SELECT `t_name`, `t_email`, `t_phone`, `t_gender`, `t_dob`, `t_image` FROM `teacher` 
WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return $row;
}

function editTeacherBasicInfo($fullName, $phone, $email, $tid, $pic, $gender, $date)
{
	$conn = db_conn();

	$sql = "UPDATE `teacher` SET 
`t_name`='".mysqli_real_escape_string($conn, $fullName)."',
`t_email`='".mysqli_real_escape_string($conn, $email)."',
`t_phone`='".mysqli_real_escape_string($conn, $phone)."',
`t_gender`='".mysqli_real_escape_string($conn, $gender)."',
`t_dob`='".mysqli_real_escape_string($conn, $date)."',
`t_image`='".mysqli_real_escape_string($conn, $pic)."' 
WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function editTeacherBasicInfoWithoutPic($fullName, $phone, $email, $tid, $gender, $date)
{
	$conn = db_conn();

	$sql = "UPDATE `teacher` SET 
`t_name`='".mysqli_real_escape_string($conn, $fullName)."',
`t_email`='".mysqli_real_escape_string($conn, $email)."',
`t_phone`='".mysqli_real_escape_string($conn, $phone)."',
`t_gender`='".mysqli_real_escape_string($conn, $gender)."',
`t_dob`='".mysqli_real_escape_string($conn, $date)."' 
WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function returnTeacherPic($tid)
{
	$conn = db_conn();

	$sql = "SELECT `t_image` FROM `teacher` 
WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid);

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$teacherImage = $row['t_image'];
	return $teacherImage;
}

function getStuIDPass()
{
	$conn = db_conn();

	$sql = "SELECT `s_aiub_id`, `s_pass` FROM `student`";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getteacherIDPass()
{
	$conn = db_conn();

	$sql = "SELECT `t_aiub_id`, `t_pass` FROM `teacher`";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getAuthorityIDPass()
{
	$conn = db_conn();

	$sql = "SELECT `a_aiub_id`, `a_pass` FROM `authority`";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getPrivilege($prv)
{
	$conn = db_conn();

	$sql = "SELECT `info_list` FROM `information` WHERE `info_privilege` = $prv";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getTeacher()
{
	$conn = db_conn();

	$sql = "SELECT `t_aiub_id`, `t_name` FROM `teacher` ORDER BY `t_name` ASC";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getSubject()
{
	$conn = db_conn();

	$sql = "SELECT `c_name` FROM `course` ORDER BY `c_name` ASC";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function getTeacherSubject()
{
	$conn = db_conn();

	$sql = "SELECT teacher.t_aiub_id, teacher.t_name, course.c_id, `c_name` FROM `course` 
INNER JOIN teacher ON course.t_id = teacher.t_id 
WHERE course.t_id <> 0 ORDER BY course.c_id DESC";

	$result = mysqli_query($conn, $sql);
	$row = array();
	for($i=0; $i<mysqli_num_rows($result); $i++){
		$row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	return $row;
}

function deleteTeacherCourse($cid)
{
	$conn = db_conn();

	$sql ="UPDATE `course` SET `t_id`= '' 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function deleteStudentCourse($cid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `teacher_student_course` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function deleteCourseStudentAttendence($cid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `attendinfo` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function removeCourseStudentExam($cid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `course_student_marks` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function removeCourseStudentQuizTerm($cid)
{
	$conn = db_conn();

	$sql ="DELETE FROM `exam` 
WHERE `c_id` = ".mysqli_real_escape_string($conn, $cid);

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function insertCourseTeacher($course, $tid)
{
	$conn = db_conn();

	$sql ="UPDATE `course` 
SET `t_id`= ".mysqli_real_escape_string($conn, $tid)." 
WHERE `c_name` = '".mysqli_real_escape_string($conn, $course)."'";

	mysqli_query($conn, $sql);
	mysqli_close($conn);
}

function getTId($tAiubId)
{
	$conn = db_conn();

	$sql ="SELECT `t_id` 
FROM `teacher` 
WHERE `t_aiub_id` = '".mysqli_real_escape_string($conn, $tAiubId)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	$tid = $row['t_id'];
	return $tid;
}

function checkDuplicateCourse($tid, $course)
{
	$conn = db_conn();

	$sql = "SELECT COUNT(*) as `num` 
FROM `course`
 WHERE `t_id` = ".mysqli_real_escape_string($conn, $tid)." 
 AND `c_name` = '".mysqli_real_escape_string($conn, $course)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return ($row['num'] == 0) ? true : false ;
}

function checkCourse($course)
{
	$conn = db_conn();

	$sql = "SELECT COUNT(*) as `num` 
FROM `course` 
WHERE `t_id` <> 0 
AND `c_name` = '".mysqli_real_escape_string($conn, $course)."'";

	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
	return ($row['num'] == 0) ? true : false ;
}
