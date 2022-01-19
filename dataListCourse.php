<?php
require('config/koneksi.php');
require('config/function.php');
$listCourse = viewListCourse("SELECT * FROM course");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/fontawesome-free-5.12.0-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>List Course</title>
    <style>
        body {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .containerCourse {
            height: auto;
            width: auto;
            padding: 20px;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            /* justify-content: flex-start; */
            justify-content: center;
        }

        .title {
            height: auto;
            width: auto;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="contenCourse">
        <div class="title">
            <h1>Courses</h1>
            <p>Pelajari ilmu terbaru dengan mudah dan menyenangkan
            </p>
        </div>

        <div class="containerCourse">
            <?php foreach ($listCourse as $course) : ?>
                <div class="card" style="width: 18rem;">
                    <img src="file/thumbnail/<?= $course['thumbnail']; ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?= $course['judul_course']; ?></h5>
                        <p class="card-text"><?= $course['deskripsi_course']; ?></p>
                        <p class="card-text">Rp. <?php echo number_format($course['harga'],2,',','.'); ?></p>
                        
                    </div>
                    <div class="card-body">
                        <a href="?page=course&action=tambah&id=<?= $course['id_course']; ?>" class="card-link">Pilih</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>