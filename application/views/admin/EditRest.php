			<div class="span12">      		
				<div class="widget ">

					<div class="widget-header">
						<i class="icon-user"></i>
						<h3>Add New Offer</h3>
					</div> <!-- /widget-header -->

					<div class="widget-content">

						<form role="form" class="form-horizontal" action="<?=Adminpath?>EditRest/<?=(isset($offer_detail) ? $offer_detail->rid : '')?>" method="post" enctype="multipart/form-data">
							<fieldset>

								<input type="hidden" name="rid" value="<?= (isset($offer_detail) ? $offer_detail->rid : '')?>">
								<div class="control-group">											
									<label class="control-label" for="username">Restaurant Name</label>
									<div class="controls">
										<input type="text" class="span4" id="slider_name" required="true" name="rest_name" value="<?= (isset($offer_detail) ? $offer_detail->rest_name : '')?>" />
										<p class="help-block"><?=form_error('rest_name')?></p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->

								<div class="control-group">											
									<label class="control-label" for="username">Restaurant Address</label>
									<div class="controls">
										<textarea class="span4" id="slider_name" required="true" name="rest_address"><?= (isset($offer_detail) ? $offer_detail->rest_address : '')?></textarea>
										<p class="help-block"><?=form_error('rest_address')?></p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->

								<div class="control-group">											
									<label class="control-label" for="username">Restaurant Phone</label>
									<div class="controls">
										<input type="text" class="span4" id="slider_name" required="true" name="rest_phone" value="<?= (isset($offer_detail) ? $offer_detail->rest_phone : '')?>" />
										<p class="help-block"><?=form_error('rest_phone')?></p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->

								<div class="control-group">											
									<label class="control-label" for="username">Restaurant City</label>
									<div class="controls">
										<input type="text" class="span4" id="slider_name" required="true" name="rest_city"  value="<?= (isset($offer_detail) ? $offer_detail->rest_city : '')?>"/>
										<p class="help-block"><?=form_error('rest_city')?></p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->

								<div class="control-group">											
									<label class="control-label" for="username">Restaurant Image</label>
									<div class="controls">
										<input type="file" required="true" name="file" id="file" onchange="loadFile(event)" class="span4" />
										<img id="imgprvw" width="150" height="120" src="" draggable="false" style="border: none;" />
										<!-- <input type="hidden" name="file" id="oldfile" value="<?=(isset($offer_detail->img)) ? $offer_detail-> img : '';?>"/> -->
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								<br />
								<?php 
								if(isset($success))
									echo '<div class="alert alert-success alert-dismissable">
								<i class="fa fa-check"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>'.$success.'</b></div>';
								if(isset($error))
									echo '<div class="alert alert-danger alert-dismissable">
								<i class="fa fa-check"></i>
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>'.$error.'</b></div>';
								?>
								<br />

								<div class="form-actions">
									<input type="submit" name="submit" class="btn btn-primary" value="Save"/>
									<input type="reset" name="reset" class="btn" value="Reset"/>
								</div> <!-- /form-actions -->

							</fieldset>
						</form>
					</div>
				</div>
			</div> <!-- /widget-content -->
		</div> <!-- /widget -->
	</div> <!-- /span8 -->