<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AES 128-CBC - Enkripsi</title>
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
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
                <a class="nav-link collapsed" href="aes.php">
                    <i class="bi bi-arrow-right-square-fill"></i>
                    <span>Enkripsi</span>
                </a>
            </li><!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="aes_Deskripsi.php">
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
            <h1>Algoritma AES 128-CBC</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <!-- General Form Elements -->
                            <form class="forms-sample" method="post" action="">
                                <div class="form-group">
                                    <label for="plaintext" class="col-sm-2 control-label">Pesan</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="Masukan Pesan" type="text"
                                            name="plaintext"
                                            value="<?= isset($_POST['plaintext']) ? $_POST['plaintext'] : '' ?>"
                                            autocomplete="off" required />
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 45px;">
                                    <label for="key" class="col-sm-2 control-label">Kunci</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" placeholder="Masukan Kunci" type="text" name="key"
                                            value="<?= isset($_POST['key']) ? $_POST['key'] : '' ?>" autocomplete="off"
                                            required />
                                    </div>
                                </div>

                                <div class="box-footer">
                                    <button type="submit" name="decrypt" value="Enkripsi"
                                        class="btn btn-primary">PROSES</button>
                                </div>
                                <br>
                                <label for="encrypttext" class="col-sm-2 control-label" style="margin-top: 8px;">Hasil
                                    Dekripsi</label>
                                <div class="col-sm-9">
                                    <?php
                                    // Fungsi untuk melakukan dekripsi AES
                                    function decryptAES($encryptedText, $key)
                                    {
                                        // Mengatur mode AES dan padding
                                        $cipher = "AES-128-CBC";
                                        $ivlen = openssl_cipher_iv_length($cipher);

                                        // Mendekode base64 dan memisahkan IV dan ciphertext
                                        $decodedText = base64_decode($encryptedText);
                                        $iv = substr($decodedText, 0, $ivlen);
                                        $ciphertext = substr($decodedText, $ivlen);

                                        // Melakukan dekripsi ciphertext
                                        $plaintext = openssl_decrypt($ciphertext, $cipher, $key, OPENSSL_RAW_DATA, $iv);

                                        if ($plaintext === false) {
                                            // Tampilkan notifikasi jika kunci salah
                                            echo '<div class="alert alert-danger">Pesan / Kunci yang digunakan salah. Dekripsi tidak berhasil.</div>';
                                            return false;
                                        }

                                        return $plaintext;
                                    }

                                    // Memeriksa apakah formulir telah disubmit
                                    if (isset($_POST['decrypt'])) {
                                        // Mendapatkan ciphertext dan kunci dari formulir
                                        $encryptedText = $_POST['plaintext'];
                                        $key = $_POST['key'];

                                        // Melakukan dekripsi AES
                                        $decryptedText = decryptAES($encryptedText, $key);
                                    }

                                    $decryptedText = isset($decryptedText) ? $decryptedText : '';
                                    echo '<input class="form-control" type="text" placeholder="Hasil Dekripsi" name="hasil_dekripsi" id="hasil_dekripsi" value="' . $decryptedText . '">';
                                    ?>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
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