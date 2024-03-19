<div class="modal fade" id="addExer" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('add.exer') }}" method="post" enctype="multipart/form-data">
                <div class="modal-header">
                    <h4>Add Exercise</h4>
                </div>
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-xl-6">
                            <label for="">Image:</label>
                            <input type="file" name="exer_image" id="exer_image" class="form-control"
                                onchange="previewImg()">
                        </div>
                        <div class="col-md-6">
                            <img src="#" alt="preview" id="preview"
                                style="display: none; max-width: 100%; max-height: auto;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="exer_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Description</label>
                            <input type="text" name="exer_desc" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success px-4">Add Exercise</button>
                    <button type="button" class="btn btn-danger px-4" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function previewImg() {
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('exer_image')
    var file = fileInput.files[0];
    var reader = new FileReader();

    reader.onloadend = function() {
        preview.src = reader.result;
        preview.style.display = 'block';
    }

    if (file) {
        reader.readAsDataURL(file);
    } else {
        preview.src = '#';
        preview.style.display = 'none';
    }
}
</script>