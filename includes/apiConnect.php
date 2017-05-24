<!--found this online, will go over it to understand what they are doing -->
<!--lines 27 - 38 i need to understand-->
<!-- BLIT'S KEY: RGAPI-4b522be5-4423-4d05-ae38-6d6b53adb806 -->
<!-- Cisco's Key:RGAPI-eee856fa-5126-4efd-9418-ca7e4e89afe4 -->
<!--Regie's Key: RGAPI-fe22766e-cb9f-4371-978b-46d973663ed5-->
<!DOCTYPE html>
<html>
    <head>
        <title>Summoner Spy</title>
    </head>
    <body>
    	<h1>Summoner Spy</h1>
    	<form>
    	    <input type="text" name="summonerName" placeholder="Summoner Name" />
    	    <input type="submit" value="Search"/>
    	</form>
    	
        <?php
        	$apiKey = 'RGAPI-fe22766e-cb9f-4371-978b-46d973663ed5';
        	$summonerName = strtolower($_GET['summonerName']);
         
        	// get the basic summoner info
        	$result = file_get_contents('https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/' . $summonerName . '?api_key=' . $apiKey);
        	$summoner = json_decode($result)->$summonerName;
        // 	var_dump($summoner);
        ?>	
        	<h3>
        		<image height="64" width="64" src="http://avatar.leagueoflegends.com/na/<?php print $summonerName; ?>.png" valign="middle"/>
        		<?php print $summonerName ?>
        	</h3>
        	<div>
        		Level: <?php print $summoner->summonerLevel; ?>
        	</div>
         
        <?php	
        	// get that summoner's wins and losses for each game type
        	$result = file_get_contents('https://na.api.pvp.net/api/lol/na/v1.3/stats/by-summoner/' . $summoner->id . '/summary?api_key=' . $apiKey);
        	$stats = json_decode($result);
        	// var_dump($stats);
        	foreach($stats->playerStatSummaries as $statSummary){
        		// $statSummary->losses: sometimes losses isn't set
        		$losses = property_exists($statSummary, 'losses')? $statSummary->losses : '(not available)';
        		print '<p><b>' . $statSummary->playerStatSummaryType . '</b>: ' .
        				$statSummary->wins . ' wins, ' . $losses . ' losses</p>';
        	}
        ?>
    </body>
</html>
