<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Most Viewed Today</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			$conn = $pdo->open();

	  			$stmt = $conn->prepare("SELECT * FROM products WHERE date_view=:now ORDER BY counter DESC LIMIT 10");
	  			$stmt->execute(['now'=>$now]);
	  			foreach($stmt as $row){
	  				echo "<li><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></li>";
	  			}

	  			$pdo->close();
	  		?>
	    	<ul>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Natural, Organic and Safe</b></h3>
	  	</div>
	  	<div class="box-body">
		  <video width="260" height="150" autoplay muted>
  <source src="images/vid1.mp4" type="video/mp4">
</video>
<video width="260" height="150" autoplay muted>
  <source src="images/vid2.mp4" type="video/mp4">
</video>
	                </span>
	            </div>
		    </form>
	  	</div>
	</div>
</div>

