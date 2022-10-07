
<?php 
// Include configuration file 

include 'includes/session.php';
require_once './includes/form.php'; 
include 'includes/header.php'; 
include 'includes/navbar.php';
 
 


?>
<style>
    .inside-content{
        padding: 100px;
        color:white;
    }
    .content{
        display: flex;
        flex-direction: column;

    }
    .content input{
        color: black;
    }
</style>
<html>

<body class="hold-transition skin-blue layout-top-nav">
<div 
    class="wrapper inside-content"
>


<?php
if(isset($_SESSION['token'])){ 
    
    if(isset($_GET['formID'])){
        ?>
            <button
                onclick="history.back()"
            >BACK</button>
        <?php
        $formID = $_GET['formID'];
        
        foreach ($form->getFormResponse($formID) as $key => $value) {
            $answers = $value->answers;
            ?>
            <br>
            <label>RESULT ID:<?php echo $value->getResponseId() ?></label>
            <?php
    
            foreach ($answers as $key => $res) {
                $textAnswer = $res->getTextAnswers()->getAnswers()[0];
                ?>
                    <br>
                    <label><?php echo $textAnswer->getValue()?></label>
                    <br>
                <?php
                
            }
            
        }
    }else{
        ?>
            <div 
                class="content"
                >
                <label>INSERT FORM ID TO GET RESULT</label>
                <input placeholder="INSERT FORM ID" id="formInput"/>
                <button
                    onclick="viewFormResult()"
                > GET FORM RESULT</button>
            </div>
        <?php
        
        
    }
    
}else{ 
    // Get login url 
    $authUrl = $form->client->createAuthUrl(); 
     
    // google login button 
    $login_image = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'">
    <img src="images/google-sign-in-btn.png" alt=""/>VIEW FORM</a>'; 
    echo $login_image;
} 
?>

<script>
    function viewFormResult(){
        let input = document.getElementById("formInput");
    
        window.location.href = `viewformresponse.php?formID=${input.value}`;
        
        
    }
</script>
</div>
</body>
</html>