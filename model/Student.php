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
}