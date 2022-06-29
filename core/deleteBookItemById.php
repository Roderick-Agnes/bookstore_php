<?php
require_once "../config/dbhelper.php";
if (isset($_POST['id'])) {
    $bookId = $_POST['id'];
    $sql = "DELETE FROM `tblbooks` WHERE id_book = '" . $bookId . "'";
    execute($sql);

    echo json_encode("Ok");
} else {
    echo json_encode("Error");
}
