<?php

include __DIR__ . '/../vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$apiUrl = 'http://api.nbp.pl/api/cenyzlota/%s/%s/?format=json';

$today = time();
$ago = strtotime('-10years');

$endarr = [];

// load && cache time periods

while($ago < $today){
	$start = $ago;
	$stop = strtotime('+360days', $ago);

	if ($stop > $today){
	    $stop = $today;
    }

	try {
		$res = $client->request('GET', sprintf($apiUrl, date('Y-m-d', $start), date('Y-m-d', $stop)));
		$arr = json_decode($res->getBody()->getContents());

		foreach($arr as $item){
		    $endarr[$item->data] = $item->cena;
        }
	} catch (Exception $e) {
		// continue
	}

	$ago = $stop;
}
$min = min($endarr);
$max = max($endarr);
$mina = array_intersect($endarr,[$min]);
$maxa = array_intersect($endarr,[$max]);
echo "kupując złoto za 600000 zł w datach:\n";
foreach($mina as $date => $price){
    echo sprintf("%s (%szł)\n", $date, $price);
}
echo "I sprzedając w datach:\n";
foreach($maxa as $date => $price){
    echo sprintf("%s (%szł)\n", $date, $price);
}
echo "zarobiłoby się:\n";
echo number_format(($max-$min)*600000) . " zł\n";
