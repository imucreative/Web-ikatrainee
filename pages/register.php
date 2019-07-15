	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<h2 align='center'>Register</h2>
					<hr/>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					
					<form id='formRegistrasi' method='post'>
						<div class="row">
							<div class="col-md-4">Full Name</div>
							<div class="col-md-8">
								<div class="form-group">
									<input type="text" class="form-control nama" placeholder="* Full Name" required>	
								</div>
							</div>
							
							<div class="col-md-4">Email Address</div>
							<div class="col-md-8">
								<div class="form-group">
									<input type="email" class="form-control email" placeholder="* Email Address" required>
								</div>
							</div>
							
							<div class="col-md-4">Telephone</div>
							<div class="col-md-8">
								<div class="form-group">
									<input type="text" class="form-control tlp" placeholder="* Telephone" required>
								</div>
							</div>
							
							<div class="col-md-4">Foto Usaha Anda (* 500Kb)</div>
							<div class="col-md-8">
								<div class="form-group">
									<input type="file" placeholder="* Foto" name="foto" required>
								</div>
							</div>
							
							<div class="col-md-4">Pengusaha</div>
							<div class="col-md-8">
								<div class="form-group">
									<select name="kategoriUsaha" class="form-control kategoriUsaha" required>
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
							
							<div class="col-md-12">
								<!--
								<div class="form-group">
									<textarea name="message" id="message" cols="10" class="form-control usaha" rows="10" placeholder="* Usaha Anda" required></textarea>
								</div>
								-->
								<div class="form-group">
									<input type="submit" class="btn btn-primary tombolSubmit" value="Submit">
								</div>
							</div>
						</div>
					</form>
					
				</div>
        	</div>
       </div>
	</div>
	
	<script src="plugins/js/jquery.min.js"></script>
	<script>
		$(function(){
			$("#formRegistrasi").on("submit", (function(e){
				e.preventDefault();
				var nama			= $(".nama");
				var email			= $(".email");
				var tlp				= $(".tlp");
				var kategoriUsaha	= $(".kategoriUsaha");
				
				
				if (confirm('Apakah anda ingin mendaftar & sukses bersama kami?')){
					if(nama.val()==''){
						nama.focus();
						nama.attr("placeholder", "* Mohon Input Nama Lengkap");
						return false;
					}else if(email.val()==''){
						email.focus();
						email.attr("placeholder", "* Mohon Input Alamat Email");
						return false;
					}else if(tlp.val()==''){
						tlp.focus();
						tlp.attr("placeholder", "* Mohon Input No Telephone");
						return false;
					}else if(kategoriUsaha.val()==''){
						kategoriUsaha.focus();
						alert("* Mohon Input Kategori Usaha Anda");
						return false;
					}
					
					$.ajax({
						url: "pages/registerSave.php?nama="+nama.val()+"&email="+email.val()+"&tlp="+tlp.val()+"&kategoriUsaha="+kategoriUsaha.val(),
						type: "POST",
						data: new FormData(this),
						contentType: false,
						cache: false,
						processData: false,
						success: function(data){
							alert(data);
							parent.window.location.reload(true);
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
				
			}));
		});
	</script>