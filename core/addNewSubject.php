<?php
require_once "../config/dbhelper.php";
if (isset($_POST['subjectName'])) {
    $subjectName = $_POST['subjectName'];
    $sql = "INSERT INTO `tblsubject`(`name_subject`) VALUES ('" . $subjectName . "')";
    execute($sql);

    echo json_encode("Ok");
} else {
    echo json_encode("Error");
}
