@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="mb-4"></div>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary btn-lg px-3 float-end" data-bs-target="#addExer" data-bs-toggle="modal">Add
                Exercise</button>
            <button class="btn btn-success btn-lg mx-3 px-3 float-end" id="toggleButton">Create Program</button>
            <h4>List of Exercises</h4>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($exer as $data)
                <div class="col">
                    <div class="card">
                        <img src="{{ asset('images/'. $data->exer_image) }}" class="card-img-top resize"
                            alt="{{ $data->exer_name }}">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="dropdown-center float-end">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" id="viewBtn" value="{{ $data->id }}"><i
                                                    class="fa-solid fa-eye"></i>
                                                View</button></li>
                                        <li><a class="dropdown-item" id="delete"
                                                href="{{ route('del.exer', $data->id) }}"><i
                                                    class="fa-solid fa-trash"></i>
                                                Delete</a></li>
                                    </ul>
                                </div> {{ $data->exer_name }}
                            </h5>
                            <p class="card-text">{{ $data->exer_desc }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $(document).on('click', '#viewBtn', function() {
        var exer_id = $(this).val();

        $('#viewExer').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/exercises/view/" + exer_id,
            success: function(res) {
                console.log(res)
                $('#exer_name').text(res.exer.exer_name);
                $('#exer_desc').text(res.exer.exer_desc);
                $('#exer_img_preview').attr('src', '/images/' + res.exer
                    .exer_image);
                $('#exer_img').val(res.exer.exer_image);
                $('#id').val(exer_id);
            }
        });
    });
})

function previewImg() {
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('exer_img')
    var file = fileInput.files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
        preview.style.display = 'block';
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}
</script>

@include('backend.exercises.view_exercises')
@include('backend.exercises.add_exercises')
@endsection