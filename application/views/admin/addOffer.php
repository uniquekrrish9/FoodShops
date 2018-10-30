<script type="text/javascript">
	$(document).ready(function(){
		$("#spcldiv").hide();
		$("#isSpcl").on("change",function() {
			$("#spcldiv").toggle(this.checked);
		});    
	}); 
</script>
<div class="span12">      		
	<div class="widget ">

		<div class="widget-header">
			<i class="icon-user"></i>
			<h3>Add New Product</h3>
		</div> <!-- /widget-header -->

		<div class="widget-content">

			<form role="form" class="form-horizontal" action="<?=Adminpath?>addProduct" method="post" enctype="multipart/form-data">
				<fieldset>
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
							<input type="text" class="span4" id="pname" required="true" name="pname"/>
							<p class="help-block"><?=form_error('pname')?></p>
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="username">Description</label>
						<div class="controls">
							<input type="text" class="span4" id="pdetail" required="true" name="pdetail"/>
							<p class="help-block"><?=form_error('pdetail')?></p>
						</div> <!-- /controls -->				
					</div> <!-- /control-group -->
					<div class="control-group">											
						<label class="control-label" for="username">Price</label>
						<div class="controls">
							<div class="input-prepend input-append">
								<span class="add-on">Rs</span>
								<input class="span2" id="price" name="price" required="true" type="text">
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

					<div class="control-group">											
						<label class="control-label" for="username">Is Special Offer ?</label>
						<div class="controls">
							<input type="checkbox" class="span2" name="isSpcl" value="1" id="isSpcl">
						</div> <!-- /controls -->				
					</div>

					<div id="spcldiv">
						<div class="control-group">		
							<label class="control-label" for="username">Special offer price</label>
							<div class="controls"><div class="input-prepend input-append">
								<span class="add-on">Rs</span>
								<input class="span2" id="spclprice" name="spclprice" type="text">
								<span class="add-on">.00</span>
							</div></div> <!-- /controls -->				
						</div>
						<div class="control-group">
							<label class="control-label" for="username">Special Offer Validaty</label>
							<div class="controls">
								<input type="date" class="span4" id="spcldate" name="spcldate"/>
							</div> <!-- /controls -->				
						</div>
					</div>
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