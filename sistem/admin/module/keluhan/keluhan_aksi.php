<?php
include "../../koneksi.php";

$module=$_GET['module'];
$aksi=$_GET['aksi'];

$id = $_POST['id_keluhan'];
$nm_pengadu = $_POST['nm_pengadu'];
$nm_perusahaan = $_POST['nm_perusahaan'];
$ket_pengaduan = $_POST['ket_pengaduan'];
$jenis_pengaduan = $_POST['jenis_pengaduan'];
$nm_penyidik = $_POST['nm_penyidik'];
$tanggal = $_POST['tanggal'];
// HAPUS
if($module=='keluhan' AND $aksi=='hapus' ){ 
$mySql = "DELETE FROM keluhan WHERE id_keluhan='".$_GET['id_keluhan']."'";
$myQry = mysql_query($mySql);
header('location:../../index.php?module='.$module);
}
else if($module=='keluhan' AND $aksi=='edit' ){ 
$sql = "UPDATE keluhan SET 
nm_pengadu='$nm_pengadu',
nm_perusahaan='$nm_perusahaan',
ket_pengaduan='$ket_pengaduan',
jenis_pengaduan='$jenis_pengaduan',
nm_penyidik='$nm_penyidik',
tanggal='$tanggal' WHERE id_keluhan = '$id'";
$edit = mysql_query($sql);
header('location:../../index.php?module='.$module);
}
//Tambah
else if($module=='keluhan' AND $aksi=='tambah' ){ 
	header('location:../../index.php?module='.$module);
$sql = "INSERT INTO keluhan (id_keluhan, nm_pengadu, nm_perusahaan, ket_pengaduan, jenis_pengaduan, nm_penyidik, tanggal) VALUES ('$id', '$nm_pengadu', '$nm_perusahaan', '$ket_pengaduan', '$jenis_pengaduan', '$nm_penyidik', '$tanggal')";
$simpan = mysql_query($sql);
}

?>