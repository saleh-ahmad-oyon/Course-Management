<?php

require_once '../model/Student.php';

$row = searchStudent();
$id = [];
foreach ($row as $r) {
    array_push($id, $r['s_aiub_id']);
}
echo json_encode($id);