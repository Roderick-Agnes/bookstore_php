<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    header("Location:index.php");
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.css" />



    <link rel="stylesheet" href="../public/assets/styles.css">

    <title>Main page</title>

</head>

<body>
    <!--Main Navigation-->
    <header>
        <?php
        include "../component/left_admin.php"
        ?>

        <!-- Navbar -->
        <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
            <!-- Container wrapper -->
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <!-- <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="https://mdbcdn.b-cdn.net/img/logo/mdb-transaprent-noshadows.webp" height="15" alt="MDB Logo" loading="lazy" />
                    </a> -->
                    <!-- Left links -->
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="main.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../admin/index.php">Website</a>
                        </li>
                    </ul>
                    <!-- Left links -->
                </div>
                <!-- Collapsible wrapper -->

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <!-- Notifications -->
                    <div class="dropdown">
                        <a class="text-reset me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-bell"></i>
                            <span class="badge rounded-pill badge-notification bg-danger">1</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="#">Some news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Another news</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Avatar -->
                    <div class="dropdown">
                        <a class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user fa-fw"></i><?= $username ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                            <li>
                                <a class="dropdown-item" href="#">User Profile</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="#">Settings</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="login.html">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Right elements -->
            </div>
        </nav>
        <!-- Navbar -->
    </header>
    <!--Main Navigation-->

    <!--Main layout-->
    <main style="margin-top: 58px;">
        <div class="container pt-4">
            <div id="page-wrapper">
                <div id='page-wrapper-content'>
                    <div class="alert alert-danger">
                        Book management system
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--Main layout-->

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/af-2.4.0/r-2.3.0/sp-2.0.2/sl-1.4.0/datatables.min.js"></script>
    <script type="text/javascript" src="../public/assets/js/tata.js?v=<?php echo time(); ?>"></script>
    <script>
        const bookTopic = document.getElementById("bookTopic");
        const bookList = document.getElementById("bookList");
        $(document).ready(function() {
            bookTopic.addEventListener("click", bookTopicTab);
            bookList.addEventListener("click", bookListTab);



        });
        const bookTopicTab = () => {
            $('#subjectsTable').DataTable();

            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');


            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'><?php include '../admin/list_subjects.php' ?></div>`;

            //call ajax
            $.ajax({
                type: "POST",
                url: "../core/load_subject_list_by_ajax.php",
                data: {
                    page: 0
                },
                cache: false,
                success: function(data) {
                    const subjectTable = document.getElementById('subjectTable');
                    subjectTable.innerHTML = data;

                }
            });
        }
        const bookListTab = () => {
            $('#booksTable').DataTable();
            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');


            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'><?php include '../admin/list_books.php' ?></div>`;

            //call ajax
            $.ajax({
                type: "post",
                url: "../core/load_book_list_by_ajax.php",
                data: {
                    page: 0
                },
                cache: false,
                success: function(data) {
                    const bookTable = document.getElementById('booksTable');
                    bookTable.innerHTML = data;

                }
            });
        }
        const handleChangePage = (currentNumber) => {
            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');

            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'><?php include '../admin/list_subjects.php' ?></div>`;

            //call ajax
            $.ajax({
                type: "GET",
                url: "../core/load_subject_list_by_ajax.php",
                data: {
                    page: currentNumber
                },
                cache: false,
                success: function(data) {
                    const subjectTable = document.getElementById('subjectTable');
                    subjectTable.innerHTML = data;

                }
            });
        }
        const handleLoadSubjectTable = (currentNumber) => {
            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');

            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'><?php include '../admin/list_subjects.php' ?></div>`;

            //call ajax
            $.ajax({
                type: "GET",
                url: "../core/load_subject_list_by_ajax.php",
                data: {
                    page: currentNumber
                },
                cache: false,
                success: function(data) {
                    const subjectTable = document.getElementById('subjectTable');
                    subjectTable.innerHTML = data;

                }
            });
        }
        const handleLoadBookTable = (currentNumber) => {
            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');

            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'><?php include '../admin/list_books.php' ?></div>`;

            //call ajax
            $.ajax({
                type: "post",
                url: "../core/load_book_list_by_ajax.php",
                data: {
                    page: currentNumber
                },
                cache: false,
                success: function(data) {
                    const bookTable = document.getElementById('booksTable');
                    bookTable.innerHTML = data;

                }
            });
        }
        const handleDeleteSubjectItem = (currentNumber, id) => {

            //call ajax
            $.ajax({
                type: "POST",
                url: "../core/deleteSubjectItemById.php",
                data: {
                    id: id
                },
                cache: false,
                success: function(data) {
                    if (JSON.parse(data) == 'Ok') {
                        document.getElementById('bookItem-' + id).remove();
                        alert('Delete item with id = ' + id + ' success');
                        handleLoadSubjectTable(currentNumber);
                    } else {
                        alert('Delete item with id = ' + id + ' error');
                    }
                }
            });
        }
        const handleDeleteBookItem = (currentNumber, id) => {

            //call ajax
            $.ajax({
                type: "POST",
                url: "../core/deleteBookItemById.php",
                data: {
                    id: id
                },
                cache: false,
                success: function(data) {
                    if (JSON.parse(data) == 'Ok') {
                        document.getElementById('bookItem-' + id).remove();
                        alert('Delete item with id = ' + id + ' success');
                        handleLoadBookTable(currentNumber);
                    } else {
                        alert('Delete item with id = ' + id + ' error');
                    }
                }
            });
        }
        const handleChangeToAddNewSubjectPage = () => {
            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');

            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'><?php include '../admin/add_new_subject.php' ?></div>`;
        }
        const handleSaveNewSubject = () => {
            const subjectName = document.getElementById('subjectName').value;
            //call ajax
            $.ajax({
                type: "POST",
                url: "../core/addNewSubject.php",
                data: {
                    subjectName: subjectName
                },
                cache: false,
                success: function(data) {
                    if (JSON.parse(data) == 'Ok') {
                        handleLoadSubjectTable(1);
                    } else {
                        alert('Add new subject error');
                    }
                }
            });
        }
        const handleChangeToEditSubjectPage = (id, name) => {
            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');

            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'>

            <div class="container">
                <div class="modal-dialog modal-notify modal-warning" role="document">
                    <!--Content-->
                    <div class="modal-content">
                        <!--Header-->
                        <div class="modal-header text-center">
                            <h4 class="modal-title white-text w-100 font-weight-bold py-2">Edit subject</h4>

                        </div>

                        <!--Body-->
                        <div class="modal-body">
                            <div class="md-form input-group mb-3">
                                <input type="text" class="form-control" id="subjectId" name="subjectId" placeholder="subject id" value="` + id + `">
                            </div>

                            <div class="md-form input-group mb-3">
                                <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="subject name" value="` + name + `">
                            </div>

                        </div>

                        <!--Footer-->
                        <div class="modal-footer justify-content-center">
                            <a type="button" onclick="handleSaveSubjectById()" class="btn btn-outline-warning waves-effect">Save <i class="fas fa-paper-plane-o ml-1"></i></a>
                        </div>
                    </div>
                    <!--/.Content-->
                </div>
            </div>
            </div>`;
        }
        const handleSaveSubjectById = () => {
            const subjectId = document.getElementById('subjectId').value;
            const subjectName = document.getElementById('subjectName').value;
            //call ajax
            $.ajax({
                type: "POST",
                url: "../core/editSubjectById.php",
                data: {
                    subjectId: subjectId,
                    subjectName: subjectName
                },
                cache: false,
                success: function(data) {
                    if (JSON.parse(data) == 'Ok') {
                        handleLoadSubjectTable(1);
                    } else {
                        alert('Edit subject error');
                    }
                }
            });
        }

        const handleChangeToAddNewBookPage = () => {
            const pageWrapper = document.getElementById('page-wrapper');
            const pageWrapperContent = document.getElementById('page-wrapper-content');

            pageWrapperContent.remove();
            pageWrapper.innerHTML = `<div id='page-wrapper-content'><?php include '../admin/add_new_book.php' ?></div>`;
        }
    </script>
</body>

</html>