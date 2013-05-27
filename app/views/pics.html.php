			<div ID="gallery">
				<div ID="pics">
					<?php foreach ($slike as $id => $slika ): ?>
					    <div class="gallery_image_container">
							<img class="gallery_image" id="<?php echo $id;?>" alt="ni slike" src="<?php echo $slika;?>">
							<div class="under hidden"></div>
						</div>
					<?php endforeach; ?>	
					<div class="clear"> </div>
				</div> <!-- end pics -->
			</div>  <!-- gallery -->