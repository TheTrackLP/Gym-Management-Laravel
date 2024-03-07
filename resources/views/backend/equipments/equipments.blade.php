@extends('admin.body.header')
@section('admin')

<style>
h6,
label {
    font-weight: bold;
}
</style>

<div class="container-fluid">
    <div class="mb-4"></div>
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary float-end px-4 btn-lg" data-bs-toggle="modal" data-bs-target="#addEquip">Add
                Equipment</button>
            <h4>Equipment's Table</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="equipTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>E.Name</th>
                            <th>Description</th>
                            <th class="text-center">Qty</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Vendor</th>
                            <th>Address</th>
                            <th class="text-center">Contact</th>
                            <th class="text-center">Purchased Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($equips as $equip)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td>{{ $equip->e_name }}</td>
                            <td>{{ $equip->e_desc }}</td>
                            <td class="text-center">{{ $equip->e_qty }}</td>
                            <td class="text-center">{{ $equip->e_price }}</td>
                            <td class="text-center">{{ $equip->e_vendor }}</td>
                            <td>{{ $equip->e_address }}</td>
                            <td class="text-center">{{ $equip->e_contact }}</td>
                            <td class="text-center">{{ date('M d, Y', strtotime($equip->e_date)) }}</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">Action</button>
                                    <ul class="dropdown-menu">
                                        <li><button id="editBtn" value="{{ $equip->id }}" class="dropdown-item"><i
                                                    class="fa-solid fa-pen-to-square"></i>
                                                Edit</button></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a href="{{ route('delete.equip', $equip->id) }}" id="delete"
                                                class="dropdown-item"><i class="fa-solid fa-trash"></i>
                                                Delete</a></li>
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
    $(document).on('click', '#editBtn', function() {
        var equip_id = $(this).val();
        $('#editEquip').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/equipments/edit/" + equip_id,
            success: function(data) {
                $('#e_name').val(data.equips.e_name);
                $('#e_desc').val(data.equips.e_desc);
                $('#e_date').val(data.equips.e_date);
                $('#e_qty').val(data.equips.e_qty);
                $('#e_vendor').val(data.equips.e_vendor);
                $('#e_address').val(data.equips.e_address);
                $('#e_contact').val(data.equips.e_contact);
                $('#e_price').val(data.equips.e_price);
                $('#id').val(equip_id);
            }
        });
    });
});
</script>
@include('backend.equipments.add_equipments')
@include('backend.equipments.edit_equipments')
@endsection