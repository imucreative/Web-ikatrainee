<div id="sidebar" class="sidebar responsive">

	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
	</script>
				
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>
			<button class="btn btn-info">
				<i class="ace-icon fa fa-pencil"></i>
			</button>
			<button class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</button>
			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>
		</div>

		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>
			<span class="btn btn-info"></span>
			<span class="btn btn-warning"></span>
			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	
	<ul class="nav nav-list">
		<?php
			if($_REQUEST['page']=='anggota'){
		?>
				<li class="active"><a href="index.php?page=anggota"><i class="menu-icon fa fa-users"></i><span class="menu-text"> Anggota</span></a><b class="arrow"></b></li>
				<li class=""><a href="index.php?page=kegiatan"><i class="menu-icon fa fa-dashboard"></i><span class="menu-text"> Kegiatan </span></a><b class="arrow"></b></li>
				<li class=""><a href="index.php?page=materi"><i class="menu-icon fa fa-list-alt"></i><span class="menu-text"> Materi</span></a><b class="arrow"></b></li>
		<?php
			}elseif($_REQUEST['page']=='kegiatan'){
		?>
				<li class=""><a href="index.php?page=anggota"><i class="menu-icon fa fa-users"></i><span class="menu-text"> Anggota</span></a><b class="arrow"></b></li>
				<li class="active"><a href="index.php?page=kegiatan"><i class="menu-icon fa fa-dashboard"></i><span class="menu-text"> Kegiatan </span></a><b class="arrow"></b></li>
				<li class=""><a href="index.php?page=materi"><i class="menu-icon fa fa-list-alt"></i><span class="menu-text"> Materi</span></a><b class="arrow"></b></li>
		<?php
			}elseif($_REQUEST['page']=='materi'){
		?>
				<li class=""><a href="index.php?page=anggota"><i class="menu-icon fa fa-users"></i><span class="menu-text"> Anggota</span></a><b class="arrow"></b></li>
				<li class=""><a href="index.php?page=kegiatan"><i class="menu-icon fa fa-dashboard"></i><span class="menu-text"> Kegiatan </span></a><b class="arrow"></b></li>
				<li class="active"><a href="index.php?page=materi"><i class="menu-icon fa fa-list-alt"></i><span class="menu-text"> Materi</span></a><b class="arrow"></b></li>
		<?php
			}else{
		?>
				<li class=""><a href="index.php?page=anggota"><i class="menu-icon fa fa-users"></i><span class="menu-text"> Anggota</span></a><b class="arrow"></b></li>
				<li class=""><a href="index.php?page=kegiatan"><i class="menu-icon fa fa-dashboard"></i><span class="menu-text"> Kegiatan </span></a><b class="arrow"></b></li>
				<li class=""><a href="index.php?page=materi"><i class="menu-icon fa fa-list-alt"></i><span class="menu-text"> Materi</span></a><b class="arrow"></b></li>
		<?php
			}
		?>
	</ul><!-- /.nav-list -->
	
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
	
	<script type="text/javascript">
		try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
	</script>
</div>