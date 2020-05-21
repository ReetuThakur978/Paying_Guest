<section>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-expand-lg navbar-light navigation">
					<a class="navbar-brand" href="index.html">
						<img src="/img/pg.jpg" alt="">
					</a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
					 aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto main-nav ">
							<li class="nav-item active">
								<!-- <a class="nav-link" href="index.html">Home</a> -->
								<?= $this->Html->link(__('Home'), ['controller'=>'Users','action' => 'index'], ['class' => 'nav-link']) ?>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="">Available for<span><i class="fa fa-angle-down"></i></span>
								</a>

								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<!-- <a class="dropdown-item" href="dashboard.html"></a> -->
									<a class="dropdown-item" href="dashboard-my-ads.html">Girls</a>
									<a class="dropdown-item" href="dashboard-favourite-ads.html">Boys</a>
									<a class="dropdown-item" href="dashboard-archived-ads.html">Both</a>
									<!-- <a class="dropdown-item" href="dashboard-pending-ads.html">Dashboard Pending Ads</a> -->
								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Popular area <span><i class="fa fa-angle-down"></i></span>
								</a>
								<!-- Dropdown list -->
								<div class="dropdown-menu">
									<a class="dropdown-item" href="about-us.html">Sector-37 chandigarh</a>
									<a class="dropdown-item" href="contact-us.html">Sahibzada Ajit singh Nagar</a>
									<a class="dropdown-item" href="user-profile.html">Daddu Majra colony</a>
									<a class="dropdown-item" href="404.html">Shivalik Enclave</a>
									<a class="dropdown-item" href="package.html">Sector-63 Mohali</a>
									<a class="dropdown-item" href="single.html">Manimajra</a>
									<a class="dropdown-item" href="store.html">Sector-22 Chandigarh</a>
									<a class="dropdown-item" href="single-blog.html">Sector-13 Chandigarh</a>
									<!-- <a class="dropdown-item" href="blog.html">Blog</a> -->

								</div>
							</li>
							<li class="nav-item dropdown dropdown-slide">
								<?= $this->Html->link(__('Contact us'), ['controller'=>'Website','action' => 'contactus'], ['class' => 'nav-link']) ?>
							</li>
						</ul>
						<ul class="navbar-nav ml-auto mt-10">
							<li class="nav-item">
								<!-- <a class="nav-link login-button" href="login.php">Login</a> -->
								<?php if(!$email): ?>
								<?= $this->Html->link(__('Login'), ['controller'=>'Users','action' => 'login'], ['class' => 'nav-link login-button']) ?>
							<?php endif; ?>
							</li>
							<li class="nav-item">
								<!-- <a class="nav-link text-white add-button" href="register.php">Registeration Page</a> -->
								<?php if(!$email): ?>
								<?= $this->Html->link(__('Registeration Page'), ['controller'=>'Website','action' => 'register'], ['class' => 'nav-link text-white add-button']) ?>
							<?php endif; ?>	
							</li>
							<li class="nav-item">
								<?php if($email): ?>
									<?= $this->Html->link(__('Visit Website'), ['controller'=>'Website','action' => 'home'], ['class' => 'nav-link login-button']) ?>
									<?php endif; ?>	
							</li>
							<li class="nav-item">
								<?php if($email): ?>
								<?= $this->Html->link(__('Logout'), ['controller'=>'Users','action' => 'logout'], ['class' => 'nav-link text-white add-button']) ?>
							<?php endif; ?>	
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
