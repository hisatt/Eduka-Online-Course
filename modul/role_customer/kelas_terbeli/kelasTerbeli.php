<?php
require('config/function.php');
if (!isset($_SESSION['role'])) {
    header('Location:index.php');
}
$idCustData = $_SESSION['role'];
$coursePilihan = viewDataCourse("SELECT * FROM pilihcourse JOIN course ON course.id_course = pilihcourse.id_course WHERE id_customer = '$idCustData'");
?>


<div id="kelasTerbeli">
    <table class="table table-borderless table-hover">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Course</th>
                <th scope="col">Harga</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($coursePilihan as $pilihan) : ?>
                <tr>
                    <th scope="row"><?= 1; ?></th>
                    <td><?= $pilihan['judul_course'] ?></td>
                    <td>Rp. <?php echo number_format($pilihan['harga'],2,',','.'); ?></td>
                    
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>

</div>