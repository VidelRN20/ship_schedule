<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <br>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Table Schedule Today</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <colgroup>
                                <col width="5%">
                                <col width="25%">
                                <col width="25%">
                                <col width="25%">
                                <col width="10%">
                                <col width="10%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Schedule</th>
                                    <th>Vessel</th>
                                    <th>Route</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 1;
                                $port = $koneksi->query("SELECT id, concat(`name`,'[',`location`,']') as `route` FROM port_list");
                                $routes = array_column($port->fetch_all(MYSQLI_ASSOC), 'route', 'id');
                                $vessel = $koneksi->query("SELECT id, concat(`id_code`,' - ',`name`) as `vessel` FROM `ship_list` ");
                                $vessels = array_column($vessel->fetch_all(MYSQLI_ASSOC), 'vessel', 'id');
                                $current_date = date('Y-m-d');
                                $qry = $koneksi->query("SELECT * FROM `schedules` WHERE DATE(departure_datetime) = '$current_date' OR DATE(arrival_datetime) = '$current_date' ORDER BY UNIX_TIMESTAMP(departure_datetime) DESC, UNIX_TIMESTAMP(arrival_datetime) DESC");

                                $i = 1;
                                while ($row = $qry->fetch_assoc()) :
                                    // Tetapkan variabel untuk tanggal dan waktu keberangkatan dan kedatangan
                                    $departure_date = date("M d,Y h:i A", strtotime($row['departure_datetime']));
                                    $arrival_date = date("M d,Y h:i A", strtotime($row['arrival_datetime']));
                                ?>
                                    <tr>
                                        <td class="text-center"><?php echo $i++; ?></td>
                                        <td>
                                            <small><b>Departure:</b> <?php echo date("M d,Y h:i A", strtotime($row['departure_datetime'])) ?></small><br>
                                            <small><b>Arrival:</b> <?php echo date("M d,Y h:i A", strtotime($row['arrival_datetime'])) ?></small>
                                        </td>
                                        <td><?php echo isset($vessels[$row['ship_id']]) ? $vessels[$row['ship_id']] : 'Unknown'; ?></td>
                                        <td>
                                            <small><b>From:</b> <?php echo isset($routes[$row['port_from_id']]) ? $routes[$row['port_from_id']] : 'Unknown'; ?></small><br>
                                            <small><b>To:</b> <?php echo isset($routes[$row['port_to_id']]) ? $routes[$row['port_to_id']] : 'Unknown'; ?></small>
                                        </td>
                                        <td class="text-center">
                                            <?php
                                            if ($row['schedule_status'] == 'scheduled') {
                                                echo '<span class="badge badge-info">Scheduled</span>';
                                            } elseif ($row['schedule_status'] == 'on time') {
                                                echo '<span class="badge badge-warning">On Time</span>';
                                            } elseif ($row['schedule_status'] == 'delayed') {
                                                echo '<span class="badge badge-warning">Delayed</span>';
                                            } elseif ($row['schedule_status'] == 'cancelled') {
                                                echo '<span class="badge badge-danger">Cancelled</span>';
                                            } elseif ($row['schedule_status'] == 'boarding') {
                                                echo '<span class="badge badge-primary">Boarding</span>';
                                            } elseif ($row['schedule_status'] == 'departed') {
                                                echo '<span class="badge badge-success">Departed</span>';
                                            } elseif ($row['schedule_status'] == 'arrived') {
                                                echo '<span class="badge badge-success">Arrived</span>';
                                            } elseif ($row['schedule_status'] == 'sailing') {
                                                echo '<span class="badge badge-primary">At Sea</span>';
                                            } elseif ($row['schedule_status'] == 'finished') {
                                                echo '<span class="badge badge-success">Finished</span>';
                                            } else {
                                                echo '<span class="badge badge-secondary">Unknown</span>';
                                            }
                                            ?>
                                        </td>
                                        <td align="center">
                                            <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                Action
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu" role="menu">
                                                <a class="dropdown-item" href="index.php?page=edit_schedule&& id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete_data" href="javascript:void(0)" onclick="hapus_data(<?php echo $row['id'] ?>)"><span class="fa fa-trash text-danger"></span> Delete</a>
                                            </div>
                                        </td>
                                    </tr>

                                <?php endwhile; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Schedule</th>
                                    <th>Vessel</th>
                                    <th>Route</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->


                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>