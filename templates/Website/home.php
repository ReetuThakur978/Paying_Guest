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
<body class="body-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
					<form>
						<div class="form-row">

							<div class="form-group col-md-3">
								<div class="right">
								<?php
                    echo $this->Form->control('search',['class'=>'form-control my-2 my-lg-0','placeholder'=>'Enter your location']);
                    ?>
							</div>
						</div>
					</form>
			</div>
		</div>
	</div>			 	
<!-- </section> -->
<section class="section-sm">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<div class="category-sidebar">

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
						
					</div>
				</div>
				<div class="product-grid-list">
					<div class="row mt-30">				
				  <?php foreach ($rooms as $room ): ?> 
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

		    <h4 class="card-title"><?= $room->has('pgdetail') ? $this->Html->link($room->pgdetail->location, ['controller' => 'Website', 'action' => 'viewpg', $room->room_id]) : '' ?></a></h4>
		    <ul class="list-inline product-meta">
		    	<!-- <li class="list-inline-item">
		    		<a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a>
		    		Food availability : <?= h($room->food_availability) ?>
		    	</li> -->
		    	<li class="list-inline-item">
		    		Only For: <?= $room->has('pgdetail') ? h($room->pgdetail->gender) : '' ?>
		    		<ul class="list-inline justify-content-center">
                      <li class="list-inline-item">
                      	<i class="fa fa-eye"></i>
		    		<?= $this->Html->link(__('View'), ['controller'=>'Website','action' => 'viewpg', $room->room_id], ['class' => 'view']) ?> 
		    		 
		    		
		    		<strong>Status:</strong><?php
if(h($room->status)==1)
{
    // echo "Active".'color:green;';
   echo  '<span style="color:green;">Active</span>';
}
else
{
    echo  '<span style="color:red;">Disactive</span>';
}

?></li>
		    	</ul>

		    	</li>
		    </ul>
		    <p class="card-text">
		    <?= $this->Html->link(__('Book PG now'), ['controller'=>'Website','action' => 'bookpg', $room->room_id]) ?> 
		    	<!-- <span class="status active"><strong>Status</strong>Active</span> -->
		    </p>
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
<?php endforeach; ?>
	
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

<script>
    $('document').ready(function(){
         $('#search').keyup(function(){
            var searchkey = $(this).val();
            searchTags( searchkey );
         });

        function searchTags( keyword ){
        var data = keyword;
        $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Website', 'action' => 'Search' ] ); ?>",
                    data: {keyword:data},

                    success: function( response )
                    {       
                       $( '.table-content' ).html(response);
                    }
                });
        };
    });
</script>

</body>

</html>