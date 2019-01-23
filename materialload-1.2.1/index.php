<?php
include_once("dependencycheck.php");
require_once("components/admin/steamid.php");
require_once("data/steamapikey.php");
require_once("data/config.php");

if ($steamapikey == null) {
	exit(header('Location: admin'));
}

$steamid = $_GET['steamid'];
if ($steamid == null) {
	exit(header('Location: ?steamid=%s'));
}

if ($steamid == "%s") {
	$steamid = $adminSteamID;
}
$steamAPIqueryString = $steamid;
if ($staffMembers != "") {
	foreach ($staffMembers as $steamid64 => $rank) {
		$steamAPIqueryString = $steamAPIqueryString.','.$steamid64;
	}
}
$steamAPIresponse = json_decode(file_get_contents("https://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=".$steamapikey."&steamids=".$steamAPIqueryString), true);

if (!isset ($cardOrdering)) {
	$cardOrdering = array ('welcome'=>true,'introduction'=>true,'staff'=>true,'rules'=>true,'servers'=>true,'download'=>true);
}
?>

<!DOCTYPE html>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="dependencies/materialize/css/materialize.min.css"  media="screen,projection"/>
	<link rel="stylesheet" href="dependencies/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="dependencies/animate.css/animate.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">
	<style>html {font-family: 'Roboto', sans-serif;}</style>
	<title>MaterialLoad</title>
	<?php include ('components/background.php');
	if ($colorScheme == 'dark'): ?>
		<style>.card { color: #fff; background-color: #222222; }</style>
	<?php endif; ?>
	<style>body { overflow: hidden; } main { display: none; }</style>
</head>
<body class="grey lighten-4">
	<script>
		function GameDetails(servername, serverurl, mapname, maxplayers, steamid, gamemode) {
			document.getElementById("gamemode").innerHTML = " " + gamemode;
			document.getElementById("mapname").innerHTML = " " + mapname;
		}

		var totalFiles, neededFiles;

		<?php
		if ($cardOrdering['download']==true): ?>
			function SetStatusChanged(status) {
				document.getElementById("dlstatus").innerHTML = status;
			}

			function DownloadingFile(fileName) {
				document.getElementById("curfilename").innerHTML = " " + fileName;
				UpdateLoadingPercentage(parseInt(totalFiles), parseInt(neededFiles));
			}

			function SetFilesTotal(total) {
				totalFiles = total;
			}

			function SetFilesNeeded(needed) {
				neededFiles = needed;
			}

			function UpdateLoadingPercentage(total, needed) {
				var percentage = 100 - (Math.round((needed / total) * 100));
				document.getElementById("progressbar").style.width = percentage + "%";
			}
		<?php endif; ?>
	</script>
	<div style="overflow: hidden; position: relative;">
		<div id="ytcontainer" style="position: absolute; height: 100px; width: 100px; right: -50px; top: 50px;">
		</div>
	</div>
	<main id="main">
		<div class="container">
		<?php if ($logo != null): ?>
			<div class="row center">
				<br>
				<img class="logo" src="<?= $logo ?>" style="max-width: 70%; height: auto;">
				<br>
			</div>
		<?php endif; ?>
		<div class="row"><div class="col s6">
		<?php
			$processingcOindex = 1;
			foreach ($cardOrdering as $cO => $cOenabled) {
				if ($processingcOindex == 3): ?>
					</div><div class="col s6">
				<?php elseif ($processingcOindex == 5): ?>
					</div></div>
				<?php endif;
				if ($cOenabled) {
					include ('components/cards/'.$cO.'.php');
				}
				$processingcOindex += 1;
			}
		?>
		</div>
	</main>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="dependencies/materialize/js/materialize.min.js"></script>
	<script type="text/javascript">
		var minH = $("main").height();
		var zoomLev = "unchanged"

		$(function () {
			CheckSizeZoom()
			$('#divWrap').css('visibility', 'visible');
		});
		$(window).resize(CheckSizeZoom)

		function CheckSizeZoom() {
			if ($(window).height() < minH) {
				zoomLev = $(window).height() / minH;

				if (typeof (document.body.style.zoom) != "undefined") {
					$(document.body).css('zoom', zoomLev);
				}
			}
		}

		var resizeHeight = minH;
		if ($(window).height() > minH) {
			resizeHeight = $(window).height();
		};

		$(window).resize(function(){
			$(document.getElementById("main")).css({
				position:'relative',
				top: (resizeHeight
				- $(document.getElementById("main")).outerHeight())/2
			});
		});

		$(window).bind("load", function() {
			$("main").css('display', 'block');
			$(window).resize();
			<?php if (isset($cardAnimation)): ?>
				$(".card, .logo").addClass("animated <?= $cardAnimation ?>");
			<?php endif; ?>
		});

		var tag = document.createElement('script');
		tag.src = "https://www.youtube.com/iframe_api";
		var firstScriptTag = document.getElementsByTagName('script')[0];
		firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
		var player;
		function onYouTubeIframeAPIReady() {
		player = new YT.Player('ytcontainer', {
			height: '390',
			width: '640',
			videoId: '<?= $youtubeVideoIDs[array_rand($youtubeVideoIDs)] ?>',
			events: {
			'onReady': onPlayerReady,
			'onStateChange': onPlayerStateChange
			}
		});
		}
		function onPlayerReady(event) {
			event.target.playVideo();
			event.target.setVolume(<?= $youtubeVideoVolume ?>);
		}
		function onPlayerStateChange(event) {
			event.target.playVideo(); //loop
		}
	</script>
</body>
</html>
