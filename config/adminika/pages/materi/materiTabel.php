<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
if (empty($_SESSION['id'])){
	echo '<script>parent.window.location.reload(true);</script>';
}else{
	ini_set("display_errors","Off");
?>
	<table id="daftarMateri" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="8%"><center>No.</center></th>
				<th width="20%"><center>Judul Materi</center></th>
				<th width="60%"><center>Isi Materi</center></th>
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
				$query = mysql_query("SELECT * FROM materi ORDER BY idMateri DESC");
				while($data = mysql_fetch_array($query)){
					$nomor		= $i;
					$idMateri	= $data['idMateri'];
					$judul		= $data['judul'];
					$isi		= $data['isi'];
			?>
			<tr>
				<td align="center"><?php echo $nomor;?></td>
				<td align="left"><?php echo $judul;?></td>
				<td align="left"><?php echo $isi;?></td>
				<td align="center">
					<div class="action-buttons">
						<a id="<?php echo $idMateri;?>" class='blue edit' href="#">
							<i class="ace-icon fa fa-edit bigger-130"></i>
						</a>
						<a id="<?php echo $idMateri;?>" class='red delete' href="#">
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
		$("#daftarMateri").dataTable({
			"bPaginate": false,
			"bLengthChange": true,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
		
		$(".materiFormInputEdit").hide();
		$('.input, .edit').click(function(){
			$(".delete").hide();
			var idMateri	= $(this).attr('id');
			var materiForm	= "pages/materi/materiForm.php?idMateri="+idMateri;
			$(".materiFormInputEdit").html("<center><img src='assets/img/loading.gif'></center>");
			$(".materiFormInputEdit").slideDown();
			$(".materiFormInputEdit").load(materiForm);
		});
		
		$('.delete').click(function(){
			var idMateri	= $(this).attr('id');
			var del			= "1";
			
			if (confirm('Are you sure to Delete?')){
				var DataFormDelete = 'idMateri='+idMateri+'&del='+del;
				$.ajax({
					url: 'pages/materi/materiFormSave.php',
					method: 'GET',
					data: DataFormDelete,
					success : function(){
						var materiTabel	= "pages/materi/materiTabel.php";
						$(".materiTabel").html("<center><img src='assets/img/loading.gif'></center>");
						$(".materiTabel").load(materiTabel);
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}
		});
		
	</script>