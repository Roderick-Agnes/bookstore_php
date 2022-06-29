<?php
require_once "../config/dbhelper.php";
$sql = "SELECT * FROM tblbooks";
$rs = executeResult($sql);
$count = count($rs);
//show
$pageSize = 5;
$pos = !isset($_GET['page']) ? 0 : ($_GET['page'] - 1) * $pageSize;
$sql = "SELECT * FROM tblbooks LIMIT $pos, $pageSize";
$rs = executeResult($sql);
$i = 1;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$dataTable = "";
foreach ($rs as $key => $row) {
    $id = $row['id_book'];
    $id_subject = $row['id_subject'];
    $name = $row["name_book"];
    $price = $row["price"];
    $images = $row["images"];
    $des = $row["des"];
    $obj = [
        "id" => $row['id_book'],
        "id_subject" => $row['id_subject'],
        "name" => $row["name_book"],
        "price" => $row["price"],
        "images" => $row["images"],
        "des" => $row["des"]
    ];
    $dataTable .= "<tr id='bookItem-" . $id . "'><td><p class='fw-normal'>" . $id . "</p></td><td><p class='fw-normal'>" . $id_subject . "</p></td><td><p class='fw-normal'>" . $name . "</p></td><td><p class='fw-normal'>" . $price . "</p></td><td><input class='fw-normal' width='100px' height='100px' type='image' src='../public/images/" . $images . "'/>" . "</td><td><p class='fw-normal'>" . $des . "</p></td><td><a href='javascript:void(0)' onclick='handleChangeToEditBookPage(" . json_encode($obj) . ")' class='btn btn-link btn-sm btn-rounded'>Edit</a></td><td><a href='javascript:void(0)' onclick='handleDeleteBookItem(" . $currentPage . "," . $id . ")' class='btn btn-link btn-sm btn-rounded'>Delete</a></td></tr>";
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
$paginationRoot = "<tr><td colspan='6'><nav aria-label='Page navigation example'><ul class='pagination justify-content-end'><li class='page-item'><a class='page-link' href='javascript:void(0)' onclick='handleChangePage($previousNumber)'>Previous</a></li>" . $pagination . "</ul></nav></td></tr>";

$html = $dataTable . $paginationRoot;

echo $html;
