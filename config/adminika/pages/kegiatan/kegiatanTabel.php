<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
if (empty($_SESSION['id'])){
	echo '<script>parent.window.location.reload(true);</script>';
}else{
	ini_set("display_errors","Off");
?>
	<table id="daftarKegiatan" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="8%"><center>No.</center></th>
				<th width="20%"><center>Judul Kegiatan</center></th>
				<th width="60%"><center>Isi Kegiatan</center></th>
				<th width="12%"><center>
					<div class="hidden-sm hidden-xs action-buttons">
						<a id="0" class='blue input' href="#">
							<i class="ace-icon fa fa-plus bigger-130"></i>
						</a>
					</div>
				</center></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				$query = mysql_query("SELECT * FROM kegiatan ORDER BY idKegiatan DESC");
				while($data = mysql_fetch_array($query)){
					$nomor		= $i;
					$idKegiatan	= $data['idKegiatan'];
					$judul		= $data['judul'];
					$isi		= $data['isi'];
			?>
			<tr>
				<td align="center"><?php echo $nomor;?></td>
				<td align="left"><?php echo $judul;?></td>
				<td align="left"><?php echo $isi;?></td>
				<td align="center">
					<div class="action-buttons">
						<a id="<?php echo $idKegiatan;?>" class='blue edit' href="#">
							<i class="ace-icon fa fa-edit bigger-130"></i>
						</a>
						<a id="<?php echo $idKegiatan;?>" class='red delete' href="#">
							<i class="ace-icon fa fa-trash bigger-130"></i>
						</a>
					</div>
				</td>
			</tr>
			<?php
				$i++;
				}
			?>
		</tbody>
	</table>
<?php
}
?>
	
	<script type="text/javascript">
		$('[data-rel=tooltip]').tooltip();
		$("#daftarKegiatan").dataTable({
			"bPaginate": false,
			"bLengthChange": true,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
		
		$(".kegiatanFormInputEdit").hide();
		$('.input, .edit').click(function(){
			$(".delete").hide();
			var idKegiatan		= $(this).attr('id');
			var kegiatanForm	= "pages/kegiatan/kegiatanForm.php?idKegiatan="+idKegiatan;
			$(".kegiatanFormInputEdit").html("<center><img src='assets/img/loading.gif'></center>");
			$(".kegiatanFormInputEdit").slideDown();
			$(".kegiatanFormInputEdit").load(kegiatanForm);
		});
		
		$('.delete').click(function(){
			var idKegiatan	= $(this).attr('id');
			var del			= "1";
			
			if (confirm('Are you sure to Delete?')){
				var DataFormDelete = 'idKegiatan='+idKegiatan+'&del='+del;
				$.ajax({
					url: 'pages/kegiatan/kegiatanFormSave.php',
					method: 'GET',
					data: DataFormDelete,
					success : function(){
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
		
	</script>