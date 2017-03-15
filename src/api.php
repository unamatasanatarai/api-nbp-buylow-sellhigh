<?php

include __DIR__ . '/../vendor/autoload.php';

$dateRange = new DateRange(strtotime('-10years'), time());
$nbp = new NbpRepository(new CurlGateway(), $dateRange);

$calc = new GoldCalculator($nbp->load());
$displayer = new CalcDecorator($calc, 600000);
echo $displayer->toString();
