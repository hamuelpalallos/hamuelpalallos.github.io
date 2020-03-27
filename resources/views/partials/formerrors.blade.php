@if(count($errors))
    <div class="form-group">
        @foreach($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
                <li>{{$error}}</li>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    </div>
@endif

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show m-2" role="alert">
        <li>{{session()->get('success')}}</li>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('fail'))
    <div class="alert alert-danger alert-dismissible fade show m-2" role="alert">
        <li>{{session()->get('fail')}}</li>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if (session('status'))
    <script>
        tempAlert('{{ session('status') }}', 3000);
    </script>
@endif