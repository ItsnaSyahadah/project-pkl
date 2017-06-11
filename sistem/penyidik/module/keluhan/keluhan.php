<?php
$aksi="module/keluhan/keluhan_aksi.php";


switch($_GET[aksi]){
default:
?>
 <!-- MENAMPILKAN DATA MASTER keluhan  -->

<h3 class="box-title margin text-center">Data Master Data Keluhan</h3>
<center> <div class="batas"> </div></center>
<br/>
<div class="row">
<div class="col-md-12">
	<div class="box box-solid box-warning">
		<div class="box-header">
		<h3 class="btn btn disabled box-title">
		<i class="fa  fa-plus"></i>
		Tambah Data Keluhan</h3>		 	
		</div>		
	<div class="box-body">
	<?php
$sql ="SELECT max(id_keluhan) as terakhir from keluhan";
  $hasil = mysql_query($sql);
  $data = mysql_fetch_array($hasil);
  $lastID = $data['terakhir'];
  $lastNoUrut = substr($lastID, 3, 9);
  $nextNoUrut = $lastNoUrut + 1;
  $nextID = "KEL".sprintf("%03s",$nextNoUrut);
?> 
	 <form class="form-horizontal" action="<?php echo $aksi?>?module=keluhan&aksi=tambah" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-4 control-label">ID Keluhan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="id_keluhan" value="<?php echo  $nextID; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pengadu</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="nm_pengadu" placeholder="Nama pengadu">
    </div>
  </div>
  <?php
  $tampilper = mysql_query("select * from unit_krj order by id_unit_krj");
  ?>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Perusahaan</label>
    <div class="col-sm-5">
      <select name="nm_perusahaan" class="form-control">
<option value="belumMilih" > -- Pilih Perusahaan -- </option>
<?php
while($w=mysql_fetch_array($tampilper))
{
    echo "<option value=$w[nm_unit_krj]>$w[nm_unit_krj]</option>";        
}
?>
</select>
    </div>
  </div>
   <div class="form-group">
    <label class="col=md-3 col-sm-4 control-label">Ket Pengaduan</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="ket_pengaduan" placeholder="Ket Pengaduan">
    </div> 
  </div>
  <?php
  $tampiljenis_peng = mysql_query("select * from jenis_peng order by id_jenis_peng");
  ?>
  <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Pengaduan</label>
    <div class="col-sm-5">
      <select name="jenis_pengaduan" class="form-control">
<option value="belumMilih" > -- Pilih Jenis PEngaduan -- </option>
<?php
while($w=mysql_fetch_array($tampiljenis_peng))
{
    echo "<option value=$w[nm_jenis_peng]>$w[nm_jenis_peng]</option>";        
}
?>
</select>
    </div>
  </div>
  <?php
   $tampilpeny = mysql_query("select * from penyidik order by id_penyidik");
  ?>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Penyidik</label>
    <div class="col-sm-5">
      <select name="nm_penyidik" class="form-control">
<option value="belumMilih" > -- Pilih Penyidik -- </option>
<?php
while($w=mysql_fetch_array($tampilpeny))
{
    echo "<option value=$w[nm_penyidik]>$w[nm_penyidik]</option>";        
}
?>
</select>
    </div>
  </div>
    <div class="form-group">
    <label class="col-sm-4 control-label">Tanggal</label>
    <div class="col-sm-7">
      <input type="text" class="form-control" required="required" name="tanggal" placeholder="tanggal">
    </div>
    </div>
    
  <div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-7">
	<hr/>
      <button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i><i>Reset</i></button> 
    </div>
  </div>
</form>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>  
<div class="col-md-12">
	<div class="box box-solid box-danger">
		<div class="box-header">
		<h3 class="btn disabled box-title">
		<i class="fa  fa-street-view"></i>
		Data Master Keluhan</h3>	
		</div>		
	<div class="box-body">
	<table id="example2" class="table table-bordered table-striped">
<thead>
	<tr class="text-red">
		<th class="col-sm-1">No</th> 
		<th>Nama Pengadu</th> 
    <th>Nama Perusahaan</th>
    <th>Ket Pengaduan</th>
    <th>Jenis Pengaduan</th>
    <th>Nama Penyidik</th>
    <th>Tanggal</th> 
    <th class="col-sm-1">AKSI</th>  
	</tr>
</thead>

<tbody>
<?php 
// Tampilkan data dari Database
$sql = "SELECT * FROM keluhan";
$tampil = mysql_query($sql);
$no=1;
while ($tampilkan = mysql_fetch_array($tampil)) { 
$Kode = $tampilkan['id_keluhan'];

?>

	<tr>
	<td><?php echo $no++; ?></td> 
	<td><?php echo $tampilkan['nm_pengadu']; ?></td> 
	<td><?php echo $tampilkan['nm_perusahaan']; ?></td>
  <td><?php echo $tampilkan['ket_pengaduan']; ?></td>
  <td><?php echo $tampilkan['jenis_pengaduan']; ?></td>
  <td><?php echo $tampilkan['nm_penyidik']; ?></td>
  <td><?php echo $tampilkan['tanggal']; ?></td>
	<td align="center">
	<a class="btn btn-xs btn-info" href="?module=keluhan&aksi=edit&id_keluhan=<?php echo $tampilkan['id_keluhan'];?>" alt="Edit Data"><i class="glyphicon glyphicon-pencil"></i></a>
	<a class="btn btn-xs btn-danger"href="<?php echo $aksi ?>?module=keluhan&aksi=hapus&id_keluhan=<?php echo $tampilkan['id_keluhan'];?>"  alt="Delete Data" onclick="return confirm('ANDA YAKIN AKAN MENGHAPUS DATA <?php echo $Kode; ?>	?')"> <i class="glyphicon glyphicon-trash"></i></a>
	</td>
	<?php
	}
	?>
	</tr>
			</tbody>
		</table>
	</div><!-- /.box-body -->
</div><!-- /.box -->
</div>
</div>
<!----- ----------------------- END TAMBAH DATA MASTER keluhan ------------- ----->
<?php	
break;
case "edit" :
$data=mysql_query("select * from keluhan where id_keluhan='$_GET[id_keluhan]'");
$edit=mysql_fetch_array($data);
?>

<!----- EDIT DATA MASTER keluhan -------->
<h3 class="box-title margin text-center">Edit Data keluhan "<?php echo $_GET['id_keluhan']; ?>"</h3>
<br/>
<form class="form-horizontal" action="<?php echo $aksi?>?module=keluhan&aksi=edit" role="form" method="post">             

  <div class="form-group">
    <label class="col-sm-4 control-label">ID keluhan </label>
    <div class="col-sm-5">
      <input type="text" class="form-control" readonly name="id_keluhan" value="<?php echo $edit['id_keluhan']; ?>" >
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Pengadu</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_pengadu"value="<?php echo $edit['nm_pengadu']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="col-sm-4 control-label">Nama Perusahaan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_perusahaan"value="<?php echo $edit['nm_perusahaan']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Ket Pengaduan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="ket_pengaduan"value="<?php echo $edit['ket_pengaduan']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Jenis Pengaduan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="jenis_pengaduan"value="<?php echo $edit['jenis_pengaduan']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Nama Penyidik</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="nm_penyidik"value="<?php echo $edit['nm_penyidik']; ?>">
    </div>
  </div>
   <div class="form-group">
    <label class="col-sm-4 control-label">Tanggal</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" required="required" name="tanggal"value="<?php echo $edit['tanggal']; ?>">
    </div>
  </div>
  
  
<div class="form-group">
    <label class="col-sm-4"></label>
    <div class="col-sm-5">
	<hr/>
<button type="submit"name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
<a href="?module=keluhan">
<button class="btn btn-warning"><i class="glyphicon glyphicon-remove"></i> Batal</button></a>
    </div>
</div>

</form>
</div>
</div>
<!--- END EDIT DATA MASTER keluhan ---->
<?php
break;
}
?>
