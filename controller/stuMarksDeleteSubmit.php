<?php

/*===== Required Files =====*/
require '../model/db.php';
require 'define.php';

if (isset($_POST['dltMarks'])) {
    $cid    = $_GET['id1'];
    $studid = $_GET['id2'];

    if (!empty($_POST['check_dlt'])) {
        foreach ($_POST['check_dlt'] as $eid) {
            deleteExamMarks($eid);
        }
    }

    echo '<script language="javascript">
              alert("Successfully Deleted !!");
              window.location="'.SERVER.'/detailsMark?id1='.$cid.'&id2='.$studid.'";
          </script>';
} else {
    header('Location: '.SERVER.'');
}
