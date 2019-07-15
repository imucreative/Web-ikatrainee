<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
if (empty($_SESSION['id'])){
	echo '<script>parent.window.location.reload(true);</script>';
}else{
	ini_set("display_errors","Off");
	$idKegiatan		= $_REQUEST['idKegiatan'];
	
		if($idKegiatan == '0'){
			$judul	= '';
			$isi	= '';
		}else{
			$query	= mysql_query("SELECT * FROM kegiatan WHERE idKegiatan='$idKegiatan'");
			$data	= mysql_fetch_array($query);
			
			$judul	= $data['judul'];
			$isi	= $data['isi'];
		}
?>
		<form method='POST'>
			<fieldset>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-2">
							<label for="judul">Judul Kegiatan</label>
						</div>
						<div class="col-xs-10">
							<input type="text" name="judul" id="judul" class="form-control input-field" placeholder="* Judul Kegiatan" value='<?php echo $judul; ?>'/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-2">
							<label for="isi">Isi Kegiatan</label>
						</div>
						<div class="col-xs-10">
							<input type="text" name="isi" id="isi" class="form-control input-field" placeholder="* Isi Kegiatan" value='<?php echo $isi; ?>'/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row" align='right'>
						<div class="col-xs-12">
							<button type="button" class="btn btn-xs btn-success btn-flat " id='tombolSave' ><i class="fa fa-edit"></i> Update</button>
							<button type="button" class="btn btn-xs btn-danger btn-flat " id='tombolCancel' ><i class="fa fa-close"></i> Cancel</button>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
<?php
}
?>

<script>
	$(function(){
		$("#tombolSave").click(function(event){
			var judul	= $('#judul');
			var isi		= $('#isi');
			
				if(judul.val()==''){
					$.gritter.add({
						title: 'Attention',
						text: '* Judul Kegiatan Tidak Boleh Kosong.',
						sticky: false,
						time: '',
						class_name: 'gritter-error'
					});
					judul.focus();
					return false;
				}else if(isi.val()==''){
					$.gritter.add({
						title: 'Attention',
						text: '* Isi Kegiatan Tidak Boleh Kosong.',
						sticky: false,
						time: '',
						class_name: 'gritter-error'
					});
					isi.focus();
					return false;
				}
			
			if (confirm('Are you sure to Save?')){
				var DataForm = 'judul='+judul.val()+'&isi='+isi.val();
				$.ajax({
					url: 'pages/kegiatan/kegiatanFormSave.php?idKegiatan=<?php echo $idKegiatan; ?>',
					method: 'POST',
					data: DataForm,
					success : function(data){
						$(".kegiatanFormInputEdit").slideUp();
						var kegiatanTabel	= "pages/kegiatan/kegiatanTabel.php";
						$(".kegiatanTabel").html("<center><img src='assets/img/loading.gif'></center>");
						$(".kegiatanTabel").load(kegiatanTabel);
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}
		});
		
		$("#tombolCancel").click(function(){
			$(".kegiatanFormInputEdit").slideUp();
			$(".delete").show();
		});
	});
</script>