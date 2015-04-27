<?php ini_set('display_errors', 1);?>
<div id="wrapper">
	<div id="header">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				
				<a class="navbar-brand" href="/">
					<img src="<?php echo base_url(); ?>resources/img/cummins-logo.png">
					
				</a>
				<a id="menu-toggle" href="#"><span class="glyphicon glyphicon-th-list"></span></a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php echo $nav; ?>
			</div>
		</nav>
	</div>