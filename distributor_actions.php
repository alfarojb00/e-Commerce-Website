<?php
	include 'includes/session.php';

	if(isset($_POST['selected'])){
		$shop_id =  $user['id'];
		$shop_owner =  $user['firstname'];

		$conn = $pdo->open();

		
		
		foreach ($_POST['check'] as $selected_shops) {
			$query = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM distributor_shop WHERE selected_shops=:selected_shops AND shop_owner=:shopowner");
			$query->execute(['selected_shops'=>$selected_shops,'shopowner'=>$shop_owner]);
			$row = $query->fetch();
			
			
			
			if($row['numrows'] == 0){
				
				
				$stmt = $conn->prepare("INSERT INTO distributor_shop (shop_id, shop_owner, selected_shops) VALUES (:shop_id, :shop_owner, :selected_shops)");
				// $_SESSION['error'] = 'Product already exist';
				$stmt->execute(['shop_id'=>$shop_id, 'shop_owner'=>$shop_owner, 'selected_shops'=>$selected_shops]);
			}
			else {
				
			}
		}
		
		

	header('location: distributor_myshop.php');
	}

	if(isset($_POST['createpost'])){
		$dist_id =  $user['id'];
		$dist_name =  $user['firstname'];
		$post_date = $_POST['post_date'];
		$announcement = $_POST['announcement'];		
		$temp = array('videos'=>[],'images'=>[]);
		if($_FILES['images']['size'][0]>0){
			for ($i=0; $i < count($_FILES['images']['tmp_name']); $i++) { 
				$filename = time().$_FILES['images']['name'][$i];	
				array_push($temp['images'],$filename);
				move_uploaded_file($_FILES['images']['tmp_name'][$i],"data/images/$filename");
			}
		}else{
			$temp['images'] = null;
		}
		if($_FILES['videos']['size'][0]>0){
			for ($i=0; $i < count($_FILES['videos']['tmp_name']); $i++) { 
				$filename = time().$_FILES['videos']['name'][$i];	
				array_push($temp['videos'],$filename);
				move_uploaded_file($_FILES['videos']['tmp_name'][$i],"data/videos/$filename");
			}	
		}else{
			

			$temp['videos'] = null;
		}
		
		if($temp['images']!=null||$temp['videos']!=null){
			$temp = json_encode($temp);
		}else{
			$temp = null;
		}

		
		$conn = $pdo->open();

		$stmt = $conn->prepare("INSERT INTO announcements (dist_id, dist_name, post_date, announcement,media) VALUES (:dist_id, :dist_name, :post_date, :announcement,:media)");

		$stmt->execute(['dist_id'=>$dist_id, 'dist_name'=>$dist_name, 'post_date'=>$post_date, 'announcement'=>$announcement,'media'=>$temp]);

		header('location: distributor_announcements.php');
	}
?>