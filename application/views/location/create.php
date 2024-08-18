<div class="container">
	<h1>Create New Location</h1>
	<a href="<?php echo base_url('location'); ?>" class="btn btn-secondary">Back</a>
	<?php echo form_open('location/store'); ?>

	<div class="form-group my-3">
		<label for="name" class="form-label">Location Name</label>
		<input type="text" name="name" class="form-control" id="name" placeholder="Enter location name">
	</div>

	<div class="form-group mb-3">
		<label for="country" class="form-label">Country</label>
		<input type="text" name="country" class="form-control" id="country" placeholder="Enter country">
	</div>

	<div class="form-group mb-3">
		<label for="province" class="form-label">Province</label>
		<input type="text" name="province" class="form-control" id="province" placeholder="Enter province">
	</div>

	<div class="form-group mb-3">
		<label for="city" class="form-label">City</label>
		<input type="text" name="city" class="form-control" id="city" placeholder="Enter city">
	</div>

	<button type="submit" name="submit" class="btn btn-primary">Create</button>

	<?php echo form_close(); ?>
</div>
