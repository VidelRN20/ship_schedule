<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $qry = $koneksi->query("SELECT * from `ship_list` where id = '{$_GET['id']}' ");
                    if ($qry->num_rows > 0) {
                        foreach ($qry->fetch_assoc() as $k => $v) {
                            $$k = $v;
                        }
                    }
                }
                ?>
                <!-- /.card -->
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Schedule</h3>
                    </div>
                    <div class="card-body">
                        <form action="update/update_ship.php" method="POST" id="ship-form" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <div class="form-group">
                                <label for="id_code" class="control-label">ID Code</label>
                                <input type="text" id="id_code" name="id_code" class="form-control rounded-0" value="<?php echo isset($id_code) ? $id_code : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name" class="control-label">Vessel Name</label>
                                <input name="name" id="" cols="30" rows="2" class="form-control form no-resize" value="<?php echo isset($name) ? $name : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="description" class="control-label">Description</label>
                                <input name="description" id="" cols="30" rows="3" class="form-control form no-resize" value="<?php echo isset($description) ? $description : ''; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="status" class="control-label">Status</label>
                                <select name="status" id="status" class="custom-select selevt" required>
                                    <option value="1" <?php echo isset($status) && $status == 1 ? 'selected' : '' ?>>Active</option>
                                    <option value="0" <?php echo isset($status) && $status == 0 ? 'selected' : '' ?>>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="img" class="control-label">Avatar</label>
                                <div class="custom-file" style="margin-bottom: 10px;">
                                    <input type="file" class="custom-file-input" id="custom-file" name="img" onchange="displayship(this, $(this))">
                                    <label class="custom-file-label" for="img">Choose File</label>
                                </div>
                                <img id="img-s" src="image/<?php echo isset($gambar) ? $gambar : '' ?>" alt="Preview Cover" class="img-fluid img-thumbnail">
                            </div>
                        </form>
                        <div class="card-footer">
                            <button class="btn btn-flat btn-primary" form="ship-form">Save</button>
                            <a class="btn btn-flat btn-default" href="?page=ship">Cancel</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- container-fluid -->
</section>
<style>
    #img-s {
        height: 30vh;
        width: 30vh;
        display: block;
        margin: auto;
    }
</style>
<script>
    function displayship(input, _this) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                _this.siblings('.custom-file-label').html(input.files[0].name)
                $('#img-s').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>