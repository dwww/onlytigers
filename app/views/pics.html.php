			<div ID="gallery">
				<div ID="pics">
					<?php foreach ($slike as $slika ): ?>
					    <div class="gallery_image_container">
							<img class="gallery_image" id="<?php echo $slika['id'];?>" alt="ni slike" src="<?php echo $slika['url'];?>">
							<div class="under hidden"></div>
						</div>
					<?php endforeach; ?>	
					<div class="clear"> </div>
				</div> <!-- end pics -->
			</div>  <!-- gallery -->