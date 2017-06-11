<?php
include "include/koneksi.php";

if ($_GET['module'] == "home") {
	include "module/home.php";
}
else if ($_GET['module'] == "keluhan") {
	include "module/keluhan/keluhan.php";	
}
else if ($_GET['module'] == "fpdf") {
	include "module/fpdf/pdf.php";}
else if ($_GET['module'] == "edit_user") {
	include "module/edit_user.php";}
	
?>