
	<div id="fh5co-main">
		<div class="container">
			<div class="row">
				
				<div class="col-md-8 col-md-offset-2">
					<h2 align='center'>Materi</h2>
					<hr/>
					<div class="fh5co-spacer fh5co-spacer-sm"></div>
					
					<div class="row">
						<?php
							$query		= mysql_query("SELECT * FROM materi");
							while($data	= mysql_fetch_array($query)){
						?>
								<div class="col-md-12">
									<div class="fh5co-pricing-table">
										<h3><?php echo $data['judul'];?></h3>
										<ul class="fh5co-list-check">
											<li class="fh5co-include"><?php echo $data['isi'];?></li>
										</ul>
									</div>
								</div>
						<?php
							}
						?>
						<!--
						<div class="col-md-4">
							<div class="fh5co-pricing-table">
								<h3>Basic</h3>
								<ul class="fh5co-list-check">
									<li class="fh5co-include">5 users</li>
									<li class="fh5co-include">10 projects</li>
									<li class="fh5co-include">10GB amount of space</li>
									<li>5 e-mail accounts</li>
								</ul>
								<a href="#" class="btn btn-block btn-sm btn-primary">Sign up</a>
							</div>
						</div>
						-->
					</div>
				</div>
        		
        	</div>
       </div>
	</div>