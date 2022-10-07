<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
     
      <div class="content-wrapper">
        <div class="container">

          <!-- Main content -->
          
          <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
    <div class="about">
        <div class="inner-section">
            <h1>About Us</h1>
            <p class="text">
            MARP Inc. was established in September 2018 located at Sto. Tomas City, Batangas, Philippines. MARP Inc. is a multi-level marketing company with the top-notch humic acid-based products.
            <br>
            MARP Inc. gives an opportunity to people who are motivated and willing to take a life changing business that contributes in addressing agricultural concern of the country.
            <br>
            Our aim is to bring the best product directly to your hands and so for the others. we deliver training for a knowledge foundation of every member of our company. 
            <br>
            We are building the best product for the best business. We are inviting you to hear and see our life-changing opportunity. Create a family with the full initiation of your financial and health upgrades.
            <br>
            <br>
            Be one of us. Be different be a MARP Inc. member.
            </p>
            <h2>Mission</h2>
            <p class="text">
            To build the best products that can create endless opportunity to people in a global scale.
            </p>
            <h2>Vision</h2>
            <p class="text">
            To become the market leader in providing best quality products that creates solutions both in business and environment crisis.</p>
            <div class="skills">
                <a href="https://www.facebook.com/messages/t/2013998438853413">
                <button>Contact Us</button>
                    </a>
            </div>
        </div>
    </div>
</body>
</html>

</div>
</div>
    <?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>
    <!-- Custom CSS -->
    <style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.about{
    /* font-family:"open sans"; */
    background: url(marplogo2.png) no-repeat left;
    background-size: 45%;
    background-color:#ecf0f5;
    overflow: hidden;
    padding: 100px 0;
}
.inner-section{
    width: 55%;
    float: right;
    background-color:#007230;
    padding: 100px;
    box-shadow: 13px 12px 8px rgba(0,0,0,0.3);
}
.inner-section h1{
    text-align: center;
    color: white;
    margin-bottom: 30px;
    font-size: 36px;
    font-weight: 900;
}
.inner-section h2{
    width:30%;
    padding-left:10px;
    border-left: 6px solid white;
    background-color: #5eb23f;
    border-color: white;
    margin-bottom: 12px;
    font-size: 26px;
    font-weight: 900;
    color: white;
}
.text{
    text-indent: 50px;
    font-size: 16px;
    color: white;
    line-height: 30px;
    text-align: justify;
    margin-bottom: 40px;

}
.skills button{
    font-size: 22px;
    text-align: center;
    letter-spacing: 2px;
    border: none;
    border-radius: 20px;
    padding: 8px;
    width: 200px;
    background-color: white;
    color: black;
    cursor: pointer;
}
.skills button:hover{
    transition: 1s;
    background-color: #5eb23f;
    color: white;
}
@media screen and (max-width:1200px){
    .inner-section{
        padding: 80px;
    }
}
@media screen and (max-width:1000px){
    .about{
        background-size: 100%;
        padding: 100px 40px;
    }
    .inner-section{
        width: 100%;
    }
}

@media screen and (max-width:1000px){
    .about{
        padding: 0;
    }
    .inner-section{
        padding: 60px;
    }
    .skills button{
        font-size: 19px;
        padding: 5px;
        width: 160px;
    }
}