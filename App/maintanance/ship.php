<br>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Table Vessel</h3>
					</div>
					<button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-s">
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
								<h3 class="text-center m-0"><b>Vessel Report</b></h3>
								<hr>
							</div>
							<table id="example2" class="table table-bordered table-hover">
								<colgroup>
									<col width="5%">
									<col width="15%">
									<col width="15%">
									<col width="25%">
									<col width="20%">
									<col width="10%">
									<col width="10%">
								</colgroup>
								<thead>
									<tr>
										<th>#</th>
										<th>Date Created</th>
										<th>ID Code</th>
										<th>Name</th>
										<th>Description</th>
										<th>Status</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$qry = $koneksi->query("SELECT * from `ship_list`  order by `name` asc ");
									while ($row = $qry->fetch_assoc()) :
									?>
										<tr>
											<td class="text-center"><?php echo $i++; ?></td>
											<td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
											<td><?php echo $row['id_code'] ?></td>
											<td><?php echo $row['name'] ?></td>
											<td>
												<p class="truncate-1 m-0"><?php echo $row['description'] ?></p>
											</td>
											<td class="text-center">
												<?php if ($row['status'] == 1) : ?>
													<span class="badge badge-success">Active</span>
												<?php else : ?>
													<span class="badge badge-danger">Inactive</span>
												<?php endif; ?>
											</td>
											<td>
												<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
													Action
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu" role="menu">
													<a type="button" class="dropdown-item view-data" data-toggle="modal" data-target="#modal-view" data-id_code="<?php echo $row['id_code'] ?>" data-nama="<?php echo $row['name'] ?>" data-description="<?php echo $row['description'] ?>" data-status="<?php echo $row['status'] ?>" data-gambar="<?php echo $row['gambar'] ?>"><span class="fa fa-info-circle text-primary"></span> View</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item edit_data" href="index.php?page=edit_ship&& id=<?php echo $row['id'] ?>" type="button" class="btn btn-flat btn-primary"><span class="fa fa-edit text-primary"></span> Edit</a>
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
										<th>ID Code</th>
										<th>Name</th>
										<th>Description</th>
										<th>Status</th>
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
				window.location = "delete/delete.php?id=" + data_id + "&table=ship_list";
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
		rep.find('table th:nth-child(6), table td:nth-child(6), table th:nth-child(7), table td:nth-child(7)').css({
			'border-right': 'none',
			'padding-right': '0'
		});

		rep.find('table th:nth-child(5), table td:nth-child(5)').css({
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

<div class="modal fade" id="modal-s" style="margin-left: 45px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Vessel</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="create/create_ship.php" enctype="multipart/form-data">
				<div class="modal-body">

					<input type="hidden" name="id">
					<div class="form-group">
						<label for="id_code" class="control-label">ID Code</label>
						<input type="text" id="id_code" name="id_code" class="form-control rounded-0" required>
					</div>
					<div class="form-group">
						<label for="name" class="control-label">Vessel Name</label>
						<input name="name" id="" cols="30" rows="2" class="form-control form no-resize" required>
					</div>
					<div class="form-group">
						<label for="description" class="control-label">Description</label>
						<textarea name="description" id="" cols="30" rows="3" class="form-control form no-resize" required></textarea>
					</div>
					<div class="form-group">
						<label for="status" class="control-label">Status</label>
						<select name="status" id="status" class="custom-select selevt">
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<div class="form-group">
						<label for="custom-file" class="control-label">Avatar</label>
						<div class="custom-file" style="margin-bottom: 10px;">
							<input type="file" class="custom-file-input" id="custom-file" name="img" onchange="displayship(this, $(this))">
							<label class="custom-file-label" for="img">Choose File</label>
						</div>
						<img id="img-s" src="" alt="Preview Cover" class="img-fluid img-thumbnail">
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
<section>
	<div class="modal fade" id="modal-view" style="margin-left: 45px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Vessel</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data">
					<div class="modal-body" id="hasil-view-data">

				</form>
			</div>
			</form>
		</div>
	</div>
</section>