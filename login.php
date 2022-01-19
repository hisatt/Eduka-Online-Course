<?php
include("config/koneksi.php");
session_start();

$error = '';
// Cek session loggedIn, jika terdapat session 'loggedIn' maka return true dan menjalankan if didalamnya
if (isset($_SESSION['loggedIn'])) {
    // Cek apakah session role yang berisikan id_admin dan id_customer
    // jika pada id terdapat huruf A artinya login admin
    if (preg_match("/A/", $_SESSION['role'])) {
        header('Location: dashboardAdmin.php');
    }
    // jika pada id terdapat huruf C artinya login customer
    if (preg_match("/C/", $_SESSION['role'])) {
        header('Location: dashboardCustomers.php');
    }
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($conn, $email);

    $password = $_POST['password'];
    $password = mysqli_real_escape_string($conn, $password);

    // trim untuk menghapus spasi / whitespace string
    if (!empty(trim($email)) && !empty(trim($password))) {

        // cek apakah data inputan form login tersedia di tabel admin
        $queryAdmin = "SELECT * FROM admin WHERE email ='$email' AND password ='$password'";
        $resultAdmin = mysqli_query($conn, $queryAdmin);
        $rowsAdmin = mysqli_num_rows($resultAdmin);
        // mysqli_query = fungsi php untuk menjalankan instruksi atau argumen ke mysql
        // mysqli_num_rows = digunakan untuk mengetahui berapa banyak jumlah baris

        // cek apakah data inputan form login tersedia di tabel customer
        $queryCustomers = "SELECT * FROM customer WHERE email ='$email' AND password ='$password'";
        $resultCustomers = mysqli_query($conn, $queryCustomers);
        $rowsCustomers = mysqli_num_rows($resultCustomers);

        // cek result jumlah baris dari variabel $rowsAdmin
        if ($rowsAdmin != 0) {
            while ($row = mysqli_fetch_assoc($resultAdmin)) {
                // mysqli_fetch_assoc = digunakan untuk mengambil baris hasil sebagai array asosiatif
                $dbEmail = $row['email'];
                $dbPassword = $row['password'];
                $role = $row['id_admin'];
            }
            if ($email == $dbEmail && $password == $dbPassword) {
                session_start();
                $_SESSION['role'] = $role;
                $_SESSION['loggedIn'] = true;
                header('Location: dashboardAdmin.php');
            }
        } elseif ($rowsCustomers != 0) {
            while ($row = mysqli_fetch_assoc($resultCustomers)) {
                $dbEmail = $row['email'];
                $dbPassword = $row['password'];
                $role = $row['id_customer'];
            }
            if ($email == $dbEmail && $password == $dbPassword) {
                session_start();
                $_SESSION['role'] = $role;
                $_SESSION['loggedIn'] = true;
                header('Location: dashboardCustomers.php');
            }
        } else {
            $error = "Data tidak ditemukan, gagal login!";
        }
    } else {
        $error = "Form tidak boleh kosong";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Login Page</title>
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4">Login</h1>
                            <form method="POST" class="needs-validation" novalidate="" autocomplete="off">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">Email Anda</label>
                                    <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                                    <div class="invalid-feedback">
                                        Email is invalid
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Password</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                    <div class="invalid-feedback">
                                        Password is required
                                    </div>
                                </div>

                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Ingat Saya</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary ms-auto" name="submit">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Belum Punya Akun? <a href="register.php" class="text-dark">Buat Sekarang</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
</body>

</html>