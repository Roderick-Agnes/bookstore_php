<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                List books
            </h1>
            <a data-toggle="modal" data-target="#modalLoginForm" onclick="handleChangeToAddNewBookPage()" class="btn btn-success">Add book</a>
            <br />
        </div>
    </div>

    <table id='subjectsTable' class="table align-middle mb-0 bg-white m">
        <thead class="bg-light">
            <tr>
                <th>ID</th>
                <th>ID subject</th>
                <th>Book name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Des</th>
                <th>Edit action</th>
                <th>Delete action</th>
            </tr>
        </thead>
        <tbody id="booksTable">


        </tbody>

    </table>
</div>