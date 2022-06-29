<div class="container">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Add new book</h4>

            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form input-group mb-3">
                    <input type="text" class="form-control" id="bookName" name="bookName" placeholder="book name">
                </div>
                <div class="md-form input-group mb-3">
                    <?php
                    require_once "../config/dbhelper.php";
                    $sql = "SELECT * FROM tblsubject";
                    $rs = executeResult($sql);
                    ?>
                    <select id="subjectType" class="browser-default custom-select form-control">
                        <option value="">Choose subject type</option>
                        <?php
                        foreach ($rs as $key => $row) {
                            echo "<option value='" . $row['id_subject'] . "'>" . $row['name_subject'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="md-form input-group mb-3">
                    <input type="number" class="form-control" id="price" name="price" placeholder="price">
                </div>
                <div class="md-form input-group mb-3">
                    <input type="file" class="form-control" id="imageBook" name="image" placeholder="image" />
                </div>
                <div class="md-form input-group mb-3">
                    <input type="number" class="form-control" id="price" name="price" placeholder="price">
                </div>

            </div>

            <!--Footer-->
            <div class="modal-footer justify-content-center">
                <a type="button" onclick="handleSaveNewSubject()" class="btn btn-outline-warning waves-effect">Submit <i class="fas fa-paper-plane-o ml-1"></i></a>
            </div>
        </div>
        <!--/.Content-->
    </div>
</div>