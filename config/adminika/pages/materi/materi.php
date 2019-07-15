<div class="main-content">
	<div class="main-content-inner">
	
		<div class="breadcrumbs" id="breadcrumbs">
			<script type="text/javascript">
				try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
			</script>
			
			<ul class="breadcrumb">
				<li><i class="ace-icon fa fa-home home-icon"></i><a href="index.php">Home</a></li>
				<li class="active">Materi</li>
			</ul>
		</div>

		<div class="page-content">
			<div class="row">
				<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
					<div class='materiFormInputEdit'></div>
					<div class='materiTabel'></div>
				<!-- PAGE CONTENT ENDS -->
				</div>
			</div>
		</div>
		
	</div>
</div>

	<script src="assets/js/jquery.2.1.1.min.js"></script>
	<script type="text/javascript">
		var materiTabel	= "pages/materi/materiTabel.php";
		$(".materiTabel").html("<center><img src='assets/img/loading.gif'></center>");
		$(".materiTabel").load(materiTabel);
	</script>