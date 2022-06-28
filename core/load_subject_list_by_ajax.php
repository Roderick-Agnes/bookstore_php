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
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$dataTable = "";
foreach ($rs as $key => $row) {
    $id = $row['id_subject'];
    $name = $row["name_subject"];
    $dataTable .= "<tr id='bookItem-" . $id . "'><td><p class='fw-normal'>" . $id . "</p></td><td><p class='fw-normal'>" . $name . "</p></td><td><a href='javascript:void(0)' onclick='handleChangeToEditSubjectPage(" . $id . ",\"" . $name . "\")' class='btn btn-link btn-sm btn-rounded'>Edit</a></td><td><a href='javascript:void(0)' onclick='handleDeleteSubjectItem(" . $currentPage . "," . $id . ")' class='btn btn-link btn-sm btn-rounded'>Delete</a></td></tr>";
    $i++;
}

$pagination = "";

for ($i = 1; $i <= ceil($count / $pageSize); $i++) {
    if ($currentPage == $i) {
        $pagination .= "<li id='page-num-" . $i . "' class='page-item active'><a class='page-link' href='javascript:void(0)'>" . $i . "</a></li>";
    } else {
        $pagination .= "<li id='page-num-" . $i . "' class='page-item'><a class='page-link' href='javascript:void(0)' onclick='handleChangePage($i)'>" . $i . "</a></li>";
    }
}

$previousNumber = $currentPage == 1 ? 1 : $currentPage - 1;
$paginationRoot = "<tr><td colspan='4'><nav aria-label='Page navigation example'><ul class='pagination justify-content-end'><li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='handleChangePage($previousNumber)'>Previous</a></li>" . $pagination . "</ul></nav></td></tr>";

$html = $dataTable . $paginationRoot;

echo $html;
