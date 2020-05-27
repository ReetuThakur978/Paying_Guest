<!DOCTYPE html>
<html lang="en">
<head>

 <title><?= isset($title)?$title:""; ?></title>
</head>

<body class="body-wrapper">


<!--===================================
=            Store Section            =
====================================-->
<section class="section bg-gray">
	<!-- Container Start -->
	<div class="container">
		<div class="row">
			<!-- Left sidebar -->
			<div class="col-md-8">
				<div class="product-details">
					<h1 class="product-title">PG Detail</h1>
					<div class="product-meta">
						<ul class="list-inline">
							<!-- <li class="list-inline-item"><i class="fa fa-user-o"></i> By <a href="">Andrew</a></li> -->
							<li class="list-inline-item"><i class="fa fa-folder-open-o"></i> Area: <?= $room->has('pgdetail') ? h($room->pgdetail->area) : '' ?></li>
							<li class="list-inline-item"><i class="fa fa-location-arrow"></i> Location: <?= $room->has('pgdetail') ? h($room->pgdetail->location) : '' ?></li>
						</ul>
					</div>

					<!-- product slider -->
					<div class="product-slider">
						<div class="product-slider-item my-4" data-image="images/products/products-1.jpg">
							<center><?= $this->Html->image($room->image) ?></center>
						</div>
						
					</div>
					<!-- product slider -->

					<div class="content mt-5 pt-5">
						<ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
							<!-- <li class="nav-item">
								<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home"
								 aria-selected="true">Product Details</a>
							</li> -->
							<li class="nav-item">
								<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile"
								 aria-selected="false">About PG</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact"
								 aria-selected="false">Reviews</a>
							</li>
						</ul>
						<div class="tab-content" id="pills-tabContent">
							
 							<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
								<h3 class="tab-title">About PG</h3>
								<table class="table table-bordered product-table">
									<tbody>
										<tr>
											<td>AC</td>
											<td><?= h($room->ac) ?></td>
										</tr>
										<tr>
											<td>Seater</td>
											<td><?= h($room->seater) ?></td>
										</tr>
										<tr>
											<td>Food Availability</td>
											<td><?= h($room->food_availability) ?></td>
										</tr>
										<tr>
											<td>Rent</td>
											<td><?= $this->Number->format($room->rent) ?></td>
										</tr>
										<tr>
											<td>Security Charge</td>
											<td><?= $this->Number->format($room->security_charge) ?></td>
										</tr>
										<tr>
											<td>Notic Period</td>
											<td><?= $this->Number->format($room->notic_period) ?> days</td>
										</tr>
										<tr>
											<td>Seates Available</td>
											<td><?= $this->Number->format($room->seates_available) ?></td>
										</tr>
										<tr>
											<td>Only For</td>
											<td><?= $room->has('pgdetail') ? h($room->pgdetail->gender) : '' ?></td>
										</tr>
										<tr>
											<td>Status</td>
											<td><?php
if(h($room->status)==1)
{
    echo "Active";
}
else
{
    echo "Disactive";
}

?></td>
										</tr>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
								<h3 class="tab-title"> Review</h3>
								<div class="product-review">
									<div class="media">
										<!-- Avater -->
										<img src="images/user/user-thumb.jpg" alt="avater">
										<div class="media-body">
											<!-- Ratings -->
											<div class="ratings">
												<ul class="list-inline">
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
													<li class="list-inline-item">
														<i class="fa fa-star"></i>
													</li>
												</ul>
											</div>
											<div class="name">
												<h5>Jessica Brown</h5>
											</div>
											<div class="date">
												<p>Mar 20, 2018</p>
											</div>
											<div class="review-comment">
												<p>
													Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremqe laudant tota rem ape
													riamipsa eaque.
												</p>
											</div>
										</div>
									</div>
									<div class="review-submission">
										<h3 class="tab-title">Submit your review</h3>
										<!-- Rate -->
										<div class="rate">
											<div class="starrr"></div>
										</div>
										<div class="review-submit">
											<form action="#" class="row">
												<div class="col-lg-6">
													<input type="text" name="name" id="name" class="form-control" placeholder="Name">
												</div>
												<div class="col-lg-6">
													<input type="email" name="email" id="email" class="form-control" placeholder="Email">
												</div>
												<div class="col-12">
													<textarea name="review" id="review" rows="10" class="form-control" placeholder="Message"></textarea>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-main">Sumbit</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="widget price text-center">
		<h4>Price</h4>
			
		<p><?= $this->Number->format($room->rent) ?></p>
					</div>
					<!-- User Profile widget -->
					<div class="widget user text-center">
						<img class="rounded-circle img-fluid mb-5 px-5" src="images/user/user-thumb.jpg" alt="">
						<h4><?= $room->has('pgdetail') ? h($room->pgdetail->owner_id) : '' ?></h4>
						<p class="member-time">Member Since <?= h($room->created) ?></p>
						<?= $this->Html->link(__('See all PG'), ['controller'=>'Website','action' => 'home'])?> 
						<!-- <a href="">See all PG</a> -->
						<!-- <ul class="list-inline mt-20">
							<li class="list-inline-item"><a href="" class="btn btn-contact d-inline-block  btn-primary px-lg-5 my-1 px-md-3">Contact</a></li>
							<li class="list-inline-item"><a href="" class="btn btn-offer d-inline-block btn-primary ml-n1 my-1 px-lg-4 px-md-3">Make an
									offer</a></li>
						</ul> -->
					</div>
					<!-- Map Widget -->
					<!-- <div class="widget map">
						<div class="map">
							<div id="map_canvas" data-latitude="51.507351" data-longitude="-0.127758"></div>
						</div>
					</div> -->
					<!-- Rate Widget -->
					<div class="widget rate">
						<!-- Heading -->
						<h5 class="widget-header text-center">What would you rate
							<br>
							this PG</h5>
						<!-- Rate -->
						<div class="starrr"></div>
					</div>
					<!-- Safety tips widget -->
					<!-- <div class="widget disclaimer">
						<h5 class="widget-header">Safety Tips</h5>
						<ul>
							<li>Meet se at a public place</li>
							<li>Check the PG before you stay</li>
							<li>Pay only after collecting the item</li>
							<li>Pay only after collecting the item</li>
						</ul>
					</div> -->
					<!-- Coupon Widget -->
					<div class="widget coupon text-center">
						<?php $seates= $room->has('pgdetail') ? h($room->pgdetail->availability) : '' ?>

		    	<?php
		    	if($seates>0)
		    	{
		           echo $this->Html->link(__('Book PG now'), ['controller'=>'Website','action' => 'bookpg', $room->room_id],['class'=>'btn btn-transparent-white']) ; 
		        }
               else{
	                  echo '<span style="color:black;">Booked</span>';
                   }
		    ?>
						<!-- <a href="" class="btn btn-transparent-white">Submit Listing</a> -->
					</div>

				</div>
			</div>

		</div>
	</div>
	<!-- Container End -->

</body>

</html>