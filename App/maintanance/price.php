<?php
$from = isset($_GET['From']) ? $_GET['From'] : '';
$to = isset($_GET['To']) ? $_GET['To'] : '';
?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- /.card -->
                <br>
                <div class="card card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Schedule Report</h5>
                    </div>
                    <button type="button" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#modal-pr">
                        <span class="fas fa-plus"></span> Add New
                    </button>
                    <div class="card-body">
                        <form action="" id="filter-form">
                            <div class="row align-items-end">
                                <div class="form-group col-md-3">
                                    <label for="From">From</label>
                                    <select class="form-control form-control-sm" name="From" id="fromDropdown">
                                        <option value="">-- Select From --</option>
                                        <?php
                                        // Ambil data lokasi dari database
                                        $port_qry = $koneksi->query("SELECT * FROM port_list ORDER BY name ASC");
                                        while ($row = $port_qry->fetch_assoc()) {
                                            // Tampilkan opsi dropdown
                                            echo "<option value='{$row['id']}'>{$row['name']} [{$row['location']}]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="To">To</label>
                                    <select class="form-control form-control-sm" name="To" id="toDropdown">
                                        <option value="">-- Select To --</option>
                                        <?php
                                        // Ambil data lokasi dari database
                                        $port_qry = $koneksi->query("SELECT * FROM port_list ORDER BY name ASC");
                                        while ($row = $port_qry->fetch_assoc()) {
                                            // Tampilkan opsi dropdown
                                            echo "<option value='{$row['id']}'>{$row['name']} [{$row['location']}]</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-1">
                                    <button class="btn btn-flat btn-block btn-primary btn-sm"><i class="fa fa-filter"></i> filter</button>
                                </div>
                                <div class="form-group col-md-1">
                                    <button class="btn btn-flat btn-block btn-success btn-sm" type="button" id="printBTN"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                        </form>

                        <div id="printable">
                            <div>
                                <h4 class="text-center m-0"></h4>
                                <h3 class="text-center m-0"><b>Price List</b></h3>
                                <hr>
                            </div>
                            <table id="example2" class="table table-bordered table-hover">
                                <colgroup>
                                    <col width="5%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="25%">
                                    <col width="15%">
                                    <col width="10%">

                                </colgroup>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date Created</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Accomodation</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $port = $koneksi->query("SELECT id, concat(`name`,'','[',`location`,']') as `route` FROM port_list");
                                    $routes = array_column($port->fetch_all(MYSQLI_ASSOC), 'route', 'id');
                                    $accommodation_list = $koneksi->query("SELECT id, concat(`accommodation`,'','[',`description`,']') as `accommodation` FROM accommodations");
                                    $accommodation = array_column($accommodation_list->fetch_all(MYSQLI_ASSOC), 'accommodation', 'id');
                                    $qry = $koneksi->query("SELECT DISTINCT s.id, s.*, s.id_lokasi_awal, s.id_lokasi_tujuan, s.accommodation_id, s.price
                                FROM price s 
                                WHERE 
                                    (s.id_lokasi_awal = '{$from}' OR '{$from}' = '') 
                                    AND (s.id_lokasi_tujuan = '{$to}' OR '{$to}' = '') 
                                ");

                                    while ($row = $qry->fetch_assoc()) :
                                    ?>
                                        <tr>
                                            <td class="text-center"><?php echo $i++; ?></td>
                                            <td><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
                                            <td><?php echo $routes[$row['id_lokasi_awal']] ?></td>
                                            <td><?php echo $routes[$row['id_lokasi_tujuan']] ?></td>
                                            <td><?php echo $accommodation[$row['accommodation_id']] ?></td>
                                            <td>Rp. <?php echo $row['price'] ?></td>
                                            <td align="center">
                                                <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                    Action
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item edit_data" href="index.php?page=edit_price&& id=<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Edit</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item delete_data" href="javascript:void(0)" onclick="hapus_data(<?php echo $row['id'] ?>)"> <span class="fa fa-trash text-danger"></span> Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endwhile; ?>
                                    <?php if ($qry->num_rows <= 0) : ?>
                                        <tr>
                                            <td class="text-center" colspan="6">No Data...</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Date Created</th>
                                        <th>From</th>
                                        <th>To</th>
                                        <th>Accomodation</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
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
            e.preventDefault();
            var fromValue = $('#fromDropdown').val(); // Ambil nilai dropdown "From"
            var toValue = $('#toDropdown').val(); // Ambil nilai dropdown "To"
            location.href = "./?page=price&From=" + fromValue + "&To=" + toValue; // Redirect dengan nilai dropdown
        });
    });

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
<div class="modal fade" id="modal-pr" style="margin-left: 45px;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Price</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="create/create_price.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
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
                    <hr>
                    <?php $accom_qry = $koneksi->query("SELECT * FROM accommodations order by `accommodation` asc "); ?>
                    <div class="form-group">
                        <label for="accommodation" class="control-label">Ticket List</label>
                        <select name="accommodation" id="accommodation" class="custom-select custom-select-sm rounded-0 select2" required>
                            <option value="" disabled <?php echo !isset($accommodation) ? "selected" : '' ?>></option>
                            <?php
                            while ($row = $accom_qry->fetch_assoc()) :
                            ?>
                                <option value="<?php echo $row['id'] ?>" <?php echo isset($accommodation) && $accommodation == $row['id'] ? 'selected' : '' ?>><?php echo $row['accommodation'] . ' ' . "[" . $row['description'] . "]" ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="accommodation" class="control-label">Price</label>
                        <input name="price" id="" cols="30" rows="2" class="form-control form no-resize" required>
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