@extends('admin.body.header')
@section('admin')

<style>
td,
p {
    margin: 0;
    font-size: 15px;
}
</style>

<div class="container-fluid">
    <div class="mb-4"></div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <form action="{{ route('add.plans') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Add Plan
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="">Plan:</label>
                            <input type="text" name="plan_name" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Price:</label>
                            <input type="number" name="plan_price" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Add Plan</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Plans
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered" id="planTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Plan</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($plans as $plan)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $plan->plan_name}}</td>
                                <td>{{ $plan->plan_price}}</td>
                                <td>
                                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mb-4"></div>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <form action="{{ route('add.package') }}" method="post">
                    @csrf
                    <div class="card-header">
                        <h4 class="card-title">
                            Package Form
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label for="">Package Name:</label>
                            <input type="text" name="package_name" class="form-control">
                        </div>
                        <div class="mb-4">
                            <label for="">Description</label>
                            <textarea name="package_desc" rows="3" class="form-control"></textarea>
                        </div>
                        <div class="mb-4">
                            <label for="">Price:</label>
                            <input type="number" name="package_price" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Add Package</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Package Lists
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-hovered table-bordered" id="packageTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Package</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($packages as $package)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <p>{{ $package->package_name }}</p>
                                    <p><small>{{ $package->package_desc }}</small></p>
                                </td>
                                <td>{{ $package->package_price }}</td>
                                <td>
                                    <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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

@endsection