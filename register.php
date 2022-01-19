<?php
require('config/koneksi.php');
session_start();
$error = '';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($conn, $email);
    // mysqli_real_escape_string = salah satu kegunaan function php yang dapat mencegah sql injection sehingga dapat menghambat serangan penyusup atau intruder

    $password = $_POST['password'];
    $password = mysqli_real_escape_string($conn, $password);

    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_lengkap = mysqli_real_escape_string($conn, $nama_lengkap);

    $alamat = $_POST['alamat'];
    $alamat = mysqli_real_escape_string($conn, $alamat);

    $telepon = $_POST['telepon'];

    $new_date = date('Y-m-d', strtotime($_POST['date']));

    $jenis_kelamin = $_POST['jenis_kelamin'];



    // validasi form tidak boleh kosong
    if (!empty(trim($email)) && !empty(trim($password)) && !empty(trim($nama_lengkap)) && !empty(trim($alamat)) && !empty(trim($telepon)) && !empty(trim($new_date)) && !empty(trim($jenis_kelamin)) ) {
        // validasi email dengan memanggil function cek_email
        if (cek_email($email, $conn) === 0) {
            $idKeyuser = cek_idCustomer($conn);
            // $idKeyuser berisikan string hasil dari generate function cek_idCustomer ketika registrasi berhasil, setiap kode yg digenerate diawali dengan huruf Cxxxx yang menandakan role customer.

            $query = "INSERT INTO customer (id_customer, email, password, nama_customer, alamat, telepon, tanggal, gender) VALUES ('$idKeyuser', '$email', '$password', '$nama_lengkap', '$alamat', '$telepon', '$new_date', '$jenis_kelamin')";
            $result = mysqli_query($conn, $query);

            if ($result) {
                // jika $result true / insert data ke database berhasil maka otomatis akan ke index.php
                header('Location: index.php');
            } else {
                $error = "Regis gagal";
            }
        } else {
            $error = "email sudah digunakan";
        }
    } else {
        $error = "form tidak boleh kosong";
    }
}

function cek_email($email, $conn)
{
    $email = mysqli_real_escape_string($conn, $email);
    $query = "SELECT * FROM customer WHERE email = '$email'";
    if ($result = mysqli_query($conn, $query)) return mysqli_num_rows($result);
    // return berapa banyak jumlah baris yang ditemukan.
}

function cek_idCustomer($conn)
{
    $key = 'C' . substr(uniqid(rand(), true), 1, 4);
    // substr = fungsi yang digunakan untuk memotong bagian dari string. Mempunyai 3 parameter.
    // Parameter 1 subster yaitu uniqid = Fungsi digunakan untuk menghasilkan ID unik berdasarkan waktu mikro. Parameter pertama yaitu rand() untuk mengenerate integer acak, paramter kedua yaitu true untuk agar nilainya 23 karakter.
    // Parameter 2 subster yaitu 1 artinya posisi awal untuk ekstraksi dari angka yang digenerate.
    // Parameter 3 subster yaitu 4 artinya jumlah karakter untuk dapat melakukan ekstraksi.

    $key = mysqli_real_escape_string($conn, $key);
    $query = "SELECT * FROM customer WHERE id_customer = '$key'";
    $result = mysqli_query($conn, $query);
    $rows = mysqli_num_rows($result);

    // validasi jika key / angka hasil generate tidak ditemukan di database maka akan return key tersebut.
    if ($rows === 0) {
        // key  tidak ditemukan di database
        return $key;
    } else {
        // jika key / angka hasil generate ditemukan di database maka akan return menjalankan fungsinya sendiri
        return cek_idCustomer($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/register.css">
    <title>HALAMAN REGISTER</title>
</head>

<body>
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>Form Registrasi</h2>
            </div>
            <div class="row clearfix">
                <div class="">
                    <form method="POST">
                        <?php if ($error != '') { ?>
                            <b>Error : <?= $error; ?></b>
                        <?php } ?>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                            <input type="email" name="email" placeholder="Email Anda" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                            <input type="password" name="password" placeholder="Password" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-home"></i></span>
                            <input type="text" name="alamat" placeholder="Alamat Lengkap" required />
                        </div>
                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-phone"></i></span>
                            <input type="number" class="teleponInput" name="telepon" placeholder="Nomor Telepon" required />
                        </div>
                        <div class="input_field radio_option">
                            <input type="radio" id="L" name="jenis_kelamin" value="L">
                            <label for="L">Laki - laki</label>
                            <input type="radio" id="P" name="jenis_kelamin" value="P">
                            <label for="P">Perempuan</label>
                        </div>
                        <input type="date" name="date" class="mb-3" value="<?php echo date('Y-m-d'); ?>">
                        <div class="input_field checkbox_option">
                            <input type="checkbox" id="cb1">
                            <label for="cb1">Saya setuju dengan syarat dan ketentuan</label>
                        </div>
                        <div class="input_field checkbox_option">
                            <input type="checkbox" id="cb2">
                            <label for="cb2">Saya ingin menerima berita dan update terkini</label>
                        </div>
                        <input class="button" type="submit" value="Register" name="submit"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src='https://use.fontawesome.com/4ecc3dbb0b.js'></script>

</html>