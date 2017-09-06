<?php
session_start();

require_once("./twitteroauth/src/twitteroauth.php");

$sConsumerKey = "";
$sConsumerSecret = "";
$sCallbackUrl = "";


if( isset($_SESSION['oauthToken']) && isset($_SESSION['OauthTokenSecret']) ){
	//ログイン後にリダイレクトされてきている場合
	$sUserId = $_SESSION['userId'];
	$sScreenName = $_SESSION['screenName'];
	
	//なにがしかの操作
}else{
	//これから認証を行う場合
	$oOauth = new TwitterOAuth($sConsumerKey,$sConsumerSecret);
	
	$oOauthToken = $oOauth->getRequestToken($sCallbackUrl);
	
	$_SESSION['requestToken'] = $sToken = $oOauthToken['oauth_token'];
	$_SESSION['requestTokenSecret'] = $oOauthToken['oauth_token_secret'];
	
	if(ifset($_GET['authorizeBoolean']) && $_GET['authorizeBoolean'] != '')
		$bAuthorizeBoolean = false;
	else
		$bAuthorizeBoolean = true;
	
	$sUrl = $oOauth->getAuthorizeURL($sToken, $bAuthorizeBoolean);
	
	//a要素等でリンクを用意する アドレス・パスの入力は遷移先で行う？
}
	//以上の中にHTMLドキュメントを適宜挟み込む
	//というよりはHTMLの中に<?php ... ?>で処理を記述する感じ
?>

