<?php 
	$jumlahAnggota		= mysql_query("SELECT * FROM anggota");
	$dataJumlahAnggota	= mysql_num_rows($jumlahAnggota);
	
	$jumlahKegiatan		= mysql_query("SELECT * FROM kegiatan");
	$dataJumlahKegiatan	= mysql_num_rows($jumlahKegiatan);
	
	$jumlahMateri		= mysql_query("SELECT * FROM materi");
	$dataJumlahMateri	= mysql_num_rows($jumlahMateri);
?>

<div class="main-content">
	<div class="main-content-inner">
	
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>
			
			<ul class="breadcrumb">
				<li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
			</ul>
		</div>

		<div class="page-content">
			<div class="row" align='center'>
				<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
					<div class="infobox infobox-green">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-users"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $dataJumlahAnggota;?></span>
							<div class="infobox-content"><a href='index.php?page=anggota'>Daftar Anggota</a></div>
						</div>
					</div>
					
					<div class="infobox infobox-purple">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-dashboard"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $dataJumlahKegiatan;?></span>
							<div class="infobox-content"><a href='index.php?page=kegiatan'>Daftar Kegiatan</a></div>
						</div>
					</div>
					
					<div class="infobox infobox-red">
						<div class="infobox-icon">
							<i class="ace-icon fa fa-list-alt"></i>
						</div>
						<div class="infobox-data">
							<span class="infobox-data-number"><?php echo $dataJumlahMateri;?></span>
							<div class="infobox-content"><a href='index.php?page=materi'>Daftar Materi</a></div>
						</div>
					</div>
				<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
		
	</div>
</div>

