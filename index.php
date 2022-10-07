<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<style>
	
	@import 'https://fonts.googleapis.com/css?family=Montserrat:300, 400, 700&display=swap';
	/* Hero Section */
#hero {
	background-image: url(./img/hero-bg.png);
	background-size: cover;
	background-position: top center;
	position: relative;
	z-index: 1;
}
#hero::after {
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	background-color: black;
	opacity: 0.7;
	z-index: -1;
}
#hero .hero {
	max-width: 1200px;
	margin: 0 auto;
	padding: 0 50px;
	justify-content: flex-start;
}
#hero h1 {
	display: block;
	width: fit-content;
	font-size: 4rem;
	position: relative;
	color: transparent;
	animation: text_reveal 0.5s ease forwards;
	animation-delay: 1s;
}
#hero h1:nth-child(1) {
	animation-delay: 1s;
}
#hero h1:nth-child(2) {
	animation-delay: 2s;
}
#hero h1:nth-child(3) {
	animation: text_reveal_name 0.5s ease forwards;
	animation-delay: 3s;
}
#hero h1 span {
	position: absolute;
	top: 0;
	left: 0;
	height: 100%;
	width: 0;
	background-color: crimson;
	animation: text_reveal_box 1s ease;
	animation-delay: 0.5s;
}
#hero h1:nth-child(1) span {
	animation-delay: 0.5s;
}
#hero h1:nth-child(2) span {
	animation-delay: 1.5s;
}
#hero h1:nth-child(3) span {
	animation-delay: 2.5s;
}

/* End Hero Section */

/* BG color/img */
.content-wrapper {
    /* background-image: url(./images/UCORPpics/BG3.png);
	background-size: auto;
	background-repeat:  repeat;
	background-position: ""; */
	/* background-image: linear-gradient(90deg, #164A41 ,#4D774A ,#9DC88D ,#4D774A  , #57745D ); */
    background-color: #FFF;		
	/* background-image: linear-gradient(50deg, #ecf0f5 50%, #E9EFC0 0%);
	height: 700px;
	 */
}


#services .services1 {
	flex-direction: column;
	text-align: center;
	max-width: 1500px;
	margin: 0 auto;
	padding: 100px 0;

	
}
#services .services_container1{
	max-width: 500px;
	margin: 0 auto;
	width: 100%;
}
/* Services Section */

#services .services {
	flex-direction: column;
	text-align: center;
	max-width: 1500px;
	margin: 0 auto;
	padding: 100px 0;


	
/* 
	background-color: #EDDFB3; */
	
}

#services .service-top {
	max-width: 500px;
	margin: 0 auto;
	width: 100%;
	color: #483838;
	
	
	/* background-color:#FFFDE3; */
}
#services .section-title {
	font-family: "Impact";
	text-shadow: -1px -1px 1px #483838;
	
}
#services .section-title p {
	color:#483838;
	font-weight: normal;
	font-size: 25px;
}
#services .service-bottom {
	display: inline-flex;
	align-items: center;
	justify-content: center;
	flex-wrap: wrap;
	margin-top: 50px;
	

	/* box-shadow: inset 0px 0px 10px rgba(0,0,0,0.5); */
	/* width: 100%;
	background-color:#FFFDE3; */

}

#services .service-item {
	flex-basis: 80%;
	display: flex;
	align-items: flex-start;
	justify-content: center;
	flex-direction: column;
	padding: 30px;
	border-radius: 10px;

	
	background-position: center;
	background-size: cover;
	margin: 10px 5%;
	
	position: relative;
	z-index: 1;
	overflow: hidden;
	box-shadow: inset 0px 0px 10px 10px rgba(0,0,0,0.9);
}
#services .service-item:hover {
	box-shadow: 0px 0px 10px 0 #42855B;

}
#services .service-item::after {
	content: '';
	position: absolute;
	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	background-image: linear-gradient(50deg, #007230 90%, #E9EFC0 0%);
	opacity: .9;
	z-index: -1;
}
#services .service-bottom .icon {
	height: 80px;
	width: 80px;
	margin-bottom: 20px;
}
#services .service-item h2 {
	font-size: 3rem;
	font-weight: normal;
	color: white;
	margin-bottom: 10px;
	text-transform: uppercase;
}
#services .service-item:hover h2{
	font-weight: Bold;
	text-shadow: 2px 2px 8px #4A3933;
}


