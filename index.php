<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Studio Pepernoot</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://player.vimeo.com/api/player.js"></script>
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/video.js/7.15.4/video.min.js?ver=5.8.1' id='video.js-js'></script>
	<link rel="stylesheet" href="/slick/slick.css"/>
    <link rel="stylesheet" href="/slick/slick-theme.css"/>
	<script src="/slick/slick.min.js"></script>

    <meta property="fb:admins"		content="100002218835338" />
	<meta property="og:title"     	content="Studio Pepernoot"/>
	<meta property="og:type"      	content="website"/>
	<meta property="og:url"       	content="http://www.studiopepernoot.nl<?= $_SERVER['REQUEST_URI'] ?>"/>
	<meta property="og:image" 		content="<?= isset($sImage) ? $sImage : 'http://studiopepernoot.nl/logo.png' ?>"/>
	<meta property="og:description" content="<?= isset($sDescription) ? $sDescription: '' ?>"/>
	<meta property="og:site_name" 	content="Studio Pepernoot"/>

	<style>
	.mainpane {
		margin: auto;
		min-width: 600px;
		max-width: 1250px;
		width: 80%;
		background-image: url("images/background.jpg");
	}
	.header {
		height: 288px;
		width: 100%;
		background-image: url("images/header.png");
		position: relative;
	}
	.container {
		position: absolute;
		width: 100%;
		bottom: 30px;
		display: table;
	}
	.logo {
		margin: auto; 
		width: 493px;
		height: 281px;
		text-align: center;
		background-image: url("images/logo-studiopepernoot.png");
		background-repeat: no-repeat;
		background-size: cover;
				display: flex;
		justify-content: center;
		align-content: center;
		flex-direction: column;
	}
	.linkzwtv {
		position: absolute;
		left: 30px;
		bottom: 30px;
		width: 283px;
		height: 150px;
		background-image: url("images/knop.png");
		background-repeat: no-repeat;
		background-size: cover;
		font-family: Arial;
		font-size: 18pt;
		text-align: center;
		display: flex;
		justify-content: center;
		align-content: center;
		flex-direction: column;
	}

	.linkzwtv a {
		color: #FFFFFF;
		padding-right: 15px;
	}
	.linksboz {
		position: absolute;
		right: 30px;
		bottom: 30px;
		width: 283px;
		height: 150px;
		background-image: url("images/knop.png");
		background-repeat: no-repeat;
		background-size: cover;
		color: #FFFFFF;
		font-family: Arial;
		font-size: 18pt;
		text-align: center;
		display: flex;
		justify-content: center;
		align-content: center;
		flex-direction: column;
	}

	.linksboz a {
		color: #FFFFFF;
		padding-right: 15px;
	}

	.main {
		width: 100%;
	}

	.footer {
		background-image: url("images/footer.png");
		background-size: contain;
		background-repeat: no-repeat;
		background-position-y: bottom;
		height: 587px;
	}

	.carousel {
		margin: auto;
		width: 80%;
	}
	.cell {
		padding: 14px;
		text-align: center;
		width: 80%;
	}

	.cell img {
		width: auto;
		height: auto;
		max-width: 100%;
		display: inline;
	}

	.slick-side img {
		display: inline;
	}

	.cell video {
		border: none;
		outline : none;
	}

	.title {
		text-transform: uppercase;
		color: #FFFFFF;
		font-family: Arial;
		font-size: 18pt;
	}
	</style>
</head>
<body style="margin: auto;">
	<div class="mainpane">
		<div class="header">
			<div class="container">
				<div class="linkzwtv"><a href="https://www.zuidwesttv.nl/tv/studiopepernoot" target="_blank">BEKIJK EERDERE AFLEVERINGEN</a></div>
				<div class="linksboz"><a href="https://www.sintboz.nl" target="_blank">MEER<br/>INFORMATIE</a></div>
				<div class="logo"></div>
			</div>
		</div>
		<div class="main">
			<div class="carousel">
				<?
				$aMonths[1] = "januari";
				$aMonths[2] = "februari";
				$aMonths[3] = "maart";
				$aMonths[4] = "april";
				$aMonths[5] = "mei";
				$aMonths[6] = "juni";
				$aMonths[7] = "juli";
				$aMonths[8] = "augustus";
				$aMonths[9] = "september";
				$aMonths[10] = "oktober";
				$aMonths[11] = "november";
				$aMonths[12] = "december";
				
				$bShown = false;
				$data = json_decode(file_get_contents("https://www.zuidwestupdate.nl/wp-json/wp/v2/tv/29457"));
				//echo "<pre>";
				//print_r($data);
				
				for($i=0; $i<count($data->episodes); $i++) { 
					if(date("yyyy-mm-dd", strtotime($data->episodes[$i]->date))>'2021-01-01') {
						$bShown = true;
						?>
						<div class="cell">
							<div style="width: 100%; position: relative; text-align: center;">
								<div>
									<div id="videoplayer_wrapper_<?= $data->episodes[$i]->vimeo_id ?>" width="100%" height="100%"></div>
									<div class="title"><?= $data->episodes[$i]->title ?><br/><?= date("j", strtotime($data->episodes[$i]->date)) ?> <?= $aMonths[date("m", strtotime($data->episodes[$i]->date))] ?> <?= date("Y", strtotime($data->episodes[$i]->date)) ?></div>
									<script>
									var options<?= $data->episodes[$i]->vimeo_id ?> = {
										id: <?= $data->episodes[$i]->vimeo_id ?>
									};
									var video<?= $data->episodes[$i]->vimeo_id ?>Player = new Vimeo.Player('videoplayer_wrapper_<?= $data->episodes[$i]->vimeo_id ?>', options<?= $data->episodes[$i]->vimeo_id ?>);
									video<?= $data->episodes[$i]->vimeo_id ?>Player.setVolume(100);
									</script>
								</div>
							</div>
						</div>					
						<?
					}
				} ?>
				<? if(!$bShown) { ?>
					<div class="cell">
						<div style="width: 100%; position: relative; text-align: center;">
							<div class="title">Kijk vanaf maandag 9 november naar de nieuwste afleveringen van Studio Pepernoot!</div>
						</div>
					</div>
				<? } ?>
			</div>
		</div>
		<div class="footer"></div>
	</div>
<script>
  $('.carousel').slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
		centerMode: false
    });
</script>

</body>
</html>
