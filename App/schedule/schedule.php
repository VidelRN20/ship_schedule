<br>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Table Schedule</h3>
					</div>
					<button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-s">
						<span class="fas fa-plus"></span> Add New
					</button>
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
								$qry = $koneksi->query("SELECT * FROM `schedules` ORDER BY UNIX_TIMESTAMP(departure_datetime) DESC, UNIX_TIMESTAMP(arrival_datetime) DESC");
								while ($row = $qry->fetch_assoc()) :
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
												echo '<span class="badge badge-primary">Sailing</span>';
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
<script>
	function hapus_data(data_id) {
		Swal.fire({
			title: "Are you sure?",
			text: "You won't be able to revert this!",
			icon: "warning",
			showCancelButton: true,
			confirmButtonColor: "#3085d6",
			cancelButtonColor: "#d33",
			confirmButtonText: "Yes, delete it!"
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = ("delete/delete.php?id=" + data_id + "&table=schedules");
				Swal.fire({
					title: "Deleted!",
					text: "Your file has been deleted.",
					icon: "success"
				});
			}
		});
	}
</script>

<div class="modal fade" id="modal-s" style="margin-left: 45px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Schedule</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="create/create_schedule.php?">
				<div class="modal-body">
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

						.custom-select {
							font-family: serif;
							color: black;
							font-weight: bold;
							font-size: 16px;
							/* Ubah ukuran sesuai kebutuhan */
						}
					</style>
					<div class="card card-outline card-primary">
						<div class="card-header">
							<h3 class="card-title"><?php echo isset($id) ? "Update " : "Add New " ?> Schedule</h3>
						</div>
						<div class="card-body">
							<form action="" id="schedule-form">
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
											while ($row = $port_qry->fetch_assoc()) :
											?>
												<option value="<?php echo $row['id'] ?>" <?php echo isset($port_to_id) && $port_to_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['name'] . ' ' . "[" . $row['location'] . "]" ?></option>
											<?php endwhile; ?>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<div class="col-md-6">
										<label for="status">Status</label>
										<select name="status" id="status" class="custom-select custom-select-sm rounded-0 select2" required>
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
							<button type="submit" class="btn btn-primary">Simpan</button>
							<button type="button" class="btn btn-default" data-dismiss="modal">Batal</a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>