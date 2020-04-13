<!DOCTYPE html>
<html lang="en">
<head> 
	<?= $this->Html->charset() ?>
 <title><?= isset($title)?$title:""; ?></title>
 <style type="text/css">
 	.right{dislpay:inline; float:right}
.right button{margin-right:50px}
 </style>
</head>
<h3>Welcome:-
<?php
$name = $this->getRequest()->getSession()->read('Auth.firstname');
echo $name;
?></h3> 
<body class="body-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<form>
						<div class="form-row">

 

							<!-- <div class="form-group col-md-4">
								<input type="text" class="form-control my-2 my-lg-0" id="inputtext4" placeholder="What are you looking for">
							</div>
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputCategory4" placeholder="Category">
							</div> -->
							<div class="form-group col-md-3">
								<input type="text" class="form-control my-2 my-lg-0" id="inputLocation4" placeholder="Enter your Location">
							</div>
							<div class="form-group col-md-2">
								
								<button type="submit" class="btn btn-primary">Search Now</button><br><br>

									</div>
                                 <div class="right"> 
			 	                      <!-- <?= $this->Html->link(__('Logout'), ['action' => 'logout'], ['class' => 'btn btn-primary']) ?> -->
							          <?= $this->html->link(__('Edit Profile') ,['action'=>'userprofile'],['class'=>'btn btn-primary']); ?>
                                 </div>		
						</div>

					</form>
				<!-- </div> -->
			</div>

		</div>
	</div>
	
			 	
<!-- </section> -->
<section class="section-sm">
	<div class="container">
		<!-- <div class="row">
			<div class="col-md-12">
				<div class="search-result bg-gray">
					<h2>Results For "Electronics"</h2>
					<p>123 Results on 12 December, 2017</p>
				</div>
			</div>
		</div>
 -->
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">
					<!-- <div class="widget category-list">
	<h4 class="widget-header">Available for</h4>
	<ul class="category-list">
		<li><a href="category.html">Girls</a></li>
		<li><a href="category.html">Boys</a></li>
		<li><a href="category.html">Both</a></li>
	</ul>
</div> -->

<div class="widget product-shorting">
	<h4 class="widget-header">Available for</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Girls
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Boys
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Both
	  </label>
	</div>
	<!-- <div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Havely New
	  </label>
	</div> -->
</div>

<div class="widget category-list">
	<h4 class="widget-header">All Category</h4>
	<ul class="category-list">
		<li><a href="category.html">Single</a></li>
		<li><a href="category.html">Double</a></li>
		<li><a href="category.html">Triple</a></li>
		<li><a href="category.html">Quad</a></li>
		<!-- <li><a href="category.html">Texas <span>40</span></a></li>
		<li><a href="category.html">Alaska <span>81</span></a></li> -->
	</ul>
</div>

<div class="widget filter">
	<h4 class="widget-header">Show Produts</h4>
	<select>
		<option>Popularity</option>
		<option value="1">Top rated</option>
		<option value="2">Lowest Price</option>
		<option value="4">Highest Price</option>
	</select>
</div>

<div class="widget price-range w-100">
	<h4 class="widget-header">Price Range</h4>
	<div class="block">
						<input class="range-track w-100" type="text" data-slider-min="0" data-slider-max="5000" data-slider-step="5"
						data-slider-value="[0,5000]">
				<div class="d-flex justify-content-between mt-2">
						<span class="value">$10 - $5000</span>
				</div>
	</div>
</div>

<!-- <div class="widget product-shorting">
	<h4 class="widget-header">By Condition</h4>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Brand New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Almost New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Gently New
	  </label>
	</div>
	<div class="form-check">
	  <label class="form-check-label">
	    <input class="form-check-input" type="checkbox" value="">
	    Havely New
	  </label>
	</div>
</div> -->

				</div>
			</div>

			<div class="col-md-9">
				<div class="category-search-filter">
					<div class="row">
						<div class="col-md-6">
							<h3>Results :</h3><br>
							<strong>Short by:</strong>
							<select>
								<option>Most Recent</option>
								<option value="1">Most Popular</option>
								<option value="2">Lowest Price</option>
								<option value="4">Highest Price</option>
							</select>
						</div>
						<!-- <div class="col-md-6">
							<div class="view">
								<strong>Views</strong>
								<ul class="list-inline view-switcher">
									<li class="list-inline-item">
										<a href="#" onclick="event.preventDefault();" class="text-info"><i class="fa fa-th-large"></i></a>
									</li>
									<li class="list-inline-item">
										<a href="ad-list-view.html"><i class="fa fa-reorder"></i></a>
									</li>
								</ul>
							</div>
						</div> -->
					</div>
				</div>



				<div class="product-grid-list">
					<div class="row mt-30">
						
						<?php foreach ($rooms as $room): ?>
                        <?php if($room->image <= 8): ?>
						
						<div class="col-sm-12 col-lg-4 col-md-6">


							<!-- product card -->
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			<div class="price">Rs: <?= $this->Number->format($room->rent) ?></div> 
			<a href="single.html">
				<?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><?= h($room->pgdetails->$details) ?> </a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<!-- <a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a> -->
		    		<?= $this->Html->link(__('About PG'), ['controller'=>'Rooms','action' => 'view'], ['class' => 'side-nav-item']) ?> 
		    	</li>
		    	<!-- <li class="list-inline-item">
		    		<a href="#"><i class="fa fa-calendar"></i>About us</a>
		    	</li> -->
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
</div>
<?php endif; ?>	
<?php endforeach; ?>

	<!-- 
					

	<div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
				<?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?>
			<?= $this->Number->format($room->rent) ?>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 3456</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    	</li>
		    	
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
</div>

	     <div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
			 <?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?>
			<?= $this->Number->format($room->rent) ?>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 1234</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Electronics</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
</div> -->

						

<!-- 
						<div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
			<?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 2314</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    	</li>
		    	
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
</div>  -->
						



						<!-- <div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
				<td><?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?></td>
							</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 5431</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    	</li>
		    	
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
			<td><?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?></td>	
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 3245</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    	</li>
		    	
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
</div> 
	
		
			



						<div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
				<td><?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?></td>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 3267</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    	</li>
		    	
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
				<td><?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?></td>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 2398</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    	</li>
		    	<li class="list-inline-item">
		    		<a href="#"><i class="fa fa-calendar"></i>26th December</a>
		    	</li>
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>



						</div>
						<div class="col-sm-12 col-lg-4 col-md-6">
							
<div class="product-item bg-light">
	<div class="card">
		<div class="thumb-content">
			
			<a href="single.html">
				<td><?= $this->Html->image($room->image,['class'=>'card-img-top img-fluid']) ?></td>
			</a>
		</div>
		<div class="card-body">
		    <h4 class="card-title"><a href="single.html">House no. 1572</a></h4>
		    <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    	</li>
		    	
		    </ul>
		    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo, aliquam!</p>
		    <div class="product-ratings">
		    	<ul class="list-inline">
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item selected"><i class="fa fa-star"></i></li>
		    		<li class="list-inline-item"><i class="fa fa-star"></i></li>
		    	</ul>
		    </div>
		</div>
	</div>
</div>
</div>
					</div>
				</div> -->



				<div class="pagination justify-content-center">
					<nav aria-label="Page navigation example">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span aria-hidden="true">&laquo;</span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item active"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span aria-hidden="true">&raquo;</span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>

</body>

</html>