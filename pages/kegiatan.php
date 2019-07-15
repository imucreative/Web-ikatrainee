	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-md-offset-2">
					<h2 align='center'>Kegiatan</h2>
					<hr/>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					<p align='center'>
						<img src="plugins/images/system/kegiatan.jpg" alt="Smart Enterpreneur Coaching" class="img-rounded img-responsive">
					</p>
					
					<div class="row">
						<?php
							$queryKegiatan	= mysql_query("SELECT * FROM kegiatan");
							while($dataKegiatan	= mysql_fetch_array($queryKegiatan)){
						?>
								<div class="col-md-12">
									<div class="fh5co-pricing-table">
										<h3><?php echo $dataKegiatan['judul'];?></h3>
										<ul class="fh5co-list-check">
											<li class="fh5co-include"><?php echo $dataKegiatan['isi'];?></li>
										</ul>
									</div>
								</div>
						<?php
							}
						?>
					</div>
				</div>
        		
        	</div>
       </div>
	</div>