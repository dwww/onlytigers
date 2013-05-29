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
									<li><a href="#">Home</a></li>
									<li><a href="#about">About</a></li>
									<li><a href="#contact">Contact</a></li>
								</ul>
								<?php if ($username === ""):?>
									<?php include 'toolbarSign.html.php';?>
								<?php else:?>
									<p class="navbar-text pull-right">
										Logged in as <a href="#" class="navbar-link"><?php echo $username;?></a> 
										<a href="logout" class="navbar-link">Log out</a>
									</p>
								<?php endif;?>
							</div><!--/.nav-collapse -->
					</div>
				</div>
			</div>
		</div>