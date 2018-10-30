			<div class="span12">      		
				<div class="widget ">

					<div class="widget-header">
						<i class="icon-user"></i>
						<h3>Edit Product</h3>
					</div> <!-- /widget-header -->

					<div class="widget-content">

						<form role="form" class="form-horizontal" action="<?=Adminpath?>EditProduct/<?=(isset($offer_detail) ? $offer_detail->id : '')?>" method="post" enctype="multipart/form-data">
							<fieldset>
								<input type="hidden" name="id" value="<?= (isset($offer_detail) ? $offer_detail->id : '')?>">
								<div class="control-group">											
									<label class="control-label" for="username">Restaurant Name</label>
									<div class="controls">
										<select class="span4" name="restid">
											<?=(isset($restname)) ? $restname: ''; ?>
										</select>
										<p class="help-block"><?=form_error('pname')?></p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								<div class="control-group">											
									<label class="control-label" for="username">Name</label>
									<div class="controls">
										<input type="text" class="span4" id="pname" required="true" name="pname" value="<?= (isset($offer_detail) ? $offer_detail->name : '')?>"/>
										<p class="help-block"><?=form_error('pname')?></p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								<div class="control-group">											
									<label class="control-label" for="username">Description</label>
									<div class="controls">
										<input type="text" class="span4" id="pdetail" required="true" name="pdetail" value="<?= (isset($offer_detail) ? $offer_detail->details : '')?>"/>
										<p class="help-block"><?=form_error('pdetail')?></p>
									</div> <!-- /controls -->				
								</div> <!-- /control-group -->
								<div class="control-group">											
									<label class="control-label" for="username">Price</label>
									<div class="controls">
										<div class="input-prepend input-append">
											<span class="add-on">Rs</span>
											<input class="span2" id="price" name="price" required="true" type="text" value="<?= (isset($offer_detail) ? $offer_detail->price : '')?>">
											<span class="add-on">.00</span>
											<p class="help-block"><?=form_error('price')?></p>
										</div>
									</div><!-- /control-class -->
								</div> <!-- /control-group -->
								<div class="control-group">											
									<label class="control-label" for="username">Product Image</label>
									<div class="controls">
										<input type="file" name="file" id="file" class="span4" />
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