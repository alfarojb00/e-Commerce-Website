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
@media (max-width: 575.98px) { 
        body { background: #ebebeb;
                display:block;
        }
    .bodywrap { padding-left: 10%; padding-right: 10%;}
    .box-body { 
         display:block;
		background: #FFF;  margin-bottom: 20px;
		position:relative;
		top:150px;
        width:auto;
	}
	.whole { display: flex; flex-direction: row; }
	.left, .right { width: 50%; }
	.two{
	    padding-top:80px;
	    padding-right:40px;
	}
	.shop_title { background: linear-gradient(135deg, #daa520, #305A30);
		padding: ""; margin-bottom: 10px; display: block; flex-direction: row; 
	    
	}
	.one { width: 10%; } .two { width: 90%; }
	.two h5 { color: #FFF; }
	.shop_title h4 { color: #FFF; width: 85%; }
	.mypurchase { border: 1px solid #FFF; background: none; padding: 10px; width: 200px; 
		border-radius: 5px; }
	.date { border: none; float: right; margin-bottom: 20px; width: 100px; color: #CCC; }
	.posts { width: 100%; background: #FFF; border-radius: 1em; 
		padding: 2%; margin-bottom: 20px; }
	.announce { width: 100%; margin-top: 20px; padding-left: 5%;}
		
}
	body { background: #ebebeb;}
	.bodywrap { padding-left: 10%; padding-right: 10%;}
	.box-body { 
		background: #FFF;  margin-bottom: 20px; padding-bottom: 0;
		position:relative;
        top:100 px;
	}
	.shop_title { background: linear-gradient(135deg, #559E54, #305A30);
		padding: 20px; margin-bottom: 10px; display: flex; flex-direction: row; }
	.one { width: 10%; } .two { width: 90%; }
	.two h5 { color: #FFF; }
	.shop_title h4 { color: #FFF; width: 85%; }
	.mypurchase { border: 1px solid #FFF; background: none; padding: 10px; width: 200px; 
		border-radius: 5px; }
	.date { border: none; float: right; margin-bottom: 20px; width: 100px; color: #CCC; }
	.posts { width: 100%; background: #FFF; border-radius: 1em; 
		padding: 2%; margin-bottom: 20px; margin-top: 20px;  }
	.announce { width: 100%; margin-top: 20px; padding-left: 5%;}
</style>

<body class="hold-transition skin-blue layout-top-nav">
<div class="bodywrap">
	<div class="box-body">
		<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
		  <ol class="breadcrumb">
		    <li class="breadcrumb-item"><a href="reseller_announcements.php"
		    	style="color: #305A30;">Announcements</a></li>
		  </ol>
		</nav>
		<div class="shop_title">
 			<div class="one">
 				<img src="<?php echo (!empty($r['photo'])) ? 'images/'.$r['photo'] : 'images/profile.jpg'; ?>" width="80px" style="border-radius: 50%;">
 			</div>
 			<div class="two">
 				<h4>Distributor's Announcements</h4>
 				<button class="mypurchase">
					<a href="reseller_mydistributor.php"
					style="color: #FFF;"><i class="fa-solid fa-store">&nbsp;
					</i>My Distributor</a>
				</button>
 			</div>
 		</div>

	</div>
	<?php
		$sql = $conn->prepare("SELECT * FROM distributor_resellers 
			WHERE reseller_id = '$user[id]' ");
		$sql->execute();
		foreach($sql as $s) {
			$query = $conn->prepare("SELECT * FROM announcements 
				WHERE dist_id = '$s[distributor_id]' ORDER BY post_date DESC");
			$query->execute();
			foreach($query as $q) {
				if ($q['announcement'] == '') { ?>
					<div class="posts">
						<?php echo "No post yet."; ?>
					</div>
			<?php }
			else { ?>
				<div class="posts">
					<img src="<?php echo (!empty($q['photo'])) ? 'images/'.$q['photo'] 
					: 'images/profile.jpg'; ?>" width="30px" style="border-radius: 50%;">
					<label style="margin-left: 10px;">
						<?php echo $q['dist_name']; ?></label>
					<div class="gear">
						<input class="date" type="text" name="post_date" 
							value="<?php echo $q['post_date']; ?>" readonly>
					</div>
					
					<div class="announce">
						<p><?php echo $q['announcement']; ?></p>
					</div>
				</div>
			<?php }
		}
	}
	?>
	
</div>


<?php include 'includes/scripts.php'; ?>
</body>
</html>
