<div class="container">
	<h1>Create New Project</h1>
	<a href="<?php echo base_url('project'); ?>" class="btn btn-secondary">Back</a>
	<?php echo form_open('project/store'); ?>

	<div class="form-group my-3">
		<label for="name" class="form-label">Project Name</label>
		<input type="text" name="name" class="form-control" id="name" placeholder="Enter project name">
	</div>

	<div class="form-group mb-3">
		<label for="client" class="form-label">Client</label>
		<input type="text" name="client" class="form-control" id="client" placeholder="Enter client">
	</div>

	<div class="form-group mb-3">
		<label for="startDate" class="form-label">Start Date</label>
		<input type="date" name="startDate" class="form-control" id="startDate">
	</div>

	<div class="form-group mb-3">
		<label for="endDate" class="form-label">End Date</label>
		<input type="date" name="endDate" class="form-control" id="endDate">
	</div>

	<div class="form-group mb-3">
		<label for="chairPerson" class="form-label">Chair Person</label>
		<input type="text" name="chairPerson" class="form-control" id="chairPerson" placeholder="Enter chair person">
	</div>

	<div class="form-group mb-3">
		<label for="description" class="form-label">Description</label>
		<textarea name="description" class="form-control" id="description" placeholder="Enter description"></textarea>
	</div>

	<div class="form-group mb-3">
		<label for="locationIds">Locations</label>
		<select name="locationIds[]" class="form-select" multiple>
			<?php if (!empty($locations)): ?>
				<?php foreach ($locations as $location): ?>
					<option value="<?php echo htmlspecialchars($location->id); ?>">
						<?php echo htmlspecialchars($location->name); ?>
					</option>
				<?php endforeach; ?>
			<?php else: ?>
				<option value="">No locations available</option>
			<?php endif; ?>
		</select>
	</div>

	<button type="submit" name="submit" class="btn btn-primary">Create</button>

	<?php echo form_close(); ?>
</div>
