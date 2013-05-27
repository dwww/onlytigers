			<div ID="gallery">
				<div ID="pics">
					<?php foreach ($slike as $slika ): ?>
					    <div class="gallery_image_container">
							<img class="gallery_image" alt="ni slike" src="<?php echo $slika;?>">
						</div>
					<?php endforeach; ?>	
					<div class="clear"> </div>
				</div> <!-- end pics -->
			</div>  <!-- gallery -->