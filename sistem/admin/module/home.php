<?php
include ("../inc/koneksi.php"); 
include ("../inc/fungsi_hdt");  ?>
<br/>
<div style="margin-right:10%;margin-left:15%" class="alert alert-danger alert-dismissable">
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
<p><i class="icon fa fa-info"></i>
Welcome <?php echo $_SESSION['nama']; ?>! &nbsp;&nbsp;
Anda berada di halaman "<?php echo $_SESSION['level']; ?>"
</p>
</div> 
<div class="box box-solid box-danger">
<div class="box-header">
<i class="fa fa-info"></i>Informasi
</div>
<div class="box-body">
<h4>Hak Akses sebagai Admin:</h4>
<li>Mengelola data Master Jenis Pengaduan</li>
<li>Mengelola data Master Penyidik</li>
<li>Mengelola data Master Perusahaan</li>

</div>
</div><!-- /.row -->

 