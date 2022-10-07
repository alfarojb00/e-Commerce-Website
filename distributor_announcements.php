<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Announcements</title>
</head>

<style>
	body {
		background: #ebebeb;
	}

	.bodywrap {
		padding-left: 10%;
		padding-right: 10%;
	}

	.box-body {
		background: #FFF;
		position:relative;
        top:130px;
		margin-bottom: 20px;
		padding-bottom: 2%;
	}

	.create_post {
		padding-left: 5%;
		padding-right: 5%;
	}

	.btn-post {
		width: 93%;
		border-radius: 2em;
		background: #EEE;
		border: none;
		color: #9A9A9A;
		height: 40px;
		float: right;
	}

	.btn-post:hover {
		background: #DDD;
	}

	textarea {
		margin-top: 20px;
		resize: none;
		border: none;
		width: 100%;
		height: 200px;
		padding: 2%;
	}

	.date {
		border: none;
		float: right;
		margin-bottom: 20px;
		width: 100px;
		color: #CCC;
	}

	.posts {
		width: 100%;
		background: #FFF;
		border-radius: 1em;
		padding: 2%;
		margin-bottom: 20px;
	}

	.announce {
		width: 100%;
		margin-top: 20px;
		padding-left: 5%;
	}

	.gear {
		float: right;
	}

	.modal-footer>button {
		width: 100%;
		border-radius: 2em;
	}
</style>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="bodywrap">
		<div class="box-body">
			<h3>Announcements</h3>
			<hr>
			<div class="create_post">
				<img src="<?php echo (!empty($user['photo'])) ? 'images/' . $user['photo']
								: 'images/profile.jpg'; ?>" width="50px" style="border-radius: 50%;">
				<button type="button" class="btn-post" data-toggle="modal" data-target="#post_announcement" />
				What's happening
				</button>
			</div>
		</div>
		<?php
		$query = $conn->prepare("SELECT * FROM announcements 
			WHERE dist_id = '$user[id]' ORDER BY post_date DESC");
		$query->execute();

		foreach ($query as $q) {
			if ($q['announcement'] == '') { ?>
				<div class="posts">
					<?php echo "No post yet."; ?>
				</div>
			<?php } else { ?>
				<div class="posts">
					<img src="<?php echo (!empty($user['photo'])) ? 'images/' . $user['photo']
									: 'images/profile.jpg'; ?>" width="30px" style="border-radius: 50%;">
					<label style="margin-left: 10px;">
						<?php echo $user['firstname'] . " " . $user['lastname']; ?></label>
					<div class="gear">
						<input class="date" type="text" name="post_date" value="<?php echo $q['post_date']; ?>" readonly>
						<div class="dropdown">
							<?php
							if (isset($q['media'])) {
								$allMedia = json_decode($q['media']);
								if ($allMedia->images != null) {
									foreach ($allMedia->images as $key => $value) {
							?>
										<img src="data/images/<?php echo $value ?>" style="width:50px" />
							<?php
									}
								}
							}
							?>
							<button class="dropdown-toggle" data-toggle="dropdown" style="border: none; background: none;">
								<i class="fa-solid fa-gear"></i>
							</button>

							<ul class="dropdown-menu">
								<li>
									<a class="dropdown-item" data-toggle='modal' data-target="#delete<?php echo $q['id']; ?>">
										Delete Post
									</a>
								</li>
							</ul>

							<!-- Delete Product Modal -->
							<div class="modal fade" id="delete<?php echo $q['id']; ?>">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title"><b>Delete</b></h4>
										</div>

										<div class="modal-body">
											<h4>Are you sure you want to delete this post?</h4>
										</div>

										<div class="modal-footer">
											<a href="delete_post.php?id=<?php echo $q['id']; ?>" class="btn btn-danger pull-right">
												<i class="fas fa-trash"></i> &nbsp; Remove</a>
										</div>
									</div>
								</div>
							</div>
							<!-- END MODAL -->
						</div>
					</div>

					<div class="announce">
						<p><?php echo $q['announcement']; ?></p>
					</div>
				</div>
		<?php }
		}
		?>

	</div>

	<!-- Delete Product Modal -->
	<div class="modal fade" id="post_announcement">
		<form action="distributor_actions.php" method="POST" enctype="multipart/form-data">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title"><b>Create Post</b></h4>
					</div>

					<div class="modal-body" id='itemholder'>
						<img src="<?php echo (!empty($user['photo'])) ? 'images/' . $user['photo']
										: 'images/profile.jpg'; ?>" width="30px" style="border-radius: 50%;">
						<label><?php echo $user['firstname'] . " " . $user['lastname']; ?></label>
						<?php
						date_default_timezone_set('Asia/Manila');
						$date = date("m/d/y h:i");
						?>
						<input class="date" type="text" name="post_date" value="<?php echo $date; ?>" readonly>

						<textarea name="announcement" placeholder="What's happening" required></textarea>
						<label>ATTACH IMAGES</label>
						<input type='file' name='images[]' accept="image/*" multiple />
						<label>ATTACH VIDEOS</label>
						<input type='file' name='videos[]' accept="video/*" multiple />
					</div>

					<div class="modal-footer">

						<button type="submit" class="btn btn-success" name="createpost">
							POST
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<!-- END MODAL -->

	<?php include 'includes/scripts.php'; ?>

</body>

</html>