@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="mb-4"></div>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('add.split') }}" class="btn btn-success btn-lg mx-3 px-3 float-end">Create Split</a>
            <h4>List of Splits</h4>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 g-3">
                @foreach($splits as $split)
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">
                                <div class="dropdown-center float-end">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" id="viewBtn" value=""><i
                                                    class="fa-solid fa-eye"></i>
                                                View</button></li>
                                        <li><a class="dropdown-item" id="delete" href="#"><i
                                                    class="fa-solid fa-trash"></i>
                                                Delete</a></li>
                                    </ul>
                                </div>
                                {{ $split->split_name }}
                            </h5>
                            <p class="card-text">
                                @php
                                $splitss = json_decode($split->exer_id)
                                @endphp
                                @foreach($splitss as $data)
                                {{ $data }}
                                @endforeach

                                {{ $split->split_desc }}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection