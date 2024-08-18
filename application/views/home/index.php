<div class="container mt-4">
	<div class="row">
		<?php foreach ($projects as $project): ?>
			<div class="col-4 my-2">
				<div class="card">
					<div class="card-header">
						<h4 class="card-title"><?php echo htmlspecialchars($project->name); ?></h4>
						<div class="d-flex justify-content-end fw-bold fst-italic">
							<span class="card-text"><?php echo htmlspecialchars($project->startDate) . ' - ' . htmlspecialchars($project->endDate); ?></span>
						</div>
					</div>
					<div class="card-body">
						<p class="card-text text-center" style="font-size: 20px;"><?php echo htmlspecialchars($project->description); ?></p>
						<div>
							<span class="card-text mt-1">Chairman Project: <?php echo htmlspecialchars($project->chairPerson); ?></span>
						</div>
						<div>
							<span class="card-text">Client: <?php echo htmlspecialchars($project->client); ?></span>
						</div>
						<div class="mb-3">
							<span class="card-text">Location: <?php
								if (!empty($project->locations)) {
									foreach ($project->locations as $location) {
										if ($project->locations[count($project->locations) - 1] == $location)
											echo htmlspecialchars($location->name);
										else
											echo htmlspecialchars($location->name) . ', ';
									}
								} else {
									echo 'No location available';
								}
								?></span>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
