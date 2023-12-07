@extends('admin.header')
@section('admin')

<style>
* {
    font-weight: bold;
}

td {
    height: 50px;
    text-align: center;
    vertical-align: center;
}

p {
    display: inline;
}
</style>
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Members</h3>
            <button class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#activeDetails">Add New
                Active Member</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                            <colgroup>
                                <col width="5%">
                                <col width="20%">
                                <col width="12.5%">
                                <col width="12.5%">
                                <col width="12.5%">
                                <col width="5%">
                                <col width="15%">
                                <col width="5%">
                            </colgroup>
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Member</th>
                                    <th class="text-center">Trainer</th>
                                    <th class="text-center">Plan</th>
                                    <th class="text-center">Package</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Date</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($actives as $active)
                                <tr>
                                    <td class="text-center">
                                        <p>{{ $i++ }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $active->name }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $active->trainer_id }}</p>
                                    </td>
                                    <td class="text-center">
                                        <p>{{ $active->plan }}</p>
                                    </td>
                                    <td>
                                        <p>{{ $active->package}}</p>
                                    </td>
                                    <td class="text-center">
                                        @if($active->status == 'active')
                                        <span class="badge badge-pill badge-success">Active</span>
                                        @elseif($active->status == 'closed')
                                        <span class="badge badge-pill badge-secondary">Closed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <p>Start: {{ date('M d, Y', strtotime($active->start_date)) }}</p>
                                        <p>Close: {{ date('M d, Y', strtotime($active->end_date)) }}</p>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger" id="delete"><i
                                                class="fas fa-trash"></i></button>
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
@include('backend.active.add_active')
@endsection