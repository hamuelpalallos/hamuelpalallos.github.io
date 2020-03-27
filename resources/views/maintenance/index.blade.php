@extends('layouts.app')
@section('header', 'Maintenance')
@section('content')

@if(Auth::check())
<div class="container-fluid maintenance-page">
    @include('partials.formerrors')
    <div class="row">
        <div class="col-sm-12">
            <div class="card p-4">
                <div class="full-right p-4">
                    <h6><b>Teachers</b></h6>
                </div>
                <table class="table table-responsive-lg table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th width="80px">No</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th width="128px" class="text-center">Grade Level</th>
                            <th width="128px" class="text-center">Section</th>
                            <th width="192px" class="text-center">
                                <button 
                                    type="button"
                                    name="add" 
                                    id="add" 
                                    data-toggle="modal" 
                                    data-target="#add_data_Modal" 
                                    class="btn btn-primary">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </th>
                        </tr>
                    </thead>

                    <?php $no=1; ?>
                    @foreach ($teacher as $key => $value)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$value->first_name}}</td>
                            <td>{{$value->last_name}}</td>
                            <td class="text-center">{{$value->grade_level}}</td>
                            <td class="text-center">{{$value->section}}</td>
                            <td class="text-center">
                                <div class="btn-group mr-2">
                                    <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" 
                                        data-target="#edit_data_Modal" 
                                        onclick="updateTeacher(
                                            {{ $value->id }}, 
                                            '{{ $value->first_name }}', 
                                            '{{ $value->last_name }}', 
                                            {{ $value->grade_level }}, 
                                            '{{ $value->section }}')">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" 
                                        data-target="#delete_data_Modal" onclick="deleteTeacher({{ $value->id }} )">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        
                    @endforeach
                </table>
                {{ $teacher->links() }}
            </div>
    
        </div>

        
    </div>
</div>

@include('maintenance.modals.insert')
@include('maintenance.modals.update')
@include('maintenance.modals.delete')
@endif
@endsection