#services .service-item p {
	color: white;
	font-size: 14px;
	text-align: left;
}
#services .service-item:hover p{
	text-shadow: 2px 2px 8px #4A3933;
}

/* End Services Section */

/* Projects section */
.BGcolor{
	box-shadow: inset 0px 0px 10px rgba(0,0,0,0.5);
	
	
	/* background-image: url(./images/UCORPpics/bglogo.png);
	opacity: 0.8; */
	
}
.BGcolor:hover{
	box-shadow: 10px 0px 10px 10px #483838;
	transform: scale(1,1);
	
	/* background-image: url(./images/UCORPpics/bglogo.png);
	opacity: 0.8; */
	
}

.projects_container {
	display: flex;
	align-items: center;
	justify-content: center;

}

#projects .projects {
	flex-direction: column;
	max-width: 1200px;
	padding: 20px 25px 20px 10px;
	margin: auto;
}
#projects .projects-header h1 {
	font-family: "Impact";
	color: black;
	margin-bottom: 50px;
	text-align: center;
	text-shadow: -1px -1px 1px #483838;
	
}
#projects .all-projects {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
}
#projects .project-item {
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	width: 80%;
	margin: 20px auto;
	overflow: hidden;
	border-radius: 10px;
}
#projects .project-info {
	padding: 18px;
	flex-basis: 50%;
	height: 100%;
	display: flex;
	align-items: flex-start;
	justify-content: center;
	flex-direction: column;
	background-color: white;
	color: Black;
}
#projects .project-info h1 {
	font-family: "Impact";
	font-size: 4rem;
	color:#007230;
	font-weight: 500;
}
#projects .project-info h2 {
	font-size: 1.8rem;
	font-weight: 500;
	margin-top: 10px;
}
#projects .project-info p {
	color: Black;
	justify-content: start;
	font-size: 1.6rem;
	font-weight: 500;

}
#projects .project-img {
	
	height: 300px;
	overflow: hidden;
	position: relative;
}
#projects .project-img:after {
	content: '';
	position: absolute;

	left: 0;
	top: 0;
	height: 100%;
	width: 100%;
	background-image: linear-gradient(60deg, #446A46 0%, #485563 100%);
	opacity: 0;
}
#projects .project-img img {
	display: block;
	margin-left: auto;
	background-size: auto;
	background-position: center;
	margin-right: auto;

	object-fit: none;
	transition: 0.3s ease transform;
	width: 500px;	
	height: 400px;
}
#projects .project-img1 img {
	display: block;
	margin-left: auto;
	margin-right: auto;

	background-size: auto;
	background-position: center;
	object-fit: cover;
	width: 500px;
	height: 400px;

	transition: 0.3s ease transform;
}
#projects .project-img4 img {
	display: block;
	margin-left: auto;
	margin-right: auto;

	background-size: auto;
	background-position: center;
	object-fit: cover;
	width: 100%;
	height: 400px;

	transition: 0.3s ease transform;
}
#projects .project-img5 img {
	display: block;
	margin-left: auto;
	margin-right: auto;

	background-size: auto;
	background-position: center;
	object-fit: cover;
	width: 500px;
	height: 400px;

	transition: 0.3s ease transform;
}


#projects .project-item:hover .project-img img {
	transform: scale(1.1);
}
#projects .project-item:hover .project-img1 img {
	transform: scale(1.1);
}
#projects .project-item:hover .project-img4 img {
	transform: scale(1.1);
}
#projects .project-item:hover .project-img5 img {
	transform: scale(1.1);
}
/* End Projects section */

/* About Section */
#about .about {
	flex-direction: column-reverse;
	text-align: center;
	max-width: 1200px;
	margin: 0 auto;
	padding: 100px 20px;
}
#about .col-left {
	width: 250px;
	height: 360px;
}
#about .col-right {
	width: 100%;
}
#about .col-right h2 {
	font-size: 1.8rem;
	font-weight: 500;
	letter-spacing: 0.2rem;
	margin-bottom: 10px;
}
#about .col-right p {
	margin-bottom: 20px;
}
#about .col-right .cta {
	color: black;
	margin-bottom: 50px;
	padding: 10px 20px;
	font-size: 2rem;
}
#about .col-left .about-img {
	height: 100%;
	width: 100%;
	position: relative;
	border: 10px solid white;
}
#about .col-left .about-img::after {
	content: '';
	position: absolute;
	left: -33px;
	top: 19px;
	height: 98%;
	width: 98%;
	border: 7px solid crimson;
	z-index: -1;
}
/* End About Section */

