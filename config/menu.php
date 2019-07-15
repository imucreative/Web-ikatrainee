	<ul>
		<?php
			if($_REQUEST['page']==''){
		?>
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="index.php?page=undangan">Undangan</a></li>
				<li><a href="index.php?page=kegiatan">Kegiatan</a></li>
				<li><a href="index.php?page=materi">Materi</a></li>
				<li><a href="index.php?page=pembicara">Pembicara</a></li>
				<li><a href="index.php?page=register">Register</a></li>
		<?php
			}elseif($_REQUEST['page']=='undangan'){
		?>
				<li><a href="index.php">Home</a></li>
				<li class="active"><a href="index.php?page=undangan">Undangan</a></li>
				<li><a href="index.php?page=kegiatan">Kegiatan</a></li>
				<li><a href="index.php?page=materi">Materi</a></li>
				<li><a href="index.php?page=pembicara">Pembicara</a></li>
				<li><a href="index.php?page=register">Register</a></li>
		<?php
			}elseif($_REQUEST['page']=='kegiatan'){
		?>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=undangan">Undangan</a></li>
				<li class="active"><a href="index.php?page=kegiatan">Kegiatan</a></li>
				<li><a href="index.php?page=materi">Materi</a></li>
				<li><a href="index.php?page=pembicara">Pembicara</a></li>
				<li><a href="index.php?page=register">Register</a></li>
		<?php
			}elseif($_REQUEST['page']=='materi'){
		?>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=undangan">Undangan</a></li>
				<li><a href="index.php?page=kegiatan">Kegiatan</a></li>
				<li class="active"><a href="index.php?page=materi">Materi</a></li>
				<li><a href="index.php?page=pembicara">Pembicara</a></li>
				<li><a href="index.php?page=register">Register</a></li>
		<?php
			}elseif($_REQUEST['page']=='pembicara'){
		?>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=undangan">Undangan</a></li>
				<li><a href="index.php?page=kegiatan">Kegiatan</a></li>
				<li><a href="index.php?page=materi">Materi</a></li>
				<li class="active"><a href="index.php?page=pembicara">Pembicara</a></li>
				<li><a href="index.php?page=register">Register</a></li>
		<?php
			}elseif($_REQUEST['page']=='register'){
		?>
				<li><a href="index.php">Home</a></li>
				<li><a href="index.php?page=undangan">Undangan</a></li>
				<li><a href="index.php?page=kegiatan">Kegiatan</a></li>
				<li><a href="index.php?page=materi">Materi</a></li>
				<li><a href="index.php?page=pembicara">Pembicara</a></li>
				<li class="active"><a href="index.php?page=register">Register</a></li>
		<?php
			}
		?>
	</ul>