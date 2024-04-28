<br>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Table Accommodation</h3>
					</div>
					<button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-a">
						<span class="fas fa-plus"></span> Add New
					</button>
					<!-- /.card-header -->
					<div class="card-body">
						<div class="form-group col-md-1" style="top: 20px; left: 5px;">
							<button class="btn btn-flat btn-block btn-success btn-sm" type="button" id="printBTN"><i class="fa fa-print"></i> Print</button>
						</div>
						<div id="printable">
							<div>
								<h4 class="text-center m-0"></h4>
								<h3 class="text-center m-0"><b>Accommodation List</b></h3>
								<hr>
							</div>
							<table id="example2" class="table table-bordered table-hover">
								<colgroup>
									<col width="5%">
									<col width="25%">
									<col width="30%">
									<col width="30%">
									<col width="10%">

								</colgroup>
								<thead>
									<tr>
										<th>#</th>
										<th>Date Created</th>
										<th>Ticket For</th>
										<th>Description</th>
										<th>Action</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$qry = $koneksi->query("SELECT * from `accommodations`  order by `accommodation` asc ");
									while ($row = $qry->fetch_assoc()) :
									?>
										<tr>
											<td class="text-center"><?php echo $i++; ?></td>
											<td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
											<td><?php echo $row['accommodation'] ?></td>
											<td><?php echo $row['description'] ?></td>
											<td align="center">
												<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
													Action
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu" role="menu">
													<a class="dropdown-item edit_data" href="index.php?page=edit_accommodation&& id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item delete_data" href="javascript:void(0)" onclick="hapus_data(<?php echo $row['id'] ?>)"> <span class="fa fa-trash text-danger"></span> Delete</a>
												</div>
											</td>
										</tr>
									<?php endwhile; ?>
								</tbody>
								<tfoot>
									<tr>
										<th>#</th>
										<th>Date Created</th>
										<th>Ticket For</th>
										<th>Description</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.card -->
			</div>
			<!-- /.col -->
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
				window.location = "delete/delete.php?id=" + data_id + "&table=accommodations";
				Swal.fire({
					title: "Deleted!",
					text: "Your file has been deleted.",
					icon: "success"
				});
			}
		});
	}

	$('#printBTN').click(function() {
		var rep = $('#printable').clone();
		var ns = $('noscript').clone().html();
		rep.prepend(ns);

		// Hapus kolom Action dan navigasi tabel
		rep.find('table thead th:last-child').remove();
		rep.find('table tbody td:last-child').remove();
		rep.find('table tfoot th:last-child').remove();

		// Atur ulang batas dan padding
		rep.find('table th:nth-child(4), table td:nth-child(4), table th:nth-child(5), table td:nth-child(5)').css({
			'border-right': 'none',
			'padding-right': '0'
		});

		rep.find('table th:nth-child(3), table td:nth-child(3)').css({
			'border-right': '1px solid gray',
			'padding-right': '10px'
		});

		// Hapus navigasi Previous dan Next
		rep.find('.dataTables_paginate').remove();

		var nw = window.document.open('', '_blank', 'width=900,height=600');
		nw.document.write(rep.html());
		nw.document.close();
		nw.print();
		setTimeout(function() {
			nw.close();
		}, 500);
	});
</script>

<div class="modal fade" id="modal-a" style="margin-left: 45px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Accomodation</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="create/create_accommodation.php" method="POST">
				<div class="modal-body">
					<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
					<div class="form-group">
						<label for="accommodation" class="control-label">Ticket List</label>
						<input name="accommodation" id="" cols="30" rows="2" class="form-control form no-resize" required></input>
					</div>
					<div class="form-group">
						<label for="description" class="control-label">Description</label>
						<textarea name="description" id="" cols="30" rows="3" class="form-control form no-resize" required></textarea>
					</div>
					<div class="modal-footer justify-content-between">
						<button type="submit" class="btn btn-primary">Simpan</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Batal</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>