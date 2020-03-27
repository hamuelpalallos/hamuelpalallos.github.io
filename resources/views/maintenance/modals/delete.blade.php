<div id="delete_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Are you sure you want to delete this?</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('deleteTeacher') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="hidden" name="deleteID" id="deleteID" value="">
                            <button type="button" class="btn btn-success" id="cancel" name="cancel" data-dismiss="modal">
                                Cancel
                            </button>
                            <button type="submit" class="btn btn-danger" id="delete" name="delete">
                                Delete
                            </button>
                        </div>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteTeacher(x) {
        document.getElementById('deleteID').value = x;
    }
</script>