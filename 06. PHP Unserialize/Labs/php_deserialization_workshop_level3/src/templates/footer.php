<script>
    $('#customFile').on('change', function () {
        //get the file name
        var fileName = $(this).val();
        //replace the "Choose file" label
        $(this).next('.custom-file-label').html(fileName);
    })
</script>
</div>