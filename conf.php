<?php
	session_start();

	require_once ("Facebook/autoload.php");

	$fb = new \Facebook\Facebook([
    	'app_id' => '1863147410391053',
    	'app_secret' => '3a9f3fcb0bb90db60c96e93e1a39261b',
    	'default_graph_version' => 'v3.0',
    //'default_access_token' => '{access-token}', // optional
]);

	$helper = $fb->getRedirectLoginHelper();


?>

