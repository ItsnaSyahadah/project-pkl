<?php
include "../../koneksi.php";

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = $_POST['id_jenis_peng'];
$jenis_peng = $_POST['nm_jenis_peng'];
// HAPUS
if($module=='jenis_peng' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM jenis_peng WHERE id_jenis_peng='".$_GET['id_jenis_peng']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
// EDIT
else if($module=='jenis_peng' AND $aksi=='edit' ){ 
$query = mysql_query("UPDATE jenis_peng SET
				  nm_jenis_peng = '$jenis_peng'
				  WHERE id_jenis_peng = '$id'");
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='jenis_peng' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO jenis_peng  (id_jenis_peng, nm_jenis_peng) VALUES ('$id', '$jenis_peng')";
$simpan = mysql_query($sql);
}
else if($module=='jenis_peng' AND $aksi=='edit' ){ 
 
	header('location:../../index.php?module='.$module);
	}
?>