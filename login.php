<?php 
session_start();
include_once"perpustakaan/modul.php";

if (isset($_POST["TombolLogin"])){
    $Username       = $_POST["username"];
    $Password       = $_POST["password"];

    $Hasil  = mysqli_query($Koneksi, "SELECT * FROM tb_petugas WHERE username = '$Username'");
    $Cek    = mysqli_num_rows($Hasil);

    //cek role
    if ($Cek > 0){
        $data = mysqli_fetch_assoc($Hasil);

        if ($data['role']=="administrator"){
            $_SESSION['Login'] = true;
            $_SESSION['username'] = $Username;
            $_SESSION['role']= "administrator";
            header("location:perpustakaan/MenuUtama.php");
        }elseif ($data['role']=="petugas"){
            $_SESSION['Login'] = true;
            $_SESSION['username'] = $Username;
            $_SESSION['role'] = "petugas";
            header("location:petugas/MenuPetugas.php");
        }else{
            $PesanKesalahan = true;
        }
    }
}
?>
<html>
    <head>
        <title><?php include_once("perpustakaan/judul.php"); ?></title>
        <link rel="stylesheet" href="perpustakaan/node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="perpustakaan/custom.css">
        <style>
            .cari-invoice {
                    width: 500px;
                    margin: 50px auto;
            }
            .cari-invoice form {        
                margin-bottom: 15px;
                background: #f7f7f7;
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                padding: 30px;
            }
            .cari-invoice img {
                margin: 0 150px 15px;
            }
            .form-control, .btn {
                min-height: 38px;
            }
            .input-group-addon .fa {
                font-size: 18px;
            }
            .btn {        
                font-size: 15px;
            }
        </style>
    </head>
<body>
    <div class="cari-invoice">
        <form action="login.php" method="POST">
                <img src="gambar/matchicon.jpg" width="150px" height="100px" alt="">
                <?php if (isset($PesanKesalahan)) : ?>
                    <p style="color: red; font-style: italic;">Username atau Password Salah</p>
                <?php endif; ?>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" id="Username" name="password" placeholder="Password" required="required">
                    </div>
                </div>        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" id="TombolLogin" name="TombolLogin">Log In</button>
                </div>
                <div class="clearfix">
                    <a href="#" class="pull-right">Lupa Password?</a>
                </div>        
        </form>
    </div>

        <script>
        </script>
    </body>
</html>