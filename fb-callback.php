<?php 

require_once ("conf.php");

if(!session_id()) {
    session_start();
}


if(isset($_GET['state'])) {
    $_SESSION['FBRLH_state'] = $_GET['state'];
}


try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}


// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();


if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  echo '<h3>Long-lived</h3>';
  var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken; // assign access token to session array



// Returns a `Facebook\FacebookResponse` object
try {
  
  $response = $fb->get('/me?fields=id,first_name,last_name,email,gender,address,picture.type(large)', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

//$userDetails = $response->getGraphUser();
$userDetails = $response->getGraphNode()->asArray();

var_dump($userDetails);

$_SESSION['userDetails'] = $userDetails;
  
header('Location: index.php');
exit();

?>