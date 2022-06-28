<div class="container">
    <div class="modal-dialog modal-notify modal-warning" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header text-center">
                <h4 class="modal-title white-text w-100 font-weight-bold py-2">Add new subject</h4>

            </div>

            <!--Body-->
            <div class="modal-body">
                <div class="md-form input-group mb-3">
                    <input type="text" class="form-control" id="subjectName" name="subjectName" placeholder="subject name" aria-label="Username" aria-describedby="material-addon1">
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