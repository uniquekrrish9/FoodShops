<div class="Popular-Restaurants-content">
	<div class="Popular-Restaurants-grids">
		<div class="container">
		<?php 
		if(isset($rests))
		{
			foreach ($rests as $row) {
				echo '<div class="Popular-Restaurants-grid wow fadeInLeft" data-wow-delay="0.4s"><div class="col-md-3 restaurent-logo"><img src="'.ASSETS2.'rest_logo/'.$row['rest_logo'].'" class="img-responsive" alt="" />
				</div><div class="col-md-3 restaurent-title"><div class="logo-title logo-title-1"><h4><a href="javascript:;">'.$row['rest_name'].'</a></h4>
					</div><div class="rating"><span>ratings</span><a href="#"> <img src="'.ASSETS.'images/star2.png" lass="img-responsive" alt="">(005)</a></div></div><div class="col-md-7 buy"><span><i class="fa fa-phone" aria-hidden="true"></i>&nbsp; '.$row['rest_phone'].'</span><input type="button" value="Call">
				</div><div class="clearfix"></div></div>';
			}
		}
		?>
		</div>
	</div>
</div>