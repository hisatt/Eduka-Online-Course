<?php
if (isset($_GET['id']) ) {
    $id_course = $_GET['id'];

    include('config/koneksi.php');

    $sql = "select * from course where id_course='$id_course'";

    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);
    $id_course = $data['id_course'];
    $judul_course = $data['judul_course'];
    $harga = $data['harga'];
} else {
    $id_course = "";
}

if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "";
}

switch ($action) {
    case "tambah_course":
        $itemArray = array($id_course => array('id_course' => $id_course, 'judul_course' => $judul_course, 'harga' => $harga));

        if (!empty($_SESSION["keranjang"])) {
            if (in_array($data['id_course'], array_keys($_SESSION['keranjang']))) {
                foreach ($_SESSION['keranjang'] as $k => $v) {
                    if ($data['id_course'] == $k) {
                        $_SESSION['keranjang'] = array_merge($_SESSION['keranjang'], $itemArray);
                    }
                }
            } else {
                $_SESSION['keranjang'] = array_merge($_SESSION['keranjang'], $itemArray);
            }
        } else {
            $_SESSION['keranjang'] = $itemArray;
        }
        break;
    case "hapus":
        if (!empty($_SESSION["keranjang"])) {
            foreach ($_SESSION['keranjang'] as $k => $v) {
                if ($_GET['id_course'] == $k) {
                    unset($_SESSION['keranjang'][$k]);
                }
                if (empty($_SESSION['keranjang'])) {
                    unset($_SESSION['keranjang']);
                }
            }
        }
}
?>

<div class="row">
    <h2 style="margin-bottom:30px;">Keranjang Course</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Id Course</th>
                <th width="40%">Nama</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 0;
            $sub_total = 0;
            $total = 0;
            if (!empty($_SESSION["keranjang"])) :
                foreach ($_SESSION["keranjang"] as $item) :
                    $no++;
                    $sub_total = $item['harga'];
                    $total += $sub_total;
            ?>
                    <input type="hidden" name="kode_produk[]" class="kode_produk" value="<?php echo $item["id_course"]; ?>" />
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item["id_course"]; ?></td>
                        <td><?php echo $item["judul_course"]; ?></td>
                        <td>Rp. <?php echo number_format($item["harga"], 0, ',', '.'); ?> </td>
                        <td>
                            <a href="?page=course&halaman=keranjang-belanja&id=<?php echo $item['id_course']; ?>&action=hapus" class="btn btn-danger btn-xs" role="button">Delete</a>
                        </td>
                    </tr>
            <?php
                endforeach;
            endif;
            ?>
        </tbody>
    </table>
    <h3>Total Pembayaran Rp. <?php echo number_format($total, 0, ',', '.'); ?> </h3> 
    <a href="?page=course&action=checkout">
      <button class="btn btn-success btn-sm">Checkout</button>
     </a>
</div>