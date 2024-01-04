<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Caesar Chiper - Enkripsi</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="Assets/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="Assets/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="Assets/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="Assets/assets/images/favicon.ico" />
<!-- Favicons -->
<link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="index.html" class="logo d-flex align-items-center">
    <img src="assets/img/logo.png" alt="">
    <span class="d-none d-lg-block">Kriptografi-Ku</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->


</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="index.php">
      <i class="bi bi-house"></i>
      <span>Home</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="Caesar.php">
      <i class="bi bi-arrow-right-square-fill"></i>
      <span>Enkripsi</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="Caesar_Deskripsi.php">
      <i class="bi bi-arrow-left-square-fill"></i>
      <span>Dekripsi</span>
    </a>
  </li><!-- End Dashboard Nav -->

    </ul>
  </li><!-- End Forms Nav -->


  

</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">

<div class="pagetitle">
  <h1>Algoritma Caesar Chiper</h1>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-10">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Inputkan dan Lihat Hasilnya!</h5>

          <!-- General Form Elements -->
          <form class="forms-sample" method="post" action="">
                                        <div class="form-group">
                                            <label for="uppercaseInput"><b>Plaintext</b></label>
                                            <input type="text" name="input_text" class="form-control" placeholder="Masukkan Plaintext" style="font-family:'Times New Roman', Times, serif">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Kunci</b></label>
                                            <input type="number" name="key" class="form-control" placeholder="Masukkan Kunci" style="font-family:'Times New Roman', Times, serif">
                                        </div>

                                        <button type="submit" name="submit1" class="btn btn-primary" style="font-family:'Times New Roman', Times, serif"><b>Proses</b></button>
                                        <br>
                                        <br>
                                        <style>
    /* Ini adalah gaya tambahan jika Anda ingin menyesuaikan tata letak atau penampilan lainnya */
    input {
      padding: 10px;
      font-size: 14px;
      text-transform: uppercase; /* Membuat semua teks menjadi huruf besar */
    }
  </style>
                                        <?php
                                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                                            if (isset($_POST['submit1'])) {
                                                $inputText = $_POST['input_text'];
                                                $key = $_POST['key'];
                                                $result = EnChiper($inputText, $key);
                                            } else if (isset($_POST['submit2'])) {
                                                $inputText = $_POST['input_text'];
                                                $key = $_POST['key'];
                                                $result = DeChiper($inputText, $key);
                                            }
                                        }

                                        function Chiper($ch, $key)
                                        {
                                            if (!ctype_alpha($ch))
                                                return $ch;
                                            $offset = ord(ctype_upper($ch) ? 'A' : 'a');
                                            return chr(fmod(((ord($ch) + $key) - $offset), 26) + $offset);
                                        }

                                        function EnChiper($input, $key)
                                        {
                                            $output = "";
                                            $inputArr = str_split($input);
                                            foreach ($inputArr as $ch)
                                                $output .= Chiper($ch, $key);
                                            return $output;
                                        }

                                        function DeChiper($input, $key)
                                        {
                                            return EnChiper($input, 26 - $key);
                                        }
                                        ?>

                                        <?php
                                        if (isset($result)) {
                                        }
                                        ?>

                                        <div class="form-group">
                                            <label><b>Hasil Enkripsi</b></label>
                                            <input type="text" name="result" value="<?php echo isset($result) ? strtoupper($result) : ''; ?>" class="form-control" style="font-family:'Times New Roman', Times, serif">
                                        </div>
                                    </form>

        </div>
      </div>

    </div>
</section>

</main><!-- End #main -->
                <!-- container-scroller -->
                <!-- plugins:js -->
                <script src="Assets/assets/vendors/js/vendor.bundle.base.js"></script>
                <!-- endinject -->
                <!-- Plugin js for this page -->
                <script src="Assets/assets/vendors/chart.js/Chart.min.js"></script>
                <script src="Assets/assets/js/jquery.cookie.js" type="text/javascript"></script>
                <!-- End plugin js for this page -->
                <!-- inject:js -->
                <script src="Assets/assets/js/off-canvas.js"></script>
                <script src="Assets/assets/js/hoverable-collapse.js"></script>
                <script src="Assets/assets/js/misc.js"></script>
                <!-- endinject -->
                <!-- Custom js for this page -->
                <script src="Assets/assets/js/dashboard.js"></script>
                <script src="Assets/assets/js/todolist.js"></script>
                <!-- End custom js for this page -->
</body>

</html>