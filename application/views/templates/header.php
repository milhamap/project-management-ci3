<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<title><?php echo $title ?></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<a class="navbar-brand" href="#">Project Management</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
				<div class="navbar-nav">
					<a class="nav-link <?php echo (base_url() == current_url()) ? 'active' : ''; ?>" aria-current="page" href="<?= base_url(); ?>">Home</a>
					<a class="nav-link <?php echo (base_url('location') == current_url()) ? 'active' : ''; ?>" href="<?= base_url('location'); ?>">Location</a>
					<a class="nav-link <?php echo (base_url('project') == current_url()) ? 'active' : ''; ?>" href="<?= base_url('project'); ?>">Project</a>
				</div>
			</div>
		</div>
	</nav>
