<?php
$id = $_SESSION["ssUser"];
$queryuser = mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$id'");
$profile = mysqli_fetch_array($queryuser);
?>
<style>
    img#cimg {
        height: 30vh;
        width: 30vh;
        object-fit: cover;
        border-radius: 100% 100%;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">My Account</h3>
                    </div>
                    <div class="card-body">
                        <form action="update/update_account.php" id="user-form" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="hidden" name="id" value="<?php echo $profile['id']; ?>">
                                <label for="name">NIK</label>
                                <input type="text" name="NIK" id="NIK" class="form-control" value="<?php echo $profile['NIK']; ?>" readonly>
                                <small id="nik-error" class="text-danger"></small> <!-- Menampilkan pesan error untuk NIK -->
                            </div>
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo $profile['firstname']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo $profile['lastname']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="<?php echo $profile['username']; ?>" required autocomplete="off" readonly>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control" value="" readonly>
                            </div>
                            <div class="form-group">
                                <button type="button" id="changePasswordBtn" class="btn btn-primary">Ganti Password</button>
                                <button type="button" id="cancelPasswordBtn" class="btn btn-secondary" style="display: none;">Cancel</button>
                            </div>
                            <div class="form-group">
                                <label for="customFile" class="control-label">Avatar</label>
                                <div class="custom-file" style="margin-bottom: 30px;">
                                    <input type="file" class="custom-file-input" id="img" name="img" onchange="displayImg2(this, $(this))">
                                    <label class="custom-file-label" for="img">Choose File</label>
                                </div>
                                <img id="cimg" src="image/<?php echo $profile['avatar']; ?>" alt="Preview Logo" class="img-fluid img-thumbnail" style="display: block; margin: 0 auto;">
                            </div>
                            <div class="form-group col-6 d-flex justify-content-center">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-flat btn-primary" form="user-form">Update</button>
                        <a class="btn btn-flat btn-default" href="?page=dashboard">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- container-fluid -->
</section>
<script>
    // Function to update file label with selected filename
    function displayImg2(input, _this) {
        if (input.files && input.files[0]) {
            var fileName = input.files[0].name;
            _this.siblings('.custom-file-label').html(fileName);
        } else {
            _this.siblings('.custom-file-label').html('Choose file');
        }
    }
    document.addEventListener("DOMContentLoaded", function() {
        var password = document.getElementById("password");
        var confirm_password = document.getElementById("confirm_password");
        var changePasswordBtn = document.getElementById("changePasswordBtn");
        var cancelPasswordBtn = document.getElementById("cancelPasswordBtn");
        var prevPassword = password.value;
        var prevConfirmPassword = confirm_password.value;

        function togglePasswordInputs(editable) {
            password.readOnly = !editable;
            confirm_password.readOnly = !editable;
        }

        changePasswordBtn.addEventListener("click", function() {
            togglePasswordInputs(true);
            cancelPasswordBtn.style.display = "inline-block";
        });

        cancelPasswordBtn.addEventListener("click", function() {
            password.value = prevPassword;
            confirm_password.value = prevConfirmPassword;
            togglePasswordInputs(false);
            cancelPasswordBtn.style.display = "none";
        });

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