@extends('admin.body.header')
@section('admin')

<div class="container-fluid">
    <div class="mb-4"></div>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title mb-4">
                Registered Member Lists
            </h3>
            <button type="button" class="btn btn-primary float-end btn-lg px-5 mb-4" data-bs-target="#addMember"
                data-bs-toggle="modal"><i class="fa-solid fa-user-plus"></i> Add Member</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="memberTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>FullName</th>
                            <th>Username</th>
                            <th>Contact Number</th>
                            <th>Plan</th>
                            <th>Package</th>
                            <th class="text-center">End Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        $date = date('Y-m-d');
                        @endphp
                        @foreach($members as $member)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $member->fullname }}</td>
                            <td>{{ $member->username }}</td>
                            <td>{{ $member->contact }}</td>
                            <td>{{ $member->plan }}</td>
                            <td>{{ $member->package }}</td>
                            <td class="text-center">
                                @if($member->end_date <= $date) <span class="badge text-bg-danger">
                                    {{ date('M d, Y', strtotime($member->end_date)) }}</span>
                                    @else
                                    <span class="badge text-bg-success">
                                        {{ date('M d, Y', strtotime($member->end_date)) }}</span>
                                    @endif
                            </td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><button class="dropdown-item" id="viewBtn" value="{{ $member->id }}"><i
                                                    class="fas fa-history"></i>
                                                Renew/View</button>
                                        </li>
                                        <li><a class="dropdown-item" id="delete"
                                                href="{{ route('delete.members', $member->id)}}"><i
                                                    class="fas fa-trash-alt"></i>
                                                Delete</a>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '#viewBtn', function() {
        var member_id = $(this).val();

        $('#viewMember').modal('show');

        $.ajax({
            type: "GET",
            url: "/admins/members/edit/" + member_id,
            success: function(response) {
                $('#fullname').val(response.members.fullname);
                $('#username').val(response.members.username);
                $('#gender').val(response.members.gender);
                $('#contact').val(response.members.contact);
                $('#address').val(response.members.address);
                $('#id').val(member_id);
            }
        });
    });
});
</script>

@include('backend.members.add_members')
@include('backend.members.renew_members')
@endsection