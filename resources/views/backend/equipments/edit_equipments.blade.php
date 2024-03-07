<div class="modal fade" id="editEquip" tabindex="-1" data-bs-keyboard="false" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('update.equip') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h4>Edit Equipment</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Equipment</h6>
                                </div>
                                <div class="card-body">
                                    <input type="hidden" name="id" id="id">
                                    <div class="mb-4">
                                        <label for="">Equipment Name:</label>
                                        <input type="text" name="e_name" id="e_name" class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Description</label>
                                        <textarea name="e_desc" row="1" id="e_desc" class="form-control"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Date of Purchase:</label>
                                        <input type="date" name="e_date" id="e_date" class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Quantity</label>
                                        <input type="number" name="e_qty" id="e_qty" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h6>Other Details</h6>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label for="">Vendor:</label>
                                        <input type="text" name="e_vendor" id="e_vendor" class="form-control">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Address</label>
                                        <textarea name="e_address" rows="1" id="e_address"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Contact Number:</label>
                                        <input type="text" name="e_contact" id="e_contact" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h6>Pricing</h6>
                                </div>
                                <div class="card-body">
                                    <label for="">Cost:</label>
                                    <input type="number" name="e_price" id="e_price" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success px-3">Edit Equipment</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger px-3">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>