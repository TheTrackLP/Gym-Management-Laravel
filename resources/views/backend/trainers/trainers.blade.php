@extends('admin.body.header')
@section('admin')

<style>
td,
p {
    margin: 0px;
}
</style>

<div class="container-fluid">
    <div class="mb-4"></div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card shadow">
                <form action="{{ route('add.trainers') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h4>Trainer's Form</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="">Name</label>
                            <input type="text" name="trainer_name" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Contact</label>
                            <input type="number" name="trainer_contact" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Rate</label>
                            <input type="number" name="trainer_rate" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success px-5 float-end mb-2">Add Trainer</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card shadow">
                <div class="card-header">
                    <h4>List of Trainers</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>Information</th>
                                    <th class="text-center" style="width: 20%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($trainers as $trainer)
                                <tr>
                                    <td class="text-center">{{ $i++ }}</td>
                                    <td>
                                        <p>
                                        <h5><i class="fa-solid fa-user"></i> {{ $trainer->trainer_name }}</h5>
                                        </p>
                                        <p><small><i class="fa-solid fa-mobile"></i>
                                                {{ $trainer->trainer_contact }}</small></p>
                                        <p><small><i class="fa-solid fa-money-bill-wave"></i>
                                                {{ number_format($trainer->trainer_rate, 2) }}</small></p>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('delete.trainers', $trainer->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection