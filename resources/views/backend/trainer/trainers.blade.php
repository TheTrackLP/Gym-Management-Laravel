@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Add New Trainer/Coach</h3>
                    <form action="{{ route('add.trainers') }}" method="post">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="">Trainer/Coach</label>
                            <select name="member_id" id="member_id" class="form-control">
                                <option value="" Selected Disabled>Select A Trainer/Coach</option>
                                @foreach($members as $member)
                                <option value="{{ $member->firstname }}">
                                    {{ $member->lastname}}, {{$member->firstname}} {{$member->middlename}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Rate</label>
                            <input type="number" name="rate" id="rate" class="form-control">
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
                    <h3 class="card-title">Trainers/Coaches</h3>
                    <table class="table table-striped">
                        <colgroup>
                            <col width="15%">
                            <col width="35%">
                            <col width="25%">
                            <col width="25%">
                        </colgroup>
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Trainers/Coaches Details</th>
                                <th class="text-center">Rate</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1;
                            @endphp
                            @foreach($trainers as $trainer)
                            <tr>
                                <td class="text-center">{{ $i++}}</td>
                                <td>
                                    <p>{{ $trainer->member_id}}</p>
                                    <p><i class="fas fa-phone"></i> {{ $trainer->contact}}</p>
                                </td>
                                <td class="text-center">{{ $trainer->rate}}</td>
                                <td class="text-center">
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