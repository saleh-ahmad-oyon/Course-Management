<?php
require_once 'model/Student.php';

class Controller_Student
{
    public function action_index()
    {
        
    }
    
    public function action_searchStudent()
    {
        $row = (new Model_Student)->searchStudent();
        $id = [];
        foreach ($row as $r) {
            array_push($id, $r['s_aiub_id']);
        }
        echo json_encode($id);
    }
}