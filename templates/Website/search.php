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
		    	<li class="list-inline-item">
		    		<!-- <a href="single.html"><i class="fa fa-folder-open-o"></i>Discription about PG</a> -->
		    		Food availability : <?= h($room->food_availability) ?>
		    	</li>
		    	<li class="list-inline-item">
		    		<!-- <a href="#"><i class="fa fa-calendar"></i>About us</a> -->
		    		<?= $this->Html->link(__('About PG'), ['controller'=>'Website','action' => 'about'], ['class' => 'fa fa-calendar']) ?> 
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
</div>