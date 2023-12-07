@extends('admin.header')
@section('admin')

<style>
.button {
    border: none;
    color: white;
    padding: 8px 16px;
    text-align: center;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: #04AA6D;
    color: white;
    border: 2px solid #04AA6D;
}

.button1:hover {
    background-color: white;
    color: black;
}

.button2 {
    background-color: #008CBA;
    color: white;
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: white;
    color: black;
}

.button3 {
    background-color: #f44336;
    color: white;
    border: 2px solid #f44336;
}

.button3:hover {
    background-color: white;
    color: black;
}
</style>

<div class="container-fluid">
    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="h5 mb-0 font-weight-bold text-gray-800">Type of Exercises</div>
                        <button class="btn btn-primary float-right" data-toggle="modal" data-target="#addExercise">Add
                            Exercise</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($exercises as $exercise)
        <div class="col-lg-3 mb-3">
            <div class="card">
                <img class="card-img-top" src="{{ asset('images/' . $exercise->muscle_image) }}" alt="Card image
                    cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $exercise->muscle_name }}</h5>
                    <p class="card-text">{{ $exercise->muscle_description }}.</p>
                </div>
                <div class="card-footer text-center">
                    <button class="button button1">View</button>
                    <button class="btn btn-warning" id="editexer" value="{{ $exercise->id }}">Edit</button>
                    <button class="button button3">Delete</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '#editexer', function() {
        var exer_id = $(this).val();

        $('#editExercise').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/exercise/edit/" + exer_id,
            success: function(response) {
                console.log(response);
                $('#name').val(response.exercise.muscle_name);
                $('#group').val(response.exercise.muscle_group);
                $('#description').val(response.exercise.muscle_description);

                $('#preview').attr('src', response.exercise.muscle_image);
                $('#preview').css('display', 'block');
            }
        });
    });
});
</script>
@include('backend.exercise.add_exercise')
@include('backend.exercise.edit_exercise')
@endsection