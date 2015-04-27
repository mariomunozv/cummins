<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Start session

session_start();

class User_Authentication extends MY_Controller {

public function __construct() {
parent::__construct();
}

public function index() {

// Include two files from google-php-client library in controller
require_once APPPATH . "libraries/google-api-php-client-master/src/Google/autoload.php";
include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Client.php";
include_once APPPATH . "libraries/google-api-php-client-master/src/Google/Service/Oauth2.php";

// Store values in variables from project created in Google Developer Console
$client_id = '134107157316-c835jl34i2ssl2tpjqugvhsg39v70uf6.apps.googleusercontent.com';
$client_secret = 'Lm2SnDQy4AKcGyGajSDDr8k-';
$redirect_uri = 'https://www.example.com/oauth2callback';
$simple_api_key = 'AIzaSyCgjR5xuXDY62vDYWzym7VLWSBP7c1uyfo';

// Create Client Request to access Google API
$client = new Google_Client();
$client->setApplicationName("PHP Google OAuth Login Example");
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->setDeveloperKey($simple_api_key);
$client->addScope("https://www.googleapis.com/auth/userinfo.email");

// Send Client Request
$objOAuthService = new Google_Service_Oauth2($client);

// Add Access Token to Session
if (isset($_GET['code'])) {
$client->authenticate($_GET['code']);
$_SESSION['access_token'] = $client->getAccessToken();
header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
}

// Set Access Token to make Request
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
$client->setAccessToken($_SESSION['access_token']);
}

// Get User Data from Google and store them in $data
if ($client->getAccessToken()) {
$userData = $objOAuthService->userinfo->get();
$data['userData'] = $userData;
$_SESSION['access_token'] = $client->getAccessToken();
} else {
$authUrl = $client->createAuthUrl();
$data['authUrl'] = $authUrl;
}
// Load view and send values stored in $data
$this->load->view('pages/google_authentication', $data);
}

// Unset session and logout
public function logout() {
unset($_SESSION['access_token']);
redirect(base_url());
}
}
?>