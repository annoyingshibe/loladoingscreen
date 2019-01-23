<?php
/*
██████╗  ██████╗     ███╗   ██╗ ██████╗ ████████╗    ███████╗██████╗ ██╗████████╗    ████████╗██╗  ██╗██╗███████╗    ███████╗██╗██╗     ███████╗
██╔══██╗██╔═══██╗    ████╗  ██║██╔═══██╗╚══██╔══╝    ██╔════╝██╔══██╗██║╚══██╔══╝    ╚══██╔══╝██║  ██║██║██╔════╝    ██╔════╝██║██║     ██╔════╝
██║  ██║██║   ██║    ██╔██╗ ██║██║   ██║   ██║       █████╗  ██║  ██║██║   ██║          ██║   ███████║██║███████╗    █████╗  ██║██║     █████╗
██║  ██║██║   ██║    ██║╚██╗██║██║   ██║   ██║       ██╔══╝  ██║  ██║██║   ██║          ██║   ██╔══██║██║╚════██║    ██╔══╝  ██║██║     ██╔══╝
██████╔╝╚██████╔╝    ██║ ╚████║╚██████╔╝   ██║       ███████╗██████╔╝██║   ██║          ██║   ██║  ██║██║███████║    ██║     ██║███████╗███████╗
╚═════╝  ╚═════╝     ╚═╝  ╚═══╝ ╚═════╝    ╚═╝       ╚══════╝╚═════╝ ╚═╝   ╚═╝          ╚═╝   ╚═╝  ╚═╝╚═╝╚══════╝    ╚═╝     ╚═╝╚══════╝╚══════╝

unless you know what you're doing. You could easily break something.
*/

require_once('../data/config.php');
require_once ('../components/admin/steamid.php');
require_once ('../data/steamapikey.php');
require_once('../components/admin/functions.php');

if ($steamapikey == null) {
	if (isset($_POST['steamapikey'])) {
		$steamapikey = $_POST['steamapikey'];
		file_put_contents('../data/steamapikey.php','<?php $steamapikey = "'.$steamapikey.'"; ?>');
		require_once '../dependencies/steamauth/steamauth.php';
		$steamauth['apikey'] = $steamapikey;
	}
} else {
	require_once '../dependencies/steamauth/steamauth.php';
	$steamauth['apikey'] = $steamapikey;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>MaterialLoad</title>
	<link type="text/css" rel="stylesheet" href="../dependencies/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" href="../dependencies/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../dependencies/animate.css/animate.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<style>html {font-family: 'Roboto', sans-serif;}
	.col .row {margin-left: auto;margin-right: auto;}</style>
	<?php include ('../components/background.php'); ?>
</head>
<body class="grey lighten-4">
	<main id="main">
		<?php
		if ($steamapikey == null):
			if(isset($_SESSION['steamid'])) {
				session_destroy();
			} ?>
			<form class="col s12" action="" method="post">
				<div class="container">
					<div class="card-panel white col s12">
						<div class="row">
						<p class="flow-text light light center" style="font-size: 20px">Get your Steam API key from <a target="_blank" href="https://steamcommunity.com/dev/apikey">here</a> and enter it below to begin configuring your loading screen.</p>
							<div class="input-field col s12">
								<i class="material-icons prefix fa fa-steam"></i>
								<input name="steamapikey" id="steamapikey" type="text" class="validate">
								<label for="steamapikey">Steam API Key</label>
							</div>
						</div>
						<div class="center">
							<div class="row">
								<button class="waves-effect waves-light btn" type="submit" name="action"><i class="material-icons left fa fa-sign-in"></i>Submit</button>
							</div>
						</div>
					</div>
				</div>
			</form>
		<?php else:
			if(!isset($_SESSION['steamid'])): ?>
				<div class="container"><div class="card-panel white col s12"><p class="flow-text light light center" style="font-size: 20px">Sign in with the Steam account using which you purchased this script to continue.</p>
				<div class="center"><div class="row">
				<?= loginbutton("rectangle") ?>
				</div></div></div></div>
			<?php else:
				require ('../dependencies/steamauth/userInfo.php');
				if (isAuthorized($steamprofile['steamid'])) {
					include('../components/admin/panelcontent.php');
				} else {
					session_destroy();
					exit(header("Refresh:0"));
				}
			endif;
		endif; ?>
		<?php if (isset($_SESSION['steamid'])) {
			if (isAuthorized($_SESSION['steamid'])):
				$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
				?>
				<div class="row">
					<div class="col s12 m6 offset-m3">
						<div class="card white">
							<div class="card-content black-text">
								<div class="row">
									<br>
									<br>
									<div class="row">
										<div class="input-field col s12">
											<p class="flow-text light light center" style="font-size:18px">When you're done, insert the text below anywhere in your server.cfg file.</p>
											<input disabled value="sv_loadingurl &quot;<?= $protocol.$_SERVER['HTTP_HOST'].str_replace('admin/', '', $_SERVER['REQUEST_URI']) ?>?steamid=%s&quot;" id="disabled" type="text">
											<br>
										</div>
									</div>
									<form action="" method="get">
										<div class="center">
											<div class="row">
												<button class="waves-effect waves-light btn" type="submit" name="logout"><i class="material-icons left fa fa-sign-out"></i>Sign out</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endif;
		} ?>
	</main>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="../dependencies/materialize/js/materialize.min.js"></script>
	<?php if (!isset($_SESSION['steamid'])): ?>
		<script type="text/javascript" src="../components/centermain.js"></script>
	<?php endif; ?>
</body>
</html>
