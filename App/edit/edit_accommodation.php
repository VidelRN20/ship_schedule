<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $qry = $koneksi->query("SELECT * from `accommodations` where id = '{$_GET['id']}' ");
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
                    <form action="update/update_accommodation.php" method="POST" id="accommodation-form">
                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>" required>
                        <div class="form-group">
                            <label for="accommodation" class="control-label">Ticket List</label>
                            <input name="accommodation" id="" cols="30" rows="2" class="form-control form no-resize" value="<?php echo isset($accommodation) ? $accommodation : ''; ?>">
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label">Description</label>
                            <textarea name="description" id="" cols="30" rows="3" class="form-control form no-resize" required><?php echo isset($description) ? $description : ''; ?></textarea>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-flat btn-primary" form="accommodation-form">Save</button>
                            <a class="btn btn-flat btn-default" href="?page=accomodation">Cancel</a>
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