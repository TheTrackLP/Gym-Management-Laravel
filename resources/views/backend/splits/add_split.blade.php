@extends('admin.body.header')
@section('admin')
<style>
.zoom {
    transition: transform .2s;
}

.resize:hover {
    -ms-transform: scale(1.5);
    -webkit-transform: scale(1.5);
    transform: scale(1.5);
}

img {
    width: 12vw;
    height: 8vw;
}

input.larger {
    width: 50px;
    height: 50px;
}
</style>
<div class="container-fluid">
    <div class="mb-4"></div>
    <div class="card">
        <form action="{{ route('store.split') }}" method="post">
            @csrf
            <div class="card-header">
                <button type="submit" class="btn btn-success btn-lg px-4 float-end">Add Split</button>
                <h4>Add Split</h4>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-4">
                                <label for="">Name Split:</label>
                                <input type="text" name="split_name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <label for="">Description</label>
                            <textarea name="split_desc" rows="2" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="tableSplit">
                        <thead>
                            <tr>
                                <th class="text-center"><input type="checkbox" name="checkMain" id="checkMain"
                                        class="form-check-input">
                                </th>
                                <th class="text-center">Image</th>
                                <th>Name</th>
                                <th>Desc</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exer as $data)
                            <tr>
                                <td class="text-center"><input type="checkbox" name="exer_id[]"
                                        value="{{ $data->exer_name }}" class="form-check-input larger">
                                </td>
                                <td class="zoom text-center"> <img src="{{ asset('images/'. $data->exer_image) }}"
                                        class="resize" alt="{{ $data->exer_name }}" width=100 height=100>
                                </td>
                                <td>{{ $data->exer_name }}</td>
                                <td>{{ $data->exer_desc }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
$('#checkMain').click(function() {
    if ($(this).is(':checked')) {
        $('input[type=checkbox]').prop('checked', true);
    } else {
        $('input[type=checkbox]').prop('checked', false);
    }
});
</script>

@endsection