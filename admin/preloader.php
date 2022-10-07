<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- CSS -->
<style type="text/css">
/***** PRE LOADER *****/
.loader-wrapper {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  background-color: #FFF;
  display:flex;
  justify-content: center;
  align-items: center;
}
.loader {
  display: inline-block;
  width: 50px;
  height: 50px;
  position: relative;
  border: 5px solid #A41034;
  animation: loader 2s infinite ease;
}
.loader-inner {
  vertical-align: top;
  display: inline-block;
  width: 100%;
  background-color: #A41034;
  animation: loader-inner 2s infinite ease-in;
}
@keyframes loader {
  0% { transform: rotate(0deg);}
  25% { transform: rotate(180deg);}
  50% { transform: rotate(180deg);}
  75% { transform: rotate(360deg);}
  100% { transform: rotate(360deg);}
}
@keyframes loader-inner {
  0% { height: 0%;}
  25% { height: 0%;}
  50% { height: 100%;}
  75% { height: 100%;}
  100% { height: 0%;}
}
</style>


<body>
	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>
	<?php
	
	print("Hello World")
	
	
	
	?>
	<script>
		$(window).on("load",function(){
			$(".loader-wrapper").fadeOut("slow");
		});
	</script>

</body>
</html>