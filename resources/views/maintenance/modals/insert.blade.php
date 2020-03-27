<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Add teacher</h4>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('addTeacher') }}">
                    @csrf
                    <div class="form-group row">
                        <label for="firstName" class="col-12 col-form-label" autofocus>Firstname</label>
                        <div class="col-12">
                            <input type="text" name="first_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastName" class="col-12 col-form-label">Lastname</label>
                        <div class="col-12">
                            <input type="text" name="last_name" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gradeLevel" class="col-12 col-form-label">Grade level</label>
                        <div class="col-12">
                            <select name="grade_level" class="form-control" required>
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
                            <input type="text" name="section" class="form-control" required>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success" name="insert">Submit</button>
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