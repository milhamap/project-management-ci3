<div class="container">
	<div class="row">
		<div class="col-md-10">
			<h1 class="mt-3"><?php echo $title; ?></h1>
			<a href="<?php echo base_url('location/create'); ?>" class="btn btn-primary mb-3">Create Location</a>
			<?php if ($this->session->flashdata('success')): ?>
				<div class="alert alert-success alert-dismissible fade show" role="alert">
					<?php echo $this->session->flashdata('success'); ?>
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
			<?php endif; ?>
			<?php if (!empty($locations) && is_array($locations)): ?>
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Country</th>
							<th>Province</th>
							<th>City</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($locations as $location): ?>
							<tr>
								<th><?php echo ++$start; ?></th>
								<td><?php echo htmlspecialchars($location->name); ?></td>
								<td><?php echo htmlspecialchars($location->country); ?></td>
								<td><?php echo htmlspecialchars($location->province); ?></td>
								<td><?php echo htmlspecialchars($location->city); ?></td>
								<td>
									<a class="badge bg-warning" href="<?php echo base_url('location/edit/' . $location->id); ?>">Edit</a>
									<a class="badge bg-danger" href="<?php echo base_url('location/delete/' . $location->id); ?>">Delete</a>
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
