<div class="modal fade" tabindex="-1" id="addMember" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('add.members') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h3 class="modal-title">
                        Add Member
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        Personal Information
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4">
                                        <label for="">Full Name:</label>
                                        <input type="text" name="fullname" class="form-control"
                                            placeholder="Enter Full Name...">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Username...">
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Gender</label>
                                        <select name="gender" class="form-select">
                                            <option value="" selected disabled>Select Gender</option>
                                            <option value="1">Male</option>
                                            <option value="2">Female</option>
                                            <option value="3">Prefer not to say</option>
                                        </select>
                                    </div>
                                    <div class="mb-4">
                                        <label for="">Contact Number:</label>
                                        <input type="tel" name="contact" class="form-control">
                                    </div>
                                    <label for="">Address</label>
                                    <textarea name="address" rows="2" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="mb-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title">
                                            Service/Plan:
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-4">
                                            <label for="">Plan:</label>
                                            <select name="plan_id" class="form-select">
                                                <option value="" selected disabled></option>
                                                @foreach($plans as $plan)
                                                <option value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-4">
                                            <label for="">Package:</label>
                                            <select name="package_id" class="form-select">
                                                <option value="" selected disabled></option>
                                                @foreach($packages as $package)
                                                <option value="{{ $package->id }}">{{ $package->package_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success px-4">Add Member</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger px-4">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>