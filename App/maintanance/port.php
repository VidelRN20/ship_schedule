<br>
<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Table Port</h3>
					</div>
					<button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-p">
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
								<h3 class="text-center m-0"><b>Port List</b></h3>
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
										<th>Date Create</th>
										<th>Name</th>
										<th>Location</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$i = 1;
									$qry = $koneksi->query("SELECT * from `port_list`  order by `name` asc ");
									while ($row = $qry->fetch_assoc()) :
									?>
										<tr>
											<td class="text-center"><?php echo $i++; ?></td>
											<td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
											<td><?php echo $row['name'] ?></td>
											<td><?php echo $row['location'] ?></td>
											<td align="center">
												<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
													Action
													<span class="sr-only">Toggle Dropdown</span>
												</button>
												<div class="dropdown-menu" role="menu">
													<a type="button" class="dropdown-item view-data-port" data-toggle="modal" data-target="#modal-view" data-nama="<?php echo $row['name'] ?>" data-location="<?php echo $row['location'] ?>" data-gambar="<?php echo $row['gambar'] ?>"><span class="fa fa-info-circle text-primary"></span> View</a>
													<div class=" dropdown-divider"></div>
													<a class="dropdown-item edit_data" href="index.php?page=edit_port&& id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
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
										<th>Name</th>
										<th>Location</th>
										<th>Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
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
				window.location = "delete/delete.php?id=" + data_id + "&table=port_list";
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

<div class="modal fade" id="modal-p" style="margin-left: 45px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Port</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="create/create_port.php?" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="id">
					<div class="form-group">
						<label for="name" class="control-label">Port Name</label>
						<input type="text" id="name" name="name" cols="20" rows="2" class="form-control form no-resize" required></input>
					</div>
					<div class="form-group">
						<label for="location" class="control-label">Location</label>
						<input type="text" id="location" name="location" cols="20" rows="2" class="form-control form no-resize" required></input>
					</div>
					<div class="form-group">
						<label for="custom-file" class="control-label">Avatar</label>
						<div class="custom-file" style="margin-bottom: 10px;">
							<input type="file" class="custom-file-input" id="custom-file" name="img" onchange="displayport(this, $(this))">
							<label class="custom-file-label" for="custom-file">Choose File</label>
						</div>
						<img id="img-p" src="" alt="Preview Cover" class="img-fluid img-thumbnail">
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
<section>
	<div class="modal fade" id="modal-view" style="margin-left: 45px;">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Port</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form enctype="multipart/form-data">
					<div class="modal-body" id="hasil-view-data-port">

				</form>
			</div>
			</form>
		</div>
	</div>
</section>