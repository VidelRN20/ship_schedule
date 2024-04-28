<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <?php
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $qry = $koneksi->query("SELECT * from `schedules` where id = '{$_GET['id']}' ");
                    if ($qry->num_rows > 0) {
                        foreach ($qry->fetch_assoc() as $k => $v) {
                            $$k = stripslashes($v);
                        }
                    }
                }
                ?>
                <style>
                    span.select2-selection.select2-selection--single {
                        border-radius: 0;
                        padding: 0.25rem 0.5rem;
                        padding-top: 0.25rem;
                        padding-right: 0.5rem;
                        padding-bottom: 0.25rem;
                        padding-left: 0.5rem;
                        height: auto;
                    }
                </style>
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Schedule</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="update/update_schedule.php" id="schedule-form">
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="departure_datetime">Departure Date/Time</label>
                                    <input type="datetime-local" name="departure_datetime" id="departure_datetime" class="form-control form-control-sm rounded-0" value="<?php echo isset($departure_datetime) ? date("Y-m-d\\TH:i", strtotime($departure_datetime)) : "" ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="arrival_datetime">arrival Date/Time</label>
                                    <input type="datetime-local" name="arrival_datetime" id="arrival_datetime" class="form-control form-control-sm rounded-0" value="<?php echo isset($arrival_datetime) ? date("Y-m-d\\TH:i", strtotime($arrival_datetime)) : "" ?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="ship_id">Vessel</label>
                                    <select name="ship_id" id="ship_id" class="custom-select custom-select-sm rounded-0 select2" required>
                                        <option value="" disabled <?php echo !isset($ship_id) ? "selected" : '' ?>></option>
                                        <?php
                                        $ship_qry = $koneksi->query("SELECT * FROM ship_list where `status` = 1 order by `name` asc ");
                                        while ($row = $ship_qry->fetch_assoc()) :
                                        ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($ship_id) && $ship_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['id_code'] . ' - ' . $row['name'] ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <?php $port_qry = $koneksi->query("SELECT * FROM port_list order by `name` asc "); ?>
                                <div class="col-md-6">
                                    <label for="port_from_id">From</label>
                                    <select name="port_from_id" id="port_from_id" class="custom-select custom-select-sm rounded-0 select2" required>
                                        <option value="" disabled <?php echo !isset($port_from_id) ? "selected" : '' ?>></option>
                                        <?php
                                        while ($row = $port_qry->fetch_assoc()) :
                                        ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($port_from_id) && $port_from_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] . "[" . $row['location'] . "]" ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <?php $port_qry = $koneksi->query("SELECT * FROM port_list order by `name` asc "); ?>
                                <div class="col-md-6">
                                    <label for="port_to_id">Destination</label>
                                    <select name="port_to_id" id="port_to_id" class="custom-select custom-select-sm rounded-0 select2" required>
                                        <option value="" disabled <?php echo !isset($port_to_id) ? "selected" : '' ?>></option>
                                        <?php
                                        while ($row = $port_qry->fetch_assoc()) :
                                        ?>
                                            <option value="<?php echo $row['id'] ?>" <?php echo isset($port_to_id) && $port_to_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] . "[" . $row['location'] . "]" ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="custom-select custom-select-sm rounded-0 select2" required>
                                        <option value="" disabled <?php echo !isset($status) ? "selected" : '' ?>></option>
                                        <option value="scheduled" <?php echo isset($status) && $status == 'scheduled' ? 'selected' : '' ?>>Terjadwal</option>
                                        <option value="on time" <?php echo isset($status) && $status == 'on time' ? 'selected' : '' ?>>Tepat Waktu</option>
                                        <option value="delayed" <?php echo isset($status) && $status == 'delayed' ? 'selected' : '' ?>>Terlambat</option>
                                        <option value="cancelled" <?php echo isset($status) && $status == 'cancelled' ? 'selected' : '' ?>>Dibatalkan</option>
                                        <option value="boarding" <?php echo isset($status) && $status == 'boarding' ? 'selected' : '' ?>>Proses Boarding</option>
                                        <option value="departed" <?php echo isset($status) && $status == 'departed' ? 'selected' : '' ?>>Sudah Berangkat</option>
                                        <option value="arrived" <?php echo isset($status) && $status == 'arrived' ? 'selected' : '' ?>>Sudah Tiba</option>
                                        <option value="sailing" <?php echo isset($status) && $status == 'sailing' ? 'selected' : '' ?>>Di Laut</option>
                                        <option value="gate closed" <?php echo isset($status) && $status == 'gate closed' ? 'selected' : '' ?>>Pintu Masuk Tertutup</option>
                                        <option value="finished" <?php echo isset($status) && $status == 'finished' ? 'selected' : '' ?>>Selesai</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-flat btn-primary" form="schedule-form">Save</button>
                        <a class="btn btn-flat btn-default" href="?page=schedule">Cancel</a>
                    </div>
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>