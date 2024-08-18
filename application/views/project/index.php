<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1 class="mt-3"><?php echo $title; ?></h1>
			<a href="<?php echo base_url('project/create'); ?>" class="btn btn-primary mb-3">Create Project</a>
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>

			<?php if (!empty($projects) && is_array($projects)): ?>
				<table class="table">
					<thead>
					<tr>
						<th>No</th>
						<th>Name</th>
						<th>Client</th>
						<th>Start Date</th>
						<th>End Date</th>
						<th>Chair Person</th>
						<th>Description</th>
						<th>Location</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($projects as $project): ?>
						<tr>
							<th><?php echo $start++; ?></th>
							<td><?php echo htmlspecialchars($project->name); ?></td>
							<td><?php echo htmlspecialchars($project->client); ?></td>
							<td><?php echo htmlspecialchars($project->startDate); ?></td>
							<td><?php echo htmlspecialchars($project->endDate); ?></td>
							<td><?php echo htmlspecialchars($project->chairPerson); ?></td>
							<td><?php echo htmlspecialchars($project->description); ?></td>
							<?php
								if (!empty($project->locations)) {
									echo '<td>';
									foreach ($project->locations as $location) {
										if ($project->locations[count($project->locations) - 1] == $location)
											echo htmlspecialchars($location->name);
										else
											echo htmlspecialchars($location->name) . ', ';
									}
									echo '</td>';
								} else {
									echo '<td></td>';
								}
							?>
							<td>
								<a class="badge bg-warning" href="<?php echo base_url('project/edit/' . $project->id); ?>">Edit</a>
								<a class="badge bg-danger" href="<?php echo base_url('project/delete/' . $project->id); ?>">Delete</a>
							</td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>

			<div class="d-flex justify-content-center">
				<?php echo $this->pagination->create_links(); ?>
			</div>
			
			<?php else: ?>
				<p>No locations found.</p>
			<?php endif; ?>
		</div>
	</div>
</div>
