<?php
require_once 'model/Student.php';
require_once 'controller/base.php';

class Controller_Student extends Base
{
    public function action_searchStudent()
    {
        $row = (new Model_Student)->searchStudent();
        $id = [];
        foreach ($row as $r) {
            array_push($id, $r['s_aiub_id']);
        }
        echo json_encode($id);
    }
    
    public function action_totalAttendance($cid, $sid)
    {
        $attendance = (new Model_Student)
            ->totalAttendance($cid, $sid);
        echo $attendance;
    }
}