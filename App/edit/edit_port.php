<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->

                <?php
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $qry = $koneksi->query("SELECT * from `port_list` where id = '{$_GET['id']}' ");
                    if ($qry->num_rows > 0) {
                        foreach ($qry->fetch_assoc() as $k => $v) {
                            $$k = $v;
                        }
                    }
                }
                ?>
                </style>
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Schedule</h3>
                    </div>
                    <div class="card-body">
                        <form action="update/update_port.php" method="POST" id="port-form" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <div class="form-group">
                                <label for="name" class="control-label">Port Name</label>
                                <input name="name" id="" cols="30" rows="2" class="form-control form no-resize" value="<?php echo isset($name) ? $name : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="location" class="control-label">Location</label>
                                <input name="location" id="" cols="30" rows="3" class="form-control form no-resize" value="<?php echo isset($location) ? $location : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="img" class="control-label">Avatar</label>
                                <div class="custom-file" style="margin-bottom: 10px;">
                                    <input type="file" class="custom-file-input" id="custom-file" name="img" onchange="displayport(this, $(this))">
                                    <label class="custom-file-label" for="img">Choose File</label>
                                </div>
                                <img id="img-p" src="image/<?php echo isset($gambar) ? $gambar : '' ?>" alt="Preview Cover" class="img-fluid img-thumbnail">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-flat btn-primary" form="port-form">Save</button>
                        <a class="btn btn-flat btn-default" href="?page=port">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- container-fluid -->
</section>
<style>
    #img-p {
        height: 30vh;
        width: 30vh;
        display: block;
        margin: auto;
    }
</style>
<script>
    function displayport(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                _this.siblings('.custom-file-label').html(input.files[0].name)
                $('#img-p').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>