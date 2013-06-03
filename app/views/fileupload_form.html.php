<div class="row-fluid">
	<div class="span3"></div>
	<div class="span6">
		<div class="well">
			<form id="upload_image fileupload" class="form-horizontal" method="post"
				action="?page=upload_image" name="changer" enctype="multipart/form-data">
				<legend>Upload</legend>
				<div class="fileupload fileupload-new" data-provides="fileupload">
		  			<div class="control-label padding-right-20">
		  				<span class="btn btn-file"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" /></span>
		    			<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Remove</a>
		  			</div>
					<div class="fileupload-new thumbnail" style="width: 200px; height: 150px;"><img src="/img/sample200x150.gif" /></div>
		  			<div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 300px; max-height: 250px; line-height: 20px;"></div>
				</div>
				
				<div class="control-group ">
					<label class="control-label">Image</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-tags"></i> </span> 
							<input type="file" class="tags-input, input-xlarge" id="picture-tags" name="image" placeholder="Picture tags">
						</div>
					</div>
				</div>
				
				<div class="control-group ">
					<label class="control-label">Image title</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-info-sign"></i> </span> 
							<input type="text" class="input-xlarge" id="ptitle" name="title" placeholder="Picture title">
						</div>
					</div>
				</div>

				
				<div class="control-group ">
					<label class="control-label">Image tags</label>
					<div class="controls">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-tags"></i> </span> 
							<input type="text" class="tags-input, input-xlarge" id="picture-tags" name="tags" placeholder="Picture tags">
						</div>
					</div>
				</div>
				<div class="control-group ">
					<label class="control-label">Description</label>
					<div class="controls">
						<textarea class="xxlarge" id="image-description" name="description" rows="3" cols="30" placeholder="Image description"></textarea>
              		</div>
         		 </div>
				<div class="control-group">
					<label class="control-label"></label>
					<div class="controls">
						<button type="submit" class="btn btn-success">Upload image</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="span3"></div>
</div>