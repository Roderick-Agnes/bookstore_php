<?php
require_once "../config/dbhelper.php";
$sql = "SELECT * FROM tblsubject";
$rs = executeResult($sql);
$count = count($rs);
//show
$pageSize = 5;
$pos = !isset($_GET['page']) ? 0 : ($_GET['page'] - 1) * $pageSize;
$sql = "SELECT * FROM tblsubject LIMIT $pos, $pageSize";
$rs = executeResult($sql);
$i = 1;
$dataTable = "";
foreach ($rs as $key => $row) {
    $id = $row['id_subject'];
    $name = $row["name_subject"];
    $dataTable .= "<tr><td><p class='fw-normal'>" . $i . "</p></td><td><p class='fw-normal'>" . $name . "</p></td><td><a href='edit_subject.php?id=" . $id . "' class='btn btn-link btn-sm btn-rounded'>Edit</a></td><td><a href='javascript:del_confirm(" . "del_subject.php?id=" . $id . "')' class='btn btn-link btn-sm btn-rounded'>Delete</a></td></tr>";
    $i++;
}

$pagination = "";
for ($i = 1; $i <= ceil($count / $pageSize); $i++) {
    $pagination .= "<li id='page-num-" . $i . "' class='page-item'><a class='page-link' href='list_subjects.php?page=" . $i . "'>" . $i . "</a></li>";
}


$paginationRoot = "<tr><td colspan='4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-end'><li class='page-item disabled'><a class='page-link'>Previous</a></li>" . $pagination . "<li class='page-item'><a class='page-link' href='#'>Next</a></li></ul></nav></td></tr>";

$html = $dataTable . $paginationRoot;

echo ($html);
