<?php

class CurlGateway implements GatewayInterface
{

    private $url = 'http://api.nbp.pl/api/cenyzlota/%s/%s/?format=json';

    private $client;


    public function __construct()
    {
        $this->client = new \GuzzleHttp\Client();
    }


    public function loadGoldDateRange($from, $to)
    {
        $start = $from;
        $endarr = [];

        while ($start < $to) {
            $stop = strtotime('+360days', $start);

            if ( $stop > $to ) {
                $stop = $to;
            }

            try {
                $arr = $this->loadChunk($start, $stop);

                foreach ($arr as $item) {
                    $endarr[$item->data] = $item->cena;
                }
            } catch (Exception $e) {
                // log error maybe?
                // continue;
            }
            $start = $stop;
        }

        return $endarr;
    }


    /**
     * @param $start
     * @param $stop
     *
     * @return mixed
     */
    private function loadChunk($start, $stop)
    {
        $res = $this->client->request('GET', $this->makeUrl($start, $stop));

        return json_decode($res->getBody()
            ->getContents());
    }


    /**
     * @param $start int
     * @param $stop  int
     *
     * @return string
     */
    private function makeUrl($start, $stop)
    {
        return sprintf($this->url, date('Y-m-d', $start), date('Y-m-d', $stop));
    }
}

