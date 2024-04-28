<style>
	table td,
	table th {
		padding: 3px !important;
	}
</style>
<?php
$date_start = isset($_GET['date_start']) ? $_GET['date_start'] :  date("Y-m-d", strtotime(date("Y-m-d") . " -7 days"));
$date_end = isset($_GET['date_end']) ? $_GET['date_end'] :  date("Y-m-d");
?>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<!-- /.card -->
				<br>
				<div class="card card-primary card-outline">
					<div class="card-header">
						<h5 class="card-title">Schedule Report</h5>
					</div>
					<div class="card-body">
						<form action="" id="filter-form">
							<div class="row align-items-end">
								<div class="form-group col-md-3">
									<label for="date_start">Date Start</label>
									<input type="date" class="form-control form-control-sm" name="date_start" value="<?php echo date("Y-m-d", strtotime($date_start)) ?>">
								</div>
								<div class="form-group col-md-3">
									<label for="date_start">Date End</label>
									<input type="date" class="form-control form-control-sm" name="date_end" value="<?php echo date("Y-m-d", strtotime($date_end)) ?>">
								</div>
								<div class="form-group col-md-1">
									<button class="btn btn-flat btn-block btn-primary btn-sm"><i class="fa fa-filter"></i> filter</button>
								</div>
								<div class="form-group col-md-1">
									<button class="btn btn-flat btn-block btn-success btn-sm" type="button" id="printBTN"><i class="fa fa-print"></i> Print</button>
								</div>
							</div>
						</form>
						<hr>
						<div id="printable">
							<div>
								<h4 class="text-center m-0"></h4>
								<h3 class="text-center m-0"><b>Schedule Report</b></h3>
								<p class="text-center m-0">Date Between <?php echo $date_start ?> and <?php echo $date_end ?></p>
								<hr>
							</div>
							<table class="table table-bordered">
								<colgroup>
									<col width="5%">
									<col width="35%">
									<col width="30%">
									<col width="30%">

								</colgroup>
								<thead>
									<tr>
										<th>#</th>
										<th>Schedule</th>
										<th>Vessel</th>
										<th>Route</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$port = $koneksi->query("SELECT id, concat(`name`,'[',`location`,']') as `route` FROM port_list");
									$routes = array_column($port->fetch_all(MYSQLI_ASSOC), 'route', 'id');
									$vessel = $koneksi->query("SELECT id, concat(`id_code`,' - ',`name`) as `vessel` FROM `ship_list` ");
									$vessels = array_column($vessel->fetch_all(MYSQLI_ASSOC), 'vessel', 'id');
									$qry = $koneksi->query("SELECT DISTINCT s.id, s.*, s.ship_id, s.departure_datetime, s.arrival_datetime, s.port_from_id, s.port_to_id 
                        FROM schedules s 
                        WHERE 
                            (DATE(s.departure_datetime) BETWEEN '{$date_start}' AND '{$date_end}' OR DATE(s.arrival_datetime) BETWEEN '{$date_start}' AND '{$date_end}') 
                        ORDER BY UNIX_TIMESTAMP(s.departure_datetime) ASC, UNIX_TIMESTAMP(s.arrival_datetime) ASC
                    ");

									while ($row = $qry->fetch_assoc()) :
									?>
										<tr>
											<td class="text-center"><?php echo $i++ ?></td>
											<td>
												<small><b>Departure:</b> <?php echo date("M d,Y H:i", strtotime($row['departure_datetime'])) ?></small><br>
												<small><b>Arrival:</b> <?php echo date("M d,Y H:i", strtotime($row['arrival_datetime'])) ?></small>
											</td>
											<td>
												<small><?php echo $vessels[$row['ship_id']] ?></small>
											</td>
											<td>
												<small><b>Departure:</b> <?php echo $routes[$row['port_from_id']] ?></small><br>
												<small><b>Destination:</b> <?php echo $routes[$row['port_to_id']] ?></small>
											</td>
										</tr>
									<?php endwhile; ?>
									<?php if ($qry->num_rows <= 0) : ?>
										<tr>
											<td class="text-center" colspan="6">No Data...</td>
										</tr>
									<?php endif; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- /.card -->
		</div>
		<!-- /.row -->
	</div>
	<!-- /.container-fluid -->
</section>
<noscript>
	<style>
		.m-0 {
			margin: 0;
		}

		.text-center {
			text-align: center;
		}

		.text-right {
			text-align: right;
		}

		.table {
			border-collapse: collapse;
			width: 100%
		}

		.table tr,
		.table td,
		.table th {
			border: 1px solid gray;
		}
	</style>
</noscript>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	$(document).ready(function() {
		$('#filter-form').submit(function(e) {
			e.preventDefault()
			location.href = "./?page=report&date_start=" + $('[name="date_start"]').val() + "&date_end=" + $('[name="date_end"]').val()
		})

		$('#printBTN').click(function() {
			var rep = $('#printable').clone();
			var ns = $('noscript').clone().html();
			rep.prepend(ns);
			var nw = window.document.open('', '_blank', 'width=900,height=600');
			nw.document.write(rep.html());
			nw.document.close();
			nw.print();
			setTimeout(function() {
				nw.close();
			}, 500);
		});
	});
</script>