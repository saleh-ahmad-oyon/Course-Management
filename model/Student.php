<?php

require_once 'db_conn.php';

class Model_Student
{
    public function searchStudent()
    {
        $conn = db_conn();

        $sql = "SELECT DISTINCT `s_aiub_id` FROM `student`";

        $result = mysqli_query($conn, $sql);
        $row = array();
        for($i=0; $i < mysqli_num_rows($result); $i++){
            $row[] = mysqli_fetch_array($result, MYSQLI_ASSOC);
        }
        return $row;
    }

    public function totalAttendance($cid, $studid)
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
}