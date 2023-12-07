@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Package Form</h3>
                    <form action="{{ route('add.packages') }}" method="post">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="">Package Name</label>
                            <input type="text" name="package_name" id="package_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="package_description" id="package_description" class="form-control"
                                rows="7"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" name="package_amount" id="package_amount" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="button" class="btn btn-danger" onclick="reset()">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Packages</h3>
                    <table class="table table-striped">
                        <colgroup>
                            <col width="5%">
                            <col width="50%">
                            <col width="10%">
                            <col width="10%">
                        </colgroup>
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Package Details</th>
                                <th class="text-center">Amount</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($packages as $package)
                            <tr>
                                <td>
                                    {{ $i++}}
                                </td>
                                <td>
                                    <p>Package Name: {{ $package->package_name}}</p>
                                    <p><small>Description: {{ $package->package_description }}</small></p>
                                </td>
                                <td class="text-center">
                                    <p>{{ $package->package_amount }}</p>
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('delete.package', $package->id) }}" class="btn btn-danger"
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
<script>

</script>
@endsection