		
		<div ID="header">
			<div class="navbar navbar-inverse">
				<div class="navbar-inner">
					<div class="container-fluid">
						<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="brand" href="#">OnlyTigers</a>
							<div class="nav-collapse collapse">
								<ul class="nav">
									<li class="active"></li>
									<li><a href="?page=index">Home</a></li>
									<li><a href="?page=index">Gallery</a></li>
									<li><a href="?page=index">About</a></li>
								</ul>
								<?php if ($username === ""):?>
									<?php include 'toolbarSign.html.php';?>
								<?php else:?>
									<ul class="nav pull-right">
										<li class="active"></li>
										<li><a href="?page=signout">Log out</a></li>
									</ul>
									<p class="navbar-text pull-right">
										Logged in as <a href="#" class="navbar-link"><?php echo $username;?></a> 
									</p>
									<ul class="nav pull-right">
										<li class="active"></li>
										<li><a href="?page=upload">Upload</a></li>
									</ul>
								<?php endif;?>
							</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
		</div>
		