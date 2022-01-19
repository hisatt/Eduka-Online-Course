<?php

@$page = $_GET['page'];

if($page == "kelas_terbeli")
	{
		//tampilkan halaman Dashboard
		//echo "Tampil Halaman Modul Dashboard";
		include "modul/role_customer/kelas_terbeli/kelasTerbeli.php";

	}
	elseif ($page == "portofolio"){
		//tampilkan halaman transaksi
		if(@$_GET['action'] == "tambahdata" || @$_GET['action'] == "edit" || @$_GET['action'] == "hapus"){
			include "modul/role_customer/portofolio/form.php";
		}else{
			include "modul/role_customer/portofolio/portofolio.php";
		}
		
	}
	elseif ($page == "keranjang"){
		//tampilkan halaman transaksi
		include "modul/role_customer/course/keranjang-belanja.php";
	}
	elseif ($page == "data_admin"){
		//tampilkan halaman transaksi
		// include "modul/admin/admin.php";
		include "modul/role_admin/admin/admin.php";

		// if(@$_GET['action'] == "tambah" || @$_GET['action'] == "edit" || @$_GET['action'] == "delete"){
		// 	include "modul/arsip/form.php";
		// }else{
		// 	include "modul/arsip/data.php";
		// }
	}
	elseif ($page == "logout"){
		include "modul/role_customer/logout/destroySession.php";
	}
	else
	{
		//echo "Tampil Halaman Home";
		if(@$_GET['action'] == "tambah"){
			include "modul/role_customer/course/tambah.php";
		} elseif(@$_GET['action'] == "tambah_course"){
			include "modul/role_customer/course/keranjang-belanja.php";
		} elseif(@$_GET['action'] == "checkout") {
			include "modul/role_customer/course/checkout.php";
		}
		else{
			include "modul/role_customer/course/course.php";
		}
		
	}
