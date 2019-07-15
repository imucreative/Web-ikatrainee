<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
	ini_set("display_errors","Off");
?>
	<table id="daftarAnggota" class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th width="5%"><center>No.</center></th>
				<th width="16%"><center>Kode Pendaftaran</center></th>
				<th width="20%"><center>Nama Anggota</center></th>
				<th width="15%"><center>Email</center></th>
				<th width="11%"><center>Telephone</center></th>
				<th width="15%"><center>Kategori Usaha</center></th>
				<th width="10%"><center>Status</center></th>
				<th width="8%"><center>#</center></th>
			</tr>
		</thead>
		<tbody>
			<?php
				$i = 1;
				$query = mysql_query("SELECT * FROM anggota ORDER BY id DESC");
				while($data = mysql_fetch_array($query)){
					$nomor						= $i;
					$id							= $data['id'];
					$kodePendaftaran			= $data['kodePendaftaran'];
					$tglDaftar					= (Indonesia2Tgl($data['tglDaftar']));
					$nama						= $data['nama'];
					$email						= $data['email'];
					$tlp						= $data['tlp'];
					$kategoriUsaha						= $data['kategoriUsaha'];
					$foto						= $data['foto'];
					$tglVerifikasiPembayaran	= $data['tglVerifikasiPembayaran'];
					$tglVerifikasiKedatangan	= $data['tglVerifikasiKehadiran'];
					$status						= $data['status'];
					
					if($tglVerifikasiPembayaran=='0000-00-00'){
						$tglBayar				= "-";
					}else{
						$tglBayar				= (Indonesia2Tgl($tglVerifikasiPembayaran));
					}
					
						if($tglVerifikasiKedatangan=='0000-00-00'){
							$tglDatang				= "-";
						}else{
							$tglDatang				= (Indonesia2Tgl($tglVerifikasiKedatangan));
						}
					
							if($status=='Menunggu'){
								$statusAnggota			= "<font color='red'>$status</font>";
								$tglStatus				= $tglDaftar;
							}elseif($status=='Terdaftar'){
								$statusAnggota			= "<font color='green'>$status</font>";
								$tglStatus				= $tglBayar;
							}elseif($status=='Hadir'){
								$statusAnggota			= "<font color='green'>$status</font>";
								$tglStatus				= $tglDatang;
							}
			?>
			<tr>
				<td align="center"><?php echo $nomor;?></td>
				<td align="center">
					<a data-rel="tooltip" data-placement="right" title="<?php echo $tglDaftar;?>" href="#" class="edit" id="<?php echo $id;?>">
						<?php echo $kodePendaftaran;?>
					</a>
				</td>
				<td align="left"><?php echo $nama;?></td>
				<td align="right"><?php echo $email;?></td>
				<td align="left"><?php echo $tlp;?></td>
				<td align="center"><?php echo $kategoriUsaha;?></td>
				<td align="center">
					<a data-rel="tooltip" data-placement="left" title="<?php echo $tglStatus;?>" href="#">
						<?php echo $statusAnggota;?>
					</a>
				</td>
				<td align="center">
					<div class="action-buttons">
						<?php
							if($status!='Hadir'){
						?>
								<a id='<?php echo $id;?>' data-id='<?php echo $status;?>' data-value="<?php echo $nama;?>" class='green accept' href="#">
									<i class="ace-icon fa fa-check bigger-130"></i>
								</a>
						<?php
							}
						?>
						<a data-toggle="modal" id="<?php echo $foto;?>" data-id='<?php echo $nama;?>' data-target="#modalFoto" class='blue ambilFoto' href="#">
							<i class="ace-icon fa fa-search bigger-130"></i>
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
	
	<div id="modalFoto" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title judulFoto"></h4>
				</div>
				<div class="modal-body bodyLampiran" align="center"><img class="tampilFoto"/></div>
			</div>
		</div>
	</div>
	
	
	<script type="text/javascript">
		$('[data-rel=tooltip]').tooltip();
		$("#daftarAnggota").dataTable({
			"bPaginate": false,
			"bLengthChange": true,
			"bInfo": true,
			"bFilter": true,
			"bSort": true,
			"bAutoWidth": true
		});
		
		$(".ambilFoto").click(function(){
			var foto	= $(this).attr('id');
			var nama	= $(this).data('id');
			$(".judulFoto").html("Foto Kategori Usaha - "+nama);
			$(".tampilFoto").attr('src', '../../plugins/images/'+foto);
		});
		
		$(".accept").click(function(){
			var id		= $(this).attr('id');
			var status	= $(this).data('id');
			var nama	= $(this).data('value');
			if (confirm('Apakah anda ingin mengubah status '+nama+'?')){
				var DataForm = "id="+id+"&status="+status;
				$.ajax({
					url: 'pages/anggota/anggotaSave.php',
					method: 'POST',
					data: DataForm,
					success : function(){
						var anggotaTabel	= "pages/anggota/anggotaTabel.php";
						$(".anggotaTabel").html("<center><img src='assets/img/loading.gif'></center>");
						$(".anggotaTabel").load(anggotaTabel);
						
						$.gritter.add({
							title: 'Attention',
							text: '* Status Keanggotaan '+nama+' telah Diubah.',
							sticky: false,
							time: '',
							class_name: 'gritter-success'
						});
						return false;
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}else{
				return false;
			}
		});
		
		$(".anggotaForm").hide();
		$('.edit').click(function(){
			var id			= $(this).attr('id');
			var anggotaForm	= "pages/anggota/anggotaForm.php?id="+id;
			$(".anggotaForm").html("<center><img src='assets/img/loading.gif'></center>");
			$(".anggotaForm").slideDown();
			$(".anggotaForm").load(anggotaForm);
		});
		
	</script>