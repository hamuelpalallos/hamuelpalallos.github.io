<div id="edit_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Edit teacher</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('updateTeacher') }} ">
                    @csrf
                    <input type="hidden" name="updateID" id="updateID">
                    <div class="form-group row">
                        <label for="firstName" class="col-12 col-form-label" autofocus>Firstname</label>
                        <div class="col-12">
                            <input type="text" name="first_name" id="firstName" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-12 col-form-label">Lastname</label>
                        <div class="col-12">
                            <input type="text" name="last_name" id="lastName" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gradeLevel" class="col-12 col-form-label">Grade level</label>
                        <div class="col-12">
                            <select name="grade_level" id="gradeLevel" class="form-control">
                                <option value="">-- Select grade level --</option>
                                <option value="1">Grade 1</option>
                                <option value="2">Grade 2</option>
                                <option value="3">Grade 3</option>
                                <option value="4">Grade 4</option>
                                <option value="5">Grade 5</option>
                                <option value="6">Grade 6</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="section" class="col-12 col-form-label">Section</label>
                        <div class="col-12">
                            <input type="text" name="section" id="section" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success" name="update">
                                Save
                            </button>
                            {{-- <input 
                            type="submit" 
                            value="Submit" 
                            name="insert" 
                            id="insert" 
                            class="btn btn-success" 
                            data-dismiss="modal"
                        > --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function updateTeacher(id, fn, ln, gl, sc) {
        document.getElementById('updateID').value = id;
        document.getElementById('firstName').value = fn;
        document.getElementById('lastName').value = ln;
        document.getElementById('gradeLevel').value = gl;
        document.getElementById('section').value = sc;
        console.log("hahahah");
    }
</script>