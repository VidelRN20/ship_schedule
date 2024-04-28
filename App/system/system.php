<style>
	img#cimg {
		height: 30vh;
		width: 30vh;
		object-fit: cover;
		border-radius: 100% 100%;
	}

	img#cimg2 {
		height: 50vh;
		width: 100%;
		object-fit: contain;
		/* border-radius: 100% 100%; */
	}
</style>
<br>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<?php
				$query_system_info = "SELECT id, meta_field, meta_value FROM system_info";
				$result_system_info = mysqli_query($koneksi, $query_system_info);

				// Inisialisasi array untuk menyimpan nilai berdasarkan id dan meta_field
				$system_data = array();

				// Periksa jika query berhasil dieksekusi
				if ($result_system_info) {
					// Loop melalui hasil query
					while ($row = mysqli_fetch_assoc($result_system_info)) {
						// Menyimpan nilai berdasarkan id dan meta_field
						$system_data[$row['id']][$row['meta_field']] = $row['meta_value'];
					}
				}
				?>
				<div class="card card-outline card-primary">
					<div class="card-header">
						<h5 class="card-title">System Information</h5>

					</div>
					<div class="card-body">
						<form action="update/update_system.php" method="post" id="system-frm" enctype="multipart/form-data">
							<div id="msg" class="form-group"></div>
							<div class="form-group">
								<label for="name" class="control-label">System Name</label>
								<input type="text" class="form-control form-control-sm" name="name" id="name" value="<?php echo $system_data[1]['name']; ?>">
							</div>
							<div class=" form-group">
								<label for="short_name" class="control-label">System Short Name</label>
								<input type="text" class="form-control form-control-sm" name="short_name" id="short_name" value="<?php echo  $system_data[2]['short_name']; ?>">
							</div>

							<div class="form-group">
								<label for="" class="control-label">System Logo</label>
								<div class="custom-file" style="margin-bottom: 30px;">
									<input type="file" class="custom-file-input" id="customFile1" name="logo" onchange="displayImg(this, $(this))">
									<label class="custom-file-label" for="customFile1"><?php echo $system_data[3]['logo']; ?></label>
								</div>
								<br>
								<img id="cimg" src="image/<?php echo $system_data[3]['logo']; ?>" alt="Preview Logo" class="img-fluid img-thumbnail" style="display: block; margin: 0 auto;">
							</div>

							<div class="form-group">
								<label for="" class="control-label">Cover</label>
								<div class="custom-file" style="margin-bottom: 30px;">
									<input type="file" class="custom-file-input" id="customFile2" name="cover" onchange="displayImg2(this, $(this))">
									<label class="custom-file-label" for="customFile2"><?php echo $system_data[4]['cover']; ?></label>
								</div>
								<img id="cimg2" src="image/<?php echo $system_data[4]['cover']; ?>" alt="Preview Cover" class="img-fluid img-thumbnail">
							</div>
							<div class="card-footer">
								<div class="col-md-12">
									<div class="row">
										<button class="btn btn-sm btn-primary" type="submit">Update</button>
									</div>
								</div>
							</div>
					</div>
					</form>
				</div>


			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>
<script>
	function displayImg(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				$('#cimg').attr('src', e.target.result);
				_this.siblings('.custom-file-label').html(input.files[0].name)
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	function displayImg2(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				_this.siblings('.custom-file-label').html(input.files[0].name)
				$('#cimg2').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}

	function displayImg3(input, _this) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e) {
				_this.siblings('.custom-file-label').html(input.files[0].name)
				$('#cimg3').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
	}
	$(document).ready(function() {
		$('.summernote').summernote({
			height: 200,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
				['fontname', ['fontname']],
				['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ol', 'ul', 'paragraph', 'height']],
				['table', ['table']],
				['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
			]
		})


	})
</script>