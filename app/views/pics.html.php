			<div ID="gallery">
				<div ID="pics">
					<?php foreach ($slike as $slika ): ?>
					    <div class="gallery_image_container">
					    	<?php if ($rights > 0):?>
								<div class="admin-image-buttons">
									<a href="?page=changeStatus&imageId=<?php echo $slika['id'];?>"> 
										<button class="btn btn-mini upvote-button <?php echo $slika['status']==1 ? "btn-info": "btn-danger";?> ">
											<i class="icon-remove-sign"></i>
										</button> 
									</a>
								</div>
							<?php endif;?>
							<img class="gallery_image" id="<?php echo $slika['id'];?>" alt="ni slike" src="<?php echo $slika['url'];?>">
							
						</div>
					<?php endforeach; ?>	
					<div class="clear"> </div>
				</div> <!-- end pics -->
			</div>  <!-- gallery -->