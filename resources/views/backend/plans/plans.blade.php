@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Add New Plan</h3>
                    <form action="{{ route('add.plans') }}" method="post">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="">Plans (Months/s) or (Week/s)</label>
                            <input type="text" name="plan_name" id="plans" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Amount</label>
                            <input type="number" name="plan_price" id="amount" class="form-control">
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
                    <h3 class="card-title">Plans</h3>
                    <table class="table table-striped">
                        <colgroup>
                            <col width="25%">
                            <col width="25%">
                            <col width="25%">
                            <col width="25%">
                        </colgroup>
                        <thead class="thead-dark">
                            <tr>
                                <th>#</th>
                                <th>Plans</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($plans as $plan)
                            <tr>
                                <td>{{ $i++}}</td>
                                <td>{{ $plan->plan_name}}</td>
                                <td>{{ $plan->plan_price}}</td>
                                <td>
                                    <button type="button" class="btn btn-danger">Delete</button>
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