								<?php if ($username !== ""): ?>
									<div class="comment round-border-4">
										<div class="controls" id="cmt">
											<input type="hidden" id="comment-slika-id" name="slika-id" value="<?php echo $slikaid?>"></input>
											<textarea class="xxlarge" id="comment-textfield" name="comment-textfield" rows="2" cols="30" placeholder="Submit a comment"></textarea>
						              	</div>
									</div>
								<?php endif; ?>
								
								<?php foreach ($comments as $commment):?>
									<div class="comment round-border-4">
										<div class="comment-body">
											<div class="comment_head">
												<span class="c_author"><?php echo $commment["user"];?></span>
												<span class="c_date"><?php echo $commment["created"];?></span>
												<span class="c_author pull-right"><?php echo $commment["score"];?></span>
											</div>
											<div class="comment_text round-border-4">
												<?php echo $commment["text"];?>
											</div>
										</div>
										<div class="comment-arrows">
											<button class="btn btn-mini upvote-button"><i class="icon-arrow-up"></i></button><br>
											<button class="btn btn-mini downvote-button"><i class="icon-arrow-down"></i></button>
										</div>
										<div class="clear"></div>
									</div>
									
								<?php endforeach;?>
																
