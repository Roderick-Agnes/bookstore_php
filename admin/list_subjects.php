<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Subject list
            </h1>
            <button type="button" class="btn btn-success" onclick="javascript:window.location.href = 'insert_subject.php'">Add subject</button>
            <br />
        </div>
    </div>

    <table id='subjectsTable' class="table align-middle mb-0 bg-white m">
        <thead class="bg-light">
            <tr>
                <th>ID</th>
                <th>Subject name</th>
                <th>Edit action</th>
                <th>Delete action</th>
            </tr>
        </thead>
        <tbody id="subjectTable">


        </tbody>

    </table>
</div>