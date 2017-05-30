<!-- BLIT'S KEY: RGAPI-4b522be5-4423-4d05-ae38-6d6b53adb806 -->
<!-- Cisco's Key:RGAPI-eee856fa-5126-4efd-9418-ca7e4e89afe4 -->
<!-- Regie's Key: RGAPI-fe22766e-cb9f-4371-978b-46d973663ed5-->
<!DOCTYPE html>
<html>
    <head>
        <title>League Stats</title>
        <link rel="stylesheet" href="includes/style.css" type="text/css" />

    </head>
    
    <body>
    	<h1>League Stats</h1>
    	
    	<form method="GET">
    	    <input type="text" name="summonerName" placeholder="Summoner Name" />
    	    <select name='season'>
    	        <option value='SEASON3'>Season 3</option>
    	        <option value='SEASON2014'>Season 4</option>
    	        <option value='SEASON2015'>Season 5</option>
    	        <option value='SEASON2016'>Season 6</option>
    	        <option value='SEASON2017'>Season 7</option>
    	    </select>
    	    <input type="submit" value="Search" name="searchForm" />
    	</form>
    	
        <?php
            if (isset($_GET['searchForm'])) { 
                $apiKey = 'RGAPI-fe22766e-cb9f-4371-978b-46d973663ed5';
            	$summonerName = strtolower($_GET['summonerName']);
             
            	// get the basic summoner info
            	$result = file_get_contents('https://na.api.pvp.net/api/lol/na/v1.4/summoner/by-name/' . $summonerName . '?api_key=' . $apiKey);
            	$summoner = json_decode($result)->$summonerName;
            	echo '<h3>';
            	echo '<image height="64" width="64" src="http://avatar.leagueoflegends.com/na/';
            	print $summonerName; 
            	echo '.png" valign="middle"/>';
            	echo ' ';
                print $summonerName;
            	echo '</h3>';
            	echo '<div>';
            	echo 'Level:';
            	print $summoner->summonerLevel;
            	
            	$result = file_get_contents('https://na.api.pvp.net/api/lol/na/v1.3/stats/by-summoner/' . $summoner->id . '/summary?api_key=' . $apiKey);
            	$stats = json_decode($result);
            	// var_dump($stats);
            	foreach($stats->playerStatSummaries as $statSummary){
            		// $statSummary->losses: sometimes losses isn't set
            		$losses = property_exists($statSummary, 'losses')? $statSummary->losses : '(no data)';
            		print '<p><b>' . $statSummary->playerStatSummaryType . '</b>: ' .
            		$statSummary->wins . ' wins, ' . $losses . ' losses</p>';
            	}
            	echo '</div>';
            
                    $result = file_get_contents('https://na.api.riotgames.com/api/lol/NA/v1.3/stats/by-summoner/' . $summoner->id . '/ranked?season=' . $_GET['season'] . '&api_key=' . $apiKey);
                    $stats = json_decode($result);
                    foreach($stats->champions as $champStats){
                		//echo $champStats->id . '<br>';
                	    $champInfo = file_get_contents('https://na1.api.riotgames.com/lol/static-data/v3/champions/' . $champStats->id . '?api_key=' . $apiKey);
                	    $champInfo = json_decode($champInfo);
                		echo '<p><b>' . $champInfo->name . ': ' . $champStats->stats->totalSessionsPlayed . '</b></p>';
            	    }
                   
            }
        ?>
    </body>
</html>

