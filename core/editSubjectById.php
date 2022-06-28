<?php
require_once "../config/dbhelper.php";
if (isset($_POST['subjectId']) && $_POST['subjectName'] != '' && $_POST['subjectId'] != '') {
    $subjectName = $_POST['subjectName'];
    $subjectId = $_POST['subjectId'];
    $sql = "UPDATE `tblsubject` SET `name_subject`='" . $subjectName . "' WHERE id_subject = '" . $subjectId . "'";
    execute($sql);

    echo json_encode("Ok");
} else {
    echo json_encode("Error");
}
