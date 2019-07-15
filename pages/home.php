	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<p align='center'>
						<img src="plugins/images/system/header1.jpg" alt="Smart Enterpreneur Coaching" class="img-rounded img-responsive">
					</p>
					<hr/>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<p align='center'>
						<img src="plugins/images/system/header2.jpg" alt="Smart Enterpreneur Coaching" class="img-rounded img-responsive">
					</p>
					<hr/>
				</div>
				<div class="col-md-8 col-md-offset-2">
					<h2 align='center'>Mari Bergabung Bersama Kami</h2>
					<hr/>
				</div>
				<div id="fh5co-board" data-columns>
					<?php
						$query	= mysql_query("SELECT * FROM anggota WHERE status!='Menunggu' ORDER BY id DESC");
						while($data	= mysql_fetch_array($query)){
					?>
							<div class="item">
								<div class="animate-box">
									<a href="plugins/images/<?php echo $data['foto'];?>" class="image-popup fh5co-board-img" title="Nama: <?php echo $data['nama']."<br/>Email: ".$data['email']."<br/>Pengusaha: ".$data['kategoriUsaha'];?>">
									<img src="plugins/images/<?php echo $data['foto'];?>" alt="<?php echo $data['kategoriUsaha'];?>"></a>
								</div>
								<div class="fh5co-desc">[<?php echo $data['nama'];?>] - <?php echo $data['kategoriUsaha'];?></div>
							</div>
					<?php
						}
					?>
				</div>
				
			</div>
		</div>
	</div>