/* contact Section */
#contact .contact {
	flex-direction: column;
	max-width: 1200px;
	margin: 0 auto;
	width: 90%;
}

#contact .section-title{
	font-family:"Impact";
	color: #483838;
	Margin-bottom: 3%;
	text-align: center;
	
	text-shadow: -1px -1px 1px #483838, 1px -1px 0 #483838, -1px 1px 0 #483838, 1px 1px 1px #483838;
	
}

#contact .contact-items {
	/* max-width: 400px; */
	width: 100%;
}
#contact .contact-item {
	
	width: 80%;
	padding-bottom: 10px;
	text-align: center;
	border-radius: 10px;
	padding: 30px;
	margin: 30px;
	
	justify-content: center;
	/* align-items: center; */
	flex-direction: column;
	box-shadow: 0px 0px 18px 0 #0000002c;
	transition: 0.3s ease box-shadow;
	background-color: rgb(225, 216, 159, 70%); 
	
}
#contact .contact-item:hover {
	box-shadow: 0px 0px 5px 0 #0000002c;
	background-color: rgb(225, 216, 159, 100%); 
}

#contact .icon {
	width: 40px;
	margin: 0 auto;
	margin-bottom: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
	
}
#contact .iconEmail{
	width: 70px;
	margin: 0 auto;
	margin-bottom: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
	
}
#contact .iconFB{
	width: 50px;
	margin: 0 auto;
	margin-bottom: 10px;
	display: flex;
	align-items: center;
	justify-content: center;
}
/* #contact .contact-info2{
	
}
#contact .contact-info2 h1{
	color: black;
	font-weight: bold;
	font-size: 2.7rem;
	font-weight: 500;
	padding-bottom: 5px;
	text-align: left;
}
#contact .contact-info2 h2{
	font-size: 1.3rem;
	line-height: 1rem;
	font-weight: 500;
	color: #3A3845;
	text-align: left;
} */

#contact .contact-info h1 {
	color: #483838;
	font-size: 2.9rem;
	font-weight: 900;
	padding-bottom: 5px;
	text-align: center;
}
#contact .contact-info h2 {
	font-size: 1.3rem;
	line-height: 1rem;
	font-weight: 500;
	color: #3A3845;
	text-align: center;
}
#contact .contact-info h3 {
	font-size: 1.3rem;
	line-height: 2rem;
	font-weight: 500;
	color: #3A3845;
	text-align: center;
}
/*End contact Section */

/* Footer */
#footer {
	background-image: linear-gradient(60deg, #29323c 0%, #485563 100%);
	width: 100%;
}
#footer .main-footer {
	min-height: 150px;
	flex-direction: column;
	padding-top: 50px;
	padding-bottom: 10px;
}
#footer h2 {
	color: white;
	font-weight: 500;
	font-size: 1.8rem;
	letter-spacing: 0.1rem;
	margin-top: 10px;
	margin-bottom: 10px;
}
#footer .social-icon {
	display: flex;
	margin-bottom: 30px;
}
#footer .social-item {
	height: 50px;
	width: 50px;
	margin: 0 5px;
}
#footer .social-item img {
	filter: grayscale(1);
	transition: 0.3s ease filter;
}
#footer .social-item:hover img {
	filter: grayscale(0);
}
#footer p {
	color: white;
	font-size: 1.3rem;
}
/* End Footer */

/* Keyframes */
@keyframes hamburger_puls {
	0% {
		opacity: 1;
		transform: scale(1);
	}
	100% {
		opacity: 0;
		transform: scale(1.4);
	}
}
@keyframes text_reveal_box {
	50% {
		width: 100%;
		left: 0;
	}
	100% {
		width: 0;
		left: 100%;
	}
}
@keyframes text_reveal {
	100% {
		color: white;
	}
}
@keyframes text_reveal_name {
	100% {
		color: crimson;
		font-weight: 500;
	}
}
/* End Keyframes */

