<div class="container">
	<h1>Edit Project</h1>
	<a href="<?php echo base_url('project'); ?>" class="btn btn-secondary">Back</a>
	<?php echo form_open('project/update/' . $project->id); ?>

	<div class="form-group my-3">
		<label for="name" class="form-label">Project Name</label>
		<input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($project->name); ?>" id="name">
	</div>

	<div class="form-group mb-3">
		<label for="client" class="form-label">Client</label>
		<input type="text" name="client" class="form-control" value="<?php echo htmlspecialchars($project->client); ?>" id="client">
	</div>

	<div class="form-group mb-3">
		<label for="startDate" class="form-label">Start Date</label>
		<input type="date" name="startDate" class="form-control" value="<?php echo htmlspecialchars($project->startDate); ?>" id="startDate">
	</div>

	<div class="form-group mb-3">
		<label for="endDate" class="form-label">End Date</label>
		<input type="date" name="endDate" class="form-control" value="<?php echo htmlspecialchars($project->endDate); ?>" id="endDate">
	</div>

	<div class="form-group mb-3">
		<label for="chairPerson" class="form-label">Chair Person</label>
		<input type="text" name="chairPerson" class="form-control" value="<?php echo htmlspecialchars($project->chairPerson); ?>" id="chairPerson">
	</div>

	<div class="form-group mb-3">
		<label for="description" class="form-label">Description</label>
		<textarea name="description" class="form-control" id="description"><?php echo htmlspecialchars($project->description); ?></textarea>
	</div>

	<div class="form-group mb-3">
		<label for="locationIds">Locations</label>
		<select name="locationIds[]" class="form-control" multiple>
			<?php if (!empty($locations)): ?>
				<?php foreach ($locations as $location): ?>
					<option value="<?php echo htmlspecialchars($location->id); ?>"
						<?php
						// Check if this location is already associated with the project
						if (!empty($project->locations)) {
							foreach ($project->locations as $projectLocation) {
								if ($projectLocation->id == $location->id) {
									echo 'selected';
									break;
								}
							}
						}
						?>>
						<?php echo htmlspecialchars($location->name); ?>
					</option>
				<?php endforeach; ?>
			<?php else: ?>
				<option value="">No locations available</option>
			<?php endif; ?>
		</select>
	</div>

	<button type="submit" name="submit" class="btn btn-primary">Update</button>

	<?php echo form_close(); ?>
</div>
