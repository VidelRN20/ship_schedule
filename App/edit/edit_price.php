<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $qry = $koneksi->query("SELECT * from `price` where id = '{$_GET['id']}' ");
                    if ($qry->num_rows > 0) {
                        foreach ($qry->fetch_assoc() as $k => $v) {
                            $$k = stripslashes($v);
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
                        <form action="update/update_price.php" method="POST" id="price-form">
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <div class="form-group row">
                                <?php $port_qry = $koneksi->query("SELECT * FROM port_list order by `name` asc "); ?>
                                <div class="col-md-6">
                                    <label for="port_from_id">From</label>
                                    <select name="port_from_id" id="port_from_id" class="custom-select custom-select-sm rounded-0 select2" required>
                                        <option value="" disabled <?php echo !isset($port_from_id) ? "selected" : '' ?>></option>
                                        <?php
                                        while ($row = $port_qry->fetch_assoc()) :
                                        ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($port_from_id) && $port_from_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] . ' ' . "[" . $row['location'] . "]" ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <?php $port_qry = $koneksi->query("SELECT * FROM port_list order by `name` asc "); ?>
                                <div class="col-md-6">
                                    <label for="port_to_id">Destination</label>
                                    <select name="port_to_id" id="port_to_id" class="custom-select custom-select-sm rounded-0 select2" required>
                                        <option value="" disabled <?php echo !isset($port_to_id) ? "selected" : '' ?>></option>
                                        <?php
                                        $port_qry = $koneksi->query("SELECT * FROM port_list order by `name` asc ");
                                        while ($row = $port_qry->fetch_assoc()) :
                                        ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($port_to_id) && $port_to_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] . ' ' . "[" . $row['location'] . "]" ?></option>
                                        <?php endwhile; ?>
                                    </select>

                                </div>
                            </div>
                            <hr>
                            <?php $accom_qry = $koneksi->query("SELECT * FROM accommodations order by `accommodation` asc "); ?>
                            <div class="form-group">
                                <label for="accommodation" class="control-label">Ticket List</label>
                                <select name="accommodation" id="accommodation" class="custom-select custom-select-sm rounded-0 select2" required>
                                    <option value="" disabled <?php echo !isset($accommodation) ? "selected" : '' ?>></option>
                                    <?php
                                    while ($row = $accom_qry->fetch_assoc()) :
                                    ?>
                                        <option value="<?php echo $row['id'] ?>" <?php echo isset($accommodation) && $accommodation == $row['id'] ? 'selected' : '' ?>><?php echo $row['accommodation'] . ' ' . "[" . $row['description'] . "]" ?></option>
                                    <?php endwhile; ?>
                                </select>

                            </div>
                            <div class="form-group">
                                <label for="accommodation" class="control-label">Price</label>
                                <input name="price" id="" cols="30" rows="2" class="form-control form no-resize" value="<?php echo isset($price) ? $price : ''; ?>" required>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-flat btn-primary" form="price-form">Save</button>
                                <a class="btn btn-flat btn-default" href="?page=price">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>