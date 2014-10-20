<div class="custompage-custom-made-wrap">
<div class='{if isset($success)}message-custom {/if}  {if isset($error)} message-error {/if}'>
{if isset($success)} {$success} {/if}
{if isset($error)} {$error} {/if}
</div>
<h3>Custom Made Products</h3>

<div class="ctpage-left">
<p>
Can’t find what you’re looking for? We can work with you in designing exactly what you are after should you not find what you are looking for in our range of designs. Please send us a brief of what you are hoping to achieve, along with fabric details, size and postcode and we will tailor a quotation accordingly. If you have an image from a magazine, perhaps a sketch you have come up with, then scan and send below for us to review. As you can see, anything is possible……
</p>
<div class="custom-made-step">
	<ul>
		<li>
			<div>
				<img src="img/custommade_step1.png" />
				<div class="bottom-custom-made-step">
					<span class="step_desc">
					YOU HAVE ALREADY SOMETHING IN MIND YOU EXPLAIN US OR YOU SEND US A SKETCH (OR A PICTURE), WE START UNDERSTANDING EACH OTHER
					</span>
					<span class="bullet-right">
						<img src="img/custommade_bullet.png" />
					</span>
				</div>
			</div>
		</li>
		
		<li>
			<div>
				<img src="img/custommade_step1.png" />
				<div class="bottom-custom-made-step">
					<span class="step_desc">
					OUR TEAM OF PROFESSIONAL DESIGNERS WILL DO THE FINAL SKETCH, WE MAKE SURE YOUR PIECE OF FURNITURE IS MADE TO YOUR SPECIFICATIONS
					</span>
					<span class="bullet-right">
						<img src="img/custommade_bullet.png" />
					</span>
				</div>
			</div>
		</li>
		
		<li>
			<div>
				<img src="img/custommade_step1.png" />
				<div class="bottom-custom-made-step">
					<span class="step_desc">
					AFTER CHOOSING YOUR FABRIC OR TIMBER WE START MAKING YOUR ORDER, ONCE IT’S READY WE            CONTACT YOU TO ARRANGE THE BEST DELIVERY DAY.
					</span>
				</div>
			</div>
		</li>
		
	</ul>
</div>

<h4>Upload it!</h4>

<form action="" name="custommade" id="custom_made_form" method="post" enctype="multipart/form-data">
<div class="form-row form-row-50">
	<label>Name</label>
	<input type="text" name="name" value="{if isset($form_data['name'])} {$form_data['name']} {/if}" />
	<br/>
	<br/>
	<br/>
	<label>Email</label>
	<input type="email" name="email" value="{if isset($form_data['email'])} {$form_data['email']} {/if}" />
	<br/>
	<br/>
	<br/>
	<label>Phone</label>
	<input type="text" name="phone" value="{if isset($form_data['phone'])} {$form_data['phone']} {/if}" />
	
</div>

<div class="form-row form-row-50">
	<label>Design Brief</label>
	<textarea name="Design_Brief" >{if isset($form_data['Design_Brief'])} {$form_data['Design_Brief']} {/if}</textarea>
	<br/><br/>
	<label>Upload images, sketches, cut outs from magazines etc.</label>
	<input type="file" name="upload[]" />
	<input type="file" name="upload[]" />
	<input type="file" name="upload[]" />
</div>


<div class="clear clearfix"></div>
<div class="form-row form-row-right">
<input type="submit" id="send_button" name='submitMain' value="Send" />
</div>
</form>
</div>


<div class="ctpage-right">
	<div class="ctpage-right-item">
		<a href="#">
			<img src="img/customade_img4.png" />
		</a>
		<a href="#" class="title_txt aling-right">
			Timber Beds
		</a>
	</div>
	
	<div class="ctpage-right-item">
		<a href="#">
			<img src="img/customade_img5.png" />
		</a>
		<a href="#" class="title_txt aling-right">
			Upholstered Beds
		</a>
	</div>
	
	<div class="ctpage-right-item">
		<a href="#">
			<img src="img/customade_img6.png" />
		</a>
		<a href="#" class="title_txt aling-right">
			Timber and Upholstered Bed Heads
		</a>
	</div>
	
	<div class="ctpage-right-item">
		<a href="#">
			<img src="img/customade_img7.png" />
		</a>
		<a href="#" class="title_txt aling-right">
			Bedroom Furniture
		</a>
	</div>
	
	
</div>
<div class="clear cleafix"></div>
</div>
