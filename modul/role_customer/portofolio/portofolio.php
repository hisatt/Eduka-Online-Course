<?php
include("config/koneksi.php");

require('config/function.php');
$idCustData = $_SESSION['role'];
$portofolio = viewDataPortofolio("SELECT * FROM portofolio WHERE id_customer = '$idCustData'");

$classTambahShow = false;
// TAMBAH DATA
if (isset($_GET['action'])) {
    if (preg_match("/tambah/", $_GET['action'])) {
        $classTambahShow = true;
        if (isset($_POST['submit'])) {
            if (tambahData($_POST) > 0) {
                echo "<script>
                    alert('Data berhasil ditambahkan');
                </script>";
                header('Location: dashboardCustomers.php?page=portofolio');
            } else {
                echo "<script>
                alert('Data tidak berhasil ditambahkan');
            </script>";
            }
        }
    }
}
?>

<div id="portofolio">
    </br>
    </br>
    <a href="?page=portofolio&action=tambah" class="btn btn-info">
        <span class="text">Tambah</span>
    </a>
    </br>
    <div class="form-tambah" <?php if ($classTambahShow === false) { ?> style="display:none" <?php } ?>>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" id='id' name="id" value="<?php $idCustData; ?>"><br><br>
                <label for="judul">Judul Portofolio</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Portofolio">
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan Deskripsi Portofolio"></textarea>
            </div>
            <div class="form-group">
                <label for="thumbnail">Thumbnail</label>
                <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
            </div>
            <div class="form-group">
                <label for="lampiran">Lampiran File</label>
                <input type="file" class="form-control-file" id="lampiran" name="lampiran">
            </div>
            <button type="submit" class="btn btn-primary mt-3" name="submit">Submit</button>
        </form>
    </div>
</br>
</br>
</br>
</br>
    <?php foreach ($portofolio as $port) : ?>
        <div class="card" style="width: 18rem;">
            <img src="file/thumbnail/<?= $port['thumbnail']; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $port['judul_portofolio']; ?></h5>
                <p class="card-text"><?= $port['deskripsi']; ?></p>
            </div>
            <div class="card-body">
                <a href="?page=portofolio&action=hapus&id=<?= $port['id_portofolio']; ?>" class="card-link">Hapus</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>