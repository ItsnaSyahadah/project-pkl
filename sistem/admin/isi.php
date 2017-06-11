<?php
include "include/koneksi.php";

if ($_GET['module'] == "home") {
	include "module/home.php";
}
else if ($_GET['module'] == "penyidik") {
	include "module/penyidik/penyidik.php";	
}
else if ($_GET['module'] == "unit_krj") {
	include "module/unit_krj/unit_krj.php";	
}
else if ($_GET['module'] == "user") {
	include "module/user/user.php";	
}
else if ($_GET['module'] == "lokasi") {
	include "module/lokasi/lokasi.php";
}
else if ($_GET['module'] == "edit_user") {
	include "module/edit_user.php";
}
else if ($_GET['module'] == "jenis_peng") {
	include "module/jenis_peng/jenis_peng.php";
}
else if ($_GET['module'] == "keluhan"){
	include "module/keluhan/keluhan.php";
}
	
?>