/* Media Query For Tablet */
@media only screen and (min-width: 768px) {
	.cta {
		font-size: 2.5rem;
		padding: 20px 60px;
	}
	h1.section-title {
		font-size: 6rem;
	}

	/* Hero */
	#hero h1 {
		font-size: 7rem;
	}
	/* End Hero */

	/* Services Section */
	#services .service-bottom .service-item {
		flex-basis: 45%;
		margin: 2.5%;
	}
	/* End Services Section */

	/* Project */
	
	
	#projects .project-item {
		flex-direction: row;
	}
	#projects .project-item:nth-child(even) {
		flex-direction: row-reverse;
	}
	#projects .project-item {
		height: 400px;
		margin: 0;
		width: 100%;
		border-radius: 0;
	}
	#projects .all-projects .project-info {
		height: 100%;
	}
	#projects .all-projects .project-img {
		height: 100%;
	}
	/* End Project */

	/* About */
	#about .about {
		flex-direction: row;
	}
	#about .col-left {
		width: 600px;
		height: 400px;
		padding-left: 60px;
	}
	#about .about .col-left .about-img::after {
		left: -45px;
		top: 34px;
		height: 98%;
		width: 98%;
		border: 10px solid crimson;
	}
	#about .col-right {
		text-align: left;
		padding: 30px;
	}
	#about .col-right h1 {
		text-align: left;
	}
	/* End About */

	/* contact  */
	#contact .contact {
		flex-direction: column;
		padding: 100px 0;
		align-items: center;
		justify-content: center;
		min-width: 20vh;
	}
	#contact .contact-items {
		width: 100%;
		display: flex;
		flex-direction: row;
		justify-content: space-evenly;
		margin: 0;
	}
	#contact .contact-item {
		width: 30%;
		margin: 0;
		flex-direction: row;
	}
	#contact .contact-item .icon {
		height: 100px;
		width: 100px;
	}
	#contact .contact-item .icon img {
		object-fit: contain;
	}
	#contact .contact-item .contact-info {
		width: 100%;
		text-align: left;
		padding-left: 20px;
	}
	/* End contact  */
}
/* End Media Query For Tablet */

/* Media Query For Desktop */
@media only screen and (min-width: 1200px) {
	/* header */
	#header .hamburger {
		display: none;
	}
	#header .nav-list ul {
		position: initial;
		display: block;
		height: auto;
		width: fit-content;
		background-color: transparent;
	}
	#header .nav-list ul li {
		display: inline-block;
	}
	#header .nav-list ul li a {
		font-size: 1.8rem;
	}
	#header .nav-list ul a:after {
		display: none;
	}
	/* End header */

	#services .service-bottom .service-item {
		flex-basis: 22%;
		margin: 1.5%;
	}
}
	</style>

<body class="hold-transition skin-blue layout-top-nav">




