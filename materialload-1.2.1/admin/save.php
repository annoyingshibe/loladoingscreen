<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once('../data/config.php');
  require_once ('../components/admin/steamid.php');
  require_once ('../dependencies/steamauth/steamauth.php');
  require_once('../components/admin/functions.php');
	if (!isAuthorized($_SESSION['steamid'])) {
		die("Unauthorized request.");
	}

  $postWhitelist = array(
		"logo",
		"background",
		"fadeTime",
		"welcomeMessage",
		"currencySymbol",
		"currencySymbolSide",
		"fallbackWalletBalance",
    "servername",
    "dbname",
    "username",
    "password",
    "introductionTitle",
    "introductionText",
    "youtubeVideoVolume",
    "rulesTitle",
    "staffMembersTitle",
    "serversTitle",
    "cardOrdering",
    "colorScheme",
    "cardAnimation"
	);
	foreach ($_POST as $k => $v) {
		if (in_array($k, $postWhitelist)) {
			${$k} = $v;
			continue;
		}
	}

	if (isset($_POST['backgroundFade'])) {
		$backgroundFade = "true";
	} else {
		$backgroundFade = "false";
	}
	if (isset($_POST['showSteamID'])) {
		$showSteamID = "true";
	} else {
		$showSteamID = "false";
	}
	if (isset($_POST['fetchDarkRPwallet'])) {
		$fetchDarkRPwallet = "true";
	} else {
		$fetchDarkRPwallet = "false";
	}
	if (isset($_POST['youtubeVideoIDs'])) {
		$youtubeVideoIDs = str_replace("\r\n", '","',($_POST['youtubeVideoIDs']));
  }
	if (isset($_POST['rules'])) {
		$rules = str_replace("\r\n", '","',($_POST['rules']));
	}
	if (isset($_POST['staffMembers'])) {
		$staffMembers = str_replace(',', '"=>"',($_POST['staffMembers']));
		$staffMembers = str_replace("\r\n", '","',$staffMembers);
	}
	if (isset($_POST['servers'])) {
		$servers = str_replace("\r\n", '","',($_POST['servers']));
	}
	if (isset($_POST['authorizedUsers'])) {
		$authorizedUsers = str_replace("\r\n", '","',$_POST['authorizedUsers']);
	}

	file_put_contents('../data/config.php',
'<?php
	$logo = "'.$logo.'";
	$background = "'.$background.'";
	$backgroundFade = '.$backgroundFade.';
	$fadeTime = "'.$fadeTime.'";
	$welcomeMessage = "'.$welcomeMessage.'";
	$showSteamID = '.$showSteamID.';
	$fetchDarkRPwallet = '.$fetchDarkRPwallet.';
	$currencySymbol = "'.$currencySymbol.'";
	$currencySymbolSide = "'.$currencySymbolSide.'";
	$fallbackWalletBalance = "'.$fallbackWalletBalance.'";
	$servername = "'.$servername.'";
	$dbname = "'.$dbname.'";
	$username = "'.$username.'";
	$password = "'.$password.'";
	$introductionTitle = "'.$introductionTitle.'";
	$introductionText = "'.$introductionText.'";
	$youtubeVideoIDs = array ("'.$youtubeVideoIDs.'");
	$youtubeVideoVolume = '.$youtubeVideoVolume.';
	$rulesTitle = "'.$rulesTitle.'";
	$rules = array ("'.$rules.'");
	$staffMembersTitle = "'.$staffMembersTitle.'";
	$staffMembers = array ("'.$staffMembers.'");
	$serversTitle = "'.$serversTitle.'";
	$servers = array ("'.$servers.'");
	$cardOrdering = array ('.$cardOrdering.');
	$colorScheme = "'.$colorScheme.'";
	$cardAnimation = "'.$cardAnimation.'";
	$authorizedUsers = array ("'.$authorizedUsers.'");
?>'
	);

	header('Content-Type: application/json');
	echo json_encode(array(
		'success' => true
	));
	exit();
} else {
  exit(header('Location: ../admin/index.php'));
}
