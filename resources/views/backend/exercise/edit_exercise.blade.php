<form action="" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="editExercise" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Add Exercise
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" name="id" id="id">
                            <label for="">Image</label>
                            <input type="file" name="muscle_image" id="image" class="form-control"
                                onchange="previewImage()">
                        </div>
                        <div class="col-md-6">
                            <img id="preview" src="#" alt="Preview"
                                style="display: none; max-width: 300px; max-height: 300px;">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Name</label>
                            <input type="text" name="muscle_name" id="name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Group</label>
                            <input type="text" name="muscle_group" id="group" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Description</label>
                            <textarea name="muscle_description" id="description" rows="7"
                                class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class=" modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
function previewImage() {
    var preview = document.getElementById('preview');
    var fileInput = document.getElementById('image');
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