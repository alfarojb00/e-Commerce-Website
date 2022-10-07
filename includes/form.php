<?php
    define('GOOGLE_CLIENT_ID', '32991385769-3tmuaj02vqckn5v11j2s46p4u8nnp1n2.apps.googleusercontent.com');
    define('GOOGLE_CLIENT_SECRET', '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');
    define('GOOGLE_REDIRECT_URL', 'http://localhost/ecommerce/viewformresponse.php');
    
    require_once 'vendor/autoload.php';
    class FormServices{
        protected $apiKey = "AIzaSyCfmGPZ08-Re4MXxtH7uC0VNFqCNz3rbLY";
        
        protected $service;

        public $client;
        public function __construct(){
            
            $this->client = new Google\Client();
            $this->client->setAuthConfig("D:/xampp/htdocs/ecommerce/includes/client_secret_32991385769-3tmuaj02vqckn5v11j2s46p4u8nnp1n2.apps.googleusercontent.com.json");
            $this->client->addScope(Google\Service\Forms::FORMS_RESPONSES_READONLY);
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
            $this->client->setRedirectUri($redirect_uri);
            $this->client->setClientId(GOOGLE_CLIENT_ID);
            $this->client->setAccessType('offline');
            $this->client->setClientSecret(GOOGLE_CLIENT_SECRET);
            $this->client->setIncludeGrantedScopes(true);


            
            if (isset($_GET['code'])) {
                $_SESSION['token'] = $this->client->fetchAccessTokenWithAuthCode($_GET['code']);
                header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL)); 
            }
             
            if(isset($_SESSION['token'])){ 
                
                $this->client->setAccessToken($_SESSION['token']); 
            }
            $this->service = new Google\Service\Forms($this->client);
            

        }
        public function getAllForm(){
            return $this->service->forms;
        }
        public function getFormResponse(string $formID){
            
            return $this->service->forms_responses->listFormsResponses($formID);
        }
    }

    $form = new FormServices();
    
    
    
?>

