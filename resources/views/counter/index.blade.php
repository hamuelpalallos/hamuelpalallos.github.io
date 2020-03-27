@extends('layouts.app')
@section('header', 'Counter')
@section('content')
<div class="container counter-page">
    @include('partials.formerrors')
    <form action="{{ route('counterSubmit') }}" method="post">
        @csrf
        <div class="row">
             <div class="col-md-5">
                <label for="grade1" class="mb-4 grade-1 btn-grade w-100">
                    <div class="some">
                        <input type="radio" name="radioGrade" id="grade1" onclick="getSections(1);checkValid(1);" value="1">
                        <i class="icon-grade"></i>
                        <div class="label p-4">Grade 1</div>
                    </div>
                </label>

                <label for="grade2" class="mb-4 grade-2 btn-grade w-100">
                    <div class="some">
                        <input type="radio" name="radioGrade" id="grade2" onclick="getSections(2);checkValid(2);" value="2">
                        <i class="icon-grade"></i>
                        <div class="label p-4">Grade 2</div>
                    </div>
                </label>

                <label for="grade3" class="mb-4 grade-3 btn-grade w-100">
                    <div class="some">
                        <input type="radio" name="radioGrade" id="grade3" onclick="getSections(3);checkValid(3);" value="3">
                        <i class="icon-grade"></i>
                        <div class="label p-4">Grade 3</div>
                    </div>
                </label>
                <label for="grade4" class="mb-4 grade-4 btn-grade w-100">
                    <div class="some">
                        <input type="radio" name="radioGrade" id="grade4" onclick="getSections(4);checkValid(4);" value="4">
                        <i class="icon-grade"></i>
                        <div class="label p-4">Grade 4</div>
                    </div>
                </label>
                <label for="grade5" class="mb-4 grade-5 btn-grade w-100">
                    <div class="some">
                        <input type="radio" name="radioGrade" id="grade5" onclick="getSections(5);checkValid(5);" value="5">
                        <i class="icon-grade"></i>
                        <div class="label p-4">Grade 5</div>
                    </div>
                </label>
                <label for="grade6" class="mb-4 grade-6 btn-grade w-100">
                    <div class="some">
                        <input type="radio" name="radioGrade" id="grade6" onclick="getSections(6);checkValid(6);" value="6">
                        <i class="icon-grade"></i>
                        <div class="label p-4">Grade 6</div>
                    </div>
                </label>

        </div>
        
        <div class="col-md-7">
            <div class="container">
                <div class="row">
                    <select name="selectSection" id="selectSection" class="mb-4 w-100" onchange="checkValid(0);" disabled>
                        <option>Select Section</option>
                    </select>
                </div>
                <div class="row w-100 text-center">
                    <input type="submit" value="Submit" class="mx-auto py-4 btn btn-success" id="submitEntry" disabled>

                </div>
            </div>

        </div>
        </div>
       
    </form>
</div>

<script>
    function getSections(g){
        if(g==1){
            document.getElementById("selectSection").innerHTML="<option>Select Section</option>"+
                            "@foreach ($teachers as $teacher)"+
                                "@if($teacher['grade_level']==1)"+
                                    "<option value='{{ $teacher['section'] }}'>{{ $teacher['section'] }}</option>"+
                                "@endif"+
                            "@endforeach";
        }
        else if(g==2){
            document.getElementById("selectSection").innerHTML="<option>Select Section</option>"+
                            "@foreach ($teachers as $teacher)"+
                                "@if($teacher['grade_level']==2)"+
                                    "<option value='{{ $teacher['section'] }}'>{{ $teacher['section'] }}</option>"+
                                "@endif"+
                            "@endforeach";
        }
        else if(g==3){
            document.getElementById("selectSection").innerHTML="<option>Select Section</option>"+
                            "@foreach ($teachers as $teacher)"+
                                "@if($teacher['grade_level']==3)"+
                                    "<option value='{{ $teacher['section'] }}'>{{ $teacher['section'] }}</option>"+
                                "@endif"+
                            "@endforeach";
        }
        else if(g==4){
            document.getElementById("selectSection").innerHTML="<option>Select Section</option>"+
                            "@foreach ($teachers as $teacher)"+
                                "@if($teacher['grade_level']==4)"+
                                    "<option value='{{ $teacher['section'] }}'>{{ $teacher['section'] }}</option>"+
                                "@endif"+
                            "@endforeach";
        }
        else if(g==5){
            document.getElementById("selectSection").innerHTML="<option>Select Section</option>"+
                            "@foreach ($teachers as $teacher)"+
                                "@if($teacher['grade_level']==5)"+
                                    "<option value='{{ $teacher['section'] }}'>{{ $teacher['section'] }}</option>"+
                                "@endif"+
                            "@endforeach";
        }
        else if(g==6){
            document.getElementById("selectSection").innerHTML="<option>Select Section</option>"+
                            "@foreach ($teachers as $teacher)"+
                                "@if($teacher['grade_level']==6)"+
                                    "<option value='{{ $teacher['section'] }}'>{{ $teacher['section'] }}</option>"+
                                "@endif"+
                            "@endforeach";
        }
    }
</script>

@endsection