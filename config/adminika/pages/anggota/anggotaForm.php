<?php
	include "../../assets/config/connection.php";
	include "../../assets/config/library.php";
	
if (empty($_SESSION['id'])){
	echo '<script>parent.window.location.reload(true);</script>';
}else{
	ini_set("display_errors","Off");
	$id		= $_REQUEST['id'];
	
		$query			= mysql_query("SELECT * FROM anggota WHERE id='$id'");
		$data			= mysql_fetch_array($query);
		$nama			= $data['nama'];
		$email			= $data['email'];
		$tlp			= $data['tlp'];
		$kategoriUsaha	= $data['kategoriUsaha'];
		$foto			= $data['foto'];
?>
		<form method='POST' id='formRegistrasi'>
			<input type="hidden" id="updateAnggota" value='1'/>
			<fieldset>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-2">
							<label for="nama">* Nama Anggota</label>
						</div>
						<div class="col-xs-4">
							<input type="text" name="nama" id="nama" class="form-control input-field" placeholder="* Nama Anggota" value='<?php echo $nama; ?>'/>
						</div>
						
						<div class="col-xs-2">
							<label for="kategoriUsaha">* Kategori Usaha</label>
						</div>
						<div class="col-xs-4">
							<select name="kategoriUsaha" class="form-control" id="kategoriUsaha">
								<option value="<?php echo $kategoriUsaha;?>"><?php echo $kategoriUsaha;?></option>
								<option value="Calon Pengusaha">Calon Pengusaha</option>
								<option value="Advertising">Advertising</option>
								<option value="Boutique">Boutique</option>
								<option value="Electronic">Electronic</option>
								<option value="Entertainment">Entertainment</option>
								<option value="Food & Resto">Food & Resto</option>
								<option value="Furniture">Furniture</option>
								<option value="Home Appliance">Home Appliance</option>
								<option value="Otomotif">Otomotif</option>
								<option value="Real Estate">Real Estate</option>
							</select>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-2">
							<label for="email">* Email Anggota</label>
						</div>
						<div class="col-xs-4">
							<input type="text" name="email" id="email" class="form-control input-field" placeholder="* Email Anggota" value='<?php echo $email; ?>'/>
						</div>
						
						<div class="col-xs-2">
							<label for="foto">* Foto Anggota</label>
						</div>
						<div class="col-xs-4">
							<input type="file" name="foto"/>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-2">
							<label for="tlp">* Telp. Anggota</label>
						</div>
						<div class="col-xs-4">
							<input type="text" name="tlp" id="tlp" class="form-control input-field" placeholder="* Telp. Anggota" value='<?php echo $tlp; ?>'/>
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row" align='right'>
						<div class="col-xs-12">
							<button type="submit" class="btn btn-xs btn-success btn-flat " ><i class="fa fa-edit"></i> Update</button>
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
		$("#tombolCancel").click(function(){
			$(".anggotaForm").slideUp();
		});
		
		$("#formRegistrasi").on("submit", (function(e){
			e.preventDefault();
			var nama			= $("#nama");
			var email			= $("#email");
			var tlp				= $("#tlp");
			var kategoriUsaha	= $("#kategoriUsaha");
			var id				= "<?php echo $id;?>";
			var updateAnggota	= "1";
			
				if(nama.val()==''){
					nama.focus();
					$.gritter.add({
						title: 'Attention',
						text: '* Mohon Input Nama Anggota.',
						sticky: false,
						time: '',
						class_name: 'gritter-error'
					});
					return false;
				}else if(email.val()==''){
					email.focus();
					$.gritter.add({
						title: 'Attention',
						text: '* Mohon Input Email Anggota.',
						sticky: false,
						time: '',
						class_name: 'gritter-error'
					});
					return false;
				}else if(tlp.val()==''){
					tlp.focus();
					$.gritter.add({
						title: 'Attention',
						text: '* Mohon Input Tlp Anggota.',
						sticky: false,
						time: '',
						class_name: 'gritter-error'
					});
					return false;
				}else if(kategoriUsaha.val()==''){
					kategoriUsaha.focus();
					$.gritter.add({
						title: 'Attention',
						text: '* Mohon Input Kategori Usaha.',
						sticky: false,
						time: '',
						class_name: 'gritter-error'
					});
					return false;
				}
			
			if (confirm('Are you sure ?')){
				$.ajax({
					url: "pages/anggota/anggotaSave.php?nama="+nama.val()+"&email="+email.val()+"&tlp="+tlp.val()+"&kategoriUsaha="+kategoriUsaha.val()+"&id="+id+"&updateAnggota="+updateAnggota,
					type: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data){
						if(data!=''){
							$.gritter.add({
								title: 'Attention',
								text: data,
								sticky: false,
								time: '',
								class_name: 'gritter-error'
							});
							return false;
						}else{
							parent.window.location.reload(true);
						}
					},
					error: function(){
						alert("Input Failure!");
					}
				});
				return false;
			}else{
				return false;
			}
			
		}));
	});
</script>