<div class="wrapper">
	
  	<div class="content-wrapper">
    <div class="container">

	<section id="services">
	
    <div class="services container">
	    		<?php
	    			if(isset($_SESSION['error'])){
	    				echo "
	    					<div class='alert alert-danger'>
	    						".$_SESSION['error']."
	    					</div>
	    				";
	    				unset($_SESSION['error']);
	    			}
	    		?>
	    		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	                <ol class="carousel-indicators">
	                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
	                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
					  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
					  <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
					  <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
	                  
	                </ol>
	                <div class="carousel-inner">
	                  <div class="item active">
	                    <img src="images/banner1.png" alt="First slide">
	                  </div>
	                  
	                  <div class="item">
	                    <img src="images/banner3.png" alt="Second slide">
	                  </div>
					  
					  <div class="item">
	                    <img src="images/BG_BANNER/1.png" alt="Third slide">
	                  </div>

					  <div class="item">
	                    <img src="images/BG_BANNER/2.png" alt="Forth slide">
	                  </div>

					  <div class="item">
	                    <img src="images/BG_BANNER/3.png" alt="Fifth slide">
	                  </div>
					  
	                </div>
	                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
	                  <span class="fa fa-angle-left"></span>
	                </a>
	                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
	                  <span class="fa fa-angle-right"></span>
	                </a>
	            </div>
				</div>
    
  </section>

 

  <!-- Projects Section -->
  <div class="BGcolor">
  <section id="projects">
  
    <div class="projects container">
      <div class="projects-header">
        <h1 class="section-title"> Available <span> Products </span></h1>
      </div>
      <div class="all-projects">
        <div class="project-item">
          <div class="project-info">
            <h1>CHC Agritech Probiotics</h1>
            <p>Benefits of our ORGANIC CHC PROBIOTICS formulated by Japanese Dr. Tetsuo Kamekawa. 
				It Eliminates Internal Parasites, Extends Egg-laying period, 
				Boost Immune System Best for Conditioning before and during breeding, 
				Promotes Faster Growth, Functions as Natural Antibiotics, Neutralizes acidity in the Body, 
				Ideal Source of Beneficial Enzymes, For Fertility Eliminates Foul Odor, Best Disinfectant.</p>
          </div>
          <div class="project-img1">
            <img src="./images/UCORPpics/CHCAgri3.jpg" alt="img" >
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Humic Plus</h1>
            
            <p>Humic Plus is a plant stimulant and can be used in soil as well as for foliar application. 
			   When used with nutrients, it acts as chelating agent and it improves the activity of micronutrients.
			   Humic Plus activates the auxins, amino acids and organic phosphorous for easy uptake by plant roots.</p>
          </div>
          <div class="project-img">
            <img src="./images/UCORPpics/pic2.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Humic Vet</h1>
            
            <p>Humic acids improve digestion, normalize metabolism in the body of pets, 
				which in turn effectively eliminates the physiological causes of unpleasant odors. 
				By adding Humic Vet to your feed, you minimize the likelihood of developing skin diseases 
				caused by food and parasitic allergens, bacteria, fungi and viruses.</p>
          </div>
          <div class="project-img">
            <img src="./images/UCORPpics/pic3.png" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Speedy Vita Multivitamins</h1>
            
            <p>The product is improved and re-formulated from the experience of current farming to complete the necessary 
				of whole nutrition in poultry for both Layer and Broiler. This premix contains more than twenty kinds of 
				vitamins and amino acids. It is being absorbed easily and quickly and provide the daily requirement nutrient 
				for growth and production performance of poultry. So that the animal have obtained enough nutrition for maximum 
				productivity and the farmers gain best benefits by using this premix.</div>
          <div class="project-img4">
            <img src="./images/UCORPpics/SpeedyVita2.jpg" alt="img">
          </div>
        </div>
        <div class="project-item">
          <div class="project-info">
            <h1>Amino Plus Organic Foliar Fertilizer</h1>
            <p>AMINO PLUS FOLIAR FERTILIZER is made from fish and contains compounds that promote plant growth. 
				It does not contain toxic or carcinogenic materials, thus a good source of fertilizer. Unlike other 
				fertilizers derived from fish or other natural sources, Amino Plus does not involve heating. 
				Fish is liquefied at low temperature which prevents denaturation of proteins and retains valuable 
				amino acids, vitamins and natural oils. It makes use of natural enzyme from fish to produce 
				essential amino acids and fatty acids that are easily absorbed by plants.</p>
          </div>
          <div class="project-img5">
            <img src="./images/UCORPpics/AminoPlus3.jpg" alt="img">
          </div>
        </div>
      </div>
    </div>
	
  </section>
  </div>
  <!-- End Projects Section -->

   <!-- Service Section -->
   <section id="services">
    <div class="services container">
      <div class="service-top">
        <h1 class="section-title">Be one of us<span></span></h1>
        
      </div>
      <div class="service-bottom">
        <div class="service-item">
          <div class="icon"><img src="./images/UCORPpics/GOALLS.png" /></div>
          <h2>Goals</h2>
          <p >Our goal is to provide the best products to everyone.</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="./images/UCORPpics/SERVICES.png" /></div>
          <h2>Services</h2>
          <p>We provide business assistance 24/7.</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="./images/UCORPpics/UTILIZES.png" /></div>
          <h2>utilizes</h2>
          <p>We are building the best product for the best business.</p>
        </div>
        <div class="service-item">
          <div class="icon"><img src="./images/UCORPpics/ROLESS.png" /></div>
          <h2>roles</h2>
          <p>Company offers life-changing business to dedicated people.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- End Service Section -->

  

	
</div>
<?php include 'includes/footer.php'; ?>
<?php include 'includes/scripts.php'; ?>
</body>
</html>