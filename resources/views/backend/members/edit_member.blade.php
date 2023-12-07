<style>
label {
    font-weight: bold;
}
</style>

<form action="{{ route('update.members') }}" method="post">
    @csrf
    <div class="modal fade" id="memberDetails" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Loan Application</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <input type="hidden" name="id" id="id">
                            <div class="col-md-4">
                                <label for="">Member ID</label>
                                <input type="text" name="member_id" id="member_id" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Middle Name</label>
                                <small>Leave Blank if None</small>
                                <input type="text" name="middlename" id="middlename" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="">Contact #</label>
                                <input type="text" name="contact" id="contact" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="">Occupation</label>
                                <select name="occupation" id="occupation" class="form-control">
                                    <option value="" disabled selected>Select Member Occupation</option>
                                    <option value="student">Student</option>
                                    <option value="professional">Professional</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="prefer">Prefer not to say</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Address</label>
                                <textarea name="address" cols="30" id="address" rows="7"
                                    class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update Member</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>