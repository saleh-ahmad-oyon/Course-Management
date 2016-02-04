<?php
    require '../model/db.php';
    require 'define.php';
    if(isset($_POST['dltTeacher'])){
        $cid = $_POST['id'];
        $tid = $_POST['id2'];
        deleteTeacherCourse($cid);
        deleteStudentCourse($cid);
        deleteCourseStudentAttendence($cid);
        removeCourseStudentExam($cid);
        removeCourseStudentQuizTerm($cid);
        echo '<script language="javascript">
				alert("Successfully Removed !!");
				window.location="'.SERVER.'/addSubject?id='.$tid.'";
			  </script>';
    }
?>