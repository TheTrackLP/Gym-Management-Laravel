@extends('admin.header')
@section('admin')
<style>
* {
    font-weight: bold;
}
</style>

<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Members</h3>
            <button class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#memberModal">Add New
                Member</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped" id="membersTable" width="100%" cellspacing="0">
                            <colgroup>
                                <col width="5%">
                                <col width="5%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Mebmer ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Occupation</th>
                                    <th class="text-center">Date Created</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i= 1;
                                ?>
                                @foreach($members as $member)
                                <tr>
                                    <td class="text-center">{{$i++}}</td>
                                    <td>{{ $member->member_id}}</td>
                                    <td>{{ $member->name }}</td>
                                    <td class="text-center">{{ strtoupper($member->occupation)}}</td>
                                    <td class="text-center">{{ date('M d, Y', strtotime($member->created_at))}}</td>
                                    <td class="text-center">
                                        <button class="btn btn-success">View</button>
                                        <button type="button" class="btn btn-warning" id="editbtn"
                                            value="{{ $member->id }}">Edit</button>
                                        <button class="btn btn-danger">Delete</button>
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
<script>
$(document).ready(function() {
    $(document).on('click', '#editbtn', function() {
        var mem_id = $(this).val();

        $('#memberDetails').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/members/edit/" + mem_id,
            success: function(response) {
                $('#member_id').val(response.member.member_id);
                $('#firstname').val(response.member.firstname);
                $('#middlename').val(response.member.middlename);
                $('#lastname').val(response.member.lastname);
                $('#contact').val(response.member.contact);
                $('#email').val(response.member.email);
                $('#occupation').val(response.member.occupation);
                $('#gender').val(response.member.gender);
                $('#address').val(response.member.address);
                $('#id').val(mem_id);
            }
        });
    });
});
</script>
@include('backend.members.add_members')
@include('backend.members.edit_member')
@endsection