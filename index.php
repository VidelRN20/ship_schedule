<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.4.0/fonts/remixicon.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/smooth-scroll@16/dist/smooth-scroll.polyfills.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/styles.css" />
  <title>Web Sistem Informasi Penjadwalan | ASDP Kupang</title>
  <style>
    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 350px;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .travellers__card {
      border-radius: 1rem;
      overflow: hidden;
      box-shadow: 5px 5px 20px rgba(0, 0, 0, 0.2);
    }

    .travellers__card img {
      width: 100%;
      height: 80%;
    }

    .travellers__card__content {
      position: relative;
      padding: 1rem;
      text-align: center;
    }
  </style>
</head>

<body>
  <nav>
    <div class="nav__logo">ASDP Kupang</div>
    <ul class="nav__links">
      <li class="link"><a href="#home">Home</a></li>
      <li class="link"><a href="#about">About Us</a></li>
      <li class="link"><a href="#schedule">Schedule</a></li>
      <li class="link"><a href="#price">Ticket Price</a></li>
      <li class="link"><a href="#port">Port</a></li>
      <li class="link"><a href="#vessel">Vessel</a></li>
    </ul><button class="btn"><a href="#contact" style="color: white;">Contact</a></button>
  </nav>
  <script>
    var scroll = new SmoothScroll('a[href*="#"]', {
      speed: 1000
    });
  </script>

  </script>
  <?php
  include('Configurasi/config.php');
  $query_system_info = "SELECT id, meta_field, meta_value FROM system_info";
  $result_system_info = mysqli_query($koneksi, $query_system_info);
  $system_data = array();
  if ($result_system_info) {
    while ($row = mysqli_fetch_assoc($result_system_info)) {
      $system_data[$row['id']][$row['meta_field']] = $row['meta_value'];
    }
  }
  ?>
  <header id="home" class="section__container header__container">
    <h1 class="section__header">We Bridge The Nation<br>PT. ASDP INDONESIA FERRY (PERSERO) <br>KUPANG</h1><br><img style="width:400px; height:300px; border-radius: 50%; display: block; margin: auto;" src="app/image/<?php echo $system_data[4]['cover']; ?>" alt="header" />
  </header>
  <section id="about" class="section__container plan__container">
    <h2 class="section__header">About Us</h2>
    <p class="description">PT ASDP Indonesia Ferry ( Persero) atau ASDP adalah BUMN yang bergerak dalam bisnis jasa penyeberangan dan pelabuhan terintegrasi dan tujuan wisata waterfront .
      ASDP menjalankan armada ferry sebanyak lebih dari 226 unit kapal yang melayani 307 lintasan dan 36 pelabuhan di seluruh Indonesia dan mengembangkan bisnis lainnya terkait dengan pengembangan kawasan pelabuhan,
      seperti Bakauheni Harbour City di Provinsi Lampung dan Kawasan Marina Labuan Bajo di Nusa Tenggara Timur.
      <br>
    </p>
    <div class="plan__grid">
      <div class="plan__content">
        <span class="number">VISI</span>
        <p>Terdepan dalam menghubungkan masyarakat dan pasar melalui jasa penyeberangan-pelabuhan terintegrasi dan tujuan wisata waterfront. </p>
        <span class="number">MISI</span>
        <p>
          <span>1. Menciptakan dan mengoptimalkan nilai perusahaan dengan menghubungkan masyarakat dan pasar.</span><br>
          <span>2. Menekankan keunggulan operasional melalui:</span><br>
          <span class="nested-point"> • Budaya Pelayanan yang profesional dan berkualitas</span>
          <span class="nested-point"> • Fasilitas pelabuhan terintegrasi, armada dan infrastruktur yang handal</span>
          <span class="nested-point"> • Penerapan teknologi berbasis nilai</span>
          <span>3. Aktif mendukung dan berperan dalam pengembangan ekonomi melalui layanan logistik dan tujuan wisata pilihan.</span><br>
          <span>4. Secara konsisten mengedepankan keselamatan dan layanan penuh keramahan, tulus dan berkualitas.</span><br>
          <span>5. Penerapan standar lingkungan berkelanjutan.</span>
        </p>
      </div>
      <div class="plan__image"><img src="assets/plan-1.jpg" alt="plan" /><img src="assets/plan-2.jpg" alt="plan" /><img src="assets/plan-3.jpg" alt="plan" /></div>
    </div>
    <p>Informasi selengkapnya tentang kami dapat ditemukan di <a href="http://www.asdp.id">www.asdp.id</a>.</p>
  </section>
  <section id="schedule" class="section__container schedule__container">
    <h2 class="section__header">Schedule</h2>
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <br>
            <h3 class="card-title">Schedule Today</h3>
            <br>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <colgroup>
                  <col width="5%">
                  <col width="30%">
                  <col width="30%">
                  <col width="25%">
                  <col width="10%">
                </colgroup>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Schedule</th>
                    <th>Vessel</th>
                    <th>Route</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  $port = $koneksi->query("SELECT id, concat(`name`,'[',`location`,']') as `route` FROM port_list");
                  $routes = array_column($port->fetch_all(MYSQLI_ASSOC), 'route', 'id');
                  $vessel = $koneksi->query("SELECT id, concat(`id_code`,' - ',`name`) as `vessel` FROM `ship_list` ");
                  $vessels = array_column($vessel->fetch_all(MYSQLI_ASSOC), 'vessel', 'id');
                  $current_date = date('Y-m-d');
                  $qry = $koneksi->query("SELECT * FROM `schedules` WHERE DATE(departure_datetime) = '$current_date' OR DATE(arrival_datetime) = '$current_date' ORDER BY UNIX_TIMESTAMP(departure_datetime) DESC, UNIX_TIMESTAMP(arrival_datetime) DESC");
                  while ($row = $qry->fetch_assoc()) :
                    // Tetapkan variabel untuk tanggal dan waktu keberangkatan dan kedatangan
                    $departure_date = date("M d,Y h:i A", strtotime($row['departure_datetime']));
                    $arrival_date = date("M d,Y h:i A", strtotime($row['arrival_datetime']));
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td>
                        <small><b>Departure:</b> <?php echo date("M d,Y h:i A", strtotime($row['departure_datetime'])) ?></small><br>
                        <small><b>Arrival:</b> <?php echo date("M d,Y h:i A", strtotime($row['arrival_datetime'])) ?></small>
                      </td>
                      <td><?php echo isset($vessels[$row['ship_id']]) ? $vessels[$row['ship_id']] : 'Unknown'; ?></td>
                      <td>
                        <small><b>From:</b> <?php echo isset($routes[$row['port_from_id']]) ? $routes[$row['port_from_id']] : 'Unknown'; ?></small><br>
                        <small><b>To:</b> <?php echo isset($routes[$row['port_to_id']]) ? $routes[$row['port_to_id']] : 'Unknown'; ?></small>
                      </td>
                      <td class="text-center">
                        <?php
                        if ($row['schedule_status'] == 'scheduled') {
                          echo '<span class="badge text-bg-info">Scheduled</span>';
                        } elseif ($row['schedule_status'] == 'on time') {
                          echo '<span class="badge text-bg-warning">On Time</span>';
                        } elseif ($row['schedule_status'] == 'delayed') {
                          echo '<span class="badge badge-warning">Delayed</span>';
                        } elseif ($row['schedule_status'] == 'cancelled') {
                          echo '<span class="badge text-bg-danger">Cancelled</span>';
                        } elseif ($row['schedule_status'] == 'boarding') {
                          echo '<span class="badge text-bg-primary">Boarding</span>';
                        } elseif ($row['schedule_status'] == 'departed') {
                          echo '<span class="badge text-bg-success">Departed</span>';
                        } elseif ($row['schedule_status'] == 'arrived') {
                          echo '<span class="badge text-bg-success">Arrived</span>';
                        } elseif ($row['schedule_status'] == 'sailing') {
                          echo '<span class="badge text-bg-primary">At Sea</span>';
                        } elseif ($row['schedule_status'] == 'finished') {
                          echo '<span class="badge text-bg-success">Finished</span>';
                        } else {
                          echo '<span class="badge text-bg-secondary">Unknown</span>';
                        }
                        ?>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <br>
    <hr>
    <br>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <h3 class="card-title">Active Schedule</h3>
            <br>
            <!-- /.card-header -->
            <div class="card-body">
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
                    <th>Schedule</th>
                    <th>Vessel</th>
                    <th>Route</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  $port = $koneksi->query("SELECT id, concat(`name`,'[',`location`,']') as `route` FROM port_list");
                  $routes = array_column($port->fetch_all(MYSQLI_ASSOC), 'route', 'id');
                  $vessel = $koneksi->query("SELECT id, concat(`id_code`,' - ',`name`) as `vessel` FROM `ship_list` ");
                  $vessels = array_column($vessel->fetch_all(MYSQLI_ASSOC), 'vessel', 'id');
                  $current_datetime = date('Y-m-d H:i:s');

                  $qry = $koneksi->query("SELECT * FROM `schedules` WHERE (departure_datetime >= '$current_datetime' OR arrival_datetime >= '$current_datetime') ORDER BY departure_datetime ASC");
                  while ($row = $qry->fetch_assoc()) :
                  ?>
                    <tr>
                      <td class="text-center"><?php echo $i++; ?></td>
                      <td>
                        <small><b>Departure:</b> <?php echo date("M d,Y h:i A", strtotime($row['departure_datetime'])) ?></small><br>
                        <small><b>Arrival:</b> <?php echo date("M d,Y h:i A", strtotime($row['arrival_datetime'])) ?></small>
                      </td>
                      <td><?php echo isset($vessels[$row['ship_id']]) ? $vessels[$row['ship_id']] : 'Unknown'; ?></td>
                      <td>
                        <small><b>From:</b> <?php echo isset($routes[$row['port_from_id']]) ? $routes[$row['port_from_id']] : 'Unknown'; ?></small><br>
                        <small><b>To:</b> <?php echo isset($routes[$row['port_to_id']]) ? $routes[$row['port_to_id']] : 'Unknown'; ?></small>
                      </td>
                      <td class="text-center">
                        <?php
                        if ($row['schedule_status'] == 'scheduled') {
                          echo '<span class="badge text-bg-info">Scheduled</span>';
                        } elseif ($row['schedule_status'] == 'on time') {
                          echo '<span class="badge text-bg-warning">On Time</span>';
                        } elseif ($row['schedule_status'] == 'delayed') {
                          echo '<span class="badge badge-warning">Delayed</span>';
                        } elseif ($row['schedule_status'] == 'cancelled') {
                          echo '<span class="badge text-bg-danger">Cancelled</span>';
                        } elseif ($row['schedule_status'] == 'boarding') {
                          echo '<span class="badge text-bg-primary">Boarding</span>';
                        } elseif ($row['schedule_status'] == 'departed') {
                          echo '<span class="badge text-bg-success">Departed</span>';
                        } elseif ($row['schedule_status'] == 'arrived') {
                          echo '<span class="badge text-bg-success">Arrived</span>';
                        } elseif ($row['schedule_status'] == 'sailing') {
                          echo '<span class="badge text-bg-primary">At Sea</span>';
                        } elseif ($row['schedule_status'] == 'finished') {
                          echo '<span class="badge text-bg-success">Finished</span>';
                        } else {
                          echo '<span class="badge text-bg-secondary">Unknown</span>';
                        }
                        ?>
                      </td>
                    </tr>

                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
  </section>
  <br>
  <section id="price" class="section__container schedule__container">
    <?php
    $from = isset($_GET['From']) ? $_GET['From'] : '';
    $to = isset($_GET['To']) ? $_GET['To'] : '';
    ?>
    <h2 class="section__header">Ticket price</h2>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- /.card -->
            <div class="card-body">
              <form style="display:flex; align-items: center; justify-content: center;" id="filter-form">
                <div class="form__group"><span><i class="ri-map-pin-line"></i></span>
                  <div class="input__content">
                    <div class="input__group">
                      <select class="form-control form-control-sm" name="From" id="fromDropdown">
                        <option><label>-- Select From --</label></option>
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
                    <p>Darimana Kamu Berangkat?</p>
                  </div>
                </div>
                <div class="form__group"><span><i class="ri-map-pin-line"></i></span>
                  <div class="input__content">
                    <div class="input__group"><select class="form-control form-control-sm" name="To" id="toDropdown">
                        <option><label>-- Select To --</label></option>
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
                    <p>Tujuanmu Kemana?</p>
                  </div>
                </div>
                <button class="btn btn-flat btn-block btn-primary btn-sm"><i class="ri-search-line" class="fa fa-filter"></i></button>
              </form>
              <br>
              <br>
              <br>
              <table id="example2" class="table table-bordered table-hover">
                <colgroup>
                  <col width="5%">
                  <col width="20%">
                  <col width="20%">
                  <col width="40%">
                  <col width="15%">

                </colgroup>
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Accomodation</th>
                    <th>Price</th>
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
                                LEFT JOIN accommodations a ON s.accommodation_id = a.id
                                WHERE 
                                    (s.id_lokasi_awal = '{$from}' OR '{$from}' = '') 
                                    AND (s.id_lokasi_tujuan = '{$to}' OR '{$to}' = '')
                                  ORDER BY a.id ASC
                                ");
                  if (empty($from) || empty($to)) {
                    echo "<tr><td class='text-center' colspan='6'>Please select 'From' and 'To' first</td></tr>";
                  } else {
                    // Menampilkan data sesuai dengan $from dan $to
                    while ($row = $qry->fetch_assoc()) :
                  ?>
                      <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td><?php echo $routes[$row['id_lokasi_awal']] ?></td>
                        <td><?php echo $routes[$row['id_lokasi_tujuan']] ?></td>
                        <td><?php echo $accommodation[$row['accommodation_id']] ?></td>
                        <td>Rp. <?php echo $row['price'] ?></td>
                      </tr>
                    <?php endwhile;
                    // Jika tidak ada data yang ditemukan, tampilkan pesan "No Data..."
                    if ($qry->num_rows <= 0) : ?>
                      <tr>
                        <td class="text-center" colspan="6">No Data...</td>
                      </tr>
                  <?php endif;
                  } ?>
                </tbody>
              </table>
            </div>

          </div>
          <!-- /.card -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#filter-form').submit(function(e) {
          e.preventDefault();
          var fromValue = $('#fromDropdown').val(); // Ambil nilai dropdown "From"
          var toValue = $('#toDropdown').val(); // Ambil nilai dropdown "To"
          location.href = "./index.php?&From=" + fromValue + "&To=" + toValue + "#price"; // Redirect dengan nilai dropdown
        });
      });
    </script>
    <br>
    <br>
    <br>
    <br>
  </section>
  <br>
  <br>
  <?php
  $query_port = "SELECT id, gambar FROM port_list";
  $result_port = mysqli_query($koneksi, $query_port);
  $port_data = array();
  if ($result_port) {
    while ($row = mysqli_fetch_assoc($result_port)) {
      $port_data[$row['id']] = $row['gambar'];
    }
  }
  ?>
  <section id="port" class="memories">
    <div class="section__container memories__container">
      <div class="memories__header" style="display:flex; align-items: center; justify-content: center;">
        <h2 class=" section__header">Port</h2>
      </div>
      <br>
      <div class="swiper mySwiper">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <img src="App/image/<?php echo $port_data[4] ?>" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="App/image/<?php echo $port_data[4] ?>" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
          <div class="swiper-slide">
            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
            <h3 style="text-align: center;">Port 1</h3>
          </div>
        </div>
        <br>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  </section>
  <?php
  $query_vessel = "SELECT id, gambar FROM ship_list";
  $result_vessel = mysqli_query($koneksi, $query_vessel);
  $vessel_data = array();
  if ($result_vessel) {
    while ($row = mysqli_fetch_assoc($result_vessel)) {
      $vessel_data[$row['id']] = $row['gambar'];
    }
  }
  ?>
  <section id="vessel" class="section__container travellers__container">
    <h2 class="section__header">Our Vessels</h2>
    <div class="travellers__grid">
      <div class="travellers__card"><img src="App/image/<?php echo $vessel_data[1] ?>" alt="traveller" />
        <div class="travellers__card__content">
          <h4>KMP. Uma Kalada</h4>
        </div>
      </div>
      <div class="travellers__card"><img src="App/image/<?php echo $vessel_data[2] ?>" alt="traveller" />
        <div class="travellers__card__content">
          <h4>KMP. Cakalang II</h4>
        </div>
      </div>
      <div class="travellers__card"><img src="App/image/<?php echo $vessel_data[3] ?>" alt="traveller" />
        <div class="travellers__card__content">
          <h4>KMP. Ile Labalekan</h4>
        </div>
      </div>
      <div class="travellers__card"><img src="App/image/<?php echo $vessel_data[4] ?>" alt="traveller" />
        <div class="travellers__card__content">
          <h4>KMP. Inerie II</h4>
        </div>
      </div>
      <div class="travellers__card"><img src="App/image/<?php echo $vessel_data[2] ?>" alt="traveller" />
        <div class="travellers__card__content">
          <h4>KMP. Lakaan</h4>
        </div>
      </div>
      <div class="travellers__card"><img src="App/image/<?php echo $vessel_data[2] ?>" alt="traveller" />
        <div class="travellers__card__content">
          <h4>KMP. Ranaka</h4>
        </div>
      </div>
    </div>
  </section>
  <section id="contact" class="section__container travellers__container">
    <h2 class="section__header">Reach Us</h2>
    <div class="container__reach_us">
      <div class="row">
        <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
          <iframe class="w-100 rounded" width="600" height="450" style="border:0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3926.5151366138302!2d123.51714897371264!3d-10.219972810580192!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2c56997bcd1c7ad1%3A0xa1955cbf3fcd37d3!2sPT.%20ASDP%20Indonesia%20Ferry%20(Persero)%20Cabang%20Kupang!5e0!3m2!1sid!2sid!4v1714266779392!5m2!1sid!2sid" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <div class="col-lg-4 col-md-4">
          <div class="bg-white p-4 rounded mb-4">
            <h5>Call Us</h5>
            <a href="Telp: +68537750880" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-telephone-fill"></i> +68537750880</a>
            <br>
            <a href="" class="d-inline-block mb-2 text-decoration-none text-dark"><i class="bi bi-envelope-at-fill"></i> videlrichard@gmail.com</a>
          </div>
          <div class="bg-white p-4 rounded mb-4">
            <h5>Follow Us</h5>
            <a href="" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2"><i class="ri-facebook-fill"></i> Facebook</span>
            </a>
            <br>
            <a href="" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2"><i class="ri-twitter-fill"></i> Twitter</span>
            </a>
            <br>
            <a href="" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2"><i class="ri-instagram-fill"></i> Instagram</span>
            </a>
            <br>
            <a href="" class="d-inline-block mb-3">
              <span class="badge bg-light text-dark fs-6 p-2"><i class="ri-youtube-fill"></i> Youtube</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="footer">
    <div id="contact" class="section__container footer__container">
      <div class="footer__col">
        <h3>ASDP</h3>
        <P>PT ASDP Indonesia Ferry ( Persero) atau ASDP adalah BUMN yang bergerak dalam bisnis jasa penyeberangan dan pelabuhan terintegrasi dan tujuan wisata waterfront .
          ASDP Kupang menjalankan armada ferry sebanyak 6 unit kapal yang melayani perlintasan ke 9 pelabuhan.</P>
      </div>
      <div class="footer__col">
        <h4>INFORMATION</h4>
        <p><a href="#home" style="color: white;">Home</a></p>
        <p><a href="#about" style="color: white;">About Us</a></p>
        <p><a href="#schedule" style="color: white;">Schedule</a></p>
        <p><a href="#price" style="color: white;">Price</a></p>
        <p><a href="#port" style="color: white;">Port</a></p>
        <p><a href="#vessel" style="color: white;">Vessel</a></p>
      </div>
      <div class="footer__col">
        <h4>CONTACT</h4>
        <p><a href="#contact" style="color: white;">Call Us</a></p>
        <p><a href="#contact" style="color: white;">Follow Us</a></p>
      </div>
    </div>
    <div id="contact" class="section__container footer__bar">
      <p>Copyright © 2024 ASDP. All rights reserved.</p>
      <div class="socials"><span><i class="ri-facebook-fill"></i></span><span><i class="ri-twitter-fill"></i></span><span><i class="ri-instagram-line"></i></span><span><i class="ri-youtube-fill"></i></span></div>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>
</body>

</html>