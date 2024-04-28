<style>
	.img-avatar {
		width: 45px;
		height: 45px;
		object-fit: cover;
		object-position: center center;
		border-radius: 100%;
	}
</style>
<br>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<!-- /.card -->
				<div class="card card-outline">
					<div class="card-header">
						<h3 class="card-title">List of System Users</h3>
					</div>
					<button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-u">
						<span class="fas fa-plus"></span> Add New
					</button>
					<div class="card-body">
						<div class="container-fluid">
							<div class="container-fluid">
								<table class="table table-bordered table-stripped">
									<colgroup>
										<col width="5%">
										<col width="15%">
										<col width="20%">
										<col width="20%">
										<col width="20%">
										<col width="15%">
										<col width="5%">
									</colgroup>
									<thead>
										<tr>
											<th>#</th>
											<th>Avatar</th>
											<th>NIK</th>
											<th>Name</th>
											<th>Username</th>
											<th>Type</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$i = 1;
										$qry = $koneksi->query("SELECT *,concat(firstname,' ',lastname) as name FROM `users` WHERE id != '1'");
										while ($row = $qry->fetch_assoc()) :
										?>
											<tr>
												<td class="text-center"><?php echo $i++; ?></td>
												<td class="text-center">
													<?php if (!empty($row['avatar'])) : ?>
														<img src="image/<?php echo $row['avatar'] ?>" class="img-avatar img-thumbnail p-0 border-2" alt="user_avatar">
													<?php else : ?>
														<img src="image/1630286580_ava.jpg" class="img-avatar img-thumbnail p-0 border-2" alt="default_avatar">
													<?php endif; ?>
												</td>
												<td>
													<p class="m-0 truncate-1"><?php echo $row['NIK'] ?></p>
												</td>
												<td><?php echo ucwords($row['name']) ?></td>
												<td>
													<p class="m-0 truncate-1"><?php echo $row['username'] ?></p>
												</td>
												<td><?php
													if ($row['type'] == 'admin') {
														echo 'Administrator';
													} elseif ($row['type'] == 'staff') {
														echo 'Staff';
													} else {
														echo 'Unknown';
													}
													?>
												</td>
												<td align="center">
													<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
														Action
														<span class="sr-only">Toggle Dropdown</span>
													</button>
													<div class="dropdown-menu" role="menu">
														<a class="dropdown-item" href="index.php?page=edit_user&& id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
														<div class="dropdown-divider"></div>
														<a class="dropdown-item delete_data" href="javascript:void(0)" onclick="hapus_data(<?php echo $row['id'] ?>)"> <span class="fa fa-trash text-danger"></span> Delete</a>
													</div>
												</td>
											</tr>
										<?php endwhile; ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

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
				window.location = ("delete/delete.php?id=" + data_id + "&table=users");
				Swal.fire({
					title: "Deleted!",
					text: "Your file has been deleted.",
					icon: "success"
				});
			}
		});
	}
</script>

<div class="modal fade" id="modal-u" style="margin-left: 45px;">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Reservations</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" action="create/create_user.php?" enctype="multipart/form-data">
				<div class=" modal-body">
					<div class="card card-outline card-primary">
						<div class="card-header">
							<h3 class="card-title"><?php echo isset($id) ? "Update " : "Add New " ?> Schedule</h3>
						</div>
						<div class="card-body">
							<form action="" id="manage-user">
								<input type="hidden" name="id" value="<?php echo isset($meta['id']) ? $meta['id'] : '' ?>">
								<div class="form-group">
									<label for="name">NIK</label>
									<input type="text" name="NIK" id="NIK" class="form-control" value="<?php echo isset($meta['NIK']) ? $meta['NIK'] : '' ?>" required>
									<small id="nik-error" class="text-danger"></small> <!-- Menampilkan pesan error untuk NIK -->
								</div>
								<div class="form-group">
									<label for="name">First Name</label>
									<input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($meta['firstname']) ? $meta['firstname'] : '' ?>" required>
								</div>
								<div class="form-group">
									<label for="name">Last Name</label>
									<input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($meta['lastname']) ? $meta['lastname'] : '' ?>" required>
								</div>
								<div class="form-group">
									<label for="username">Username</label>
									<input type="text" name="username" id="username" class="form-control" value="<?php echo isset($meta['username']) ? $meta['username'] : '' ?>" required autocomplete="off">
								</div>
								<div class="form-group">
									<label for="password">Password</label>
									<input type="password" name="password" id="password" class="form-control" value="" autocomplete="off" <?php echo isset($meta['id']) ? "" : 'required' ?>>
								</div>
								<div class="form-group">
									<label for="confirm_password">Confirm Password</label>
									<input type="password" name="confirm_password" id="confirm_password" class="form-control" value="" autocomplete="off" required>
								</div>
								<div class="form-group">
									<label for="type">Login Type</label>
									<select name="type" id="type" class="custom-select">
										<option value="admin" <?php echo isset($meta['type']) && $meta['type'] == 'admin' ? 'selected' : '' ?>>Administrator</option>
										<option value="staff" <?php echo isset($meta['type']) && $meta['type'] == 'staff' ? 'selected' : '' ?>>Staff</option>
									</select>
								</div>
								<div class="form-group">
									<label for="customFile" class="control-label">Avatar</label>
									<div class="custom-file" style="margin-bottom: 10px;">
										<input type="file" class="custom-file-input" id="img" name="img" onchange="displayuser(this, $(this))">
										<label class="custom-file-label" for="img">Choose File</label>
									</div>
									<img id="img-u" src="" alt="Preview Cover" class="img-fluid img-thumbnail">
								</div>
								<div class="form-group col-6 d-flex justify-content-center">
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
<style>
	#img-u {
		height: 30vh;
		width: 30vh;
		display: block;
		margin: auto;
	}
</style>
<script>
	function displayuser(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				_this.siblings('.custom-file-label').html(input.files[0].name)
				$('#img-u').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	document.addEventListener("DOMContentLoaded", function() {
		var password = document.getElementById("password");
		var confirm_password = document.getElementById("confirm_password");

		function validatePassword() {
			if (password.value != confirm_password.value) {
				confirm_password.setCustomValidity("Passwords do not match");
			} else {
				confirm_password.setCustomValidity('');
			}
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	});
</script>