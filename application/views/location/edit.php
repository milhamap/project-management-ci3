<div class="container">
	<h1>Edit Location</h1>
	<a href="<?php echo base_url('location'); ?>" class="btn btn-secondary">Back</a>
	<?php echo form_open('location/update/' . $location->id); ?>

	<div class="form-group my-3">
		<label for="name" class="form-label">Location Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($location->name); ?>" id="name">
	</div>

	<div class="form-group mb-3">
		<label for="country" class="form-label">Country</label>
		<input type="text" name="country" class="form-control" value="<?php echo htmlspecialchars($location->country); ?>" id="country">
	</div>

	<div class="form-group mb-3">
		<label for="province" class="form-label">Province</label>
		<input type="text" name="province" class="form-control" value="<?php echo htmlspecialchars($location->province); ?>" id="province">
	</div>

	<div class="form-group mb-3">
		<label for="city" class="form-label">City</label>
		<input type="text" name="city" class="form-control" value="<?php echo htmlspecialchars($location->city); ?>" id="city">
	</div>

	<button type="submit" name="submit" class="btn btn-primary">Update</button>
</div>
