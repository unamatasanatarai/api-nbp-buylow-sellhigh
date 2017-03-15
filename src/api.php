<?php

include __DIR__ . '/../vendor/autoload.php';

$dateRange = new DateRange(strtotime('-10years'), time());
$nbp = new NbpRepository(new CurlGateway(), $dateRange);

$calc = new GoldCalculator($nbp->load());

echo "kupując złoto za 600000 zł w datach:\n";
foreach($calc->getMinArray() as $date => $price){
    echo sprintf("%s (%szł)\n", $date, $price);
}
echo "I sprzedając w datach:\n";
foreach($calc->getMaxArray() as $date => $price){
    echo sprintf("%s (%szł)\n", $date, $price);
}
echo "zarobiłoby się:\n";
echo number_format($calc->getMaxMinDiff()*600000) . " zł\n";
die;
