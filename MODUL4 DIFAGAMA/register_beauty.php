<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi WAD Beauty</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>

<body>
    <!-- PHP Section -->
    <?php
        require 'db_conn_byu.php';

        $notif_alert='';

        if(isset($_POST["regis_form"])){
            $eml = $_POST["emaill"];
            $eff_rw = add_data($_POST, '');
        }

        if(!empty($_COOKIE['prf_navbar']) and !empty($_COOKIE['prf_navbg']) and !empty($_COOKIE['prf_navreg'])){
            $nav_font = $_COOKIE['prf_navbar'];
            $nav_bg = $_COOKIE['prf_navbg'];
            $nav_reg = $_COOKIE['prf_navreg'];
        }
    ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand <?= $nav_font?> fixed-top <?= $nav_bg?>">
        <a class="navbar-brand mb-0 h1" href="">EAD Beauty</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login_beauty.php">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link btn <?= $nav_reg?>" href="">Register <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content -->
    <div class="container-fluid">
    <?php
        if($eff_rw > 0){
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Berhasil registrasi!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        header("Refresh:5;url=login_beauty.php");
        // echo 'You\'ll be redirected in about 5 secs. ';
        // echo 'If not, click <a href="wherever.php">here</a>.';

        $row_usr = query("SELECT * FROM `user` WHERE `email` = '$eml'")[0];
        // session_start();
        $_SESSION['reg_email'] = $row_usr['email'];
        
        }else if($eff_rw == 0){
    ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Gagal registrasi!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
                // header("Location: register_beauty.php");
        }
    ?>
        <!-- <?= $notif_alert?> -->
        <form action="" method="post">
            <div class="row justify-content-center align-content-center">
                <div class="col-md-auto card-temp">
                    <div class="card">
                        <div class="card-header text-center h3">
                            Registrasi
                        </div>
                        <div class="card-body">
                            <div class="form-group row-md-4">
                                Nama
                                <input type="text" class="form-control" name="namaa" placeholder="Masukkan Nama Lengkap"
                                    required="required">
                            </div>

                            <div class="form-group row-md-4">
                                E-mail
                                <input type="email" class="form-control" name="emaill"
                                    placeholder="Masukkan Alamat E-mail" required="required">
                            </div>

                            <div class="form-group row-md-4">
                                No. Handphone
                                <input type="number" class="form-control" name="hp_no"
                                    placeholder="Masukkan Nomor Handphone">
                            </div>

                            <div class="form-group row-md-4">
                                Kata Sandi
                                <input type="password" class="form-control" name="sandi1" placeholder="Buat Kata Sandi"
                                    required="required" id="sandi1" onkeyup='check();'>
                            </div>

                            <div class="form-group row-md-4">
                                Konfirmasi Kata Sandi
                                <input type="password" class="form-control" name="sandi2"
                                    placeholder="Konfirmasi Kata Sandi" required="required" id="sandi2"
                                    onkeyup='check();'>
                                <span id='message'></span>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" class="btn btn-primary" value="Daftar" name="regis_form"
                                style="width:10em;" id="submit">
                            <input type="reset" class="btn btn-light" value="Clear"
                                onmouseover="this.style.color='red';" onmouseout="this.style.color='';">
                            <a class="btn hover-t" href="login_beauty.php">
                                Sudah punya akun? <span class="text-primary">Login</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <script src="./assets/scripts.js"></script>
    <?php exit;?>
</body>

</html>