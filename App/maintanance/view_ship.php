<style>
    .img-frame {
        border: 3px solid #ccc;
        border-radius: 10px;
        padding: 5px;
        height: 210px;
    }

    .img-frame img {

        width: 100%;
        border-radius: 5px;
        height: 194px;
    }
</style>
<div class="card-body">
    <div class="card mb-3" style="max-width: 1040px;">
        <div class="row g-0" style="margin-left: 10px; margin-top: 10px;">
            <div class="col-md-4">
                <div class="img-frame" style="margin-top: 20px;;margin-right: 10px;">
                    <img src="image/<?php echo $_POST['gambar'] ?>" alt="Gambar Port" class="img-fluid rounded-start" id="img">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4><b>Vessel/Ship</b></h4>
                    <hr>
                    <div class="row">
                        <label for="id" class="col-sm-3 col-form-label">Id Code :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-0 bg-transparent" id="id" value="<?php echo $_POST['id_code'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-0 bg-transparent" id="nama" value="<?php echo $_POST['name'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="Deskripsi" class="col-sm-3 col-form-label">Deskripsi :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-0 bg-transparent" id="Deskripsi" value="<?php echo $_POST['description'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <label for="Deskripsi" class="col-sm-3 col-form-label">Status :</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control border-0 bg-transparent" id="Deskripsi" value="<?php echo ($_POST['status'] == 0) ? 'Inactive' : 'Active'; ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>