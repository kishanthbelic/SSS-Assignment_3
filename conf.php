<?php
	session_start();

	require_once ("Facebook/autoload.php");

	$fb = new \Facebook\Facebook([
    	'app_id' => '256926995048307',
    	'app_secret' => 'd22a973d4a4a45804bfd33b61450001b',
    	'default_graph_version' => 'v3.0',
    //'default_access_token' => '{access-token}', // optional
]);

	$helper = $fb->getRedirectLoginHelper();


?>

