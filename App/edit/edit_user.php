<br>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <?php
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    $qry = $koneksi->query("SELECT * from `users` where id = '{$_GET['id']}' ");
                    if ($qry->num_rows > 0) {
                        foreach ($qry->fetch_assoc() as $k => $v) {
                            $$k = $v;
                        }
                    }
                }
                ?>
                <!-- /.card -->
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Schedule</h3>
                    </div>
                    <div class="card-body">
                        <form action="update/update_user.php" id="user-form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                            <div class="form-group">
                                <label for="name">NIK</label>
                                <input type="text" name="NIK" id="NIK" class="form-control" value="<?php echo isset($NIK) ? $NIK : '' ?>" required>
                                <small id="nik-error" class="text-danger"></small> <!-- Menampilkan pesan error untuk NIK -->
                            </div>
                            <div class="form-group">
                                <label for="name">First Name</label>
                                <input type="text" name="firstname" id="firstname" class="form-control" value="<?php echo isset($firstname) ? $firstname : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Last Name</label>
                                <input type="text" name="lastname" id="lastname" class="form-control" value="<?php echo isset($lastname) ? $lastname : '' ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" value="<?php echo isset($username) ? $username : '' ?>" required autocomplete="off">
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
                                <label for="type">Login Type</label>
                                <select name="type" id="type" class="custom-select" required>
                                    <option value="admin" <?php echo isset($type) && $type == 'admin' ? 'selected' : '' ?>>Administrator</option>
                                    <option value="staff" <?php echo isset($type) && $type == 'staff' ? 'selected' : '' ?>>Staff</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="img" class="control-label">Avatar</label>
                                <div class="custom-file" style="margin-bottom: 10px;">
                                    <input type="file" class="custom-file-input" id="custom-file" name="img" onchange="displayuser(this, $(this))">
                                    <label class="custom-file-label" for="img">Choose File</label>
                                </div>
                                <img id="img-u" src="image/<?php echo isset($avatar) ? $avatar : '' ?>" alt="Preview Cover" class="img-fluid img-thumbnail">
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-flat btn-primary" form="user-form">Save</button>
                        <a class="btn btn-flat btn-default" href="?page=ship">Cancel</a>
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

<style>
    #img-u {
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