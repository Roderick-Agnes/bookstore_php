<?php
require_once "../config/dbhelper.php";
if (isset($_POST['id'])) {
    $subjectId = $_POST['id'];
    $sql = "DELETE FROM `tblsubject` WHERE id_subject = '" . $subjectId . "'";
    execute($sql);

    echo json_encode("Ok");
} else {
    echo json_encode("Error");
}
