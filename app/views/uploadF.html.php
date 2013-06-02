<div class="row-fluid">
	<div class="span3"></div>
	<div class="span6">
			<div class="well">
				<form action='?page=upload_image' method='post' enctype='multipart/form-data' id='upload'>
					<legend>Upload Picture</legend>
							<div class="control-group">
								<label class="control-label">Picture</label>
								<div class="controls">
									<div class="input-prepend">
										<input type='file' name='image'>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Title</label>
								<div class="controls">
									<div class="input-prepend">
										<input type='text' name='title'>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Tags</label>
								<div class="controls">
									<div class="input-prepend">
										<input type='text' name='tags'>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Description</label>
								<div class="controls">
									<div class="input-prepend">
										<textarea name='description'></textarea>
									</div>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label"></label>
								<div class="controls">
									<div class="input-prepend">
										<button type="submit" class="btn btn-success">Upload</button>
									</div>
								</div>
							</div>
					</form>
			</div>
	</div>
	<div class="span3"></div>
</div>