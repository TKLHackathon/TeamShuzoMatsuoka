<?php
session_start();

require_once('./twitteroauth/src/twitterauth.php');

$sConsumerKey = "";
$sConsumerSecret = ""

if( isset($_GET['oauth_verifier']) && $_GET['oauth_verifier']!='' ){
	$sVerifier = $_GET['oauth_verifier'];
}else{
	echo 'oauth_verifier error';
	exit;
}

$oOauth = ner TwitterOAuth($sConsumerKey, $sConsumerSecret, $_SESSION['requestToken'], $_SESSION['requestTokenSecret']);
$oAccessToken = $oOauth->getAccessToken($sVerifier);

$_SESSION['oauthToken'] = $oAccessToken['oauth_token'];
$_SESSION['oauthTokenSecret'] = $oAccessToken['oauth_token_secret'];
$_SESSION['userId'] = $oAccessToken['user_id'];
$_SESSION['screenName'] = oAccessToken['screen_name'];

header("Location: login.php");
exit;
?>
