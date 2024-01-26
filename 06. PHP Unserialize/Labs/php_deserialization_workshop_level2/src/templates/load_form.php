<form action="?action=load" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-8">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile" name="data" required>
                <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
        </div>
        <div class="col-4">
            <button type="submit" class="btn btn-secondary">Load student</button>
        </div>
    </div>
</form>
<div class="row mb-2">
    <div class="col-6">
        <a class="btn btn-success" href="?action=save" role="button">Save student</a>
    </div>
    <div class="col-6">
        <a class="btn btn-danger" href="?action=clear" role="button">Clear data</a>
    </div>
</div>