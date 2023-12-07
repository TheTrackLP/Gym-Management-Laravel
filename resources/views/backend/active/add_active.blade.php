<form action="{{ route('add.actives') }}" method="post">
    @csrf
    <div class="modal fade" id="activeDetails" tabindex="-1" role="document">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Add New Active Member
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Member</label>
                        <select name="member_id" id="member_id" class="form-control">
                            <option value="" selected disabled> Select A Member</option>
                            @foreach($members as $member)
                            <option value="{{ $member->member_id }}">{{ $member->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Plan</label>
                        <select name="plan_id" id="plan_id" class="form-control">
                            <option value="" selected disabled> Select A Plan</option>
                            @foreach($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->plan_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Trainer</label>
                        <select name="trainer_id" id="trainer_id" class="form-control">
                            <option value="" selected disabled> Select A Trainer</option>
                            @foreach($trainers as $trainer)
                            <option value="{{ $trainer->member_id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Package</label>
                        <select name="package_id" id="package_id" class="form-control">
                            <option value="" selected disabled> Select A Package</option>
                            @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{$package->package_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-danger">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>